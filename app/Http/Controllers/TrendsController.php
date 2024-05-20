<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Cogsdata;
use App\Models\Permission;
use App\Models\revenuedata;
use App\Models\expensedata1;

use DB;
use Illuminate\Http\Request;

class TrendsController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function viewtrends()
  {
    if (Session::has('userloginid')) {
      $location =  DB::table('locations')
        ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
        ->where('permissions.allowed', 1)
        ->where("permissions.userid", Session::get('userloginid'))->orderBy('Location', 'ASC')
        ->get()->toArray();
      $locpermitted = Permission::select('locationid')->where('userid', Session::get('userloginid'))->where('allowed', 1)->orderBy('locationid', 'ASC')->limit(1)->get()->toArray();
      $defloc = DB::table('default_loc')->select('location')
        ->where('userid', Session::get('userloginid'))->get()->toArray();
      if (!$defloc) {
        $loc  = $locpermitted[0];
      } else {
        $loc = $defloc[0]->location;
      }

      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $prevyear = (explode("-", $prevdate));

      $year = $prevyear[1];
      $previousyear = $year - 1;
      $previous = $prevyear[0] . "-" . $previousyear;
      $months = [];
      $cog = [];
      $hr = [];
      $rev = [];
      $cogval = [];
      $revval = [];
      $hrval = [];
      $ovrtime = [];
      $overval = [];

      for ($i = 12; $i >= 1; $i--) {
        $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
      }

      if (!empty($months)) {
        foreach ($months as $key => $value) {

          $sumrevenuedata = round(revenuedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 2);
          $cogsum = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff ')), 2);
          $hourly = expensedata1::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('TotalHourly'));
          $overtime = expensedata1::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('Overtimehourly'));
          $cog[$key][$value] = $cogsum;
          $rev[$key][$value] = $sumrevenuedata;
          $hr[$key][$value] = $hourly;
          $ovrtime[$key][$value] = $overtime;
        }
      }

      foreach ($cog as $value) {
        foreach ($value as $valu) {
          $cogval[] = $valu;
        }
      }
      foreach ($rev as $value) {
        foreach ($value as $valuu) {
          $revval[] = $valuu;
        }
      }
      foreach ($hr as $value) {
        foreach ($value as $vlue) {
          $hrval[] = $vlue;
        }
      }
      foreach ($ovrtime as $value) {
        foreach ($value as $val) {
          $overval[] = $val;
        }
      }
      if (max($revval) > 0) {
        for ($i = 0; $i <= 11; $i++) {
          if ($revval[$i] > 0) {
            $y[$i] = ($cogval[$i] / $revval[$i]) * 100;
            $h[$i] = ($hrval[$i] / $revval[$i]) * 100;
            $o[$i] = ($overval[$i] / $revval[$i]) * 100;
          } else {
            $y[$i] = 0;
            $h[$i] = 0;
            $o[$i] = 0;
          }
        }
        return view('trends', compact('location', 'loc', 'cog', 'y', 'h', 'o'));
      } else {
        return view('trends', compact('location', 'loc', 'cog'));
      }
    } else {
      return redirect('/');
    }
  }
  public function gettrends(Request $req)
  {
    $loc = $req['location'];

    $location =  DB::table('locations')
      ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
      ->where('permissions.allowed', 1)
      ->where("permissions.userid", Session::get('userloginid'))->orderBy('Location', 'ASC')
      ->get()->toArray();
    $prevdate = date("m-Y", strtotime("first day of previous month"));
    $prevyear = (explode("-", $prevdate));

    $year = $prevyear[1];
    $previousyear = $year - 1;
    $previous = $prevyear[0] . "-" . $previousyear;
    $months = [];
    $cog = [];
    $rev = [];
    $hr = [];
    $ovrtime = [];
    $hrval = [];
    $cogval = [];
    $revval = [];
    $overval = [];

    for ($i = 12; $i >= 1; $i--) {
      $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
    }

    if (!empty($months)) {
      foreach ($months as $key => $value) {
        $sumrevenuedata = round(revenuedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 2);
        $cogsum = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff')),2);
        $hourly = expensedata1::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('TotalHourly'));
        $overtime = expensedata1::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('Overtimehourly'));
        $cog[$key][$value] = $cogsum;
        $rev[$key][$value] = $sumrevenuedata;
        $hr[$key][$value] = $hourly;
        $ovrtime[$key][$value] = $overtime;
      }
    }
    foreach ($cog as $value) {
      foreach ($value as $valu) {
        $cogval[] = $valu;
      }
    }
    foreach ($rev as $value) {
      foreach ($value as $valuu) {
        $revval[] = $valuu;
      }
    }

    foreach ($hr as $value) {
      foreach ($value as $vlue) {
        $hrval[] = $vlue;
      }
    }
    foreach ($ovrtime as $value) {
      foreach ($value as $val) {
        $overval[] = $val;
      }
    }
    if (max($revval) > 0) {
      for ($i = 0; $i <= 11; $i++) {
        if ($revval[$i] > 0) {
          $y[$i] = ($cogval[$i] / $revval[$i]) * 100;
          $h[$i] = ($hrval[$i] / $revval[$i]) * 100;
          $o[$i] = ($overval[$i] / $revval[$i]) * 100;
        } else {
          $y[$i] = 0;
          $h[$i] = 0;
          $o[$i] = 0;
        }
      }
    } else {
      return view('trends', compact('location', 'loc', 'cog'));
    }
    return view('trends', compact('location', 'loc', 'cog', 'y', 'h', 'o'));
  }
}
