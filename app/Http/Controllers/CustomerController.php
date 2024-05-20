<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use DB;
use Session;

class CustomerController extends Controller
{
    // public function index()
    // {           
    //     $cal = array("status" => '1');

    //     $prev = date("m-Y", strtotime("first day of previous month"));
    //     $p = explode('-', $prev);
    //     $prevformat = $p[1] . '-' . $p[0];
    //     $lastmonth = date('m-Y', strtotime('-2 month'));
    //     $customercount = customer::select('Customers', 'Location')->where('Date', $prev)->whereBetween('Location', ['2401', '2430'])->get()->toArray();
    //     // print_r($customercount);
    //     $lastmonthcustomercount = customer::select('Customers')->where('Date', $lastmonth)->whereBetween('Location', ['2401', '2430'])->get()->toArray();
    //     // print_r($lastmonthcustomercount);
    //     $arr = [];
    //     $finalar = [];
    //     for ($x = 1; $x <= 12; $x++) {
    //         $ym = date('m-Y', strtotime($prevformat . " -$x month"));
    //         $query = customer::select('Customers')->where('Date', $ym)->whereBetween('Location', ['2401', '2430'])->get()->toArray();
    //         for ($k = 0; $k < count($query); $k++) {
    //             $result_array[] = 0;
    //         }
    //         for ($j = 0; $j < count($query); $j++) {
    //             if ($query[$j]['Customers'] == '') {
    //                 $result_array[$j] += 0;
    //             } else {
    //                 $result_array[$j] += $query[$j]['Customers'];
    //             }
    //         }
    //     }
    //     for ($i = 0; $i < count($result_array); $i++) {
    //         $ar = round($result_array[$i] / 28, 0);
    //         array_push($arr, $ar);
    //     }
    //     for ($y = 0; $y < count($lastmonthcustomercount); $y++) {
    //         $b = $lastmonthcustomercount[$y]['Customers'] - $arr[$y];
    //         array_push($finalar, $b);
    //     }
    //     foreach ($customercount as $key => $val) {  
    //         if(isset($lastmonthcustomercount[$key])){
    //             $customercount[$key]['custval'] = $lastmonthcustomercount[$key]['Customers'];
    //             $customercount[$key]['averageval'] = $finalar[$key];
    //         }else{
    //             $customercount[$key]['custval'] = 0;
    //             $customercount[$key]['averageval'] = 0;
    //         }
    //     }  
    //     return view('currentcustomerdata', compact('customercount', 'cal'));
    // }

    // New Function
    public function index()
    {
        $cal = array("status" => '1');
        $prev = date("m-Y", strtotime("first day of previous month"));
        $p = explode('-', $prev);
        $prevformat = $p[1] . '-' . $p[0];
        $lastmonth = date('m-Y', strtotime('-2 month'));

        $customercount = customer::select('Customers', 'Location')
            ->where('Date', $prev)
            ->whereBetween('Location', ['2401', '2430'])
            ->get()
            ->toArray();

        $lastmonthcustomercount = customer::select('Customers')
            ->where('Date', $lastmonth)
            ->whereBetween('Location', ['2401', '2430'])
            ->get()
            ->toArray();

        // Fetch all distinct locations from the database within the specified range
        $locations = customer::select('Location')
            ->whereRaw("STR_TO_DATE(CONCAT('01-', Date), '%d-%m-%Y') >= ?", ['2023-03-01'])
            ->whereRaw("STR_TO_DATE(CONCAT('01-', Date), '%d-%m-%Y') <= ?", ['2024-02-29'])
            ->whereBetween('Location', ['2401', '2430'])
            ->groupBy('Location')
            ->pluck('Location')
            ->toArray();

        $lastMonthAverageCustomers = [];
        foreach ($locations as $key => $location) {
            $locationAverageCount = customer::where('Location', $location)
                ->whereRaw("STR_TO_DATE(CONCAT('01-', Date), '%d-%m-%Y') >= ?", ['2023-03-01'])
                ->whereRaw("STR_TO_DATE(CONCAT('01-', Date), '%d-%m-%Y') <= ?", ['2024-02-29'])
                ->avg('Customers');

            $lastMonthAverageCustomers[$key] = round($locationAverageCount);
        }

        $lastYearMonthData = [];
        $lastMonthData = [];
        $lastMonthDecemberData = [];

        foreach ($locations as $key => $location) {
            $locationLastYearData = customer::where('Location', $location)
                ->whereRaw("STR_TO_DATE(CONCAT('01-', Date), '%d-%m-%Y') = ?", ['2023-12-01'])
                ->select('Date', 'Customers', 'Location')
                ->first();

            $locationLastMonthData = customer::where('Location', $location)
                ->whereRaw("STR_TO_DATE(CONCAT('01-', Date), '%d-%m-%Y') = ?", ['2024-03-01'])
                ->select('Date', 'Customers', 'Location')
                ->first();

            $lastYearMonthData[$key] = $locationLastYearData ? $locationLastYearData->toArray() : null;
            $lastMonthData[$key] = $locationLastMonthData ? $locationLastMonthData->toArray() : null;
        }

        // Initialize the array to store the difference data
        $lastMonthDecemberData = [];

        // Calculate the difference between last year and last month data for each location
        foreach ($lastYearMonthData as $key => $lastYearData) {
            $location = $lastYearData['Location'];

            // Check if last month data exists for the location
            if (isset($lastMonthData[$key])) {
                $lastMonthCustomers = $lastMonthData[$key]['Customers'];
            } else {
                $lastMonthCustomers = 0;
            }

            // Calculate the difference and store the data
            $lastMonthDecemberData[] =  $lastYearData['Customers'] - $lastMonthCustomers;
        }

        foreach ($customercount as $key => $val) {
            if (isset($lastmonthcustomercount[$key])) {
                $customercount[$key]['custval'] = $lastmonthcustomercount[$key]['Customers'];
                $customercount[$key]['averageval'] = $lastMonthAverageCustomers[$key];
                $customercount[$key]['last_month_december_data'] = $lastMonthDecemberData[$key];
            } else {
                $customercount[$key]['custval'] = 0;
                $customercount[$key]['averageval'] = 0;
                $customercount[$key]['last_month_december_data'] = 0;
            }
        }

        // $arr = [];
        // $finalar = [];
        // for ($x = 1; $x <= 12; $x++) {
        //     $ym = date('m-Y', strtotime("$prevformat -$x month"));
        //     $daysInMonth = cal_days_in_month(CAL_GREGORIAN, (int)substr($ym, 0, 2), (int)substr($ym, 3, 4));
        //     $query = customer::select('Customers')
        //         ->where('Date', $ym)
        //         ->whereBetween('Location', ['2401', '2430'])
        //         ->get()
        //         ->toArray();

        //     $totalCustomers = array_sum(array_column($query, 'Customers'));
        //     $averageCustomers = round($totalCustomers / $daysInMonth, 0);
        //     array_push($arr, $averageCustomers);
        // }

        // foreach ($lastmonthcustomercount as $key => $value) {
        //     $b = isset($arr[$key]) ? $value['Customers'] - $arr[$key] : $value['Customers'];
        //     array_push($finalar, $b);
        // }

        return view('currentcustomerdata', compact('customercount', 'cal'));
    }

    public function showcurrdata(Request $request)
    {
        $cust = [];
        $loc = [];
        $arr = [];
        $finalar = [];
        $selected = [];
        $lstmonth = [];
        $date = $request->date;

        // $datetime = DateTime::createFromFormat('d/m/Y', '05/06/2021');

        $d = explode('-', $date);
        $mnthname = date("F", mktime(0, 0, 0, $d[0], 10)) . '-' . $d[1];
        $dateformat = $d[1] . '-' . $d[0];
        $prev = date('m-Y', strtotime($dateformat . " -1month"));
        $lastmonth = date('m-Y', strtotime($dateformat . " -2month"));
        $selecteddata =  customer::select('Customers')->where('Date', $date)->whereBetween('Location', ['2401', '2430'])->get()->toArray();
        $customercount = customer::select('Customers', 'Location')->where('Date', $prev)->whereBetween('Location', ['2401', '2430'])->get()->toArray();
        $custquery = customer::select('Customers', 'Location')->where('Date', $lastmonth)->whereBetween('Location', ['2401', '2430'])->get()->toArray();
        for ($x = 1; $x <= 12; $x++) {
            $ym = date('m-Y', strtotime($dateformat . " -$x month"));
            $query = customer::select('Customers', 'Location')->where('Date', $ym)->whereBetween('Location', ['2401', '2430'])->get()->toArray();
            for ($k = 0; $k < count($query); $k++) {
                $result_array[] = 0;
                $result_array2[] = 0;
            }
            for ($j = 0; $j < count($query); $j++) {
                if ($query[$j]['Customers'] == '') {
                    $result_array[$j] += 0;
                } else {
                    $result_array[$j] += $query[$j]['Customers'];
                }
            }
        }
        // print_r($selecteddata);
        for ($i = 0; $i < count($result_array); $i++) {
            $ar = round($result_array[$i] / 28, 0);
            array_push($arr, $ar);
        }
        // // $average = round(array_sum($result_array) / count($result_array), 0);
        foreach ($custquery as $key => $cquery) {
            array_push($cust, $cquery['Customers']);
            array_push($loc, $cquery['Location']);
        }
        $ar1 = [];
        for ($a = 0; $a < count($cust); $a++) {
            $result_array2 = $cust[$a] - $arr[$a];
            array_push($ar1, $result_array2);
        }
        foreach ($selecteddata as $select) {
            array_push($selected, $select['Customers']);
        }
        for ($y = 0; $y < count($customercount); $y++) {
            array_push($lstmonth, $customercount[$y]['Customers']);
        }
        return json_encode(array($ar1, $loc, $selected, $lstmonth, $mnthname));
    }
}
