<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Location;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use DB;
use Session;
use App\Models\expensedata;
use App\Models\expensedata1;
use Illuminate\Http\Request;

class ytdateController extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function index(){
      $date_time = new \DateTime('last month');
      $last_month = $date_time->format('F');

   $prevdate = date("m-Y", strtotime("first day of previous month"));
   $prevyear = (explode("-", $prevdate));

   $year = $prevyear[1];
   $previousyear = $year - 1;
   $previous = '01' . "-" . $year;
   $currprevious=$prevyear[0] .'-'.$previousyear;
   $curryearval = $prevyear[0] - 1;

   $sum = 0; $sum1 = 0;$sum2 = 0; $sum3 = 0;$sum4 = 0; $sum5 = 0;$sum6 = 0; $sum7 = 0; $sum8 = 0; $sum9 = 0; $sum10 = 0; $sum11 = 0; $sum12 = 0; $sum13 = 0;$sum14 = 0; $sum15 = 0;
   $summ = 0;$summ1 = 0; $summ2 = 0; $summ3 = 0; $summ4 = 0; $summ5 = 0; $summ6 = 0; $summ7 = 0; $summ8 = 0; $summ9 = 0; $summ10 = 0; $summ11 = 0;$summ12 = 0;$summ13 = 0;$summ14 = 0; $summ15 = 0;
   $rsum=0;  $rsum1 = 0; $rsum2 = 0; $rsum3 = 0; $rsum4 = 0; $rsum5 = 0; $rsum6 = 0; $rsum7 = 0; $rsum8 = 0; $rsum9 = 0; $rsum10 = 0; $rsum11 = 0; $rsum12 = 0;$rsum13 = 0; $rsum14 = 0; $rsum15 = 0;
   $ryearsum=0; $ryearsum1 = 0; $ryearsum2 = 0; $ryearsum3 = 0; $ryearsum4 = 0; $ryearsum5 = 0; $ryearsum6 = 0; $ryearsum7 = 0; $ryearsum8 = 0; $ryearsum9 = 0; $ryearsum10 = 0; $ryearsum11 = 0; $ryearsum12 = 0;$ryearsum13 = 0; $ryearsum14 = 0; $ryearsum15 = 0;

   $cogsum = 0; $cogsum1 = 0; $cogsum2 = 0; $cogsum3 = 0; $cogsum4 = 0; $cogsum5 = 0; $cogsum6 = 0; $cogsum7 = 0; $cogsum8 = 0; $cogsum9 = 0; $cogsum10 = 0;
   $cogsumm = 0; $cogsumm1 = 0; $cogsumm2 = 0; $cogsumm3 = 0;$cogsumm4 = 0; $cogsumm5 = 0; $cogsumm6 = 0; $cogsumm7 = 0; $cogsumm8 = 0; $cogsumm9 = 0; $cogsumm10 = 0;
   $cogsm = 0; $cogsm1 = 0; $cogsm2 = 0; $cogsm3 = 0; $cogsm4 = 0; $cogsm5 = 0; $cogsm6 = 0; $cogsm7 = 0; $cogsm8 = 0; $cogsm9 = 0; $cogsm10 = 0;
   $cogm = 0;$cogm1 = 0; $cogm2 = 0; $cogm3 = 0; $cogm4 = 0; $cogm5 = 0; $cogm6 = 0; $cogm7 = 0; $cogm8 = 0; $cogm9 = 0; $cogm10 = 0;
   
   $expsum = 0; $expsum1 = 0; $expsum2 = 0; $expsum3 = 0; $expsum4 = 0; $expsum5 = 0; $expsum6 = 0; $expsum7 = 0; $expsum8 = 0; $expsum9 = 0; $expsum10 = 0;$expsum11 = 0; $expsum12 = 0; $expsum13 = 0; $expsum14 = 0; $expsum15 = 0; $expsum16 = 0; $expsum17 = 0; $expsum18 = 0; $expsum19 = 0; $expsum20 = 0; $expsum21 = 0; $expsum22 = 0; $expsum23 = 0; $expsum24 = 0; $expsum25 = 0; $expsum26 = 0; $expsum27 = 0; $expsum28 = 0; $expsum29 = 0;$expsum30 = 0;$expsum31 = 0; $expsum32 =0;
   $expsumm = 0; $expsumm1 = 0; $expsumm2 = 0; $expsumm3 = 0; $expsumm4 = 0; $expsumm5 = 0; $expsumm6 = 0; $expsumm7 = 0; $expsumm8 = 0; $expsumm9 = 0; $expsumm10 = 0;$expsumm11 = 0; $expsumm12 = 0; $expsumm13 = 0; $expsumm14 = 0; $expsumm15 = 0; $expsumm16 = 0; $expsumm17 = 0; $expsumm18 = 0; $expsumm19 = 0; $expsumm20 = 0; $expsumm21 = 0; $expsumm22 = 0; $expsumm23 = 0; $expsumm24 = 0; $expsumm25 = 0; $expsumm26 = 0; $expsumm27 = 0; $expsumm28 = 0; $expsumm29 = 0;$expsumm30 = 0;$expsumm31 = 0; $expsumm32 =0;
   $esumm = 0; $esumm1 = 0; $esumm2 = 0; $esumm3 = 0; $esumm4 = 0; $esumm5 = 0; $esumm6 = 0; $esumm7 = 0; $esumm8 = 0; $esumm9 = 0; $esumm10 = 0;$esumm11 = 0; $esumm12 = 0; $esumm13 = 0; $esumm14 = 0; $esumm15 = 0; $esumm16 = 0; $esumm17 = 0; $esumm18 = 0; $esumm19 = 0; $esumm20 = 0; $esumm21 = 0; $esumm22 = 0; $esumm23 = 0; $esumm24 = 0; $esumm25 = 0; $esumm26 = 0; $esumm27 = 0; $esumm28 = 0; $esumm29 = 0;$esumm30 = 0;$esumm31 = 0; $esumm32 =0;
   $exsumm = 0; $exsumm1 = 0; $exsumm2 = 0; $exsumm3 = 0; $exsumm4 = 0; $exsumm5 = 0; $exsumm6 = 0; $exsumm7 = 0; $exsumm8 = 0; $exsumm9 = 0; $exsumm10 = 0;$exsumm11 = 0; $exsumm12 = 0; $exsumm13 = 0; $exsumm14 = 0; $exsumm15 = 0; $exsumm16 = 0; $exsumm17 = 0; $exsumm18 = 0; $exsumm19 = 0; $exsumm20 = 0; $exsumm21 = 0; $exsumm22 = 0; $exsumm23 = 0; $exsumm24 = 0; $exsumm25 = 0; $exsumm26 = 0; $exsumm27 = 0; $exsumm28 = 0; $exsumm29 = 0;$exsumm30 = 0;$exsumm31 = 0; $exsumm32 =0;
   
   $expsum33= 0; $expsum34= 0; $expsum35= 0; $expsum36= 0; $expsum37= 0; $expsum38= 0; $expsum39= 0; $expsum40= 0; $expsum41= 0; $expsum42= 0; $expsum43= 0; $expsum44= 0; $expsum45= 0; $expsum46= 0; $expsum47= 0; $expsum48= 0; $expsum49= 0; $expsum50= 0; $expsum51= 0; $expsum52= 0; $expsum53= 0; $expsum54= 0; $expsum55= 0; $expsum56= 0; $expsum57= 0;$expsum58= 0;$expsum59= 0;$expsum60= 0;$expsum61= 0;$expsum62= 0;$expsum63= 0; $expsum64= 0;$expsum65= 0;$expsum66= 0;$expsum67= 0;$expsum68= 0;$expsum69= 0;$expsum70= 0;$expsum71= 0;
   $expsumm33= 0; $expsumm34= 0; $expsumm35= 0; $expsumm36= 0; $expsumm37= 0; $expsumm38= 0; $expsumm39= 0; $expsumm40= 0; $expsumm41= 0; $expsumm42= 0; $expsumm43= 0; $expsumm44= 0; $expsumm45= 0; $expsumm46= 0; $expsumm47= 0; $expsumm48= 0; $expsumm49= 0; $expsumm50= 0; $expsumm51= 0; $expsumm52= 0; $expsumm53= 0; $expsumm54= 0; $expsumm55= 0; $expsumm56= 0; $expsumm57= 0;$expsumm58= 0;$expsumm59= 0;$expsumm60= 0;$expsumm61= 0;$expsumm62= 0;$expsumm63= 0; $expsumm64= 0;$expsumm65= 0;$expsumm66= 0;$expsumm67= 0;$expsumm68= 0;$expsumm69= 0;$expsumm70= 0;$expsumm71= 0;
   $exsm33= 0; $exsm34= 0; $exsm35= 0; $exsm36= 0; $exsm37= 0; $exsm38= 0; $exsm39= 0; $exsm40= 0; $exsm41= 0; $exsm42= 0; $exsm43= 0; $exsm44= 0; $exsm45= 0; $exsm46= 0; $exsm47= 0; $exsm48= 0; $exsm49= 0; $exsm50= 0; $exsm51= 0; $exsm52= 0; $exsm53= 0; $exsm54= 0; $exsm55= 0; $exsm56= 0; $exsm57= 0;$exsm58= 0;$exsm59= 0;$exsm60= 0;$exsm61= 0;$exsm62= 0;$exsm63= 0; $exsm64= 0;$exsm65= 0;$exsm66= 0;$exsm67= 0;$exsm68= 0;$exsm69= 0;$exsm70= 0;$exsm71= 0;
   $exsum33= 0; $exsum34= 0; $exsum35= 0; $exsum36= 0; $exsum37= 0; $exsum38= 0; $exsum39= 0; $exsum40= 0; $exsum41= 0; $exsum42= 0; $exsum43= 0; $exsum44= 0; $exsum45= 0; $exsum46= 0; $exsum47= 0; $exsum48= 0; $exsum49= 0; $exsum50= 0; $exsum51= 0; $exsum52= 0; $exsum53= 0; $exsum54= 0; $exsum55= 0; $exsum56= 0; $exsum57= 0;$exsum58= 0;$exsum59= 0;$exsum60= 0;$exsum61= 0;$exsum62= 0;$exsum63= 0; $exsum64= 0;$exsum65= 0;$exsum66= 0;$exsum67= 0;$exsum68= 0;$exsum69= 0;$exsum70= 0;$exsum71= 0;

   $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
   for ($i = 0; $i < count($location); $i++) {
   $revenue1[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $prevdate)->get()->toArray();
   $revenue[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $currprevious) ->get()->toArray();
   

   $cogs1[] =  Cogsdata::where('Location', '=', $location[$i]->locationid)->where('Date', $prevdate)->get()->toArray();
   $cogs[] =   Cogsdata::where('Location', '=', $location[$i]->locationid) ->where('Date', $currprevious)->get()->toArray();

   $expdata1[] = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->get()->toArray();
   $expdata[] = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $currprevious]])->get()->toArray();
   $expens1[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->get()->toArray();
   $expens1data[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $currprevious]])->get()->toArray();
    
   for ($m = 1; $m <= $prevyear[0]; $m++) {
      date('F', mktime(0, 0, 0, $m, 1, date('Y')));
      $pyear = sprintf('%02d', $m) . '-' . $year;
      $reve[] = revenuedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
      $cogd[] = Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
      $exp[]= expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
      $expp[]= expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();

      $pyeardata = sprintf('%02d', $m) . '-' . $previousyear;
      $ryeardata[] = revenuedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
      $cyeardata[] = Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
      $eyeardata[]= expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
      $exppyeardata[]= expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
    
    }
    } 
   //  --------------------------Revenue (Current Month/Year)-------------------------------------
    foreach ($revenue1 as $value) {
      foreach ($value as $val) {
        $sum += $val['RentalIncome'];
        $sum1 += $val['CashSales'];
        $sum12 += $val['CashSalesNoninventory'];
        $sum2 += $val['EarlyPurchaseOption'];
        $sum3 += $val['RollPro'];
        $sum4 += $val['CollectionFeeInHouse'];
        $sum5 += $val['ReinstatementFees'];
        $sum6 += $val['OtherFeesAlignments'];
        $sum7 += $val['OneTimeFees'];
        $sum8 += $val['NSFCheckFees'];
        $sum9 += $val['OtherMiscellaneousIncome'];
        $sum13 += $val['SalesTaxCollected'];
        $sum10 += $val['RollSafe'];
        $sum11 += $val['Chargebacks'];
        $sum14 += $val['ManagementFee'];
        $sum15 += $val['SubfranchiseeRoyaltyIncome'];
      }
    }
    $alldata = array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9, $sum10, $sum11, $sum12, $sum13,$sum14,$sum15);
     //  --------------------------Revenue (PREVIOUS Year)-------------------------------------
     foreach ($revenue as $value) {
      foreach ($value as $val) {
        $summ += $val['RentalIncome'];
        $summ1 += $val['CashSales'];
        $summ12 += $val['CashSalesNoninventory'];
        $summ2 += $val['EarlyPurchaseOption'];
        $summ3 += $val['RollPro'];
        $summ4 += $val['CollectionFeeInHouse'];
        $summ5 += $val['ReinstatementFees'];
        $summ6 += $val['OtherFeesAlignments'];
        $summ7 += $val['OneTimeFees'];
        $summ8 += $val['NSFCheckFees'];
        $summ9 += $val['OtherMiscellaneousIncome'];
        $summ13 += $val['SalesTaxCollected'];
        $summ10 += $val['RollSafe'];
        $summ11 += $val['Chargebacks'];
        $summ14 += $val['ManagementFee'];
        $summ15 += $val['SubfranchiseeRoyaltyIncome'];
      }
    }
    //  --------------------------Revenue (last all prev data of current Year)-------------------------------------
    foreach ($reve as $value) {
      foreach ($value as $val) {
        $rsum += $val['RentalIncome'];
        $rsum1 += $val['CashSales'];
        $rsum2 += $val['EarlyPurchaseOption'];
        $rsum3 += $val['RollPro'];
        $rsum4 += $val['CollectionFeeInHouse'];
        $rsum5 += $val['ReinstatementFees'];
        $rsum6 += $val['OtherFeesAlignments'];
        $rsum7 += $val['OneTimeFees'];
        $rsum8 += $val['NSFCheckFees'];
        $rsum9 += $val['OtherMiscellaneousIncome'];
        $rsum10 += $val['RollSafe'];
        $rsum11 += $val['Chargebacks'];
      }
    }
     //  --------------------------Revenue (last all prev data of previous Year)-------------------------------------
     foreach ($ryeardata as $value) {
      foreach ($value as $val) {
        $ryearsum += $val['RentalIncome'];
        $ryearsum1 += $val['CashSales'];
        $ryearsum2 += $val['EarlyPurchaseOption'];
        $ryearsum3 += $val['RollPro'];
        $ryearsum4 += $val['CollectionFeeInHouse'];
        $ryearsum5 += $val['ReinstatementFees'];
        $ryearsum6 += $val['OtherFeesAlignments'];
        $ryearsum7 += $val['OneTimeFees'];
        $ryearsum8 += $val['NSFCheckFees'];
        $ryearsum9 += $val['OtherMiscellaneousIncome'];
        $ryearsum10 += $val['RollSafe'];
        $ryearsum11 += $val['Chargebacks'];
      }
    }

    foreach ($cogs1 as $value) {
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
    foreach ($cogs as $value) {
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
    foreach ($cogd as $value) {
      foreach ($value as $val) {
         $cogsm += $val['depreciation_inventory'];
        $cogsm1 += $val['paidout_epocharge'];
        $cogsm2 += $val['cashsalechargeoffs'];
        $cogsm3 += $val['skipstolenchargeoffs'];
        $cogsm4 += $val['insurancechargeoffs'];
        $cogsm5 += $val['returneddamagednonrepairable'];
        $cogsm6 += $val['otherchargeoff'];
        $cogsm7 += $val['pastdueaccountchargeoff'];
        $cogsm8 += $val['inventorycostadjustment'];
        $cogsm9 += $val['clubremittance'];
      }
    }
    foreach ($cyeardata as $value) {
      foreach ($value as $val) {
        $cogm += $val['depreciation_inventory'];
        $cogm1 += $val['paidout_epocharge'];
        $cogm2 += $val['cashsalechargeoffs'];
        $cogm3 += $val['skipstolenchargeoffs'];
        $cogm4 += $val['insurancechargeoffs'];
        $cogm5 += $val['returneddamagednonrepairable'];
        $cogm6 += $val['otherchargeoff'];
        $cogm7 += $val['pastdueaccountchargeoff'];
        $cogm8 += $val['inventorycostadjustment'];
        $cogm9 += $val['clubremittance'];
      }
    }
    foreach ($expdata1 as $value) {
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

      }
    }
    foreach ($expdata as $value) {
      foreach ($value as $val) {
        $expsumm += $val['PartsInventoryRepair'];
        $expsumm1 += $val['LaborInventoryRepair'];
        $expsumm2 += $val['RadioAdmin'];
        $expsumm3 += $val['PrintMedia'];
        $expsumm4 += $val['Sponsorships'];
        $expsumm5 += $val['InternetOnline'];
        $expsumm6 += $val['SpecialEvents'];
        $expsumm7 += $val['CashShortLong'];
        $expsumm8 += $val['BankCardFees'];
        $expsumm9 += $val['BankServiceCharges'];
        $expsumm10 += $val['BankChargesOther'];
        $expsumm11 += $val['LegalFees'];
        $expsumm12 += $val['AccountingFees'];
        $expsumm13 += $val['ProfessionalFeesOther'];
        $expsumm14 += $val['PropertyGeneralLiability'];
        $expsumm15 += $val['OfficeSupplies'];
        $expsumm16 += $val['Postage'];
        $expsumm17 += $val['Freight'];
        $expsumm18 += $val['GeneralSupplies'];
        $expsumm19 += $val['PostageFreightSuppliesOther'];
        $expsumm20 += $val['RentExpense'];
        $expsumm21 += $val['Utilities'];
        $expsumm22 += $val['Security'];
        $expsumm23 += $val['PestControl'];
        $expsumm24 += $val['RepairMaintenancBuilding'];
        $expsumm25 += $val['RepairsMaintenanceEquip'];
        $expsumm26 += $val['EquipmentRental'];
        $expsumm27 += $val['DepreciationExpenseFFE'];
        $expsumm28 += $val['AmortizationExpense'];
        $expsumm29 += $val['RepairMaintenanceVehicles'];
        $expsumm30 += $val['FuelOilVehicle'];
        $expsumm31 += $val['VehicleInsurance'];
        $expsumm32 += $val['VehicleLicenses'];

      }
    }
    foreach ($exp as $value) {
      foreach ($value as $val) {
        $esumm += $val['PartsInventoryRepair'];
        $esumm1 += $val['LaborInventoryRepair'];
        $esumm2 += $val['RadioAdmin'];
        $esumm3 += $val['PrintMedia'];
        $esumm4 += $val['Sponsorships'];
        $esumm5 += $val['InternetOnline'];
        $esumm6 += $val['SpecialEvents'];
        $esumm7 += $val['CashShortLong'];
        $esumm8 += $val['BankCardFees'];
        $esumm9 += $val['BankServiceCharges'];
        $esumm10 += $val['BankChargesOther'];
        $esumm11 += $val['LegalFees'];
        $esumm12 += $val['AccountingFees'];
        $esumm13 += $val['ProfessionalFeesOther'];
        $esumm14 += $val['PropertyGeneralLiability'];
        $esumm15 += $val['OfficeSupplies'];
        $esumm16 += $val['Postage'];
        $esumm17 += $val['Freight'];
        $esumm18 += $val['GeneralSupplies'];
        $esumm19 += $val['PostageFreightSuppliesOther'];
        $esumm20 += $val['RentExpense'];
        $esumm21 += $val['Utilities'];
        $esumm22 += $val['Security'];
        $esumm23 += $val['PestControl'];
        $esumm24 += $val['RepairMaintenancBuilding'];
        $esumm25 += $val['RepairsMaintenanceEquip'];
        $esumm26 += $val['EquipmentRental'];
        $esumm27 += $val['DepreciationExpenseFFE'];
        $esumm28 += $val['AmortizationExpense'];
        $esumm29 += $val['RepairMaintenanceVehicles'];
        $esumm30 += $val['FuelOilVehicle'];
        $esumm31 += $val['VehicleInsurance'];
        $esumm32 += $val['VehicleLicenses'];
      }
    }
    foreach ($eyeardata as $value) {
      foreach ($value as $val) {
        $exsumm += $val['PartsInventoryRepair'];
        $exsumm1 += $val['LaborInventoryRepair'];
        $exsumm2 += $val['RadioAdmin'];
        $exsumm3 += $val['PrintMedia'];
        $exsumm4 += $val['Sponsorships'];
        $exsumm5 += $val['InternetOnline'];
        $exsumm6 += $val['SpecialEvents'];
        $exsumm7 += $val['CashShortLong'];
        $exsumm8 += $val['BankCardFees'];
        $exsumm9 += $val['BankServiceCharges'];
        $exsumm10 += $val['BankChargesOther'];
        $exsumm11 += $val['LegalFees'];
        $exsumm12 += $val['AccountingFees'];
        $exsumm13 += $val['ProfessionalFeesOther'];
        $exsumm14 += $val['PropertyGeneralLiability'];
        $exsumm15 += $val['OfficeSupplies'];
        $exsumm16 += $val['Postage'];
        $exsumm17 += $val['Freight'];
        $exsumm18 += $val['GeneralSupplies'];
        $exsumm19 += $val['PostageFreightSuppliesOther'];
        $exsumm20 += $val['RentExpense'];
        $exsumm21 += $val['Utilities'];
        $exsumm22 += $val['Security'];
        $exsumm23 += $val['PestControl'];
        $exsumm24 += $val['RepairMaintenancBuilding'];
        $exsumm25 += $val['RepairsMaintenanceEquip'];
        $exsumm26 += $val['EquipmentRental'];
        $exsumm27 += $val['DepreciationExpenseFFE'];
        $exsumm28 += $val['AmortizationExpense'];
        $exsumm29 += $val['RepairMaintenanceVehicles'];
        $exsumm30 += $val['FuelOilVehicle'];
        $exsumm31 += $val['VehicleInsurance'];
        $exsumm32 += $val['VehicleLicenses'];
      }
    } 
    foreach ($expens1 as $value) {
      foreach ($value as $val) {
        $expsum33 += $val['CharitableContributions'];
        $expsum34 += $val['CustomerSettlements'];
        $expsum35 += $val['Softwarelicensefees'];
        $expsum36 += $val['ComputerSupplies'];
        $expsum37+= $val['ComputerMaintenanceRepair'];
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
      }
    }
    foreach ($expens1data as $value) {
      foreach ($value as $val) {
        $expsumm33 += $val['CharitableContributions'];
        $expsumm34 += $val['CustomerSettlements'];
        $expsumm35 += $val['Softwarelicensefees'];
        $expsumm36 += $val['ComputerSupplies'];
        $expsumm37+= $val['ComputerMaintenanceRepair'];
        $expsumm38 += $val['TelephoneCommunications'];
        $expsumm39 += $val['Salary'];
        $expsumm40 += $val['TotalHourly'];
        $expsumm41 += $val['Overtimehourly'];
        $expsumm42 += $val['Holiday'];
        $expsumm43 += $val['Bonus'];
        $expsumm44 += $val['MileageReimbursement'];
        $expsumm45 += $val['TravelExpense'];
        $expsumm46 += $val['MealsEntertainment'];
        $expsumm47 += $val['TravelEntertainmentOther'];
        $expsumm48 += $val['DuesDeductible'];
        $expsumm49 += $val['DuesSubscriptionsOther'];
        $expsumm50 += $val['UnemploymentTaxes'];
        $expsumm51 += $val['FICAMatch'];
        $expsumm52 += $val['RetirementBenefits'];
        $expsumm53 += $val['InsuranceExpenseEmployeeOther'];
        $expsumm54 += $val['GroupHealthLifeInsurance'];
        $expsumm55 += $val['WorkerCompensation'];
        $expsumm56 += $val['EmployeeProcurement'];
        $expsumm57 += $val['DrugScreening'];
        $expsumm58 += $val['SeminarsEducation'];
        $expsumm59 += $val['EmployeeTraining'];
        $expsumm60 += $val['Uniforms'];
        $expsumm61 += $val['AwardsGifts'];
        $expsumm62 += $val['LeasedEmployees'];
        $expsumm63 += $val['FranchiseTax'];
        $expsumm64 += $val['PersonalProperty'];
        $expsumm65 += $val['RealEstate'];
        $expsumm66 += $val['SalesUseTax'];
        $expsumm67 += $val['WasteTiretax'];
        $expsumm68 += $val['BusinessLicensesPermits'];
        $expsumm69 += $val['RoyaltyFeesOther'];
        $expsumm70 += $val['OperationalOverhead'];
        $expsumm71 += $val['PayrollExpensesOther'];
      }
    }
    foreach ($expp as $value) {
      foreach ($value as $val) {
        $exsm33 += $val['CharitableContributions'];
        $exsm34 += $val['CustomerSettlements'];
        $exsm35 += $val['Softwarelicensefees'];
        $exsm36 += $val['ComputerSupplies'];
        $exsm37+= $val['ComputerMaintenanceRepair'];
        $exsm38 += $val['TelephoneCommunications'];
        $exsm39 += $val['Salary'];
        $exsm40 += $val['TotalHourly'];
        $exsm41 += $val['Overtimehourly'];
        $exsm42 += $val['Holiday'];
        $exsm43 += $val['Bonus'];
        $exsm44 += $val['MileageReimbursement'];
        $exsm45 += $val['TravelExpense'];
        $exsm46 += $val['MealsEntertainment'];
        $exsm47 += $val['TravelEntertainmentOther'];
        $exsm48 += $val['DuesDeductible'];
        $exsm49 += $val['DuesSubscriptionsOther'];
        $exsm50 += $val['UnemploymentTaxes'];
        $exsm51 += $val['FICAMatch'];
        $exsm52 += $val['RetirementBenefits'];
        $exsm53 += $val['InsuranceExpenseEmployeeOther'];
        $exsm54 += $val['GroupHealthLifeInsurance'];
        $exsm55 += $val['WorkerCompensation'];
        $exsm56 += $val['EmployeeProcurement'];
        $exsm57 += $val['DrugScreening'];
        $exsm58 += $val['SeminarsEducation'];
        $exsm59 += $val['EmployeeTraining'];
        $exsm60 += $val['Uniforms'];
        $exsm61 += $val['AwardsGifts'];
        $exsm62 += $val['LeasedEmployees'];
        $exsm63 += $val['FranchiseTax'];
        $exsm64 += $val['PersonalProperty'];
        $exsm65 += $val['RealEstate'];
        $exsm66 += $val['SalesUseTax'];
        $exsm67 += $val['WasteTiretax'];
        $exsm68 += $val['BusinessLicensesPermits'];
        $exsm69 += $val['RoyaltyFeesOther'];
        $exsm70 += $val['OperationalOverhead'];
        $exsm71 += $val['PayrollExpensesOther'];
      }
    }
    foreach ($exppyeardata as $value) {
      foreach ($value as $val) {
        $exsum33 += $val['CharitableContributions'];
        $exsum34 += $val['CustomerSettlements'];
        $exsum35 += $val['Softwarelicensefees'];
        $exsum36 += $val['ComputerSupplies'];
        $exsum37+= $val['ComputerMaintenanceRepair'];
        $exsum38 += $val['TelephoneCommunications'];
        $exsum39 += $val['Salary'];
        $exsum40 += $val['TotalHourly'];
        $exsum41 += $val['Overtimehourly'];
        $exsum42 += $val['Holiday'];
        $exsum43 += $val['Bonus'];
        $exsum44 += $val['MileageReimbursement'];
        $exsum45 += $val['TravelExpense'];
        $exsum46 += $val['MealsEntertainment'];
        $exsum47 += $val['TravelEntertainmentOther'];
        $exsum48 += $val['DuesDeductible'];
        $exsum49 += $val['DuesSubscriptionsOther'];
        $exsum50 += $val['UnemploymentTaxes'];
        $exsum51 += $val['FICAMatch'];
        $exsum52 += $val['RetirementBenefits'];
        $exsum53 += $val['InsuranceExpenseEmployeeOther'];
        $exsum54 += $val['GroupHealthLifeInsurance'];
        $exsum55 += $val['WorkerCompensation'];
        $exsum56 += $val['EmployeeProcurement'];
        $exsum57 += $val['DrugScreening'];
        $exsum58 += $val['SeminarsEducation'];
        $exsum59 += $val['EmployeeTraining'];
        $exsum60 += $val['Uniforms'];
        $exsum61 += $val['AwardsGifts'];
        $exsum62 += $val['LeasedEmployees'];
        $exsum63 += $val['FranchiseTax'];
        $exsum64 += $val['PersonalProperty'];
        $exsum65 += $val['RealEstate'];
        $exsum66 += $val['SalesUseTax'];
        $exsum67 += $val['WasteTiretax'];
        $exsum68 += $val['BusinessLicensesPermits'];
        $exsum69 += $val['RoyaltyFeesOther'];
        $exsum70 += $val['OperationalOverhead'];
        $exsum71 += $val['PayrollExpensesOther'];
      }
    }
    $alldata = array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9, $sum10, $sum11, $sum12, $sum13,$sum14,$sum15);
    $revprevdata = array($summ, $summ1, $summ2, $summ3, $summ4, $summ5, $summ6, $summ7, $summ8, $summ9, $summ10, $summ11, $summ12, $summ13,$summ14,$summ15);
    $revprevyeardata = array($rsum, $rsum1, $rsum2, $rsum3, $rsum4, $rsum5, $rsum6, $rsum7, $rsum8, $rsum9, $rsum10, $rsum11, $rsum12, $rsum13,$rsum14,$rsum15);
    $revyeardata = array($ryearsum, $ryearsum1, $ryearsum2, $ryearsum3, $ryearsum4, $ryearsum5, $ryearsum6, $ryearsum7, $ryearsum8, $ryearsum9, $ryearsum10, $ryearsum11, $ryearsum12, $ryearsum13,$ryearsum14,$ryearsum15);
    
    $cogdata = array($cogsum, $cogsum1, $cogsum2, $cogsum3, $cogsum4, $cogsum5, $cogsum6, $cogsum7, $cogsum8, $cogsum9);
    $cogprevdata = array($cogsumm, $cogsumm1, $cogsumm2, $cogsumm3, $cogsumm4, $cogsumm5, $cogsumm6, $cogsumm7, $cogsumm8, $cogsumm9);
    $cogprevyeardata = array($cogsm, $cogsm1, $cogsm2, $cogsm3, $cogsm4, $cogsm5, $cogsm6, $cogsm7, $cogsm8, $cogsm9);
    $cogyeardata = array($cogm, $cogm1, $cogm2, $cogm3, $cogm4, $cogm5, $cogm6, $cogm7, $cogm8, $cogm9);
    
    $expdata = array($expsum, $expsum1, $expsum2, $expsum3, $expsum4, $expsum5, $expsum6, $expsum7, $expsum8, $expsum9,$expsum10,$expsum11,$expsum12,$expsum13,$expsum14,$expsum15,$expsum16,$expsum17,$expsum18,$expsum19,$expsum20,$expsum21,$expsum22,$expsum23,$expsum24,$expsum25,$expsum26,$expsum27,$expsum28,$expsum29,$expsum30,$expsum31,$expsum32,$expsum33,$expsum34, $expsum35, $expsum36,$expsum37,$expsum38,$expsum39,$expsum40,$expsum41,$expsum42,$expsum43,$expsum44,$expsum45,$expsum46,$expsum47, $expsum48, $expsum49,$expsum50,$expsum51,$expsum52,$expsum53,$expsum54, $expsum55,$expsum56,$expsum57,$expsum58,$expsum59,$expsum60,$expsum61,$expsum62,$expsum63,$expsum64,$expsum65,$expsum66,$expsum67,$expsum68,$expsum69,$expsum70,$expsum71);
    $expprevdata = array($expsumm, $expsumm1, $expsumm2, $expsumm3, $expsumm4, $expsumm5, $expsumm6, $expsumm7, $expsumm8, $expsumm9,$expsumm10,$expsumm11,$expsumm12,$expsumm13,$expsumm14,$expsumm15,$expsumm16,$expsumm17,$expsumm18,$expsumm19,$expsumm20,$expsumm21,$expsumm22,$expsumm23,$expsumm24,$expsumm25,$expsumm26,$expsumm27,$expsumm28,$expsumm29,$expsumm30,$expsumm31,$expsumm32,$expsumm33,$expsumm34, $expsumm35, $expsumm36,$expsumm37,$expsumm38,$expsumm39,$expsumm40,$expsumm41,$expsumm42,$expsumm43,$expsumm44,$expsumm45,$expsumm46,$expsumm47, $expsumm48, $expsumm49,$expsumm50,$expsumm51,$expsumm52,$expsumm53,$expsumm54, $expsumm55,$expsumm56,$expsumm57,$expsumm58,$expsumm59,$expsumm60,$expsumm61,$expsumm62,$expsumm63,$expsumm64,$expsumm65,$expsumm66,$expsumm67,$expsumm68,$expsumm69,$expsumm70,$expsumm71);
    $expprevyeardata = array($esumm, $esumm1, $esumm2, $esumm3, $esumm4, $esumm5, $esumm6, $esumm7, $esumm8, $esumm9,$esumm10,$esumm11,$esumm12,$esumm13,$esumm14,$esumm15,$esumm16,$esumm17,$esumm18,$esumm19,$esumm20,$esumm21,$esumm22,$esumm23,$esumm24,$esumm25,$esumm26,$esumm27,$esumm28,$esumm29,$esumm30,$esumm31,$esumm32,$exsm33,$exsm34, $exsm35, $exsm36,$exsm37,$exsm38,$exsm39,$exsm40,$exsm41,$exsm42,$exsm43,$exsm44,$exsm45,$exsm46,$exsm47, $exsm48, $exsm49,$exsm50,$exsm51,$exsm52,$exsm53,$exsm54, $exsm55,$exsm56,$exsm57,$exsm58,$exsm59,$exsm60,$exsm61,$exsm62,$exsm63,$exsm64,$exsm65,$exsm66,$exsm67,$exsm68,$exsm69,$exsm70,$exsm71);
    $expyeardata = array($exsumm, $exsumm1, $exsumm2, $exsumm3, $exsumm4, $exsumm5, $exsumm6, $exsumm7, $exsumm8, $exsumm9,$exsumm10,$exsumm11,$exsumm12,$exsumm13,$exsumm14,$exsumm15,$exsumm16,$exsumm17,$exsumm18,$exsumm19,$exsumm20,$exsumm21,$exsumm22,$exsumm23,$exsumm24,$exsumm25,$exsumm26,$exsumm27,$exsumm28,$exsumm29,$exsumm30,$exsumm31,$exsumm32,$exsum33,$exsum34, $exsum35, $exsum36,$exsum37,$exsum38,$exsum39,$exsum40,$exsum41,$exsum42,$exsum43,$exsum44,$exsum45,$exsum46,$exsum47, $exsum48, $exsum49,$exsum50,$exsum51,$exsum52,$exsum53,$exsum54, $exsum55,$exsum56,$exsum57,$exsum58,$exsum59,$exsum60,$exsum61,$exsum62,$exsum63,$exsum64,$exsum65,$exsum66,$exsum67,$exsum68,$exsum69,$exsum70,$exsum71);

    return view('ytdate',compact('last_month','year','previousyear','alldata','cogdata','revprevdata','cogprevdata','revprevyeardata','cogprevyeardata','revyeardata','cogyeardata','expdata','expprevdata','expprevyeardata','expyeardata'));
   }

}