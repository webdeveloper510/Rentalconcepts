<?php

namespace App\Http\Controllers;

use Session;
use DB;
use App\Models\Permission;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use App\Models\expensedata;
use App\Models\expensedata1;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class ProfitlossController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function statementview(Request $request)
  {
    if (Session::has('userloginid')) {
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $date = Carbon::createFromFormat('m-Y', $prevdate); // create a Carbon instance from the date string
      $monthName = $date->format('F'); 
      $defloc = DB::table('default_loc')->select('location')
        ->where('userid', Session::get('userloginid'))->get()->toArray();
      // dd($defloc);
      $location = DB::table('locations')
        ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
        ->where('permissions.allowed', 1)
        ->where("permissions.userid", Session::get('userloginid'))
        ->get()->toArray();
      $prevyear = (explode("-", $prevdate));
      $year = $prevyear[1];
      $locpermitted = Permission::select('locationid')->where('userid', Session::get('userloginid'))->where('allowed', 1)->orderBy('locationid', 'ASC')->limit(1)->get()->toArray();
      if (!$defloc) {
        $loc = $locpermitted[0]['locationid'];
      } else {
        $loc = $defloc[0]->location;
      }
      $data = revenuedata::where('Date', $prevdate)->where('Location', $loc)->get();
      $exp = expensedata::where('Date', $prevdate)->where('Location', $loc)->get();
      $cog = Cogsdata::where('Date', $prevdate)->where('Location', $loc)->get();
      $expense1 = expensedata1::where('Date', $prevdate)->where('Location', $loc)->get();
    
      $cal = array("status" => '1');
      $rev = [];
      $cogs = [];
      $exps = [];
      $expense11 = [];
      $sum =  $sum1 =    $sum2 =    $sum3 =    $sum4 =    $sum5 =    $sum6 =    $sum7 =    $sum8 =    $sum9 =    $sum10 =    $sum11 =
       $cogsum =    $cogsum1 =    $cogsum2 =    $cogsum3 =    $cogsum4 =    $cogsum5 =    $cogsum6 =    $cogsum7 =    $cogsum8 =    $cogsum9 =
      $cogsum10 =    $expsum =    $expsum1 =    $expsum2 =    $expsum3 =    $expsum4 =    $expsum5 =    $expsum6 =    $expsum7 =    $expsum8 =  
      $expsum9 =    $expsum10 =    $expsum11 =    $expsum12 =    $expsum13 =    $expsum14 =    $expsum15 =    $expsum16 =    $expsum17 =   
     $expsum18 =    $expsum19 =    $expsum20 =    $expsum21 =    $expsum22 =    $expsum23 =    $expsum24 =    $expsum25 =    $expsum26 =    $expsum27 =    $expsum28 =    $expsum29 =    $expsum30 =    $expsum31 =    $expsum32 =    $expsum33 =    $expsum34 =    $expsum35 =    $expsum36 =    $expsum37 =    $expsum38 =    $expsum39 =    $expsum40 =    $expsum41 =    $expsum42 =    $expsum43 =    $expsum44 =    $expsum45 =    $expsum46 =    $expsum47 =    $expsum48 =    $expsum49 =    $expsum50 =    $expsum51 =    $expsum52 =    $expsum53 =    $expsum54 =    $expsum55 =    $expsum56 =    $expsum57 =    $expsum58 =    $expsum59 =    $expsum60 =    $expsum61 =    $expsum62 =    $expsum63 =    $expsum64 =    $expsum65 =    $expsum66 =    $expsum67 =    $expsum68 =    $expsum69 =    $expsum70 =    $expsum71 =   $expsum72= $expsum73=$expsum74=0;
      for ($m = 1; $m <= $prevyear[0]; $m++) {
        date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        $pyear = sprintf('%02d', $m) . '-' . $year;
        $revenue1 = revenuedata::where([['Location', '=', $loc], ['Date', '=', $pyear]])->get()->toArray();
        $cogsdata1 = Cogsdata::where([['Location', '=', $loc], ['Date', '=', $pyear]])->get()->toArray();
        $expdata1 = expensedata::where([['Location', '=', $loc], ['Date', '=', $pyear]])->get()->toArray();
        $expensedata1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $pyear]])->get()->toArray();
        array_push($rev, $revenue1);
        array_push($cogs, $cogsdata1);
        array_push($exps, $expdata1);
        array_push($expense11, $expensedata1);
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
      foreach ($exps as $value) {
        foreach ($value as $val) {
          $expsum += $val['PartsInventoryRepair'];
          $expsum1 += $val['LaborInventoryRepair'];
          $expsum2 += $val['RadioAdmin'];
          $expsum3 += $val['PrintMedia'];
          $expsum4 += $val['Sponsorships'];
          $expsum5 += $val['InternetOnline'];
          $expsum6 += $val['SpecialEvents'];
          $expsum7 += $val['CashShortLong'];
          $expsum8 += $val['BankCardFees'];
          $expsum9 += $val['BankServiceCharges'];
          $expsum10 += $val['BankChargesOther'];
          $expsum11 += $val['LegalFees'];
          $expsum12 += $val['AccountingFees'];
          $expsum13 += $val['ProfessionalFeesOther'];
          $expsum14 += $val['PropertyGeneralLiability'];
          $expsum15 += $val['OfficeSupplies'];
          $expsum16 += $val['Postage'];
          $expsum17 += $val['Freight'];
          $expsum18 += $val['GeneralSupplies'];
          $expsum19 += $val['PostageFreightSuppliesOther'];
          $expsum20 += $val['RentExpense'];
          $expsum21 += $val['Utilities'];
          $expsum22 += $val['Security'];
          $expsum23 += $val['PestControl'];
          $expsum24 += $val['RepairMaintenancBuilding'];
          $expsum25 += $val['RepairsMaintenanceEquip'];
          $expsum26 += $val['EquipmentRental'];
          $expsum27 += $val['DepreciationExpenseFFE'];
          $expsum28 += $val['AmortizationExpense'];
          $expsum29 += $val['RepairMaintenanceVehicles'];
          $expsum30 += $val['FuelOilVehicle'];
          $expsum31 += $val['VehicleInsurance'];
          $expsum32 += $val['VehicleLicenses'];
          $expsum72 += $val['PropertyInsurance'];
        }
      }
      foreach ($expense11 as $value) {
        foreach ($value as $val) {
          $expsum33 += $val['CharitableContributions'];
          $expsum34 += $val['CustomerSettlements'];
          $expsum35 += $val['Softwarelicensefees'];
          $expsum36 += $val['ComputerSupplies'];
          $expsum37 += $val['ComputerMaintenanceRepair'];
          $expsum38 += $val['TelephoneCommunications'];
          $expsum39 += $val['Salary'];
          $expsum40 += $val['TotalHourly'];
          $expsum41 += $val['Overtimehourly'];
          $expsum42 += $val['Holiday'];
          $expsum43 += $val['Bonus'];
          $expsum44 += $val['MileageReimbursement'];
          $expsum45 += $val['TravelExpense'];
          $expsum46 += $val['MealsEntertainment'];
          $expsum47 += $val['TravelEntertainmentOther'];
          $expsum48 += $val['DuesDeductible'];
          $expsum49 += $val['DuesSubscriptionsOther'];
          $expsum50 += $val['UnemploymentTaxes'];
          $expsum51 += $val['FICAMatch'];
          $expsum52 += $val['RetirementBenefits'];
          $expsum53 += $val['InsuranceExpenseEmployeeOther'];
          $expsum54 += $val['GroupHealthLifeInsurance'];
          $expsum55 += $val['WorkerCompensation'];
          $expsum56 += $val['EmployeeProcurement'];
          $expsum57 += $val['DrugScreening'];
          $expsum58 += $val['SeminarsEducation'];
          $expsum59 += $val['EmployeeTraining'];
          $expsum60 += $val['Uniforms'];
          $expsum61 += $val['AwardsGifts'];
          $expsum62 += $val['LeasedEmployees'];
          $expsum63 += $val['FranchiseTax'];
          $expsum64 += $val['PersonalProperty'];
          $expsum65 += $val['RealEstate'];
          $expsum66 += $val['SalesUseTax'];
          $expsum67 += $val['WasteTiretax'];
          $expsum68 += $val['BusinessLicensesPermits'];
          $expsum69 += $val['RoyaltyFeesOther'];
          $expsum70 += $val['OperationalOverhead'];
          $expsum71 += $val['PayrollExpensesOther'];
          $expsum73 += $val['otherIncome'];
          $expsum74 += $val['purchasedisc'];
        }
      }
      $alldata = array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9, $sum10, $sum11);
      $cogdata = array($cogsum, $cogsum1, $cogsum2, $cogsum3, $cogsum4, $cogsum5, $cogsum6, $cogsum7, $cogsum8, $cogsum9);
      $expdata = array($expsum, $expsum1, $expsum2, $expsum3, $expsum4, $expsum5, $expsum6, $expsum7, $expsum8, $expsum9, $expsum10, $expsum11, $expsum12, $expsum13, $expsum14, $expsum15, $expsum16, $expsum17, $expsum18, $expsum19, $expsum20, $expsum21, $expsum22, $expsum23, $expsum24, $expsum25, $expsum26, $expsum27, $expsum28, $expsum29, $expsum30, $expsum31, $expsum32, $expsum33, $expsum34, $expsum35, $expsum36, $expsum37, $expsum38, $expsum39, $expsum40, $expsum41, $expsum42, $expsum43, $expsum44, $expsum45, $expsum46, $expsum47, $expsum48, $expsum49, $expsum50, $expsum51, $expsum52, $expsum53, $expsum54, $expsum55, $expsum56, $expsum57, $expsum58, $expsum59, $expsum60, $expsum61, $expsum62, $expsum63, $expsum64, $expsum65, $expsum66, $expsum67, $expsum68, $expsum69, $expsum70, $expsum71);
      return view('profitloss', compact('data', 'location', 'prevdate', 'cal', 'prevyear', 'year', 'cog', 'loc', 'alldata', 'cogdata', 'exp', 'monthName','expdata', 'expense1'));
    } else {
      return redirect('/');
    }
  }
  public function profitloss(Request $request)
  {
    $prevdate = date("m-Y", strtotime("first day of previous month"));
    $date = $request['datee'];
    $datee = Carbon::createFromFormat('m-Y', $date); // create a Carbon instance from the date string
    $monthName = $datee->format('F'); // get the month name from the Carbon instance
    $selctedloc = $request['loc'];
    $location =  DB::table('locations')
      ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
      ->where('permissions.allowed', 1)
      ->where("permissions.userid", Session::get('userloginid'))
      ->get()->toArray();
    $data = revenuedata::where('Date', $date)->where('Location', $selctedloc)->get();
    $cog = Cogsdata::where('Date', $date)->where('Location', $selctedloc)->get();
    $exp = expensedata::where('Date', $date)->where('Location', $selctedloc)->get();
    $expense1 = expensedata1::where('Date', $date)->where('Location', $selctedloc)->get();
    $prevyear = (explode("-", $date));
    $year = $prevyear[1];
    $previousyear = $year - 1;
    $cal = array("status" => '0');
    $rev = [];
    $cogs = [];
    $exps = [];
    $expense11 = [];
    $sum =  $sum1 =  $sum2 =  $sum3 =  $sum4 =  $sum5 =  $sum6 =  $sum7 =  $sum8 =  $sum9 =  $sum10 =  $sum11 =   
    $cogsum =  $cogsum1 =  $cogsum2 =  $cogsum3 =  $cogsum4 =  $cogsum5 =  $cogsum6 =  $cogsum7 =  $cogsum8 =  $cogsum9 =  $cogsum10 =  
     $expsum =  $expsum1 =  $expsum2 =  $expsum3 =  $expsum4 =  $expsum5 =  $expsum6 =  $expsum7 =  $expsum8 =  $expsum9 =  $expsum10 = 
      $expsum11 =  $expsum12 =  $expsum13 =  $expsum14 =  $expsum15 =  $expsum16 =  $expsum17 =  $expsum18 =  $expsum19 =  $expsum20 =
      $expsum21 =  $expsum22 =  $expsum23 =  $expsum24 =  $expsum25 =  $expsum26 =  $expsum27 =  $expsum28 =  $expsum29 =  $expsum30 = 
     $expsum31 =  $expsum32 =  $expsum33 =  $expsum34 =  $expsum35 =  $expsum36 =  $expsum37 =  $expsum38 =  $expsum39 =  $expsum40 = 
    $expsum41 =  $expsum42 =  $expsum43 =  $expsum44 =  $expsum45 =  $expsum46 =  $expsum47 =  $expsum48 =  $expsum49 =  $expsum50 = 
     $expsum51 =  $expsum52 =  $expsum53 =  $expsum54 =  $expsum55 =  $expsum56 =  $expsum57 =  $expsum58 =  $expsum59 =  $expsum60 =
     $expsum61 =  $expsum62 =  $expsum63 =  $expsum64 =  $expsum65 =  $expsum66 =  $expsum67 =  $expsum68 =  $expsum69 =  $expsum70 
     =  $expsum71 = $expsum72=$expsum73=$expsum74=0;
    for ($m = 1; $m <= $prevyear[0]; $m++) {
      date('F', mktime(0, 0, 0, $m, 1, date('Y')));
      $pyear = sprintf('%02d', $m) . '-' . $year;

      $revenue1 = revenuedata::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
      $cogsdata1 = Cogsdata::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
      $expdata1 = expensedata::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
      $expensedata1 = expensedata1::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
      array_push($rev, $revenue1);
      array_push($cogs, $cogsdata1);
      array_push($exps, $expdata1);
      array_push($expense11, $expensedata1);
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
    foreach ($exps as $value) {
      foreach ($value as $val) {
        $expsum += $val['PartsInventoryRepair'];
        $expsum1 += $val['LaborInventoryRepair'];
        $expsum2 += $val['RadioAdmin'];
        $expsum3 += $val['PrintMedia'];
        $expsum4 += $val['Sponsorships'];
        $expsum5 += $val['InternetOnline'];
        $expsum6 += $val['SpecialEvents'];
        $expsum7 += $val['CashShortLong'];
        $expsum8 += $val['BankCardFees'];
        $expsum9 += $val['BankServiceCharges'];
        $expsum10 += $val['BankChargesOther'];
        $expsum11 += $val['LegalFees'];
        $expsum12 += $val['AccountingFees'];
        $expsum13 += $val['ProfessionalFeesOther'];
        $expsum14 += $val['PropertyGeneralLiability'];
        $expsum15 += $val['OfficeSupplies'];
        $expsum16 += $val['Postage'];
        $expsum17 += $val['Freight'];
        $expsum18 += $val['GeneralSupplies'];
        $expsum19 += $val['PostageFreightSuppliesOther'];
        $expsum20 += $val['RentExpense'];
        $expsum21 += $val['Utilities'];
        $expsum22 += $val['Security'];
        $expsum23 += $val['PestControl'];
        $expsum24 += $val['RepairMaintenancBuilding'];
        $expsum25 += $val['RepairsMaintenanceEquip'];
        $expsum26 += $val['EquipmentRental'];
        $expsum27 += $val['DepreciationExpenseFFE'];
        $expsum28 += $val['AmortizationExpense'];
        $expsum29 += $val['RepairMaintenanceVehicles'];
        $expsum30 += $val['FuelOilVehicle'];
        $expsum31 += $val['VehicleInsurance'];
        $expsum32 += $val['VehicleLicenses'];
        $expsum72 += $val['PropertyInsurance'];
      }
    }
    foreach ($expense11 as $value) {
      foreach ($value as $val) {
        $expsum33 += $val['CharitableContributions'];
        $expsum34 += $val['CustomerSettlements'];
        $expsum35 += $val['Softwarelicensefees'];
        $expsum36 += $val['ComputerSupplies'];
        $expsum37 += $val['ComputerMaintenanceRepair'];
        $expsum38 += $val['TelephoneCommunications'];
        $expsum39 += $val['Salary'];
        $expsum40 += $val['TotalHourly'];
        $expsum41 += $val['Overtimehourly'];
        $expsum42 += $val['Holiday'];
        $expsum43 += $val['Bonus'];
        $expsum44 += $val['MileageReimbursement'];
        $expsum45 += $val['TravelExpense'];
        $expsum46 += $val['MealsEntertainment'];
        $expsum47 += $val['TravelEntertainmentOther'];
        $expsum48 += $val['DuesDeductible'];
        $expsum49 += $val['DuesSubscriptionsOther'];
        $expsum50 += $val['UnemploymentTaxes'];
        $expsum51 += $val['FICAMatch'];
        $expsum52 += $val['RetirementBenefits'];
        $expsum53 += $val['InsuranceExpenseEmployeeOther'];
        $expsum54 += $val['GroupHealthLifeInsurance'];
        $expsum55 += $val['WorkerCompensation'];
        $expsum56 += $val['EmployeeProcurement'];
        $expsum57 += $val['DrugScreening'];
        $expsum58 += $val['SeminarsEducation'];
        $expsum59 += $val['EmployeeTraining'];
        $expsum60 += $val['Uniforms'];
        $expsum61 += $val['AwardsGifts'];
        $expsum62 += $val['LeasedEmployees'];
        $expsum63 += $val['FranchiseTax'];
        $expsum64 += $val['PersonalProperty'];
        $expsum65 += $val['RealEstate'];
        $expsum66 += $val['SalesUseTax'];
        $expsum67 += $val['WasteTiretax'];
        $expsum68 += $val['BusinessLicensesPermits'];
        $expsum69 += $val['RoyaltyFeesOther'];
        $expsum70 += $val['OperationalOverhead'];
        $expsum71 += $val['PayrollExpensesOther'];
        $expsum73 += $val['otherIncome'];
        $expsum74 += $val['purchasedisc'];
      }
    }
    $alldata = array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9, $sum10, $sum11);
    $cogdata = array($cogsum, $cogsum1, $cogsum2, $cogsum3, $cogsum4, $cogsum5, $cogsum6, $cogsum7, $cogsum8, $cogsum9);
    $expdata = array($expsum, $expsum1, $expsum2, $expsum3, $expsum4, $expsum5, $expsum6, $expsum7, $expsum8, $expsum9, $expsum10, $expsum11, $expsum12, $expsum13, $expsum14, $expsum15, $expsum16, $expsum17, $expsum18, $expsum19, $expsum20, $expsum21, $expsum22, $expsum23, $expsum24, $expsum25, $expsum26, $expsum27, $expsum28, $expsum29, $expsum30, $expsum31, $expsum32, $expsum33, $expsum34, $expsum35, $expsum36, $expsum37, $expsum38, $expsum39, $expsum40, $expsum41, $expsum42, $expsum43, $expsum44, $expsum45, $expsum46, $expsum47, $expsum48, $expsum49, $expsum50, $expsum51, $expsum52, $expsum53, $expsum54, $expsum55, $expsum56, $expsum57, $expsum58, $expsum59, $expsum60, $expsum61, $expsum62, $expsum63, $expsum64, $expsum65, $expsum66, $expsum67, $expsum68, $expsum69, $expsum70, $expsum71, $expsum72,$expsum73,$expsum74);
    return view('profitloss', compact('data', 'location', 'date', 'selctedloc', 'alldata', 'prevdate', 'cal', 'year', 'prevyear', 'cog', 'monthName','cogdata', 'exp', 'expdata', 'expense1'));
  }
}
