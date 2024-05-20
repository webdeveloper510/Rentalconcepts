<?php

namespace App\Http\Controllers;

use App\Models\Loginuser;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\SiteUsers;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use App\Models\default_loc;
use App\Models\expensedata;
use App\Models\expensedata1;
use App\Models\Directory;
use App\Models\customer;
use App\Models\Permission;
use App\Models\Upload;

class LoginController extends Controller

{
    public function login(Request $request)
    {
        return view('login');
    }
    public function loginvalidation(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $details = SiteUsers::select('*')->where('email', $request->input('name'))->get()->toArray();
        // print_r($details);die;
        if (!empty($details)) {

            if (md5($request->input('password')) == $details[0]['password']) {

                Session::put('loginid', $details[0]['id']);

                Session::put('role', $details[0]['role']);

                if ($details[0]['role'] == "Super admin") {
                    return redirect('/admin/dashboard');
                } else {
                    return back()->with('error', 'Wrong Login Credentials!');
                }
            } else {
                return back()->with('error', 'Wrong Password!');
            }
        } else {
            return back()->with('error', "Email doesn't exist!");
        }
    }
    public function dashboard()
    {
        if (Session::get('loginid')) {
            $shwgraph = DB::table('Showgraph')->where('status', '1')->get()->pluck('names')->toArray();
            return view('dashboard', compact('shwgraph'));
        } else {
            return redirect('/admin');
        }
    }
    public function logout()
    {
        Session::forget('loginid');
        return redirect('/admin');
    }
    // public function userlogin()
    // {
    //     // echo "here";

    //     // die;
    //     if (session()->has('userloginid') && (session::get('userrole') == 'Manager' || session::get('userrole') == 'Director' || session::get('userrole') == 'Sales Manager')) {
    //         $cal = array("status" => '1');

    //         $location = DB::table('locations')
    //             ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
    //             ->where('permissions.allowed', 1)
    //             ->where("permissions.userid", Session::get('userloginid'))
    //             ->get()->toArray();
    //         if (!($location)) {
    //             Session::forget('userloginid');
    //             return view('404');
    //         } else {
    //             $locpermitted = Permission::select('locationid')->where('userid', Session::get('userloginid'))->where('allowed', 1)->orderBy('locationid', 'ASC')->limit(1)->get()->toArray();
    //             $defloc = DB::table('default_loc')->select('location')
    //                 ->where('userid', Session::get('userloginid'))->get()->toArray();
    //             if (!$defloc) {
    //                 $loc  = $locpermitted[0]['locationid'];
    //             } else {
    //                 $loc = $defloc[0]->location;
    //             }
    //             $prevdate = date("m-Y", strtotime("first day of previous month"));
    //             $prevyear = (explode("-", $prevdate));
    //             $shwgraph = DB::table('Showgraph')->where('status', '1')->get()->pluck('id')->toArray();
    //             $year = $prevyear[1];
    //             $previousyear = $year - 1;
    //             $previous = $prevyear[0] . "-" . $previousyear;
    //             for ($i = 12; $i >= 1; $i--) {
    //                 $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
    //             }

    //             $rev = [];
    //             $cog = [];
    //             $exp = [];
    //             $grossp = [];
    //             $netinc = [];
    //             $pstdue = [];
    //             // Data on submitting dates and location 
    //             $sumrdata = round(revenuedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
    //             $sumcdata = round(Cogsdata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
    //             $esumm = expensedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
    //             $esum1 = expensedata1::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
    //             $gross = round($sumrdata - $sumcdata, 0);
    //             $sumedata = round($esumm + $esum1, 0);
    //             $netdata = round($gross - $sumedata, 0);
    //             // Default Data 
    //             $sumrdata1 = round(revenuedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
    //             $sumcdata1 = round(Cogsdata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
    //             $esumm1 = expensedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
    //             $esum2 = expensedata1::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
    //             $gross1 = round($sumrdata1 - $sumcdata1, 0);
    //             $sumedata1 = round($esumm1 + $esum2, 0);
    //             $netdata = round($gross1 - $sumedata1, 0);

    //             // -------------------------------------PREVIOUS YEAR DATE DATA-------------------------------------
    //             $prevsumrdata = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
    //             $prevsumcdata = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
    //             $prevesumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
    //             $prevesum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
    //             $prevgross = round($prevsumrdata - $prevsumcdata, 0);
    //             $prevsumedata = round($prevesumm + $prevesum1, 0);
    //             $prevnetdata = round($prevgross - $prevsumedata, 0);

    //             if (!empty($months)) {
    //                 foreach ($months as $key => $value) {
    //                     $sumrevenuedata = round(revenuedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
    //                     $cogsum = round(Cogsdata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
    //                     $pastdueacc = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff ')), 2);
    //                     $expsumm = expensedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
    //                     $expsum1 = expensedata1::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
    //                     $custdata = customer::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('Customers'));

    //                     $grossprofitt = round($sumrevenuedata - $cogsum, 0);
    //                     $exptotalsum = round($expsumm + $expsum1, 0);
    //                     $netincomee = round($grossprofitt - $exptotalsum, 0);

    //                     $rev[$key][$value] = $sumrevenuedata;
    //                     $cog[$key][$value] = $cogsum;
    //                     $exp[$key][$value] = $exptotalsum;
    //                     $grossp[$key][$value] = $grossprofitt;
    //                     $netinc[$key][$value] = $netincomee;
    //                     $cust[$key][$value] = $custdata;
    //                     $pstdue[$key][$value] = $pastdueacc;
    //                 }
    //             }
    //             return view('master', compact('year', 'previousyear', 'loc', 'location', 'shwgraph', 'prevdate', 'cal', 'sumrdata1', 'sumcdata1', 'sumedata1', 'gross1', 'netdata', 'rev',  'cog', 'exp', 'grossp', 'netinc', 'cust', 'prevsumrdata', 'prevsumcdata', 'prevgross', 'prevsumedata', 'prevnetdata', 'pstdue'));
    //         }
    //     } elseif (session()->has('userloginid') && session::get('userrole') == 'Sales Employee') {
    //         $data = Upload::select('file')->get()->toArray();
    //         return view('sales-training', compact('data'));
    //     } else {
    //         return view('user-login');
    //     }
    // }
    public function userlogin()
    {
        if (session()->has('userloginid') && (session::get('userrole') == 'Manager' || session::get('userrole') == 'Director' || session::get('userrole') == 'Sales Manager')) {
            $cal = array("status" => '1');

            $location = DB::table('locations')
                ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
                ->where('permissions.allowed', 1)
                ->where("permissions.userid", Session::get('userloginid'))
                ->get()->toArray();
            if (!($location)) {
                Session::forget('userloginid');
                return view('404');
            } else {
                $locpermitted = Permission::select('locationid')->where('userid', Session::get('userloginid'))->where('allowed', 1)->orderBy('locationid', 'ASC')->limit(1)->get()->toArray();
                $defloc = DB::table('default_loc')->select('location')
                    ->where('userid', Session::get('userloginid'))->get()->toArray();
                if (!$defloc) {
                    $loc  = $locpermitted[0]['locationid'];
                } else {
                    $loc = $defloc[0]->location;
                }
                $prevdate = date("m-Y", strtotime("first day of previous month"));
                $prevyear = (explode("-", $prevdate));
                $shwgraph = DB::table('Showgraph')->where('status', '1')->get()->pluck('id')->toArray();
                $year = $prevyear[1];
                $previousyear = $year - 1;
                $previous = $prevyear[0] . "-" . $previousyear;
                for ($i = 12; $i >= 1; $i--) {
                    $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
                }

                $rev = [];
                $cog = [];
                $exp = [];
                $grossp = [];
                $netinc = [];
                $pstdue = [];
                // Data on submitting dates and location 
                $sumrdata = round(revenuedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                $sumcdata = round(Cogsdata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $esumm = expensedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $esum1 = expensedata1::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                $gross = round($sumrdata - $sumcdata, 0);
                $sumedata = round($esumm + $esum1, 0);
                $netdata = round($gross - $sumedata, 0);
                // Default Data 
                $sumrdata1 = round(revenuedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                $sumcdata1 = round(Cogsdata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $esumm1 = expensedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $esum2 = expensedata1::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                $gross1 = round($sumrdata1 - $sumcdata1, 0);
                $sumedata1 = round($esumm1 + $esum2, 0);
                $netdata = round($gross1 - $sumedata1, 0);

                // -------------------------------------PREVIOUS YEAR DATE DATA-------------------------------------
                $prevsumrdata = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                $prevsumcdata = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $prevesumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $prevesum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                $prevgross = round($prevsumrdata - $prevsumcdata, 0);
                $prevsumedata = round($prevesumm + $prevesum1, 0);
                $prevnetdata = round($prevgross - $prevsumedata, 0);

                if (!empty($months)) {
                    foreach ($months as $key => $value) {
                        $sumrevenuedata = round(revenuedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                        $cogsum = round(Cogsdata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                        $pastdueacc = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff ')), 2);
                        $expsumm = expensedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                        $expsum1 = expensedata1::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                        $custdata = customer::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('Customers'));

                        $grossprofitt = round($sumrevenuedata - $cogsum, 0);
                        $exptotalsum = round($expsumm + $expsum1, 0);
                        $netincomee = round($grossprofitt - $exptotalsum, 0);

                        $rev[$key][$value] = $sumrevenuedata;
                        $cog[$key][$value] = $cogsum;
                        $exp[$key][$value] = $exptotalsum;
                        $grossp[$key][$value] = $grossprofitt;
                        $netinc[$key][$value] = $netincomee;
                        $cust[$key][$value] = $custdata;
                        $pstdue[$key][$value] = $pastdueacc;
                    }
                }
                // Find the maximum Net Income, its corresponding month and year, and the location
                $maxNetIncome = null;
                $maxMonthYear = null;
                $maxLocation = null;

                foreach ($netinc as $locat => $monthData) {
                    foreach ($monthData as $monthYear => $netIncome) {
                        if ($maxNetIncome === null || $netIncome > $maxNetIncome) {
                            $maxNetIncome = $netIncome;
                            $maxMonthYear = $monthYear;
                        }
                    }
                }
                $graphdata = [
                    'maxinc' => number_format($maxNetIncome, 2),
                    'date' => $maxMonthYear,
                    'loc' => $loc,
                ];

                $maxNetIncomeCust = null;
                $maxMonthYearCust = null;

                foreach ($cust as $locat => $monthData) {
                    foreach ($monthData as $monthYear => $custData) {
                        if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                            $maxNetIncomeCust = $custData;
                            $maxMonthYearCust = $monthYear;
                        }
                    }
                }

                $graphdata2 = [
                    'maxinc' => number_format($maxNetIncomeCust, 2),
                    'date' => $maxMonthYearCust,
                    'loc' => $loc,
                ];

                $maxNetIncomeCust = null;
                $maxMonthYearCust = null;

                foreach ($rev as $locat => $monthData) {
                    foreach ($monthData as $monthYear => $custData) {
                        if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                            $maxNetIncomeCust = $custData;
                            $maxMonthYearCust = $monthYear;
                        }
                    }
                }

                $graphdata3 = [
                    'maxinc' => number_format($maxNetIncomeCust, 2),
                    'date' => $maxMonthYearCust,
                    'loc' => $loc,
                ];

                $maxNetIncomeCust = null;
                $maxMonthYearCust = null;

                foreach ($cog as $locat => $monthData) {
                    foreach ($monthData as $monthYear => $custData) {
                        if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                            $maxNetIncomeCust = $custData;
                            $maxMonthYearCust = $monthYear;
                        }
                    }
                }

                $graphdata4 = [
                    'maxinc' => number_format($maxNetIncomeCust, 2),
                    'date' => $maxMonthYearCust,
                    'loc' => $loc,
                ];

                $maxNetIncomeCust = null;
                $maxMonthYearCust = null;

                foreach ($grossp as $locat => $monthData) {
                    foreach ($monthData as $monthYear => $custData) {
                        if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                            $maxNetIncomeCust = $custData;
                            $maxMonthYearCust = $monthYear;
                        }
                    }
                }

                $graphdata5 = [
                    'maxinc' => number_format($maxNetIncomeCust, 2),
                    'date' => $maxMonthYearCust,
                    'loc' => $loc,
                ];

                $maxNetIncomeCust = null;
                $maxMonthYearCust = null;

                foreach ($pstdue as $locat => $monthData) {
                    foreach ($monthData as $monthYear => $custData) {
                        if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                            $maxNetIncomeCust = $custData;
                            $maxMonthYearCust = $monthYear;
                        }
                    }
                }

                $graphdata6 = [
                    'maxinc' => number_format($maxNetIncomeCust, 2),
                    'date' => $maxMonthYearCust,
                    'loc' => $loc,
                ];
                // echo "<pre>";
                // print_r($graphdata);
                // print_r($graphdata2);
                // print_r($graphdata3);
                // print_r($graphdata4);
                // print_r($graphdata5);
                // die;
                return view('master', compact('year', 'previousyear', 'loc', 'location', 'shwgraph', 'prevdate', 'cal', 'sumrdata1', 'sumcdata1', 'sumedata1', 'gross1', 'netdata', 'rev',  'cog', 'exp', 'grossp', 'netinc', 'cust', 'prevsumrdata', 'prevsumcdata', 'prevgross', 'prevsumedata', 'prevnetdata', 'pstdue', 'graphdata', 'graphdata2', 'graphdata3', 'graphdata4', 'graphdata5', 'graphdata6'));
            }
        } elseif (session()->has('userloginid') && session::get('userrole') == 'Sales Employee') {
            $data = Upload::select('file')->get()->toArray();
            return view('sales-training', compact('data'));
        } else {
            return view('user-login');
        }
    }
    public function userdashboard(Request $request)
    {
        // echo "ghelooo";
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $details = SiteUsers::select('*')->where('email', $request->input('name'))->get()->toArray();
        // print_r($details);
        if (!empty($details)) {
            if (md5($request->input('password')) == $details[0]['password']) {
                Session::put('userloginid', $details[0]['id']);
                Session::put('userrole', $details[0]['role']);
                if (($details[0]['role'] == "Manager") || ($details[0]['role'] == "Director") || ($details[0]['role']  == 'Sales Manager')) {
                    SiteUsers::where('id', Session::get('userloginid'))->update(['signedin' => '1']);
                    SiteUsers::where('id', Session::get('userloginid'))->increment('totalvisits', 1);
                    $fetch_id = base64_decode(Session::get('userloginid'));
                    $location = DB::table('locations')
                        ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
                        ->where('permissions.allowed', 1)
                        ->where("permissions.userid", Session::get('userloginid'))
                        ->get()->toArray();
                    if (!($location)) {
                        Session::forget('userloginid');
                        // return view('404');
                        return back()->with('error', 'Please assign locations to the user!');
                    } else {
                        $locpermitted = Permission::select('locationid')->where('userid', Session::get('userloginid'))->where('allowed', 1)->orderBy('locationid', 'ASC')->limit(1)->get()->toArray();
                        $defloc = DB::table('default_loc')->select('location')
                            ->where('userid', Session::get('userloginid'))->get()->toArray();
                        if (!$defloc) {
                            $loc  = $locpermitted[0]['locationid'];
                        } else {
                            $loc = $defloc[0]->location;
                        }
                        // print_r($loc);
                        $prevdate = date("m-Y", strtotime("first day of previous month"));
                        $prevyear = (explode("-", $prevdate));
                        $shwgraph = DB::table('Showgraph')->where('status', '1')->get()->pluck('id')->toArray();
                        $year = $prevyear[1];
                        $previousyear = $year - 1;
                        $previous = $prevyear[0] . "-" . $previousyear;

                        //    print_r($previous);die;
                        for ($i = 12; $i >= 1; $i--) {
                            $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
                        }

                        $rev = [];
                        $cog = [];
                        $exp = [];
                        $grossp = [];
                        $netinc = [];
                        $pstdue = [];
                        $sumrdata1 = round(revenuedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                        $sumcdata1 = round(Cogsdata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                        $esumm1 = expensedata::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                        $esum2 = expensedata1::where('Date', '=', $prevdate)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                        $gross1 = round($sumrdata1 - $sumcdata1, 0);
                        $sumedata1 = round($esumm1 + $esum2, 0);
                        $netdata = round($gross1 - $sumedata1, 0);
                        $cal = array("status" => '1');
                        // -------------------------------------PREVIOUS YEAR DATE DATA-------------------------------------
                        $prevsumrdata = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                        $prevsumcdata = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                        $prevesumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                        $prevesum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                        $prevgross = round($prevsumrdata - $prevsumcdata, 0);
                        $prevsumedata = round($prevesumm + $prevesum1, 0);
                        $prevnetdata = round($prevgross - $prevsumedata, 0);

                        if (!empty($months)) {
                            foreach ($months as $key => $value) {

                                $sumrevenuedata = round(revenuedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                                $cogsum = round(Cogsdata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                                $pastdueacc = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff ')), 2);
                                $expsumm = expensedata::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                                $expsum1 = expensedata1::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                                $custdata = customer::where('Date', '=', $value)->where('Location', '=', $loc)->sum(DB::raw('Customers'));

                                $grossprofitt = round($sumrevenuedata - $cogsum, 0);
                                $exptotalsum = round($expsumm + $expsum1, 0);
                                $netincomee = round($grossprofitt - $exptotalsum, 0);

                                $rev[$key][$value] = $sumrevenuedata;
                                $cog[$key][$value] = $cogsum;
                                $exp[$key][$value] = $exptotalsum;
                                $grossp[$key][$value] = $grossprofitt;
                                $netinc[$key][$value] = $netincomee;
                                $cust[$key][$value] = $custdata;
                                $pstdue[$key][$value] = $pastdueacc;
                            }
                        }

                        if (Session::has('userloginid')) {
                            return view('master', compact('year', 'previousyear', 'shwgraph', 'loc', 'location', 'pstdue', 'cal', 'prevdate', 'sumrdata1', 'sumcdata1', 'sumedata1', 'gross1', 'netdata', 'rev',  'cog', 'exp', 'grossp', 'netinc', 'months', 'custdata', 'sumrevenuedata', 'cust', 'prevsumrdata', 'prevsumcdata', 'prevgross', 'prevsumedata', 'prevnetdata'));
                        } else {
                            return redirect('/');
                        }
                    }
                } elseif ($details[0]['role'] == 'Sales Employee') {
                    // Session::put('userloginid', $details[0]['id']);
                    $data = Upload::select('file')->get()->toArray();
                    return view('sales-training', compact('data'));
                } else {
                    return back()->with('error', 'Wrong Login Credentials!');
                }
            } else {
                return back()->with('error', "Wrong Password");
            }
        } else {
            return back()->with('error', "Email doesn't exist!");
        }
    }
    public function userlogout()
    {
        Session::forget('userloginid');
        return redirect('/');
    }
    public function changepswrd($id)
    {
        $data = SiteUsers::find(base64_decode($id));
        if (Session::has('userloginid')) {
            return view('changepswrd', compact('data'));
        } else {
            return redirect('/');
        }
    }
    public function updatepassword(Request $request, $id)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'password_confirmation' => 'required_with:newpassword|same:newpassword',
        ]);
        $data = SiteUsers::find(base64_decode($id));
        $password = $data->password;

        if (md5($request->oldpassword) ==  $password) {
            $data->password = md5($request->newpassword);
            $data->update();
            return back()->with('success', 'Password Updated Successfully!');
        } else {
            return back()->with('error', "Old password doesn't match");
        }
    }
    public function forgetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $old = ini_set('memory_limit', '8192M');

        $user = new  Loginuser;
        $email = $request->input('email');

        $user1 = DB::table('siteusers')
            ->where('email', $email)->first();
        if ($user1) {
            $encoded_email = base64_encode($email);
            if ($email) {
                $link = "http://rentalconcepts.net/createpassword/" . $encoded_email;
                $body = "
                                <html>
                                    <body>
                                        <p>Click here to change password:</p>
                                        <a href='" . $link . "'>Click here</a><br><br> 
                                        <p>Thank you</p>
                                    </body>
                                </html>
                            ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <rentalconcepts.net>' . "\r\n";
                $to =  $email;

                $subject = "Change Password";
                $message = 'Rental concepts site';
                $sent = mail($to, $subject, $body, $headers);
                return redirect('/forgetemail')->with('message', 'Please check your email to change the password.');
            } else {
                echo "Mail not sent";
            }
        } else {
            return redirect('/forgetemail')->with('info', 'Email does not exist');
        }
    }
    public function calculation(Request $request)
    {
        // echo "<pre>";
        // print_r($_REQUEST);
        // die;
        $data = $request->all();
        $date = $data['date'];
        $loc = $data['location'];
        $prevyear = (explode("-", $date));
        $year = $prevyear[1];
        $previousyear = $year - 1;
        $previous = $prevyear[0] . "-" . $previousyear;
        for ($i = 12; $i >= 1; $i--) {
            $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
        }

        $rev = [];
        $cog = [];
        $exp = [];
        $grossp = [];
        $netinc = [];
        $pstdue = [];

        $prevdate = date("m-Y", strtotime("first day of previous month"));
        $location = DB::table('locations')
            ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
            ->where('permissions.allowed', 1)
            ->where("permissions.userid", Session::get('userloginid'))
            ->get()->toArray();
        $cal = array("status" => '0');
        $shwgraph = DB::table('Showgraph')->where('status', '1')->get()->pluck('id')->toArray();
        // --------------------------------------SELECTED DATE DATA-------------------------------------
        $sumrdata = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
        $sumcdata = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
        $esumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
        $esum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
        $gross = round($sumrdata - $sumcdata, 0);
        $sumedata = round($esumm + $esum1, 0);
        $netdata = round($gross - $sumedata, 0);

        // -------------------------------------PREVIOUS YEAR DATE DATA-------------------------------------
        $prevsumrdata1 = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
        $prevsumcdata1 = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
        $prevesumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
        $prevesum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
        $prevgross1 = round($prevsumrdata1 - $prevsumcdata1, 0);
        $prevsumedata1 = round($prevesumm + $prevesum1, 0);
        $prevnetdata1 = round($prevgross1 - $prevsumedata1, 0);

        if (!empty($months)) {
            foreach ($months as $key => $value) {
                $sumrevenuedata = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                $cogsum = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $pastdueacc = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff ')), 2);
                $expsumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $expsum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                $custdata = customer::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('Customers'));
                $grossprofitt = round($sumrevenuedata - $cogsum, 0);
                $exptotalsum = round($expsumm + $expsum1, 0);
                $netincomee = round($grossprofitt - $exptotalsum, 0);

                $rev[$key][$value] = $sumrevenuedata;
                $cog[$key][$value] = $cogsum;
                $exp[$key][$value] = $exptotalsum;
                $grossp[$key][$value] = $grossprofitt;
                $netinc[$key][$value] = $netincomee;
                $cust[$key][$value] = $custdata;
                $pstdue[$key][$value] = $pastdueacc;
            }
        }
        $maxNetIncome = null;
        $maxMonthYear = null;
        $maxLocation = null;

        foreach ($netinc as $locat => $monthData) {
            foreach ($monthData as $monthYear => $netIncome) {
                if ($maxNetIncome === null || $netIncome > $maxNetIncome) {
                    $maxNetIncome = $netIncome;
                    $maxMonthYear = $monthYear;
                }
            }
        }
        $graphdata = [
            'maxinc' => number_format($maxNetIncome, 2),
            'date' => $maxMonthYear,
            'loc' => $loc,
        ];

        $maxNetIncomeCust = null;
        $maxMonthYearCust = null;

        foreach ($cust as $locat => $monthData) {
            foreach ($monthData as $monthYear => $custData) {
                if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                    $maxNetIncomeCust = $custData;
                    $maxMonthYearCust = $monthYear;
                }
            }
        }

        $graphdata2 = [
            'maxinc' => number_format($maxNetIncomeCust, 2),
            'date' => $maxMonthYearCust,
            'loc' => $loc,
        ];

        $maxNetIncomeCust = null;
        $maxMonthYearCust = null;

        foreach ($rev as $locat => $monthData) {
            foreach ($monthData as $monthYear => $custData) {
                if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                    $maxNetIncomeCust = $custData;
                    $maxMonthYearCust = $monthYear;
                }
            }
        }

        $graphdata3 = [
            'maxinc' => number_format($maxNetIncomeCust, 2),
            'date' => $maxMonthYearCust,
            'loc' => $loc,
        ];

        $maxNetIncomeCust = null;
        $maxMonthYearCust = null;

        foreach ($cog as $locat => $monthData) {
            foreach ($monthData as $monthYear => $custData) {
                if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                    $maxNetIncomeCust = $custData;
                    $maxMonthYearCust = $monthYear;
                }
            }
        }

        $graphdata4 = [
            'maxinc' => number_format($maxNetIncomeCust, 2),
            'date' => $maxMonthYearCust,
            'loc' => $loc,
        ];

        $maxNetIncomeCust = null;
        $maxMonthYearCust = null;

        foreach ($grossp as $locat => $monthData) {
            foreach ($monthData as $monthYear => $custData) {
                if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                    $maxNetIncomeCust = $custData;
                    $maxMonthYearCust = $monthYear;
                }
            }
        }

        $graphdata5 = [
            'maxinc' => number_format($maxNetIncomeCust, 2),
            'date' => $maxMonthYearCust,
            'loc' => $loc,
        ];

        $maxNetIncomeCust = null;
        $maxMonthYearCust = null;

        foreach ($pstdue as $locat => $monthData) {
            foreach ($monthData as $monthYear => $custData) {
                if ($maxNetIncomeCust === null || $custData > $maxNetIncomeCust) {
                    $maxNetIncomeCust = $custData;
                    $maxMonthYearCust = $monthYear;
                }
            }
        }

        $graphdata6 = [
            'maxinc' => number_format($maxNetIncomeCust, 2),
            'date' => $maxMonthYearCust,
            'loc' => $loc,
        ];
        return view('master', compact('year', 'prevdate', 'previousyear', 'shwgraph', 'location', 'loc', 'rev', 'date', 'cog', 'exp', 'grossp', 'cal', 'netinc', 'cust',  'prevdate', 'months', 'sumrdata', 'sumcdata', 'sumedata', 'netdata', 'gross', 'prevsumrdata1', 'prevsumcdata1', 'prevgross1', 'prevsumedata1', 'prevnetdata1', 'pstdue', 'graphdata', 'graphdata2', 'graphdata3', 'graphdata4', 'graphdata5', 'graphdata6'));
    }
    public function error()
    {
        return view('404');
    }
    public function viewdirectorydata()
    {
        if (Session::has('userloginid')) {
            $datas =  Directory::all();
            return view('viewdirectorydata', compact('datas'));
        } else {
            return redirect('/');
        }
    }
    public function ytdcalculation(Request $request)
    {
        // echo "<pre>";
        // print_r($_REQUEST);
        // die;
        $d = $request->all();
        $prevyear = (explode("-", $d['date']));
        $loc = $d['location'];
        $year = $prevyear[1];
        $previousyear = $year - 1;
        $previous = $prevyear[0] . "-" . $previousyear;

        for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $previousdates = sprintf('%02d', $m) . '-' . $prevyear[1];
            $pyear = sprintf('%02d', $m) . '-' . $previousyear;

            $revenue[] = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $previousdates]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
            $cog[] = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $previousdates]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
            $esumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $previousdates]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
            $esum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $previousdates]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
            $gross = array_diff($revenue, $cog);
            $sumedata[] = round($esumm + $esum1, 0);
            $netdata = array_diff($gross, $sumedata);
            // ----------------------------------------------Previous year-------------------------
            $revenue1[] = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $pyear]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
            $cog1[] = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $pyear]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
            $esumm2 = expensedata::where([['Location', '=', $loc], ['Date', '=', $pyear]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
            $esum3 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $pyear]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
            $gross1 = array_diff($revenue1, $cog1);
            $sumedata1[] = round($esumm2 + $esum3, 0);
            $netdata1 = array_diff($gross1, $sumedata1);
        }

        $retgros = array();
        $retnet = array();
        $retgros1 = array();
        $retnet1 = array();

        foreach ($revenue as $key => $value) {
            $retgros[$key] = $revenue[$key] - $cog[$key];
        }

        foreach ($netdata as $key => $value) {
            $retnet[$key] = $retgros[$key] - $sumedata[$key];
        }
        foreach ($revenue1 as $key => $value) {
            $retgros1[$key] = $revenue1[$key] - $cog1[$key];
        }
        foreach ($netdata1 as $key => $value) {
            $retnet1[$key] = $retgros1[$key] - $sumedata1[$key];
        }

        $rev = array_sum($revenue);
        $cogs = array_sum($cog);
        $grosspr = array_sum($retgros);
        $expense = array_sum($sumedata);
        $netinc = array_sum($retnet);
        // -----------------------------------Previous years
        $rev1 = array_sum($revenue1);
        $cogs1 = array_sum($cog1);
        $grosspr1 = array_sum($retgros1);
        $expense1 = array_sum($sumedata1);
        $netinc1 = array_sum($retnet1);
        //----------------------------------------$ change
        $rchange = $rev - $rev1;
        $cogchange = $cogs - $cogs1;
        $grosschange = $grosspr - $grosspr1;
        $expchange = $expense - $expense1;
        $netchange = $netinc - $netinc1;
        // --------------------------------------%cHANGE
        $rperchange = round(($rev - $rev1) / $rev * 100, 2);
        $cogperchange = round(($cogs - $cogs1) / $cogs * 100, 2);
        $grossperchange = round(($grosspr - $grosspr1) / $grosspr * 100, 2);
        $expperchange = round(($expense - $expense1) / $expense * 100, 2);
        $netperchange = round(($netinc - $netinc1) / $netinc * 100, 2);
        // --------------------------------------Response
        $percentage = array($rperchange, $cogperchange, $grossperchange, $expperchange, $netperchange);
        $change = array($rchange, $cogchange, $grosschange, $expchange, $netchange);
        $ytddata = array($rev, $cogs, $grosspr, $expense, $netinc);
        $ytddata1 = array($rev1, $cogs1, $grosspr1, $expense1, $netinc1);
        $ytd = array('currentyear' => $ytddata, 'prevyear' => $ytddata1, 'Change' => $change, 'percentage' => $percentage);
        return json_encode($ytd);
    }
    public function calculation_highlight(Request $request)
    {
        // echo "<pre>";
        // print_r($_REQUEST);
        // die;
        $data = $request->all();
        $date = $data['date'];
        $loc = $data['location'];
        $prevyear = (explode("-", $date));
        $year = $prevyear[1];
        $previousyear = $year - 1;
        $previous = $prevyear[0] . "-" . $previousyear;
        for ($i = 12; $i >= 1; $i--) {
            $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
        }

        $rev = [];
        $cog = [];
        $exp = [];
        $grossp = [];
        $netinc = [];
        $pstdue = [];

        $prevdate = date("m-Y", strtotime("first day of previous month"));
        $location = DB::table('locations')
            ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
            ->where('permissions.allowed', 1)
            ->where("permissions.userid", Session::get('userloginid'))
            ->get()->toArray();
        $cal = array("status" => '0');
        $shwgraph = DB::table('Showgraph')->where('status', '1')->get()->pluck('id')->toArray();
        // --------------------------------------SELECTED DATE DATA-------------------------------------
        $sumrdata = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
        $sumcdata = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
        $esumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
        $esum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $date]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
        $gross = round($sumrdata - $sumcdata, 0);
        $sumedata = round($esumm + $esum1, 0);
        $netdata = round($gross - $sumedata, 0);

        // -------------------------------------PREVIOUS YEAR DATE DATA-------------------------------------
        $prevsumrdata1 = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
        $prevsumcdata1 = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
        $prevesumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
        $prevesum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $previous]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
        $prevgross1 = round($prevsumrdata1 - $prevsumcdata1, 0);
        $prevsumedata1 = round($prevesumm + $prevesum1, 0);
        $prevnetdata1 = round($prevgross1 - $prevsumedata1, 0);

        if (!empty($months)) {
            foreach ($months as $key => $value) {
                $sumrevenuedata = round(revenuedata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks + ManagementFee + SubfranchiseeRoyaltyIncome')), 0);
                $cogsum = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $pastdueacc = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff ')), 2);
                $expsumm = expensedata::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $expsum1 = expensedata1::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                $custdata = customer::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw('Customers'));
                $grossprofitt = round($sumrevenuedata - $cogsum, 0);
                $exptotalsum = round($expsumm + $expsum1, 0);
                $netincomee = round($grossprofitt - $exptotalsum, 0);

                $rev[$key][$value] = $sumrevenuedata;
                $cog[$key][$value] = $cogsum;
                $exp[$key][$value] = $exptotalsum;
                $grossp[$key][$value] = $grossprofitt;
                $netinc[$key][$value] = $netincomee;
                $cust[$key][$value] = $custdata;
                $pstdue[$key][$value] = $pastdueacc;
            }
        }
        $maxNetIncome = null;
        $maxMonthYear = null;
        $maxLocation = null;

        foreach ($netinc as $locat => $monthData) {
            foreach ($monthData as $monthYear => $netIncome) {
                if ($maxNetIncome === null || $netIncome > $maxNetIncome) {
                    $maxNetIncome = $netIncome;
                    $maxMonthYear = $monthYear;
                }
            }
        }
        $graphdata = [
            'maxinc' => number_format($maxNetIncome, 2),
            'date' => $maxMonthYear,
            'loc' => $loc,
        ];
        return view('highlight', compact('year', 'prevdate', 'previousyear', 'shwgraph', 'location', 'loc', 'rev', 'date', 'cog', 'exp', 'grossp', 'cal', 'netinc', 'cust',  'prevdate', 'months', 'sumrdata', 'sumcdata', 'sumedata', 'netdata', 'gross', 'prevsumrdata1', 'prevsumcdata1', 'prevgross1', 'prevsumedata1', 'prevnetdata1', 'pstdue', 'graphdata'));
    }
}
