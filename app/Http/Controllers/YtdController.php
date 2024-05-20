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

class YtdController extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function viewytdcomp()
   {
      if (Session::has('userloginid')) {
         $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')
            ->get()->toArray();
         $prevdate = date("m-Y", strtotime("first day of previous month"));
         $prevyear = (explode("-", $prevdate));

         $year = $prevyear[1];
         $previousyear = $year - 1;
         $previous = '01' . "-" . $year;
         $current = $prevyear[0] . "-" . $year;
         $curryearval = $prevyear[0] - 1;

         $revkey = [];
         for ($i = 0; $i < count($location); $i++) {
            $loc[] = $location[$i]->locationid;
            for ($m = 1; $m <= $prevyear[0]; $m++) {
               date('F', mktime(0, 0, 0, $m, 1, date('Y')));
               $previousdates = sprintf('%02d', $m) . '-' . $prevyear[1];
               $pyear = sprintf('%02d', $m) . '-' . $year;
               $lastyear = sprintf('%02d', $m) . '-' . $previousyear;
               $revenue1[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
                  ->where('Date', $pyear)
                  ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
               $revlastyear[] = round(revenuedata::where('Location', '=', $location[$i]->locationid)
                  ->where('Date', $lastyear)
                  ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 1);
               $cog1[] = round(Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
               $coglastyear[] = round(Cogsdata::where([['Location','=',$location[$i]->locationid], ['Date', '=', $lastyear]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
               $esumm2 = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
               $esum3 = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
               $sumedata1[] = round($esumm2 + $esum3, 0);
               $esumm = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $lastyear]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
               $esum1 = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $lastyear]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
               $sumedata[] = round($esumm + $esum1, 0);
            }
         }
         // ------------------------------------  REVENUE-------------------
         $arr = array_chunk($revenue1, $curryearval + 1, true);
         foreach ($arr as $key => $val) {
            $array[] = array_sum($val);
         }
         $revarr = array_chunk($revlastyear, $curryearval + 1, true);
         foreach ($revarr as $revkey => $revval) {
            $revarray[] = array_sum($revval);
         }
         // ------------------------------------  COGSDATA-------------------
         $cogarr = array_chunk($cog1, $curryearval + 1, true);
         foreach ($cogarr as $cogkey => $cogval) {
            $cogarray[] = array_sum($cogval);
         }
         $carr = array_chunk($coglastyear, $curryearval + 1, true);
         foreach ($carr as $ckey => $cval) {
            $carray[] = array_sum($cval);
         }
         // ------------------------------------  GROSS PROFIT-------------------
         foreach ($revenue1 as $key => $value) {
            $retgros[$key] = $revenue1[$key] - $cog1[$key];
         }
         $grosarr = array_chunk($retgros, $curryearval + 1, true);
         foreach ($grosarr as $gkey => $gval) {
            $garray[] = array_sum($gval);
         }
         foreach ($revlastyear as $grskey => $grsval) {
            $retgros1[$grskey] = $revlastyear[$grskey] - $coglastyear[$grskey];
         }
         $grosarray = array_chunk($retgros1, $curryearval + 1, true);

         foreach ($grosarray as $grosskey => $grossval) {
            $grosar[] = array_sum($grossval);
         }
         // ------------------------------------ EXPENSE-------------------
         $exparr = array_chunk($sumedata1, $curryearval + 1, true);
         foreach ($exparr as $ekey => $eval) {
            $exparray[] = array_sum($eval);
         }
         $exparr1 = array_chunk($sumedata, $curryearval + 1, true);
         foreach ($exparr1 as $exkey => $exval) {
            $expar[] = array_sum($exval);
         }
         //------------------------------NET INCOME---------------------------
         foreach ($retgros as $retkey => $retval) {
            $retnet[$retkey] = $retgros[$retkey] - $sumedata1[$retkey];
         }
         $netarr = array_chunk($retnet, $curryearval + 1, true);
         foreach ($netarr as $netkey => $netval) {
            $netar[] = array_sum($netval);
         }
         foreach ($retgros1 as $retgkey => $retgval) {
            $retgnet[$retgkey] = $retgros1[$retgkey] - $sumedata[$retgkey];
         }
         $netarrray = array_chunk($retgnet, $curryearval + 1, true);
         foreach ($netarrray as $ntinckey => $nval) {
            $netincarr[] = array_sum($nval);
         }
         //-------------------------------- LOCATION ID AS KEY------------------------------- 
         $revkey = array_combine($loc, $array);
         $revenuekey = array_combine($loc, $revarray);
         $cogskey = array_combine($loc, $cogarray);
         $cgkey = array_combine($loc, $carray);
         $grkey = array_combine($loc, $garray);
         $groskey = array_combine($loc, $grosar);
         $expkey = array_combine($loc, $exparray);
         $exkey = array_combine($loc, $expar);
         $netkey = array_combine($loc, $netar);
         $ntkey = array_combine($loc, $netincarr);
         //-------------------------------------------------------------------------------    
         foreach ($location as $key => $locvalue) {
            foreach ($revkey as $keys => $main) {
               if ($locvalue->locationid == $keys) {
                  $location[$key]->tval = $main;
               }
            }
            foreach ($revenuekey as $rkeys => $rmain) {
               if ($locvalue->locationid == $rkeys) {
                  $location[$key]->rvalu = $rmain;
               }
            }
            foreach ($cogskey as $ckeys => $cmain) {
               if ($locvalue->locationid == $ckeys) {
                  $location[$key]->cogvalu = $cmain;
               }
            }
            foreach ($cgkey as $cgk => $cgmain) {
               if ($locvalue->locationid == $cgk) {
                  $location[$key]->cgvalu = $cgmain;
               }
            }
            foreach ($grkey as $grosk => $gmain) {
               if ($locvalue->locationid == $grosk) {
                  $location[$key]->grosvalu = $gmain;
               }
            }
            foreach ($groskey as $grk => $grosmain) {
               if ($locvalue->locationid == $grk) {
                  $location[$key]->grossvalu = $grosmain;
               }
            }
            foreach ($expkey as $expk => $expmain) {
               if ($locvalue->locationid == $expk) {
                  $location[$key]->expvalu = $expmain;
               }
            }
            foreach ($exkey as $expensekey => $exmain) {
               if ($locvalue->locationid == $expensekey) {
                  $location[$key]->exvalu = $exmain;
               }
            }
            foreach ($netkey as $nkey => $nmain) {
               if ($locvalue->locationid == $nkey) {
                  $location[$key]->netvalu = $nmain;
               }
            }
            foreach ($ntkey as $netincomekey => $netmain) {
               if ($locvalue->locationid == $netincomekey) {
                  $location[$key]->netvalue = $netmain;
               }
            }
         }
         return view('ytdcompare', compact('location'));
      } else {
         return redirect('/');
      }
   }
}
