<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Location;
use App\Models\Regions;
use App\Models\customer;
use Illuminate\Http\Request;
use DB;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use App\Models\expensedata;
use App\Models\expensedata1;

use Illuminate\Routing\Controller as BaseController;

class RegionController extends BaseController
{
    public function north_index()
    {
        if (Session::has('loginid')) {

            $location = Location::select('*')->whereBetween('locationid', ['2401', '2429'])->get();
            $selectedregion = Regions::select('*')->get()->first();
            return view('north_region', compact('location', 'selectedregion'));
        } else {
            return view('login');
        }
    }
    public function user_index()
    {
        if (Session::has('userloginid')) {
            $date = date('m-Y', strtotime('last month'));
            $data = Regions::select('*')->get()->first();
            $north = explode(',', $data->north_loc);
            foreach ($north as $key => $n) {
                $cust[] = customer::select('Customers', 'Location')->where('Location', $n)->where('Date', $date)->get()->toArray();
                $deliveries[] = DB::table('deliveries')->select('delivery', 'Location')->where('location', $n)->where('Date', $date)->get()->toArray();
                $sumrevenuedata[] = round(revenuedata::where('Date', '=', $date)->where('Location', '=', $n)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                $pastdueaccount[] = Cogsdata::select('pastdueaccountchargeoff')->where('location', $n)->where('Date', $date)->get()->toArray();
                $sumcdata[] = round(Cogsdata::where('Date', '=', $date)->where('Location', '=', $n)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $esumm[] = expensedata::where('Date', '=', $date)->where('Location', '=', $n)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $esum1[] = expensedata1::where('Date', '=', $date)->where('Location', '=', $n)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
            }
            $gross = array();
            foreach ($sumrevenuedata as $key => $value) {
                $gross[$key] = round($sumrevenuedata[$key] -  $sumcdata[$key], 0);
            }
            $sumedata = array();
            foreach ($esumm as $key => $value) {
                $sumedata[$key] = round($esumm[$key] + $esum1[$key], 0);
            }
            $netdata = array();
            foreach ($gross as $key => $value) {
                $netdata[$key] = round($gross[$key] - $sumedata[$key], 0);
            }
            $sum = $othersum = $dsum = $delsum = $revsum = $resum = $pastd = $pastacc = $netin = $net =  0;
            foreach ($cust as $c) {
                foreach ($c as $u) {
                    $sum += $u['Customers'];
                }
            }
            foreach ($deliveries as $del) {
                foreach ($del as $d) {
                    $dsum += $d->delivery;
                }
            }
            foreach ($sumrevenuedata as $sumrev) {
                $revsum += $sumrev;
            }
            foreach ($pastdueaccount as $pastdue) {
                foreach ($pastdue as $pstdue) {
                    $pastd += $pstdue['pastdueaccountchargeoff'];
                }
            }
            foreach ($netdata as $netincome) {
                $netin += $netincome;
            }
            $south = explode(',', $data->south_loc);
            foreach ($south as $s) {
                $custumer[] = customer::select('Customers', 'Location')->where('Location', $s)->where('Date', $date)->get()->toArray();
                $delivery[] = DB::table('deliveries')->select('delivery', 'Location')->where('location', $s)->where('Date', $date)->get()->toArray();
                $revenuedata[] = round(revenuedata::where('Date', '=', $date)->where('Location', '=', $s)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                $pastdueaccountoff[] = Cogsdata::select('pastdueaccountchargeoff')->where('location', $s)->where('Date', $date)->get()->toArray();
                $sumcodata[] = round(Cogsdata::where('Date', '=', $date)->where('Location', '=', $s)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $exsumm[] = expensedata::where('Date', '=', $date)->where('Location', '=', $s)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $exsum1[] = expensedata1::where('Date', '=', $date)->where('Location', '=', $s)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
            }
            $grossinc = array();
            foreach ($revenuedata as $key => $value) {
                $grossinc[$key] = round($revenuedata[$key] -  $sumcodata[$key], 0);
            }
            $sumedatainc = array();
            foreach ($exsumm as $key => $value) {
                $sumedatainc[$key] = round($exsumm[$key] + $exsum1[$key], 0);
            }
            $netdatainc = array();
            foreach ($grossinc as $key => $value) {
                $netdatainc[$key] = round($grossinc[$key] - $sumedatainc[$key], 0);
            }
            foreach ($custumer as $cus) {
                foreach ($cus as $cu) {
                    $othersum += $cu['Customers'];
                }
            }
            foreach ($delivery as $deli) {
                foreach ($deli as $de) {
                    $delsum += $de->delivery;
                }
            }
            foreach ($revenuedata as $rsum) {
                $resum += $rsum;
            }
            foreach ($pastdueaccountoff as $pastdu) {
                foreach ($pastdu as $pdue) {
                    $pastacc += $pdue['pastdueaccountchargeoff'];
                }
            }
            foreach ($netdatainc as $netinc) {
                $net += $netinc;
            }
            return view('user_region', compact('cust', 'custumer', 'sum', 'othersum', 'delsum', 'dsum', 'revsum', 'resum', 'pastd', 'pastacc', 'netin', 'net'));
        } else {
            return view('user-login');
        }
    }
    public function data(Request $request)
    {
        $request->validate([
            'north_region' => 'required',
            'south_region' => 'required'
        ]);
        $locat = $request->north_region;
        $locc = $request->south_region;
        $region = new Regions;
        if (empty($region)) {
            $region->north_loc = implode(",", $locat);
            $region->south_loc = implode(",", $locc);
            $region->save();
        } else {
            Regions::where('id', 1)->update([
                'north_loc' => implode(",", $locat),
                'south_loc' => implode(",", $locc)
            ]);
        }
        return redirect('/admin/regions');
    }

    // public function user_region_new()
    // {
    //     $region_names = ['Jakes', 'Johnson', 'Weir', 'Hodges', 'Lyon', 'Davis', 'Covey', 'Almaraz'];
    //     $date = date('m-Y', strtotime('last month'));
    //     $data = Regions::select('*')->get()->first();
    //     $north = explode(',', $data->north_loc);
    //     foreach ($north as $key => $n) {
    //         $cust[] = customer::select('Customers', 'Location')->where('Location', $n)->where('Date', $date)->get()->toArray();
    //     }
    //     // dd($cust);
    //     return view('user-region-new', compact('region_names'));
    // }

    public function user_region_new()
    {
        $region_names = ['Jakes', 'Johnson', 'Weir', 'Hodges', 'Lyon', 'Davis', 'Covey', 'Almaraz'];
        $date = date('m-Y', strtotime('last month'));
        $data = Regions::select('*')->get()->first();

        $jakes_array = ['2401', '2402', '2406', '2413'];
        $johnson_array = ['2408', '2409', '2414', '2403'];

        foreach ($jakes_array as $j) {
            $cust[] = customer::select('Customers', 'Location')->where('Location', $j)->where('Date', $date)->get()->toArray();
            $deliveries[] = DB::table('deliveries')->select('delivery', 'Location')->where('location', $j)->where('Date', $date)->get()->toArray();
            $sumrevenuedata[] = round(revenuedata::where('Date', '=', $date)->where('Location', '=', $j)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
            $pastdueaccount[] = Cogsdata::select('pastdueaccountchargeoff')->where('location', $j)->where('Date', $date)->get()->toArray();
            $sumcdata[] = round(Cogsdata::where('Date', '=', $date)->where('Location', '=', $j)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
            $esumm[] = expensedata::where('Date', '=', $date)->where('Location', '=', $j)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
            $esum1[] = expensedata1::where('Date', '=', $date)->where('Location', '=', $j)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
        }
        $sum = $othersum = $dsum = $delsum = $revsum = $resum = $pastd = $pastacc = $netin = $net =  0;

        $gross = array();
        foreach ($sumrevenuedata as $key => $value) {
            $gross[$key] = round($sumrevenuedata[$key] -  $sumcdata[$key], 0);
        }
        $sumedata = array();
        foreach ($esumm as $key => $value) {
            $sumedata[$key] = round($esumm[$key] + $esum1[$key], 0);
        }
        $netdata = array();
        foreach ($gross as $key => $value) {
            $netdata[$key] = round($gross[$key] - $sumedata[$key], 0);
        }
        foreach ($cust as $c) {
            foreach ($c as $u) {
                $sum += $u['Customers'];
            }
        }
        foreach ($deliveries as $del) {
            foreach ($del as $d) {
                $dsum += $d->delivery;
            }
        }
        foreach ($sumrevenuedata as $sumrev) {
            $revsum += $sumrev;
        }
        foreach ($pastdueaccount as $pastdue) {
            foreach ($pastdue as $pstdue) {
                $pastd += $pstdue['pastdueaccountchargeoff'];
            }
        }
        foreach ($netdata as $netincome) {
            $netin += $netincome;
        }
        return view('user-region-new', compact('region_names', 'netin', 'pastd', 'revsum', 'dsum', 'sum'));
    }
}
