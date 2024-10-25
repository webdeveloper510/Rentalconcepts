<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Revenue;
use App\Models\Location;
use App\Models\DailyReport;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index()
    {
        $data = Location::all();
        if (Session::has('loginid')) {
            return view('daily-report/index', ['data' => $data]);
        } else {
            return redirect('/admin');
        }
    }

    public function uploadDailyReport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        // Handle file upload
        if ($request->hasfile('file')) {
            $filename = $request->file;
            $name = time() . rand(1, 100) . '.' . $filename->extension();
            $filename->move(public_path('daily-report-upload'), $name);
        }

        $reportData = [];

        // Open and parse the CSV file
        if (($open = fopen(public_path() . '/daily-report-upload/' . $name, "r")) !== FALSE) {
            $k = 0;
            while ($data = fgetcsv($open, 9000, ",")) {
                $k++;
                if ($k == 1) {
                    continue; // Skip the header row
                }
                $reportData[] = $data;
            }
            fclose($open);
        }

        // echo "<pre>";
        // print_r($reportData);
        // die;

        // Save each row into the database
        foreach ($reportData as $data) {
            DailyReport::create([
                'SummaryDate' => $data[0],
                'Store' => $data[1],
                'StoreName' => $data[2],
                'RentalIncome' => $data[3],
                'NetSales' => $data[4],
                'GRPAmount' => $data[5],
                'ProcessingFees' => $data[6],
                'LateFees' => $data[7],
                'ReturnedCheckCharge' => $data[8],
                'FeesAndCharges' => $data[9],
                'ClubAndESP' => $data[10],
                'TotalRevenue' => $data[11],
                'Tax' => $data[12],
                'NetReceivable' => $data[13],
                'NSFRefunds' => $data[14],
                'TotalBankDeposit' => $data[15],
                'TotalCash' => $data[16],
                'Deposit1' => $data[17],
                'Deposit2' => $data[18],
                'Deposit3' => $data[19],
                'Deposit4' => $data[20],
                'Deposit6' => $data[21],
                'RentalOverShort' => $data[22],
                'FreeTimeAmount' => $data[23],
                'FreeNewAgreements' => $data[24],
                'AgreementDeliveries' => $data[25],
                'PotentialRevenueDeliveries' => $data[26],
                'AgreementPickups' => $data[27],
                'PotentialRevenuePickups' => $data[28],
                'AgreementPayouts' => $data[29],
                'AgreementChargeoffs' => $data[30],
                'PotentialRevenueSkips' => $data[31],
                'OpenAgreementCount' => $data[32],
                'PotentialRevenue' => $data[33],
                'TotalPastDueNbr' => $data[34],
                'PD_Percent' => $data[35],
                'TotalPastDueAmount' => $data[36] ? $data[36] : 0.00,
                'PastDue1_4Amount' => $data[37],
                'PastDue5_7Amount' => $data[38],
                'PastDue8_15Amount' => $data[39],
                'PastDue32_PlusAmount' => $data[40],
                'CustomerCount' => $data[41],
                'UnitsOnRent' => $data[42],
                'IdleUnits' => $data[43],
            ]);
        }

        return redirect('admin/add-daily-report')->with('message', 'File has been added successfully.');
    }


    public function viewDailyReport()
    {
        if (Session::has('loginid')) {
            $dailyReport = DailyReport::where('SummaryDate', '2024-08-06')
                ->where('StoreName', 'RNR-JACKSONVILLE')
                ->get();

            $storeNames = DailyReport::pluck('StoreName');
            // echo "<pre>";
            // print_r($storeNames);
            // die;
            return view('daily-report.viewdailyreport', compact('dailyReport', 'storeNames'));
        } else {
            return redirect('/admin');
        }
    }
}
