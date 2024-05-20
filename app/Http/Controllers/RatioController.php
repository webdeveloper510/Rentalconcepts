<?php

namespace App\Http\Controllers;

use Session;
use DB;
use App\Models\Location;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use App\Models\expensedata;
use App\Models\expensedata1;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

class RatioController extends BaseController
{
    public function viewratio()
    {
        if(Session::has('userloginid')) {
            $location =  DB::table('locations')
                ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
                ->where('permissions.allowed', 1)
                ->where("permissions.userid", Session::get('userloginid'))->orderBy('Location', 'ASC')
                ->get()->toArray();
                $cal = array("status" => '1');
           
            $defloc=DB::table('default_loc')->select('location')
            ->where('userid', Session::get('userloginid'))->get()->toArray();
            if(!$defloc){
                $selctedlocation=$location[0]->locationid;
              }else{
                $selctedlocation = $defloc[0]->location;
              }
            $prevdate = date("m-Y", strtotime("first day of previous month"));
            $prevyear = (explode("-", $prevdate));
            $year = $prevyear[1];
            $rev = [];
            $cogs = [];

            $totalrev = [];
            $totcog = [];
    
            $sum = $sum1 = $sum2 = $sum3 =  $sum4 =  $sum5 =  $sum6 =  $sum7 =  $sum8 = $sum9 = $sum10 = $sum11 = 0;
            $cogsum = $cogsum1 = $cogsum2 = $cogsum3 = $cogsum4 = $cogsum5 = $cogsum6 = $cogsum7 = $cogsum8 = $cogsum9 = $cogsum10 = 0;

            $totalrevsum =  $totalrevsum1 =  $totalrevsum2 =  $totalrevsum3 =   $totalrevsum4 =  $totalrevsum5 =   $totalrevsum6 =   $totalrevsum7 =  $totalrevsum8 =   $totalrevsum9 =  $totalrevsum10 =    $totalrevsum11 = 0;
            $totalcogsum =   $totalcogsum1 =  $totalcogsum2 =  $totalcogsum3 =  $totalcogsum4 =  $totalcogsum5 =  $totalcogsum6 =  $totalcogsum7 = $totalcogsum8 =  $totalcogsum9 = $totalcogsum10 = 0;
            for ($m = 1; $m <= $prevyear[0]; $m++) {
                date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                $pyear = sprintf('%02d', $m) . '-' . $year;

                $revenue1 = revenuedata::where([['Location', '=', '2401'], ['Date', '=', $pyear]])->get()->toArray();
                $cogsdata1 = Cogsdata::where([['Location', '=', '2401'], ['Date', '=', $pyear]])->get()->toArray();
               
                array_push($rev, $revenue1);
                array_push($cogs, $cogsdata1);
              
             // ---------------------   all Location data-----------------
            $totalrevenue = revenuedata::where('Date', '=', $pyear)->get()->toArray();
            $totalcogs = Cogsdata::where('Date', '=', $pyear)->get()->toArray();
            array_push($totalrev, $totalrevenue);
            array_push($totcog, $totalcogs);
            }
            
           
            foreach ($rev as $value) {
                foreach ($value as $val) {
                    $sum += $val['RentalIncome'];
                    $sum1 += $val['CashSales'];
                    $sum2 += $val['EarlyPurchaseOption'];
                    $sum3 += $val['RollPro'];
                    $sum4 += $val['CollectionFeeInHouse'];
                    $sum5 += $val['ReinstatementFees'];
                    $sum6 += $val['OtherFeesAlignments'];
                    $sum7 += $val['OneTimeFees'];
                    $sum8 += $val['NSFCheckFees'];
                    $sum9 += $val['OtherMiscellaneousIncome'];
                    $sum10 += $val['RollSafe'];
                    $sum11 += $val['Chargebacks'];
                }
            }
            foreach ($cogs as $value) {
                foreach ($value as $val) {
                    $cogsum += $val['depreciation_inventory'];
                    $cogsum1 += $val['paidout_epocharge'];
                    $cogsum2 += $val['cashsalechargeoffs'];
                    $cogsum3 += $val['skipstolenchargeoffs'];
                    $cogsum4 += $val['insurancechargeoffs'];
                    $cogsum5 += $val['returneddamagednonrepairable'];
                    $cogsum6 += $val['otherchargeoff'];
                    $cogsum7 += $val['pastdueaccountchargeoff'];
                    $cogsum8 += $val['inventorycostadjustment'];
                    $cogsum9 += $val['clubremittance'];
                }
            }
            // -----------------------------------Selected Location -------------------------
            $rev1 = [];
            $cogs1 = [];
    
            $revsum =  $revsum1 =  $revsum2 =  $revsum3 =  $revsum4 =  $revsum5 =  $revsum6 =  $revsum7 =  $revsum8 =  $revsum9 = $revsum10 = $revsum11 = $cogsumm = $cogsumm1 =  $cogsumm2 =  $cogsumm3 =  $cogsumm4 = $cogsumm5 = $cogsumm6 = $cogsumm7 = $cogsumm8 = $cogsumm9 = $cogsumm10 = 0;
            
            for ($m = 1; $m <= $prevyear[0]; $m++) {
                date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                $pyear = sprintf('%02d', $m) . '-' . $year;
    
                $reven = revenuedata::where([['Location', '=', $selctedlocation], ['Date', '=', $pyear]])->get()->toArray();
                $cogsdat = Cogsdata::where([['Location', '=',  $selctedlocation], ['Date', '=', $pyear]])->get()->toArray();
                $expdat = expensedata::where([['Location', '=', $selctedlocation], ['Date', '=', $pyear]])->get()->toArray();
                $expensed = expensedata1::where([['Location', '=', $selctedlocation], ['Date', '=', $pyear]])->get()->toArray();
              
                array_push($rev1, $reven);
                array_push($cogs1, $cogsdat);
            }
          
            foreach ($rev1 as $value) {
                foreach ($value as $val) {
                    $revsum += $val['RentalIncome'];
                    $revsum1 += $val['CashSales'];
                    $revsum2 += $val['EarlyPurchaseOption'];
                    $revsum3 += $val['RollPro'];
                    $revsum4 += $val['CollectionFeeInHouse'];
                    $revsum5 += $val['ReinstatementFees'];
                    $revsum6 += $val['OtherFeesAlignments'];
                    $revsum7 += $val['OneTimeFees'];
                    $revsum8 += $val['NSFCheckFees'];
                    $revsum9 += $val['OtherMiscellaneousIncome'];
                    $revsum10 += $val['RollSafe'];
                    $revsum11 += $val['Chargebacks'];
                }
            }
            foreach ($cogs1 as $value) {
                foreach ($value as $val) {
                    $cogsumm += $val['depreciation_inventory'];
                    $cogsumm1 += $val['paidout_epocharge'];
                    $cogsumm2 += $val['cashsalechargeoffs'];
                    $cogsumm3 += $val['skipstolenchargeoffs'];
                    $cogsumm4 += $val['insurancechargeoffs'];
                    $cogsumm5 += $val['returneddamagednonrepairable'];
                    $cogsumm6 += $val['otherchargeoff'];
                    $cogsumm7 += $val['pastdueaccountchargeoff'];
                    $cogsumm8 += $val['inventorycostadjustment'];
                    $cogsumm9 += $val['clubremittance'];
                }
            }
             //------------------------------- Total Company daTA----------------------------
        foreach ($totalrev as $value) {
            foreach ($value as $val) {
                $totalrevsum += $val['RentalIncome'];
                $totalrevsum1 += $val['CashSales'];
                $totalrevsum2 += $val['EarlyPurchaseOption'];
                $totalrevsum3 += $val['RollPro'];
                $totalrevsum4 += $val['CollectionFeeInHouse'];
                $totalrevsum5 += $val['ReinstatementFees'];
                $totalrevsum6 += $val['OtherFeesAlignments'];
                $totalrevsum7 += $val['OneTimeFees'];
                $totalrevsum8 += $val['NSFCheckFees'];
                $totalrevsum9 += $val['OtherMiscellaneousIncome'];
                $totalrevsum10 += $val['RollSafe'];
                $totalrevsum11 += $val['Chargebacks'];
            }
        }
       
        foreach ($totcog as $value) {
            foreach ($value as $val) {
                $totalcogsum += $val['depreciation_inventory'];
                $totalcogsum1 += $val['paidout_epocharge'];
                $totalcogsum2 += $val['cashsalechargeoffs'];
                $totalcogsum3 += $val['skipstolenchargeoffs'];
                $totalcogsum4 += $val['insurancechargeoffs'];
                $totalcogsum5 += $val['returneddamagednonrepairable'];
                $totalcogsum6 += $val['otherchargeoff'];
                $totalcogsum7 += $val['pastdueaccountchargeoff'];
                $totalcogsum8 += $val['inventorycostadjustment'];
                $totalcogsum9 += $val['clubremittance'];
            }
        }
            $alldata = array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9, $sum10, $sum11);
            $cogdata = array($cogsum, $cogsum1, $cogsum2, $cogsum3, $cogsum4, $cogsum5, $cogsum6, $cogsum7, $cogsum8, $cogsum9);
           
            $revenuedata=array($revsum, $revsum1, $revsum2, $revsum3, $revsum4, $revsum5, $revsum6, $revsum7, $revsum8, $revsum9, $revsum10, $revsum11);
            $cogsdata = array($cogsumm, $cogsumm1, $cogsumm2, $cogsumm3, $cogsumm4, $cogsumm5, $cogsumm6, $cogsumm7, $cogsumm8, $cogsumm9);

            $totalrevenuedata=array($totalrevsum, $totalrevsum1, $totalrevsum2, $totalrevsum3, $totalrevsum4, $totalrevsum5, $totalrevsum6, $totalrevsum7, $totalrevsum8, $totalrevsum9, $totalrevsum10, $totalrevsum11);
            $totalcogsdata =array($totalcogsum, $totalcogsum1, $totalcogsum2, $totalcogsum3, $totalcogsum4, $totalcogsum5, $totalcogsum6, $totalcogsum7, $totalcogsum8, $totalcogsum9);
            return view('ratio', compact('location','alldata','cogdata','totalrevenuedata','totalcogsdata','revenuedata','cogsdata','cal','selctedlocation'));
        } else {
            return redirect('/');
        }
    }
    public function ytdratio(Request $request)
    {
        $location =  DB::table('locations')
        ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
        ->where('permissions.allowed', 1)
        ->where("permissions.userid", Session::get('userloginid'))
        ->get()->toArray();
        $selctedloc = $request['loc'];
        $loca=Location::select('Location')->where('locationid',$selctedloc)->get()->toArray();
        $cal = array("status" => '0');
        $prevdate = date("m-Y", strtotime("first day of previous month"));
        $prevyear = (explode("-", $prevdate));
        $year = $prevyear[1];
        // -------------------------JACKSONVILLE LOCATION DATA ----------------------------
        $rev = [];
        $cogs = [];
        $totalrev = [];
        $totcog = [];

        $sum =  $sum1 =  $sum2 =  $sum3 =   $sum4 =  $sum5 =   $sum6 =   $sum7 =  $sum8 =   $sum9 =  $sum10 =    $sum11 = 
        $cogsum =   $cogsum1 =  $cogsum2 =  $cogsum3 =  $cogsum4 =  $cogsum5 =  $cogsum6 =  $cogsum7 = $cogsum8 =  $cogsum9 = $cogsum10 = 
        $totalrevsum =  $totalrevsum1 =  $totalrevsum2 =  $totalrevsum3 =   $totalrevsum4 =  $totalrevsum5 =   $totalrevsum6 =   $totalrevsum7 =  $totalrevsum8 =   $totalrevsum9 =  $totalrevsum10 =    $totalrevsum11 = $totalcogsum =   $totalcogsum1 =  $totalcogsum2 =  $totalcogsum3 =  $totalcogsum4 =  $totalcogsum5 =  $totalcogsum6 =  $totalcogsum7 = $totalcogsum8 =  $totalcogsum9 = $totalcogsum10 = 0;
        for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $pyear = sprintf('%02d', $m) . '-' . $year;
        // ---------------------   Single Location data-----------------
            $revenue1 = revenuedata::where([['Location', '=', '2401'], ['Date', '=', $pyear]])->get()->toArray();
            $cogsdata1 = Cogsdata::where([['Location', '=', '2401'], ['Date', '=', $pyear]])->get()->toArray();
           
            array_push($rev, $revenue1);
            array_push($cogs, $cogsdata1);
        // ---------------------   all Location data-----------------
            $totalrevenue = revenuedata::where('Date', '=', $pyear)->get()->toArray();
            $totalcogs = Cogsdata::where('Date', '=', $pyear)->get()->toArray();

            array_push($totalrev, $totalrevenue);
            array_push($totcog, $totalcogs);
        }
        foreach ($rev as $value) {
            foreach ($value as $val) {
                $sum += $val['RentalIncome'];
                $sum1 += $val['CashSales'];
                $sum2 += $val['EarlyPurchaseOption'];
                $sum3 += $val['RollPro'];
                $sum4 += $val['CollectionFeeInHouse'];
                $sum5 += $val['ReinstatementFees'];
                $sum6 += $val['OtherFeesAlignments'];
                $sum7 += $val['OneTimeFees'];
                $sum8 += $val['NSFCheckFees'];
                $sum9 += $val['OtherMiscellaneousIncome'];
                $sum10 += $val['RollSafe'];
                $sum11 += $val['Chargebacks'];
            }
        }
        foreach ($cogs as $value) {
            foreach ($value as $val) {
                $cogsum += $val['depreciation_inventory'];
                $cogsum1 += $val['paidout_epocharge'];
                $cogsum2 += $val['cashsalechargeoffs'];
                $cogsum3 += $val['skipstolenchargeoffs'];
                $cogsum4 += $val['insurancechargeoffs'];
                $cogsum5 += $val['returneddamagednonrepairable'];
                $cogsum6 += $val['otherchargeoff'];
                $cogsum7 += $val['pastdueaccountchargeoff'];
                $cogsum8 += $val['inventorycostadjustment'];
                $cogsum9 += $val['clubremittance'];
            }
        }
        //------------------------------- Total Company daTA----------------------------
        foreach ($totalrev as $value) {
            foreach ($value as $val) {
                $totalrevsum += $val['RentalIncome'];
                $totalrevsum1 += $val['CashSales'];
                $totalrevsum2 += $val['EarlyPurchaseOption'];
                $totalrevsum3 += $val['RollPro'];
                $totalrevsum4 += $val['CollectionFeeInHouse'];
                $totalrevsum5 += $val['ReinstatementFees'];
                $totalrevsum6 += $val['OtherFeesAlignments'];
                $totalrevsum7 += $val['OneTimeFees'];
                $totalrevsum8 += $val['NSFCheckFees'];
                $totalrevsum9 += $val['OtherMiscellaneousIncome'];
                $totalrevsum10 += $val['RollSafe'];
                $totalrevsum11 += $val['Chargebacks'];
            }
        }
   
        foreach ($totcog as $value) {
            foreach ($value as $val) {
                $totalcogsum += $val['depreciation_inventory'];
                $totalcogsum1 += $val['paidout_epocharge'];
                $totalcogsum2 += $val['cashsalechargeoffs'];
                $totalcogsum3 += $val['skipstolenchargeoffs'];
                $totalcogsum4 += $val['insurancechargeoffs'];
                $totalcogsum5 += $val['returneddamagednonrepairable'];
                $totalcogsum6 += $val['otherchargeoff'];
                $totalcogsum7 += $val['pastdueaccountchargeoff'];
                $totalcogsum8 += $val['inventorycostadjustment'];
                $totalcogsum9 += $val['clubremittance'];
            }
        }
        // -----------------------------------SELECTED LOCATION DATA-------------------------------------
        $rev1 = [];
        $cogs1 = [];

        $revsum =  $revsum1 =  $revsum2 =  $revsum3 =  $revsum4 =  $revsum5 =  $revsum6 =  $revsum7 =  $revsum8 =  $revsum9 = $revsum10 = $revsum11 = $cogsumm = $cogsumm1 =  $cogsumm2 =  $cogsumm3 =  $cogsumm4 = $cogsumm5 = $cogsumm6 = $cogsumm7 = $cogsumm8 = $cogsumm9 = $cogsumm10 = 0;
        
        for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $pyear = sprintf('%02d', $m) . '-' . $year;

            $reven = revenuedata::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $cogsdat = Cogsdata::where([['Location', '=',  $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expdat = expensedata::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expensed = expensedata1::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
          
            array_push($rev1, $reven);
            array_push($cogs1, $cogsdat);
         
        }
        foreach ($rev1 as $value) {
            foreach ($value as $val) {
                $revsum += $val['RentalIncome'];
                $revsum1 += $val['CashSales'];
                $revsum2 += $val['EarlyPurchaseOption'];
                $revsum3 += $val['RollPro'];
                $revsum4 += $val['CollectionFeeInHouse'];
                $revsum5 += $val['ReinstatementFees'];
                $revsum6 += $val['OtherFeesAlignments'];
                $revsum7 += $val['OneTimeFees'];
                $revsum8 += $val['NSFCheckFees'];
                $revsum9 += $val['OtherMiscellaneousIncome'];
                $revsum10 += $val['RollSafe'];
                $revsum11 += $val['Chargebacks'];
            }
        }
        foreach ($cogs1 as $value) {
            foreach ($value as $val) {
                $cogsumm += $val['depreciation_inventory'];
                $cogsumm1 += $val['paidout_epocharge'];
                $cogsumm2 += $val['cashsalechargeoffs'];
                $cogsumm3 += $val['skipstolenchargeoffs'];
                $cogsumm4 += $val['insurancechargeoffs'];
                $cogsumm5 += $val['returneddamagednonrepairable'];
                $cogsumm6 += $val['otherchargeoff'];
                $cogsumm7 += $val['pastdueaccountchargeoff'];
                $cogsumm8 += $val['inventorycostadjustment'];
                $cogsumm9 += $val['clubremittance'];
            }
        }
        $alldata = array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9, $sum10, $sum11);
        $cogdata = array($cogsum, $cogsum1, $cogsum2, $cogsum3, $cogsum4, $cogsum5, $cogsum6, $cogsum7, $cogsum8, $cogsum9);

        $revenuedata=array($revsum, $revsum1, $revsum2, $revsum3, $revsum4, $revsum5, $revsum6, $revsum7, $revsum8, $revsum9, $revsum10,$revsum11);
        $cogsdata = array($cogsumm, $cogsumm1, $cogsumm2, $cogsumm3, $cogsumm4, $cogsumm5, $cogsumm6, $cogsumm7, $cogsumm8, $cogsumm9);
        $totalrevenuedata=array($totalrevsum, $totalrevsum1, $totalrevsum2, $totalrevsum3, $totalrevsum4, $totalrevsum5, $totalrevsum6, $totalrevsum7, $totalrevsum8, $totalrevsum9, $totalrevsum10, $totalrevsum11);
        $totalcogsdata =array($totalcogsum, $totalcogsum1, $totalcogsum2, $totalcogsum3, $totalcogsum4, $totalcogsum5, $totalcogsum6, $totalcogsum7, $totalcogsum8, $totalcogsum9);
        return view('ratio', compact('location','alldata','cogdata','selctedloc','revenuedata','cogsdata','loca','totalrevenuedata','totalcogsdata','cal'));
    }
}
