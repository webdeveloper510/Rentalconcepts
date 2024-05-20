<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Models\Expect;
use App\Models\Location;
use App\Models\Cogsdata;
use App\Models\revenuedata;
use App\Models\SiteUsers;
use App\Models\expensedata;
use App\Models\expensedata1;
use App\Models\Permission;

class ExpectController extends Controller
{
    public function index()
    {
        $result_array = [];
        $data = Expect::all();
        $loc = Location::select('*')->get()->toArray();
        $location = Location::all();
        $userdata = SiteUsers::where('role', '!=', 'Super admin')->get();         
        $prev = date("m-Y", strtotime("-1 month"));
        $lstprev = date("m-Y", strtotime("-2 month"));
        $calculated_data =  DB::table('locations')
            ->join('deliveries', 'deliveries.location', '=', 'locations.locationid')
            ->join('Customer', 'Customer.Location', '=', 'locations.locationid')
            ->join('Revenue', 'Revenue.Location', '=', 'locations.locationid')
            ->join('Cogsdata', 'Cogsdata.Location', '=', 'locations.locationid')
            ->select('deliveries.*', 'locations.location', 'locations.locationid', 'Customer.Customers', 'Revenue.RentalIncome', 'Cogsdata.pastdueaccountchargeoff')
            ->where('deliveries.date', $prev)
            ->where('Customer.Date', $prev)
            ->where('Revenue.Date', $prev)
            ->where('Cogsdata.Date', $prev)
            ->whereBetween('locations.location', ['2401', '2430'])
            ->get()->toArray();
        if (!$calculated_data) {
            $calculated_data =  DB::table('locations')
                ->join('deliveries', 'deliveries.location', '=', 'locations.locationid')
                ->join('Customer', 'Customer.Location', '=', 'locations.locationid')
                ->join('Revenue', 'Revenue.Location', '=', 'locations.locationid')
                ->join('Cogsdata', 'Cogsdata.Location', '=', 'locations.locationid')
                ->select('deliveries.*', 'locations.location', 'locations.locationid', 'Customer.Customers', 'Revenue.RentalIncome', 'Cogsdata.pastdueaccountchargeoff')
                ->where('deliveries.date', $lstprev)
                ->where('Customer.Date', $lstprev)
                ->where('Revenue.Date', $lstprev)
                ->where('Cogsdata.Date', $lstprev)
                ->whereBetween('locations.locationid', ['2401', '2430'])
                ->get()->toArray();
        }
        $exp_data = Expect::select('*')->get()->toArray();
        for ($i = 12; $i >= 1; $i--) {
            $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
        }
        for ($i = 0; $i < count($loc); $i++) {
            $loca[] = $loc[$i]['locationid'];
            $rev[] = round(revenuedata::where('Location', '=', $loc[$i]['locationid'])
                ->where('Date', $prev)
                ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks')), 1);
            $cog[] = round(Cogsdata::where([['Location', '=',  $loc[$i]['locationid']], ['Date', '=', $prev]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
            $pastdue[] = round(Cogsdata::where([['Location', '=', $loc[$i]['locationid']], ['Date', '=', $prev]])->sum(DB::raw('pastdueaccountchargeoff')), 2);
            $exp1 = expensedata::where([['Location', '=',  $loc[$i]['locationid']], ['Date', '=', $prev]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
            $exp2 = expensedata1::where([['Location', '=',  $loc[$i]['locationid']], ['Date', '=', $prev]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
            $sumexpdata[] = round($exp1 + $exp2, 0);
        }
        $retgros = array();
        $retnet = array();
        $retgros1 = array();
        $retnet1 = array();

        foreach ($rev as $key => $value) {
            $retgros[$key] = $rev[$key] - $cog[$key];
        }
        foreach ($rev as $key => $value) {
            $retnet[$key] = $retgros[$key] - $sumexpdata[$key];
        }
        $ytdinc = array_combine($loca, $rev);
        $ytdnetinc = array_combine($loca, $retnet);
        $array_new = array();
        foreach ($calculated_data as $key => $locvalue) {
            foreach ($ytdnetinc as $ytdnetkey => $ytdnetval) {
                if ($locvalue->locationid == $ytdnetkey) {
                    $calculated_data[$key]->ytdnetinc = $ytdnetval;
                }
            }
            foreach ($ytdinc as $ytdkey => $ytdval) {
                if ($locvalue->locationid == $ytdkey) {
                    $calculated_data[$key]->ytdinc = $ytdval;
                }
            }
            $flag = false;
            foreach ($exp_data as $expkey => $expval) {
                if (!in_array($expval['location'], $array_new)) {
                    if ($locvalue->locationid == $expval['location']) {
                        $calculated_data[$key]->exp_del = $expval['deliveries'];
                        $calculated_data[$key]->exp_cust = $expval['Customers'];
                        $calculated_data[$key]->exp_coll = $expval['Collected'];
                        $calculated_data[$key]->exp_pastdue = $expval['pastdue'];
                        $calculated_data[$key]->exp_netin = $expval['netincome'];
                        $flag = true;
                    }
                }
            }
            if (!$flag) {
                $calculated_data[$key]->exp_del = '';
                $calculated_data[$key]->exp_cust = '';
                $calculated_data[$key]->exp_coll = '';
                $calculated_data[$key]->exp_pastdue = '';
                $calculated_data[$key]->exp_netin = '';
            }
        }

        return view('expectation', compact('data', 'loc', 'calculated_data','userdata','location'));
    }

    public function insertdata(Request $request)
    {
        $loc = $request['location'];
        $del = $request['deliveries'];
        $cust = $request['Customers'];
        $coll = $request['collected'];
        $pastdue = $request['pastdue'];
        $netinc = $request['netincome'];
        $expected_data = Expect::select('*')->where('location', $request['location'])->get()->toArray();
        if (!$expected_data) {
            $expect = new Expect;
            $expect->location = $request['location'];
            $expect->deliveries = $del;
            $expect->Customers = $cust;
            $expect->Collected = $coll;
            $expect->pastdue = $pastdue;
            $expect->netincome = $netinc;
            $save = $expect->save();

            if ($save) {
                $ar = [
                    'del' => $del,
                    'cust' => $cust,
                    'coll' => $coll,
                    'pastdue' => $pastdue,
                    'netinc' => $netinc,

                ];
                return json_encode($ar);
            }
        } else {
            // print_r('hy');
            $upd = Expect::where('location', '=', $request['location'])->update([
                'deliveries' => $request['deliveries'],
                'Customers' => $request['Customers'],
                'Collected' => $request['collected'],
                'pastdue' => $request['pastdue'],
                'netincome' => $request['netincome'],
            ]);

            if ($upd) {
                $ar = [
                    'del' => $del,
                    'cust' => $cust,
                    'coll' => $coll,
                    'pastdue' => $pastdue,
                    'netinc' => $netinc,

                ];
                return json_encode($ar);
            }
        }
    }
    public function deletedata($id)
    {
        $expect = Expect::find($id);
        $expect->delete();
        return redirect('/admin/expectations');
    }
    public function view_exp()
    {
        $location = DB::table('locations')
            ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
            ->where('permissions.allowed', 1)
            ->where("permissions.userid", Session::get('userloginid'))
            ->get()->toArray();
        $prevv = date("m-Y", strtotime("first day of previous month"));
        $prev = date("m-Y", strtotime("-1 month"));
        $lstprev = date("m-Y", strtotime("-2 month"));
        $locpermitted = Permission::select('locationid')->where('userid', Session::get('userloginid'))->where('allowed', 1)->orderBy('locationid', 'ASC')->limit(1)->get()->toArray();
        $defloc = DB::table('default_loc')->select('location')
            ->where('userid', Session::get('userloginid'))->get()->toArray();
        $p = explode('-', $prevv);
        $prevformat = $p[1] . '-' . $p[0];
        if (!$defloc) {
            $loc  = $locpermitted[0]['locationid'];
        } else {
            $loc = $defloc[0]->location;
        }

        for ($x = 0; $x < 12; $x++) {
            $ym[] = date('m-Y', strtotime($prevformat . " -$x month"));
        }

        foreach ($ym as $key => $val) {
            $calculated_data =  DB::table('locations')
                ->join('deliveries', 'deliveries.location', '=', 'locations.locationid')
                ->join('Customer', 'Customer.Location', '=', 'locations.locationid')
                ->join('Revenue', 'Revenue.Location', '=', 'locations.locationid')
                ->join('Cogsdata', 'Cogsdata.Location', '=', 'locations.locationid')
                ->select('deliveries.*', 'locations.location', 'locations.locationid', 'Customer.Customers', 'Revenue.RentalIncome', 'Cogsdata.pastdueaccountchargeoff')
                ->where('deliveries.date', $val)
                ->where('Customer.Date', $val)
                ->where('Revenue.Date', $val)
                ->where('Cogsdata.Date', $val)
                ->where('locations.locationid', $loc)
                ->get()->toArray();
                $exp_data = Expect::select('*')->where('location', $loc)->get()->toArray();

                $rev = round(revenuedata::where('Location', '=', $loc)
                    ->where('Date', $prev)
                    ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory +EarlyPurchaseOption +RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks')), 1);
                $cog = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $prev]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $pastdue = round(Cogsdata::where([['Location', '=', $loc], ['Date', '=', $prev]])->sum(DB::raw('pastdueaccountchargeoff')), 2);
                $exp1 = expensedata::where([['Location', '=', $loc], ['Date', '=', $prev]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $exp2 = expensedata1::where([['Location', '=',  $loc], ['Date', '=', $prev]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));        
            if (!empty($calculated_data)) {
                break;
            }
        }

        // if (empty($calculated_data)) {
        // echo"hyyyyyyyyyyyy";
        // print_r($calculated_data);
        // }die;
        $gross1 = round($rev - $cog, 0);
        $sumexpdata = round($exp1 + $exp2, 0);
        $netdata = round($gross1 - $sumexpdata, 0);
        // $array_new = array();
        foreach ($calculated_data as $key => $value) {
            $calculated_data[$key]->inc = $rev;
            $calculated_data[$key]->netinc = $netdata;
            $flag = false;
            foreach ($exp_data as $expkey => $expval) {
                // if (!in_array($expval['location'], $array_new)) {
                $calculated_data[$key]->exp_del = $expval['deliveries'];
                $calculated_data[$key]->exp_cust = $expval['Customers'];
                $calculated_data[$key]->exp_coll = $expval['Collected'];
                $calculated_data[$key]->exp_pastdue = $expval['pastdue'];
                $calculated_data[$key]->exp_netin = $expval['netincome'];
                $flag = true;
                // }
            }
            if (!$flag) {
                $calculated_data[$key]->exp_del = '-';
                $calculated_data[$key]->exp_cust = '-';
                $calculated_data[$key]->exp_coll = '-';
                $calculated_data[$key]->exp_pastdue = '-';
                $calculated_data[$key]->exp_netin = '-';
            }
        }
        return view('view_expect', compact('location', 'calculated_data', 'loc'));
    }
    public function get_exp(Request $request)
    {
        $location = DB::table('locations')
            ->join('permissions', 'permissions.locationid', '=', 'locations.locationid')
            ->where('permissions.allowed', 1)
            ->where("permissions.userid", Session::get('userloginid'))
            ->get()->toArray();


        $loc =  $request['location'];
        $prevv = date("m-Y", strtotime("first day of previous month"));
        $p = explode('-', $prevv);
        $prevformat = $p[1] . '-' . $p[0];

        for ($i = 0; $i <= 11; $i++) {
            $months[] = date('m-Y', strtotime($prevformat . " -$i month"));
        }
        $prev = date("m-Y", strtotime("-1 month"));

        if (!empty($months)) {
            foreach ($months as $key => $value) {

                $calculated_data =  DB::table('locations')
                    ->join('deliveries', 'deliveries.location', '=', 'locations.locationid')
                    ->join('Customer', 'Customer.Location', '=', 'locations.locationid')
                    ->join('Revenue', 'Revenue.Location', '=', 'locations.locationid')
                    ->join('Cogsdata', 'Cogsdata.Location', '=', 'locations.locationid')
                    ->select('deliveries.*', 'locations.location', 'locations.locationid', 'Customer.Customers', 'Revenue.RentalIncome', 'Cogsdata.pastdueaccountchargeoff')
                    ->where('deliveries.date', $value)
                    ->where('Customer.Date', $value)
                    ->where('Revenue.Date', $value)
                    ->where('Cogsdata.Date', $value)
                    ->where('locations.locationid', $request['location'])
                    ->get()->toArray();
                $rev = round(revenuedata::where('Location', '=', '2403')
                    ->where('Date', '03-2023')
                    ->sum(DB::raw('SalesTaxColl + RentalIncome + CashSales + CashSalesNoninventory + EarlyPurchaseOption + RollPro + CollectionFeeInHouse + ReinstatementFees + OtherFeesAlignments + OneTimeFees + NSFCheckFees + OtherMiscellaneousIncome + SalesTaxCollected + RollSafe + Chargebacks')), 1);
                $cog = round(Cogsdata::where([['Location', '=', $request['location']], ['Date', '=', $value]])->sum(DB::raw('depreciation_inventory + paidout_epocharge + cashsalechargeoffs + skipstolenchargeoffs + insurancechargeoffs + returneddamagednonrepairable + nonrepairablechargeoffs + otherchargeoff + pastdueaccountchargeoff + inventorycostadjustment + chargeoffexpenseother + clubremittance+ rentrefunds +partsinventoryrepair + laborinventoryrepair + inventoryrepairother')), 0);
                $pastdue = round(Cogsdata::where([['Location', '=', $request['location']], ['Date', '=', $value]])->sum(DB::raw('pastdueaccountchargeoff')), 2);
                $exp1 = expensedata::where([['Location', '=', $request['location']], ['Date', '=', $value]])->sum(DB::raw('RadioAdmin + TelevisionAdvertising + RadioTVProduction + PrintMedia + PrintProduction + PostageAdvertising + FreightAdvertising + NewspaperMagazineAdvertising + OtherPrint + TelephoneDirectories + MarqueeBillboards + CustomerReferrals+ WebsiteDevelopment +Sponsorships + InternetOnline+ AdvertisingandPromotionOther + SpecialEvents + Website + CashShortLong + VINSearchFees + InternalPostage + AdministrativeCollections + OtherSellingExpensesOther + SellingExpenseOther + BadChecks + NSFCheckFees + BankCardFees + BankServiceCharges + LateFees+GeneralAdminExpenseOther+LegalFees+AccountingFees+ConsultingFees+ProfessionalFeesOther+PropertyGeneralLiability+OfficersLife+InsuranceExpenseAdminOther+OfficeSupplies+Postage+Freight+GeneralSupplies+PostageFreightSuppliesOther+RentExpense+Utilities+PropertyInsurance+Security+PestControl+RepairMaintenancBuilding+RelocationExpenses+OccupancyExpenseOther+RepairsMaintenanceEquip+EquipmentRental+EquipmentExpenseOther+DepreciationExpenseFFE+AmortizationExpense+RepairMaintenanceVehicles+FuelOilVehicle+LeaseVehicle+VehicleInsurance+VehicleLicenses+VehicleExpenseOther+DepreciationExpense'));
                $exp2 = expensedata1::where([['Location', '=', $request['location']], ['Date', '=', $value]])->sum(DB::raw('CharitableContributions + CustomerSettlements + OtherOther	 + Softwarelicensefees + ComputerSupplies + ComputerMaintenanceRepair + TelephoneCommunications + ComputerInternetExpensesOther + MiscellaneousExpense + Salary + TotalHourly + Overtimehourly+ Holiday +Bonus + BonusReimbursementDue + SalariesWagesOther + MileageReimbursement + TravelExpense + MealsEntertainment + TravelEntertainmentOther + DuesDeductible + DuesNonDeductible + DuesSubscriptionsOther + FFCRATaxes + UnemploymentTaxes + FICAMatch + PayrollTaxesOther + RetirementBenefits + GroupHealthLifeInsurance + WorkerCompensation + InsuranceExpenseEmployeeOther + MedicalExpenses + EmployeeProcurement + DrugScreening + EmployeeMovingExpense + SeminarsEducation + EmployeeTraining + Uniforms + AwardsGifts +Banquet +SpecialEvents +LeasedEmployees +MovingExpenseAdministrative +OtherEmployeeExpenseOther + PayrollExpensesOther + FranchiseTax + PersonalProperty + RealEstate +SalesUseTax + WasteTiretax + MiscellaneousTax +BusinessLicensesPermits +FinesPenalties + RoyaltyFeesSherwood +RoyaltyFeesMabelvale +RoyaltyFeesConway +RoyaltyFeesFayetteville +RoyaltyFeesRogers + RoyaltyFeesDallas+RoyaltyFeesFtSmith +RoyaltyFeesAdmin +RoyaltyFeesOther +TaxLicensePermitExpenseOther+ OperationalOverhead '));
                if (!empty($calculated_data)) {
                    break;
                }
            }
        }
        $exp_data = Expect::select('*')->where('location', $request['location'])->get()->toArray();
        $gross1 = round($rev - $cog, 0);
        $sumexpdata = round($exp1 + $exp2, 0);
        $netdata = round($gross1 - $sumexpdata, 0);
        $array_new = array();
        foreach ($calculated_data as $key => $value) {
            $calculated_data[$key]->inc = $rev;
            $calculated_data[$key]->netinc = $netdata;
            $flag = false;
            foreach ($exp_data as $expkey => $expval) {
                if (!in_array($expval['location'], $array_new)) {
                    $calculated_data[$key]->exp_del = $expval['deliveries'];
                    $calculated_data[$key]->exp_cust = $expval['Customers'];
                    $calculated_data[$key]->exp_coll = $expval['Collected'];
                    $calculated_data[$key]->exp_pastdue = $expval['pastdue'];
                    $calculated_data[$key]->exp_netin = $expval['netincome'];
                    $flag = true;
                }
            }
            if (!$flag) {
                $calculated_data[$key]->exp_del = '-';
                $calculated_data[$key]->exp_cust = '-';
                $calculated_data[$key]->exp_coll = '-';
                $calculated_data[$key]->exp_pastdue = '-';
                $calculated_data[$key]->exp_netin = '-';
            }
        }
        return view('view_expect', compact('location', 'calculated_data', 'loc'));
    }
}
