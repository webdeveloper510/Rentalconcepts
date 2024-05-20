<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Session;
use App\Helpers;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Cogsdata;
use App\Models\Permission;
use App\Models\revenuedata;
use App\Models\expensedata1;
use App\Models\expensedata;
use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\Company_access;


class StatsController extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   public function index()
   {
      $cal = array("status" => '1');
      $prevdate = date("m-Y", strtotime("first day of previous month"));

      $retgros = [];
      $retnet = [];

      $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')
         ->get()->toArray();
      $prevyear = (explode("-", $prevdate));

      $year = $prevyear[1];
      $previousyear = $year - 1;
      $curryearval = $prevyear[0] - 1;
      for ($i = 0; $i < count($location); $i++) {
         $loc[] = $location[$i]->locationid;

         $customer[] = Customer::where('Location', '=', $location[$i]->locationid)
            ->where('Date', $prevdate)
            ->get()->toArray();
         $revenue1[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
            ->where('Date', $prevdate)
            ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
         $cog1[] = round(Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
         $esumm2 = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
         $esum3 = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
         $sumedata1[] = round($esumm2 + $esum3, 0);
         $payoff[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->sum(DB::raw('Payoffs'));
         for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $previousdates = sprintf('%02d', $m) . '-' . $prevyear[1];
            $pyear = sprintf('%02d', $m) . '-' . $year;
            $lastyear = sprintf('%02d', $m) . '-' . $previousyear;

            $rev[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
               ->where('Date', $pyear)
               ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
            $cog[] = round(Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
            $exp1 = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
            $exp2 = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
            $sumexpdata[] = round($exp1 + $exp2, 0);
         }
      }

      foreach ($revenue1 as $key => $value) {
         $retgros[$key] = $revenue1[$key] - $cog1[$key];
      }
      foreach ($retgros as $retkey => $retval) {
         $retnet[$retkey] = $retgros[$retkey] - $sumedata1[$retkey];
      }
      $arr = array_chunk($rev, $curryearval + 1, true);
      foreach ($arr as $key => $val) {
         $array[] = array_sum($val);
      }
      foreach ($rev as $key => $value) {
         $gros[$key] = $rev[$key] - $cog[$key];
      }
      foreach ($rev as $netkey => $netval) {
         $net[$netkey] = $gros[$netkey] - $sumexpdata[$netkey];
      }
      $netarr = array_chunk($net, $curryearval + 1, true);
      foreach ($netarr as $ntkey => $ntval) {
         $netar[] = array_sum($ntval);
      }

      $revkey = array_combine($loc, $customer);
      $rkey = array_combine($loc, $revenue1);
      $grossprofit = array_combine($loc, $retgros);
      $netinc = array_combine($loc, $retnet);
      $payof = array_combine($loc, $payoff);
      $ytdinc = array_combine($loc, $array);
      $ytdnetinc = array_combine($loc, $netar);

      foreach ($location as $key => $locvalue) {
         if (empty($revkey[$locvalue->locationid])) {
            $locvalue->tval = '0';
         } else {
            $locvalue->tval = $revkey[$locvalue->locationid][0]['Customers'];
         }
         foreach ($rkey as $rk => $rmain) {
            if ($locvalue->locationid == $rk) {
               $location[$key]->income = $rmain;
            }
         }
         foreach ($grossprofit as $grosk => $gmain) {
            if ($locvalue->locationid == $grosk) {
               $location[$key]->grosvalu = $gmain;
            }
         }
         foreach ($netinc as $nkey => $nmain) {
            if ($locvalue->locationid == $nkey) {
               $location[$key]->netvalu = $nmain;
            }
         }
         foreach ($payof as $paykey => $pval) {
            if ($locvalue->locationid == $paykey) {
               $location[$key]->payoff = $pval;
            }
         }
         foreach ($ytdinc as $ytdkey => $ytdval) {
            if ($locvalue->locationid == $ytdkey) {
               $location[$key]->ytdinc = $ytdval;
            }
         }
         foreach ($ytdnetinc as $ytdnetkey => $ytdnetval) {
            if ($locvalue->locationid == $ytdnetkey) {
               $location[$key]->ytdnetinc = $ytdnetval;
            }
         }
      }
      return view('stats', compact('prevdate', 'location', 'cal'));
   }
   public function stats(Request $request)
   {
      $cal = array("status" => '0');
      $retgros = [];
      $retnet = [];
      $date = $request['datee'];

      // $prevdate = date("m-Y", strtotime("first day of previous month"));
      $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')
         ->get()->toArray();
      $prevyear = (explode("-", $date));

      $year = $prevyear[1];
      $previousyear = $year - 1;
      $curryearval = $prevyear[0] - 1;
      for ($i = 0; $i < count($location); $i++) {
         $loc[] = $location[$i]->locationid;

         $customer[] = Customer::where('Location', '=', $location[$i]->locationid)
            ->where('Date', $date)->orderBy('Customers', 'ASC')
            ->get()->toArray();
         // echo"<pre>";
         // print_r($customer);
         $revenue1[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
            ->where('Date', $date)
            ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
         $cog1[] = round(Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $date]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
         $esumm2 = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $date]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
         $esum3 = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $date]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
         $sumedata1[] = round($esumm2 + $esum3, 0);
         $payoff[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $date]])->sum(DB::raw('Payoffs'));
         for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $previousdates = sprintf('%02d', $m) . '-' . $prevyear[1];
            $pyear = sprintf('%02d', $m) . '-' . $year;
            $lastyear = sprintf('%02d', $m) . '-' . $previousyear;

            $rev[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
               ->where('Date', $pyear)
               ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory + EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
            $cog[] = round(Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
            $exp1 = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
            $exp2 = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
            $sumexpdata[] = round($exp1 + $exp2, 0);
         }
      }
      foreach ($revenue1 as $key => $value) {
         $retgros[$key] = $revenue1[$key] - $cog1[$key];
      }
      foreach ($retgros as $retkey => $retval) {
         $retnet[$retkey] = $retgros[$retkey] - $sumedata1[$retkey];
      }
      $arr = array_chunk($rev, $curryearval + 1, true);
      foreach ($arr as $key => $val) {
         $array[] = array_sum($val);
      }
      foreach ($rev as $key => $value) {
         $gros[$key] = $rev[$key] - $cog[$key];
      }
      foreach ($rev as $netkey => $netval) {
         $net[$netkey] = $gros[$netkey] - $sumexpdata[$netkey];
      }
      $netarr = array_chunk($net, $curryearval + 1, true);
      foreach ($netarr as $ntkey => $ntval) {
         $netar[] = array_sum($ntval);
      }

      $revkey = array_combine($loc, $customer);
      $rkey = array_combine($loc, $revenue1);
      $grossprofit = array_combine($loc, $retgros);
      $netinc = array_combine($loc, $retnet);
      $payof = array_combine($loc, $payoff);
      $ytdinc = array_combine($loc, $array);
      $ytdnetinc = array_combine($loc, $netar);
      foreach ($location as $key => $locvalue) {
         if (empty($revkey[$locvalue->locationid])) {
            $locvalue->tval = '0';
         } else {
            $locvalue->tval = $revkey[$locvalue->locationid][0]['Customers'];
         }
         foreach ($rkey as $rk => $rmain) {
            if ($locvalue->locationid == $rk) {
               $location[$key]->income = $rmain;
            }
         }
         foreach ($grossprofit as $grosk => $gmain) {
            if ($locvalue->locationid == $grosk) {
               $location[$key]->grosvalu = $gmain;
            }
         }
         foreach ($netinc as $nkey => $nmain) {
            if ($locvalue->locationid == $nkey) {
               $location[$key]->netvalu = $nmain;
            }
         }
         foreach ($payof as $paykey => $pval) {
            if ($locvalue->locationid == $paykey) {
               $location[$key]->payoff = $pval;
            }
         }
         foreach ($ytdinc as $ytdkey => $ytdval) {
            if ($locvalue->locationid == $ytdkey) {
               $location[$key]->ytdinc = $ytdval;
            }
         }
         foreach ($ytdnetinc as $ytdnetkey => $ytdnetval) {
            if ($locvalue->locationid == $ytdnetkey) {
               $location[$key]->ytdnetinc = $ytdnetval;
            }
         }
      }
      foreach ($location as $key => $locvalue) {
         if ($locvalue->tval == '') {
            $locvalue->tval = 0;
         }
      }
      return view('stats', compact('date', 'location'));
   }
   public function stat_customer(Request $request)
   {
      $title = [
         'b&b' =>'B&B' ,
        'RentalConcepts' =>'Rental Concepts' ,
        'rcky'=>'RCKY' ,
        'ozk'=>'OZK'
      ];
      $company = Company_access::where('director_id', Session::get('userloginid'))->first();
      if(isset($company) && !empty($company)){
         if ($company->company == 'B&B') {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
               ->whereBetween('locationid', [3000, 4000])
               ->pluck('locationid')
               ->toArray();
         } elseif ($company->company == 'Rental Concepts') {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
               ->whereBetween('locationid', [2400, 2500])
               ->pluck('locationid')
               ->toArray();
         } elseif ($company->company == 'RCKY') {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
               ->whereBetween('locationid', [2200, 2300])
               ->pluck('locationid')
               ->toArray();
         } elseif ($company->company  == 'OZK') {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
               ->whereBetween('locationid', [4000, 5000])
               ->pluck('locationid')
               ->toArray();
         }
      }
      else
      {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')->pluck('locationid')->toArray();
      }
      $loca = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $p = explode('-', $prevdate);
      $prevformat = $p[1] . '-' . $p[0];
      $years = date('Y-m-d', strtotime($prevformat . " -3 year"));
      $curryear = date("Y-m-d", strtotime("first day of previous month"));
      $prevyears = CarbonPeriod::create($years, '1 month', $curryear);
      $previousMonths = [];
      $currentDate = Carbon::now()->subMonth();
      while ($currentDate->year == Carbon::now()->year) {
         $previousMonths[] = $currentDate->format('m-Y');
         $currentDate->subMonth();
      }
      $prev_date = array_reverse($previousMonths);
      // prevdate ------- previous month 
      for ($i = 0; $i < count($loca); $i++) {
         $customers[] = customer::where('Location', '=', $loca[$i]->locationid)->where('Date', $prevdate)->sum(DB::raw('Customers'));
         foreach ($prevyears as $dt) {
            $ym = $dt->format("m-Y");
            $cust[] = customer::where('Location', '=', $loca[$i]->locationid)
               ->where('Date', $ym)->get()->toArray();
         }
      }
     
      $month = [];
      for ($m = 1; $m <= 12; $m++) {
         $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
      }
      $othermonth = [];
      for ($m = 1; $m <= 12; $m++) {
         $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
      }
      $data = [
         'current'       => self::processMonthlyData($locations, $prev_date),
         'previous'      => self::processMonthlyData($locations, $month),
         'lastPrevious'  => self::processMonthlyData($locations, $othermonth)
      ];

      foreach ($loca as $key => $locvalue) {
         $locvalue->cust = $customers[$key];
      }
      
            return view('stats_customer', compact('data', 'loca', 'cust','title','company'));
   }
   function processMonthlyData($locations, $dates)
   {
      $customer = customer::whereIn('Location', $locations)
         ->whereIn('Date', $dates)
         ->get();
      $revenueData = revenuedata::whereIn('Location', $locations)
         ->whereIn('Date', $dates)->get();
      $cogsData = Cogsdata::whereIn('Location', $locations)
         ->whereIn('Date', $dates)
         ->get();
      $expenseData = DB::table('expense')
         ->join('expense1', 'expense.id', '=', 'expense1.exp_id')
         ->whereIn('expense.Location', $locations)
         ->whereIn('expense.Date', $dates)
         ->select('expense.*', 'expense1.*')
         ->get();
      $cust = [];
      foreach ($customer as $item) {
         $date = $item->Date;
         $cust[$date] = ($cust[$date] ?? 0) + self::calculateTotalCustomers($item);
      }
      $result = [];
      if (!empty($revenueData)) {
         foreach ($revenueData as $item) {
            $date = $item->Date;
            $result[$date] = ($result[$date] ?? 0) + self::calculateTotalRevenue($item);
         }
      }
      $cog = [];
      if (!empty($cogsData)) {
         foreach ($cogsData as $item) {
            $date = $item->Date;
            $cog[$date] = ($cog[$date] ?? 0) + self::calculateTotalCogs($item);
         }
      }
      $expense = [];
      if (!empty($expenseData)) {
         foreach ($expenseData as $item) {
            $date = $item->Date;
            $expense[$date] = ($expense[$date] ?? 0) + self::calculateTotalExpense($item);
         }
      }
      $grossp = [];
      foreach ($result as $key => $value) {
         $grossp[$key] = $result[$key] - $cog[$key];
      }
      $net = [];
      foreach ($result as $key => $value) {
         $net[$key] = $result[$key] - $cog[$key] - $expense[$key];
      }
      $cog = self::sortArrayByDateKey($cog);
      $result = self::sortArrayByDateKey($result);
      $cust = self::sortArrayByDateKey($cust);
      $expense = self::sortArrayByDateKey($expense);
      $grossp = self::sortArrayByDateKey($grossp);
      $net = self::sortArrayByDateKey($net);

      return compact('result', 'cust', 'cog', 'grossp', 'net', 'expense');
   }
   public function stats_total_income()
   {
      if (Session::has('userloginid')) {
         $title = [
            'b&b' =>'B&B' ,
           'RentalConcepts' =>'Rental Concepts' ,
           'rcky'=>'RCKY' ,
           'ozk'=>'OZK'
         ];
         $company = Company_access::where('director_id', Session::get('userloginid'))->first();
         if(isset($company) && !empty($company)){
            if ($company->company == 'B&B') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [3000, 4000])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'Rental Concepts') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2400, 2500])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'RCKY') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2200, 2300])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company  == 'OZK') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [4000, 5000])
                  ->pluck('locationid')
                  ->toArray();
            }
         }
         else
         {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')->pluck('locationid')->toArray();
   
         }
         $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
         $last_date = DB::table('Revenue')->min('Date');
         $last_date_carbon = Carbon::createFromFormat('m-Y', $last_date)->startOfMonth();
         $previousMonths = [];
         $currentDate = Carbon::now()->subMonth();
         $currentDate = Carbon::now()->subMonth();
         $prevdate = date("m-Y", strtotime("first day of previous month"));
         $prevyear = (explode("-", $prevdate));
         $curryearval = $prevyear[0] - 1;
         while ($currentDate->greaterThanOrEqualTo($last_date_carbon)) {
            $previousMonths[] = $currentDate->format('m-Y');
            $currentDate->subMonth();
         }
         $sum = 0;
         $prev_date = array_reverse($previousMonths);

         $all_revenues = [];
         foreach ($location as $loc) {
            $all_revenues[$loc->locationid] = [];
            foreach ($prev_date as $date) {
               $revenue = round(revenuedata::where('Location', $loc->locationid)
                  ->where('Date', $date)
                  ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory + EarlyPurchaseOption + RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
               $all_revenues[$loc->locationid][$date] = $revenue;
            }
         }
         $highest_incomes = [];
         foreach ($all_revenues as $location_id => $revenues) {
            $highest_income = max($revenues);
            $highest_incomes[$location_id] = $highest_income;
         }


         for ($i = 0; $i < count($location); $i++) {
            $locat[] = $location[$i]->locationid;
            $revenue_array[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
               ->where('Date',  $prevdate)
               ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
            for ($j = 0; $j < count($prev_date); $j++) {
               $revenue1[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $prev_date[$j])->get()->toArray();
            }
            // print_r($rev);die;
            for ($m = 1; $m <= $prevyear[0]; $m++) {
               $pyear = sprintf('%02d', $m) . '-' . $prevyear[1];
               $rev[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
                  ->where('Date', $pyear)
                  ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
            }
            $arr = array_chunk($rev, $curryearval + 1, true);
         }
         $highestValues = [];

         foreach ($arr as $subArray) {
            $maxValue = max($subArray);
            $highestValues[] = $maxValue;
         }
         foreach ($arr as $key => $val) {
            $array[] = array_sum($val);
         }
         $ytd_array = array_combine($locat, $array);
         $income_array =  array_combine($locat, $revenue_array);
         $highest_value = array_combine($locat, $highestValues);
         foreach ($location as $key => $locvalue) {
            if (empty($income_array[$locvalue->locationid])) {
               $locvalue->inc = 0;
            } else {
               $locvalue->inc = $income_array[$locvalue->locationid];
            }
            foreach ($ytd_array as $ytdkey => $ytdval) {
               if ($locvalue->locationid == $ytdkey) {
                  $location[$key]->ytdinc = $ytdval;
               }
            }
            $locvalue->highest_inc = $highest_value[$locvalue->locationid];
         }
         $month = [];
         for ($m = 1; $m <= 12; $m++) {
            $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
         }
         $othermonth = [];
         for ($m = 1; $m <= 12; $m++) {
            $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
         }
         // print_r($othermonth);die;
         $data = [
            'current' => self::processMonthlyData($locations, $prev_date),
            'previous' => self::processMonthlyData($locations, $month),
            'lastPrevious' => self::processMonthlyData($locations, $othermonth),
         ];
       
         return view('Stats_income', compact('data', 'location', 'highest_incomes','title','company'));
      } else {
         return redirect('/');
      }
   }




   public function stats_growth()
   {
      if (Session::has('userloginid')) {
         $prev = date("m-Y", strtotime("first day of previous month"));
         $delivery =  DB::table('deliveries')
            ->join('Expectations', 'Expectations.location', '=', 'deliveries.location')
            ->select('deliveries.*', 'Expectations.deliveries')
            ->where('deliveries.date', $prev)
            ->get()->toArray();
         return view('stats_growth', compact('delivery'));
      } else {
         return redirect('/');
      }
   }
   public function stats_cogs()
   {
      if (Session::has('userloginid')) {
         $title = [
            'b&b' =>'B&B' ,
           'RentalConcepts' =>'Rental Concepts' ,
           'rcky'=>'RCKY' ,
           'ozk'=>'OZK'
         ];
         $company = Company_access::where('director_id', Session::get('userloginid'))->first();
         if(isset($company) && !empty($company)){
            if ($company->company == 'B&B') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [3000, 4000])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'Rental Concepts') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2400, 2500])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'RCKY') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2200, 2300])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company  == 'OZK') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [4000, 5000])
                  ->pluck('locationid')
                  ->toArray();
            }
         }
         else
         {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')->pluck('locationid')->toArray();   
         }
         $previousMonths = [];
         $currentDate = Carbon::now()->subMonth();
         while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('m-Y');
            $currentDate->subMonth();
         }
         $prev_date = array_reverse($previousMonths);
         $month = [];
         for ($m = 1; $m <= 12; $m++) {
            $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
         }
         $othermonth = [];
         for ($m = 1; $m <= 12; $m++) {
            $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
         }
         // print_r($othermonth);die;
         $data = [
            'current' => self::processMonthlyData($locations, $prev_date),
            'previous' => self::processMonthlyData($locations, $month),
            'lastPrevious' => self::processMonthlyData($locations, $othermonth),
         ];
         return view('stats_cogs', compact('data','title','company'));
      } else {
         return redirect('/');
      }
   }
   public function stats_gross()
   {
      if (Session::has('userloginid')) {
         $title = [
            'b&b' =>'B&B' ,
           'RentalConcepts' =>'Rental Concepts' ,
           'rcky'=>'RCKY' ,
           'ozk'=>'OZK'
         ];
         $company = Company_access::where('director_id', Session::get('userloginid'))->first();
         if(isset($company) && !empty($company)){
            if ($company->company == 'B&B') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [3000, 4000])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'Rental Concepts') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2400, 2500])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'RCKY') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2200, 2300])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company  == 'OZK') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [4000, 5000])
                  ->pluck('locationid')
                  ->toArray();
            }
         }
         else
         {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')->pluck('locationid')->toArray();   
         }         $previousMonths = [];
         $currentDate = Carbon::now()->subMonth();
         while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('m-Y');
            $currentDate->subMonth();
         }
         $prev_date = array_reverse($previousMonths);
         $month = [];
         for ($m = 1; $m <= 12; $m++) {
            $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
         }
         $othermonth = [];
         for ($m = 1; $m <= 12; $m++) {
            $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
         }
         // print_r($othermonth);die;
         $data = [
            'current' => self::processMonthlyData($locations, $prev_date),
            'previous' => self::processMonthlyData($locations, $month),
            'lastPrevious' => self::processMonthlyData($locations, $othermonth),
         ];
         return view('stats_gross', compact('data','title','company'));
      } else {
         return redirect('/');
      }
   }
   public function stats_exp()
   {
      if (Session::has('userloginid')) {
         $title = [
            'b&b' =>'B&B' ,
           'RentalConcepts' =>'Rental Concepts' ,
           'rcky'=>'RCKY' ,
           'ozk'=>'OZK'
         ];
         $company = Company_access::where('director_id', Session::get('userloginid'))->first();
         if(isset($company) && !empty($company)){
            if ($company->company == 'B&B') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [3000, 4000])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'Rental Concepts') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2400, 2500])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'RCKY') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2200, 2300])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company  == 'OZK') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [4000, 5000])
                  ->pluck('locationid')
                  ->toArray();
            }
         }
         else
         {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')->pluck('locationid')->toArray();
   
         }
         $previousMonths = [];
         $currentDate = Carbon::now()->subMonth();
         while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('m-Y');
            $currentDate->subMonth();
         }
         $prev_date = array_reverse($previousMonths);
         $month = [];
         for ($m = 1; $m <= 12; $m++) {
            $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
         }
         $othermonth = [];
         for ($m = 1; $m <= 12; $m++) {
            $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
         }
         // print_r($othermonth);die;
         $data = [
            'current' => self::processMonthlyData($locations, $prev_date),
            'previous' => self::processMonthlyData($locations, $month),
            'lastPrevious' => self::processMonthlyData($locations, $othermonth),
         ];
         return view('stats_expense', compact('data','company','title'));
      } else {
         return redirect('/');
      }
   }
   public function stats_net()
   {
      if (Session::has('userloginid')) {
         $title = [
            'b&b' =>'B&B' ,
           'RentalConcepts' =>'Rental Concepts' ,
           'rcky'=>'RCKY' ,
           'ozk'=>'OZK'
         ];
         $company = Company_access::where('director_id', Session::get('userloginid'))->first();
         if(isset($company) && !empty($company)){
            if ($company->company == 'B&B') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [3000, 4000])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'Rental Concepts') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2400, 2500])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company == 'RCKY') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [2200, 2300])
                  ->pluck('locationid')
                  ->toArray();
            } elseif ($company->company  == 'OZK') {
               $locations = DB::table('locations')->orderBy('Location', 'ASC')
                  ->whereBetween('locationid', [4000, 5000])
                  ->pluck('locationid')
                  ->toArray();
            }
         }
         else
         {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')->pluck('locationid')->toArray();
   
         }
         $previousMonths = [];
         $currentDate = Carbon::now()->subMonth();
         while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('m-Y');
            $currentDate->subMonth();
         }
         $prev_date = array_reverse($previousMonths);
         $month = [];
         for ($m = 1; $m <= 12; $m++) {
            $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
         }
         $othermonth = [];
         for ($m = 1; $m <= 12; $m++) {
            $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
         }
         // print_r($othermonth);die;
         $data = [
            'current' => self::processMonthlyData($locations, $prev_date),
            'previous' => self::processMonthlyData($locations, $month),
            'lastPrevious' => self::processMonthlyData($locations, $othermonth),
         ];
         return view('stats_netinc', compact('data','company','title'));
      } else {
         return redirect('/');
      }
   }
   public function stats_opt(Request $request)
   {
      $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
      $categ = $request->stats_cat;
      if ($categ == 'b&b') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [3000, 4000])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'RentalConcepts') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2400, 2500])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'rcky') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2200, 2300])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'ozk') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [4000, 5000])
            ->pluck('locationid')
            ->toArray();
      }
      $previousMonths = [];
      $currentDate = Carbon::now()->subMonth();
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $prevyear = (explode("-", $prevdate));
      $curryearval = $prevyear[0] - 1;
      while ($currentDate->year == Carbon::now()->year) {
         $previousMonths[] = $currentDate->format('m-Y');
         $currentDate->subMonth();
      }
      $prev_date = array_reverse($previousMonths);
      $month = [];
      for ($m = 1; $m <= 12; $m++) {
         $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
      }
      $othermonth = [];
      for ($m = 1; $m <= 12; $m++) {
         $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
      }
      $data = [
         'current' => self::processMonthlyData($locations, $prev_date),
         'previous' => self::processMonthlyData($locations, $month),
         'lastPrevious' => self::processMonthlyData($locations, $othermonth)
      ];
      for ($i = 0; $i < count($location); $i++) {
         $locat[] = $location[$i]->locationid;
         $revenue_array[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
            ->where('Date',  $prevdate)
            ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
         for ($j = 0; $j < count($prev_date); $j++) {
            $revenue1[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $prev_date[$j])->get()->toArray();
         }
         // print_r($rev);die;
         for ($m = 1; $m <= $prevyear[0]; $m++) {
            $pyear = sprintf('%02d', $m) . '-' . $prevyear[1];
            $rev[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
               ->where('Date', $pyear)
               ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
         }
         $arr = array_chunk($rev, $curryearval + 1, true);
      }
      $highestValues = [];

      foreach ($arr as $subArray) {
         $maxValue = max($subArray);
         $highestValues[] = $maxValue;
      }
      foreach ($arr as $key => $val) {
         $array[] = array_sum($val);
      }
      $ytd_array = array_combine($locat, $array);
      $income_array =  array_combine($locat, $revenue_array);
      $highest_value = array_combine($locat, $highestValues);
      foreach ($location as $key => $locvalue) {
         if (empty($income_array[$locvalue->locationid])) {
            $locvalue->inc = 0;
         } else {
            $locvalue->inc = $income_array[$locvalue->locationid];
         }
         foreach ($ytd_array as $ytdkey => $ytdval) {
            if ($locvalue->locationid == $ytdkey) {
               $location[$key]->ytdinc = $ytdval;
            }
         }
         $locvalue->highest_inc = $highest_value[$locvalue->locationid];
      }
      $message = '';
      foreach ($data as $key => $value) {
         foreach ($value as $k => $v) {
            if (count($v) == 0) {
               $message = 'No data is available for these locations';
               return view('Stats_income', compact('data', 'location', 'categ', 'message'));
            } else {
               return view('Stats_income', compact('data', 'location', 'categ'));
            }
         }
      }
   }
   public function cust_opt(Request $request)
   {
      $title = [
         'b&b' =>'B&B - 3300' ,
        'RentalConcepts' =>'Rental Concepts - 2400' ,
        'rcky'=>'RCKY - 2200' ,
        'ozk'=>'OZK - 4500'
      ];

      $company = Company_access::where('director_id', Session::get('userloginid'))->first();
      $categ = $request->cust_cat;
     
      if ($categ == 'b&b') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [3000, 4000])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'RentalConcepts') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2400, 2500])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'rcky') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2200, 2300])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'ozk') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [4000, 5000])
            ->pluck('locationid')
            ->toArray();
      }
      $loca = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $p = explode('-', $prevdate);
      $prevformat = $p[1] . '-' . $p[0];
      $years = date('Y-m-d', strtotime($prevformat . " -3 year"));
      $curryear = date("Y-m-d", strtotime("first day of previous month"));
      $prevyears = CarbonPeriod::create($years, '1 month', $curryear);
      $previousMonths = [];
      $currentDate = Carbon::now()->subMonth();
      while ($currentDate->year == Carbon::now()->year) {
         $previousMonths[] = $currentDate->format('m-Y');
         $currentDate->subMonth();
      }
      $prev_date = array_reverse($previousMonths);
      for ($i = 0; $i < count($loca); $i++) {
         $customers[] = customer::where('Location', '=', $loca[$i]->locationid)->where('Date', $prevdate)->sum(DB::raw('Customers'));
         foreach ($prevyears as $dt) {
            $ym = $dt->format("m-Y");
            $cust[] = customer::where('Location', '=', $loca[$i]->locationid)
               ->where('Date', $ym)->get()->toArray();
         }
      }
      $month = [];
      for ($m = 1; $m <= 12; $m++) {
         $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
      }
      $othermonth = [];
      for ($m = 1; $m <= 12; $m++) {
         $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
      }
      $data = [
         'current'       => self::processMonthlyData($locations, $prev_date),
         'previous'      => self::processMonthlyData($locations, $month),
         'lastPrevious'  => self::processMonthlyData($locations, $othermonth)
      ];
    
      foreach ($loca as $key => $locvalue) {
         $locvalue->cust = $customers[$key];
      }
      $message = '';

      foreach ($data as $key => $value) {
         
         foreach ($value as $k => $v) {
       
            // print_r($v);
               // if (count($v) == 0) {
            //    $message = 'No data is available for these locations';
            //    return view('stats_customer', compact('data', 'loca', 'cust', 'message', 'categ','title','company'));
            // } else {
               return view('stats_customer', compact('data', 'loca', 'cust', 'categ','title','company'));
            // }
         }
      }
      // die;
   }
   public function cog_opt(Request $request)
   {
      $categ = $request->cogs_cat;
      if ($categ == 'b&b') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [3000, 4000])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'RentalConcepts') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2400, 2500])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'rcky') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2200, 2300])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'ozk') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [4000, 5000])
            ->pluck('locationid')
            ->toArray();
      }
      $loca = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $p = explode('-', $prevdate);
      $prevformat = $p[1] . '-' . $p[0];
      $years = date('Y-m-d', strtotime($prevformat . " -3 year"));
      $curryear = date("Y-m-d", strtotime("first day of previous month"));
      $prevyears = CarbonPeriod::create($years, '1 month', $curryear);
      $previousMonths = [];
      $currentDate = Carbon::now()->subMonth();
      while ($currentDate->year == Carbon::now()->year) {
         $previousMonths[] = $currentDate->format('m-Y');
         $currentDate->subMonth();
      }
      $prev_date = array_reverse($previousMonths);
      for ($i = 0; $i < count($loca); $i++) {
         $cog[] = round(Cogsdata::where([['Location', '=', $loca[$i]->locationid], ['Date', $prevdate]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
         foreach ($prevyears as $dt) {
            $ym = $dt->format("m-Y");
            $cogs[] = Cogsdata::where('Location', '=', $loca[$i]->locationid)
               ->where('Date', $ym)->get()->toArray();
         }
      }
      $month = [];
      for ($m = 1; $m <= 12; $m++) {
         $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
      }
      $othermonth = [];
      for ($m = 1; $m <= 12; $m++) {
         $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
      }
      $data = [
         'current'       => self::processMonthlyData($locations, $prev_date),
         'previous'      => self::processMonthlyData($locations, $month),
         'lastPrevious'  => self::processMonthlyData($locations, $othermonth)
      ];
      foreach ($loca as $key => $locvalue) {
         $locvalue->cust = $cog[$key];
      }
      $message = '';
      foreach ($data as $key => $value) {
         foreach ($value as $k => $v) {
            if (count($v) == 0) {
               $message = 'No data is available for these locations';
               return view('stats_cogs', compact('data', 'loca', 'cogs', 'message', 'categ'));
            } else {
               return view('stats_cogs', compact('data', 'loca', 'cogs', 'categ'));
            }
         }
      }
   }
   public function gross_opt(Request $request)
   {
      $categ = $request->gros_cat;
      if ($categ == 'b&b') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [3000, 4000])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'RentalConcepts') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2400, 2500])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'rcky') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2200, 2300])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'ozk') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [4000, 5000])
            ->pluck('locationid')
            ->toArray();
      }
      $loca = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $p = explode('-', $prevdate);
      $prevformat = $p[1] . '-' . $p[0];
      $years = date('Y-m-d', strtotime($prevformat . " -3 year"));
      $curryear = date("Y-m-d", strtotime("first day of previous month"));
      $prevyears = CarbonPeriod::create($years, '1 month', $curryear);
      $previousMonths = [];
      $currentDate = Carbon::now()->subMonth();
      while ($currentDate->year == Carbon::now()->year) {
         $previousMonths[] = $currentDate->format('m-Y');
         $currentDate->subMonth();
      }
      $prev_date = array_reverse($previousMonths);
      $month = [];
      for ($m = 1; $m <= 12; $m++) {
         $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
      }
      $othermonth = [];
      for ($m = 1; $m <= 12; $m++) {
         $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
      }
      $data = [
         'current'       => self::processMonthlyData($locations, $prev_date),
         'previous'      => self::processMonthlyData($locations, $month),
         'lastPrevious'  => self::processMonthlyData($locations, $othermonth)
      ];
      $message = '';
      foreach ($data as $key => $value) {
         foreach ($value as $k => $v) {
            if (count($v) == 0) {
               $message = 'No data is available for these locations';
               return view('stats_gross', compact('data', 'message', 'categ'));
            } else {
               return view('stats_gross', compact('data', 'categ'));
            }
         }
      }
   }
   public function exp_opt(Request $request)
   {
      $categ = $request->exp_cat;
      if ($categ == 'b&b') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [3000, 4000])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'RentalConcepts') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2400, 2500])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'rcky') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2200, 2300])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'ozk') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [4000, 5000])
            ->pluck('locationid')
            ->toArray();
      }
      $loca = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $p = explode('-', $prevdate);
      $prevformat = $p[1] . '-' . $p[0];
      $years = date('Y-m-d', strtotime($prevformat . " -3 year"));
      $curryear = date("Y-m-d", strtotime("first day of previous month"));
      $prevyears = CarbonPeriod::create($years, '1 month', $curryear);
      $previousMonths = [];
      $currentDate = Carbon::now()->subMonth();
      while ($currentDate->year == Carbon::now()->year) {
         $previousMonths[] = $currentDate->format('m-Y');
         $currentDate->subMonth();
      }
      $prev_date = array_reverse($previousMonths);
      $month = [];
      for ($m = 1; $m <= 12; $m++) {
         $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
      }
      $othermonth = [];
      for ($m = 1; $m <= 12; $m++) {
         $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
      }
      $data = [
         'current'       => self::processMonthlyData($locations, $prev_date),
         'previous'      => self::processMonthlyData($locations, $month),
         'lastPrevious'  => self::processMonthlyData($locations, $othermonth)
      ];
      $message = '';
      foreach ($data as $key => $value) {
         foreach ($value as $k => $v) {
            if (count($v) == 0) {
               $message = 'No data is available for these locations';
               return view('stats_expense', compact('data', 'message', 'categ'));
            } else {
               return view('stats_expense', compact('data', 'categ'));
            }
         }
      }
   }
   public function net_opt(Request $request)
   {
      $categ = $request->net_cat;
      if ($categ == 'b&b') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [3000, 4000])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'RentalConcepts') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2400, 2500])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'rcky') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2200, 2300])
            ->pluck('locationid')
            ->toArray();
      } elseif ($categ == 'ozk') {
         $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [4000, 5000])
            ->pluck('locationid')
            ->toArray();
      }
      $loca = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
      $prevdate = date("m-Y", strtotime("first day of previous month"));
      $p = explode('-', $prevdate);
      $prevformat = $p[1] . '-' . $p[0];
      $years = date('Y-m-d', strtotime($prevformat . " -3 year"));
      $curryear = date("Y-m-d", strtotime("first day of previous month"));
      $prevyears = CarbonPeriod::create($years, '1 month', $curryear);
      $previousMonths = [];
      $currentDate = Carbon::now()->subMonth();
      while ($currentDate->year == Carbon::now()->year) {
         $previousMonths[] = $currentDate->format('m-Y');
         $currentDate->subMonth();
      }
      $prev_date = array_reverse($previousMonths);
      $month = [];
      for ($m = 1; $m <= 12; $m++) {
         $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
      }
      $othermonth = [];
      for ($m = 1; $m <= 12; $m++) {
         $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
      }
      $data = [
         'current'       => self::processMonthlyData($locations, $prev_date),
         'previous'      => self::processMonthlyData($locations, $month),
         'lastPrevious'  => self::processMonthlyData($locations, $othermonth)
      ];
      $message = '';
      foreach ($data as $key => $value) {
         foreach ($value as $k => $v) {
            if (count($v) == 0) {
               $message = 'No data is available for these locations';
               return view('stats_netinc', compact('data', 'message', 'categ'));
            } else {
               return view('stats_netinc', compact('data', 'categ'));
            }
         }
      }
   }
   function sortArrayByDateKey(&$array)
   {
      $sortedData = array();
      foreach ($array as $key => $value) {
         $timestamp = strtotime("01-$key"); // Convert the key to a timestamp
         $sortedData[$timestamp] = $value;
      }

      ksort($sortedData); // Sort the array by keys (timestamps)

      $sortedArray = array();
      foreach ($sortedData as $timestamp => $value) {
         $date = date("m-Y", $timestamp); // Convert the timestamp back to the original date format
         $sortedArray[$date] = $value;
      }

      $array = $sortedArray;
      return $array;
   }
   function calculateTotalCustomers($item)
   {
      return intval($item->Customers);
   }
   function calculateTotalRevenue($item)
   {
      return (
         $item->RentalIncome + $item->CashSales + $item->CashSalesNoninventory +
         $item->EarlyPurchaseOption + $item->RollPro + $item->CollectionFeeInHouse +
         $item->ReinstatementFees + $item->OtherFeesAlignments + $item->OneTimeFees +
         $item->NSFCheckFees + $item->OtherMiscellaneousIncome +
         $item->SalesTaxCollected + $item->RollSafe + $item->Chargebacks +
         $item->ManagementFee + $item->SubfranchiseeRoyaltyIncome
      );
   }
   function calculateTotalCogs($item)
   {
      return (
         $item->depreciation_inventory + $item->paidout_epocharge + $item->cashsalechargeoffs +
         $item->skipstolenchargeoffs + $item->insurancechargeoffs +
         $item->returneddamagednonrepairable + $item->otherchargeoff +
         $item->pastdueaccountchargeoff + $item->inventorycostadjustment +
         $item->clubremittance
      );
   }
   function calculateTotalExpense($item)
   {
      return (
         $item->PartsInventoryRepair + $item->LaborInventoryRepair +
         $item->RadioAdmin + $item->PrintMedia + $item->Sponsorships +
         $item->InternetOnline + $item->SpecialEvents + $item->CashShortLong +
         $item->BankCardFees + $item->BankServiceCharges +
         $item->BankChargesOther + $item->LegalFees +
         $item->AccountingFees + $item->ProfessionalFeesOther +
         $item->PropertyGeneralLiability + $item->OfficeSupplies +
         $item->Postage + $item->Freight + $item->GeneralSupplies +
         $item->PostageFreightSuppliesOther + $item->RentExpense +
         $item->Utilities + $item->Security + $item->PestControl +
         $item->RepairMaintenancBuilding + $item->RepairsMaintenanceEquip +
         $item->EquipmentRental + $item->DepreciationExpenseFFE +
         $item->AmortizationExpense + $item->RepairMaintenanceVehicles +
         $item->FuelOilVehicle + $item->VehicleInsurance +
         $item->VehicleLicenses + $item->CharitableContributions +
         $item->CustomerSettlements + $item->Softwarelicensefees +
         $item->ComputerSupplies + $item->ComputerMaintenanceRepair +
         $item->TelephoneCommunications + $item->Salary +
         $item->TotalHourly + $item->Overtimehourly + $item->Holiday +
         $item->Bonus + $item->MileageReimbursement + $item->TravelExpense +
         $item->MealsEntertainment + $item->TravelEntertainmentOther +
         $item->DuesDeductible + $item->DuesSubscriptionsOther +
         $item->UnemploymentTaxes + $item->FICAMatch +
         $item->RetirementBenefits + $item->InsuranceExpenseEmployeeOther +
         $item->GroupHealthLifeInsurance + $item->WorkerCompensation +
         $item->EmployeeProcurement + $item->DrugScreening +
         $item->SeminarsEducation + $item->EmployeeTraining +
         $item->Uniforms + $item->AwardsGifts +
         $item->LeasedEmployees + $item->FranchiseTax +
         $item->PersonalProperty + $item->RealEstate +
         $item->SalesUseTax + $item->WasteTiretax +
         $item->BusinessLicensesPermits + $item->RoyaltyFeesOther +
         $item->OperationalOverhead + $item->PayrollExpensesOther
      );
   }
}
