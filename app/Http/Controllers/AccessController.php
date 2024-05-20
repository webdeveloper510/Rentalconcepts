<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\SiteUsers;
use Session;
use App\Models\Useraccess;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use App\Models\default_loc;
use App\Models\customer;
use App\Models\expensedata;
use App\Models\Permission;
use App\Models\expensedata1;
use App\Models\Company_access;
use LDAP\Result;

class AccessController extends Controller
{
    public function index()
    {
        if (Session::has('loginid')) {
            $title = ['Profit-Loss', 'Highlights', 'Ratios', 'Trends', 'Details', 'Expectations', 'Areas', 'Region', 'View-Directory', 'Company', 'Bonus'];
            $users = SiteUsers::where('role', 'Manager')->get();
            $checked = Useraccess::select('*')->get()->toArray();
            return view('page_access', compact('users', 'title', 'checked'));
        } else {
            return redirect('/admin');
        }
    }
    public function checked_users(Request $request)
    {
        // echo "HELLO";
        $inputData = $request->data;
        $id = $request->id;
        $decodedform = urldecode($inputData);
        parse_str($decodedform, $inputData);
        $usrdata = Useraccess::where('user_id', $id)->get()->toArray();
        if (!$usrdata) {
            Useraccess::insert([
                'user_id' => $id,
                'options' => json_encode($inputData['menuoptions'])
            ]);
        } else {
            if (empty($inputData['menuoptions'])) {
                Useraccess::where('user_id', $id)->update(['options' => '']);
            } else {
                Useraccess::where('user_id', $id)->update(['options' => json_encode($inputData['menuoptions'])]);
            }
        }
    }
    public function presentation_view()
    {
        if (Session::has('userloginid')) {
            $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
            //---------------------------CURRENT YEAR ----------------------------------
            $previousMonths = [];
            $currentDate = Carbon::now()->subMonth();
            while ($currentDate->year == Carbon::now()->year) {
                $previousMonths[] = $currentDate->format('m-Y');
                $currentDate->subMonth();
            }
            $sum = 0;
            $prev_date = array_reverse($previousMonths);
            for ($i = 0; $i < count($location); $i++) {
                for ($j = 0; $j < count($prev_date); $j++) {
                    $revenue1[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $prev_date[$j])->get()->toArray();
                    $cogs1[] =  Cogsdata::where('Location', '=', $location[$i]->locationid)->where('Date', $prev_date[$j])->get()->toArray();
                    $sumedata1[] = DB::table('expense')
                        ->join('expense1', 'expense.id', '=', 'expense1.exp_id')->where('expense.Location', '=', $location[$i]->locationid)
                        ->where('expense.Date', $prev_date[$j])->select('expense.*', 'expense1.*')->get()->toArray();
                }
            }
            $result = [];
            $rev = [];
            foreach ($revenue1 as $value) {
                foreach ($value as $val) {
                    if (isset($result[$val['Date']])) {
                        $result[$val['Date']] += ($val['RentalIncome'] + $val['CashSales'] + $val['CashSalesNoninventory'] + $val['EarlyPurchaseOption'] +  $val['RollPro']
                            + $val['CollectionFeeInHouse'] + $val['ReinstatementFees'] + $val['OtherFeesAlignments'] + $val['OneTimeFees'] + $val['NSFCheckFees'] + $val['OtherMiscellaneousIncome']
                            + $val['SalesTaxCollected'] + $val['RollSafe'] + $val['Chargebacks'] + $val['ManagementFee'] + $val['SubfranchiseeRoyaltyIncome']);
                    } else {

                        $result[$val['Date']] = ($val['RentalIncome'] + $val['CashSales'] + $val['CashSalesNoninventory'] + $val['EarlyPurchaseOption'] +
                            $val['RollPro'] + $val['CollectionFeeInHouse'] + $val['ReinstatementFees'] + $val['OtherFeesAlignments'] + $val['OneTimeFees'] + $val['NSFCheckFees'] + $val['OtherMiscellaneousIncome']
                            + $val['SalesTaxCollected'] + $val['RollSafe'] + $val['Chargebacks'] + $val['ManagementFee'] + $val['SubfranchiseeRoyaltyIncome']);
                    }
                }
            }
            $cog = [];
            foreach ($cogs1 as $value) {
                foreach ($value as $val) {
                    if (isset($cog[$val['Date']])) {
                        $cog[$val['Date']] += ($val['depreciation_inventory'] + $val['paidout_epocharge'] + $val['skipstolenchargeoffs'] +
                            $val['insurancechargeoffs'] + $val['returneddamagednonrepairable'] +  $val['otherchargeoff'] + $val['pastdueaccountchargeoff'] +
                            $val['inventorycostadjustment'] + $val['clubremittance'] + $val['rentrefunds'] + $val['chargeoffexpenseother'] + $val['partsinventoryrepair']);
                    } else {
                        $cog[$val['Date']] = ($val['depreciation_inventory'] + $val['paidout_epocharge'] + $val['skipstolenchargeoffs'] +
                            $val['insurancechargeoffs'] + $val['returneddamagednonrepairable'] + $val['otherchargeoff'] + $val['pastdueaccountchargeoff'] +
                            $val['inventorycostadjustment'] + $val['clubremittance'] + $val['rentrefunds'] + $val['chargeoffexpenseother'] + $val['partsinventoryrepair']);
                    }
                }
            }
            foreach ($result as $key => $value) {
                $grossp[$key] = $result[$key] - $cog[$key];
            }
            $expense = [];
            foreach ($sumedata1 as $value) {
                foreach ($value as $val) {
                    if (isset($expense[$val->Date])) {
                        $expense[$val->Date] += ($val->PartsInventoryRepair + $val->LaborInventoryRepair + $val->RadioAdmin + $val->PrintMedia + $val->Sponsorships + $val->InternetOnline + $val->SpecialEvents + $val->CashShortLong
                            + $val->BankCardFees + $val->BankServiceCharges + $val->BankChargesOther + $val->LegalFees + $val->AccountingFees + $val->ProfessionalFeesOther + $val->PropertyGeneralLiability + $val->OfficeSupplies
                            + $val->Postage + $val->Freight + $val->GeneralSupplies + $val->PostageFreightSuppliesOther + $val->RentExpense + $val->Utilities + $val->Security + $val->PestControl
                            + $val->RepairMaintenancBuilding + $val->RepairsMaintenanceEquip + $val->EquipmentRental + $val->DepreciationExpenseFFE + $val->AmortizationExpense + $val->RepairMaintenanceVehicles + $val->FuelOilVehicle
                            + $val->VehicleInsurance + $val->VehicleLicenses + $val->CharitableContributions + $val->CustomerSettlements + $val->Softwarelicensefees + $val->ComputerSupplies + $val->ComputerMaintenanceRepair
                            + $val->TelephoneCommunications + $val->Salary + $val->TotalHourly + $val->Overtimehourly + $val->Holiday + $val->Bonus + $val->MileageReimbursement + $val->TravelExpense
                            + $val->MealsEntertainment + $val->TravelEntertainmentOther + $val->DuesDeductible + $val->DuesSubscriptionsOther + $val->UnemploymentTaxes + $val->FICAMatch
                            + $val->RetirementBenefits + $val->InsuranceExpenseEmployeeOther + $val->GroupHealthLifeInsurance + $val->WorkerCompensation
                            + $val->EmployeeProcurement + $val->DrugScreening + $val->SeminarsEducation + $val->EmployeeTraining + $val->Uniforms + $val->AwardsGifts
                            + $val->LeasedEmployees + $val->FranchiseTax + $val->PersonalProperty + $val->RealEstate + $val->SalesUseTax + $val->WasteTiretax + $val->BusinessLicensesPermits
                            + $val->RoyaltyFeesOther + $val->OperationalOverhead + $val->PayrollExpensesOther
                        );
                    } else {
                        $expense[$val->Date] = ($val->PartsInventoryRepair + $val->LaborInventoryRepair + $val->RadioAdmin + $val->PrintMedia + $val->Sponsorships + $val->InternetOnline + $val->SpecialEvents + $val->CashShortLong
                            + $val->BankCardFees + $val->BankServiceCharges + $val->BankChargesOther + $val->LegalFees + $val->AccountingFees + $val->ProfessionalFeesOther + $val->PropertyGeneralLiability + $val->OfficeSupplies
                            + $val->Postage + $val->Freight + $val->GeneralSupplies + $val->PostageFreightSuppliesOther + $val->RentExpense + $val->Utilities + $val->Security + $val->PestControl
                            + $val->RepairMaintenancBuilding + $val->RepairsMaintenanceEquip + $val->EquipmentRental + $val->DepreciationExpenseFFE + $val->AmortizationExpense + $val->RepairMaintenanceVehicles + $val->FuelOilVehicle
                            + $val->VehicleInsurance + $val->VehicleLicenses + $val->CharitableContributions + $val->CustomerSettlements + $val->Softwarelicensefees + $val->ComputerSupplies + $val->ComputerMaintenanceRepair
                            + $val->TelephoneCommunications + $val->Salary + $val->TotalHourly + $val->Overtimehourly + $val->Holiday + $val->Bonus + $val->MileageReimbursement + $val->TravelExpense
                            + $val->MealsEntertainment + $val->TravelEntertainmentOther + $val->DuesDeductible + $val->DuesSubscriptionsOther + $val->UnemploymentTaxes + $val->FICAMatch
                            + $val->RetirementBenefits + $val->InsuranceExpenseEmployeeOther + $val->GroupHealthLifeInsurance + $val->WorkerCompensation
                            + $val->EmployeeProcurement + $val->DrugScreening + $val->SeminarsEducation + $val->EmployeeTraining + $val->Uniforms + $val->AwardsGifts
                            + $val->LeasedEmployees + $val->FranchiseTax + $val->PersonalProperty + $val->RealEstate + $val->SalesUseTax + $val->WasteTiretax + $val->BusinessLicensesPermits
                            + $val->RoyaltyFeesOther + $val->OperationalOverhead + $val->PayrollExpensesOther);
                    }
                }
            }
            $net = [];
            foreach ($grossp as $key => $value) {
                $net[$key] = $grossp[$key] - $expense[$key];
            }

            //--------------------------------Previous YEAR ----------------------------------
            $month = [];
            $cogs = [];

            for ($m = 1; $m <= 12; $m++) {
                $month[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 1));
            }
            for ($i = 0; $i < count($location); $i++) {
                for ($j = 0; $j < count($month); $j++) {
                    $revenue[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $month[$j])->get()->toArray();
                    $cogsdata[] =  Cogsdata::where('Location', '=', $location[$i]->locationid)->where('Date', $month[$j])->get()->toArray();
                    $expdata[] = DB::table('expense')
                        ->join('expense1', 'expense.id', '=', 'expense1.exp_id')->where('expense.Location', '=', $location[$i]->locationid)
                        ->where('expense.Date', $month[$j])->select('expense.*', 'expense1.*')->get()->toArray();
                }
            }
            foreach ($revenue as $value) {
                foreach ($value as $val) {
                    if (isset($rev[$val['Date']])) {
                        $rev[$val['Date']] += ($val['RentalIncome'] + $val['CashSales'] + $val['CashSalesNoninventory'] + $val['EarlyPurchaseOption'] +  $val['RollPro']
                            + $val['CollectionFeeInHouse'] + $val['ReinstatementFees'] + $val['OtherFeesAlignments'] + $val['OneTimeFees'] + $val['NSFCheckFees'] + $val['OtherMiscellaneousIncome']
                            + $val['SalesTaxCollected'] + $val['RollSafe'] + $val['Chargebacks'] + $val['ManagementFee'] + $val['SubfranchiseeRoyaltyIncome']);
                    } else {
                        $rev[$val['Date']] = ($val['RentalIncome'] + $val['CashSales'] + $val['CashSalesNoninventory'] + $val['EarlyPurchaseOption'] +
                            $val['RollPro'] + $val['CollectionFeeInHouse'] + $val['ReinstatementFees'] + $val['OtherFeesAlignments'] + $val['OneTimeFees'] + $val['NSFCheckFees'] + $val['OtherMiscellaneousIncome']
                            + $val['SalesTaxCollected'] + $val['RollSafe'] + $val['Chargebacks'] + $val['ManagementFee'] + $val['SubfranchiseeRoyaltyIncome']);
                    }
                }
            }
            foreach ($cogsdata as $value) {
                foreach ($value as $val) {
                    if (isset($cogs[$val['Date']])) {
                        $cogs[$val['Date']] += ($val['depreciation_inventory'] + $val['paidout_epocharge'] + $val['skipstolenchargeoffs'] +
                            $val['insurancechargeoffs'] + $val['returneddamagednonrepairable'] + $val['otherchargeoff'] + $val['pastdueaccountchargeoff'] +
                            $val['inventorycostadjustment'] + $val['clubremittance']);
                    } else {
                        $cogs[$val['Date']] = ($val['depreciation_inventory'] + $val['paidout_epocharge'] + $val['skipstolenchargeoffs'] +
                            $val['insurancechargeoffs'] + $val['returneddamagednonrepairable'] + $val['otherchargeoff'] + $val['pastdueaccountchargeoff'] +
                            $val['inventorycostadjustment'] + $val['clubremittance']);
                    }
                }
            }
            foreach ($rev as $key => $value) {
                $gros[$key] = $rev[$key] - $cogs[$key];
            }
            $expe = [];
            foreach ($expdata as $value) {
                foreach ($value as $val) {

                    if (isset($expe[$val->Date])) {
                        $expe[$val->Date] += ($val->PartsInventoryRepair + $val->LaborInventoryRepair + $val->RadioAdmin + $val->PrintMedia + $val->Sponsorships + $val->InternetOnline + $val->SpecialEvents + $val->CashShortLong
                            + $val->BankCardFees + $val->BankServiceCharges + $val->BankChargesOther + $val->LegalFees + $val->AccountingFees + $val->ProfessionalFeesOther + $val->PropertyGeneralLiability + $val->OfficeSupplies
                            + $val->Postage + $val->Freight + $val->GeneralSupplies + $val->PostageFreightSuppliesOther + $val->RentExpense + $val->Utilities + $val->Security + $val->PestControl
                            + $val->RepairMaintenancBuilding + $val->RepairsMaintenanceEquip + $val->EquipmentRental + $val->DepreciationExpenseFFE + $val->AmortizationExpense + $val->RepairMaintenanceVehicles + $val->FuelOilVehicle
                            + $val->VehicleInsurance + $val->VehicleLicenses + $val->CharitableContributions + $val->CustomerSettlements + $val->Softwarelicensefees + $val->ComputerSupplies + $val->ComputerMaintenanceRepair
                            + $val->TelephoneCommunications + $val->Salary + $val->TotalHourly + $val->Overtimehourly + $val->Holiday + $val->Bonus + $val->MileageReimbursement + $val->TravelExpense
                            + $val->MealsEntertainment + $val->TravelEntertainmentOther + $val->DuesDeductible + $val->DuesSubscriptionsOther + $val->UnemploymentTaxes + $val->FICAMatch
                            + $val->RetirementBenefits + $val->InsuranceExpenseEmployeeOther + $val->GroupHealthLifeInsurance + $val->WorkerCompensation
                            + $val->EmployeeProcurement + $val->DrugScreening + $val->SeminarsEducation + $val->EmployeeTraining + $val->Uniforms + $val->AwardsGifts
                            + $val->LeasedEmployees + $val->FranchiseTax + $val->PersonalProperty + $val->RealEstate + $val->SalesUseTax + $val->WasteTiretax + $val->BusinessLicensesPermits
                            + $val->RoyaltyFeesOther + $val->OperationalOverhead + $val->PayrollExpensesOther
                        );
                    } else {
                        $expe[$val->Date] = ($val->PartsInventoryRepair + $val->LaborInventoryRepair + $val->RadioAdmin + $val->PrintMedia + $val->Sponsorships + $val->InternetOnline + $val->SpecialEvents + $val->CashShortLong
                            + $val->BankCardFees + $val->BankServiceCharges + $val->BankChargesOther + $val->LegalFees + $val->AccountingFees + $val->ProfessionalFeesOther + $val->PropertyGeneralLiability + $val->OfficeSupplies
                            + $val->Postage + $val->Freight + $val->GeneralSupplies + $val->PostageFreightSuppliesOther + $val->RentExpense + $val->Utilities + $val->Security + $val->PestControl
                            + $val->RepairMaintenancBuilding + $val->RepairsMaintenanceEquip + $val->EquipmentRental + $val->DepreciationExpenseFFE + $val->AmortizationExpense + $val->RepairMaintenanceVehicles + $val->FuelOilVehicle
                            + $val->VehicleInsurance + $val->VehicleLicenses + $val->CharitableContributions + $val->CustomerSettlements + $val->Softwarelicensefees + $val->ComputerSupplies + $val->ComputerMaintenanceRepair
                            + $val->TelephoneCommunications + $val->Salary + $val->TotalHourly + $val->Overtimehourly + $val->Holiday + $val->Bonus + $val->MileageReimbursement + $val->TravelExpense
                            + $val->MealsEntertainment + $val->TravelEntertainmentOther + $val->DuesDeductible + $val->DuesSubscriptionsOther + $val->UnemploymentTaxes + $val->FICAMatch
                            + $val->RetirementBenefits + $val->InsuranceExpenseEmployeeOther + $val->GroupHealthLifeInsurance + $val->WorkerCompensation
                            + $val->EmployeeProcurement + $val->DrugScreening + $val->SeminarsEducation + $val->EmployeeTraining + $val->Uniforms + $val->AwardsGifts
                            + $val->LeasedEmployees + $val->FranchiseTax + $val->PersonalProperty + $val->RealEstate + $val->SalesUseTax + $val->WasteTiretax + $val->BusinessLicensesPermits
                            + $val->RoyaltyFeesOther + $val->OperationalOverhead + $val->PayrollExpensesOther);
                    }
                }
            }
            $netincome = [];
            foreach ($gros as $key => $value) {
                $netincome[$key] = $gros[$key] - $expe[$key];
            }
            //--------------------------------last prev  YEAR ----------------------------------

            $othermonth = [];
            $lastcogs = [];
            $lastrev = [];

            for ($m = 1; $m <= 12; $m++) {
                $othermonth[] = date('m-Y', mktime(0, 0, 0, $m, 1, date('Y') - 2));
            }
            for ($i = 0; $i < count($location); $i++) {
                for ($j = 0; $j < count($month); $j++) {
                    $lastrevenue[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $othermonth[$j])->get()->toArray();
                    $lastcogsdata[] =  Cogsdata::where('Location', '=', $location[$i]->locationid)->where('Date', $othermonth[$j])->get()->toArray();
                    $lastexpdata[] = DB::table('expense')
                        ->join('expense1', 'expense.id', '=', 'expense1.exp_id')->where('expense.Location', '=', $location[$i]->locationid)
                        ->where('expense.Date', $othermonth[$j])->select('expense.*', 'expense1.*')->get()->toArray();
                }
            }
            foreach ($lastrevenue as $value) {
                foreach ($value as $val) {
                    if (isset($lastrev[$val['Date']])) {
                        $lastrev[$val['Date']] += ($val['RentalIncome'] + $val['CashSales'] + $val['CashSalesNoninventory'] + $val['EarlyPurchaseOption'] +  $val['RollPro']
                            + $val['CollectionFeeInHouse'] + $val['ReinstatementFees'] + $val['OtherFeesAlignments'] + $val['OneTimeFees'] + $val['NSFCheckFees'] + $val['OtherMiscellaneousIncome']
                            + $val['SalesTaxCollected'] + $val['RollSafe'] + $val['Chargebacks'] + $val['ManagementFee'] + $val['SubfranchiseeRoyaltyIncome']);
                    } else {
                        $lastrev[$val['Date']] = ($val['RentalIncome'] + $val['CashSales'] + $val['CashSalesNoninventory'] + $val['EarlyPurchaseOption'] +
                            $val['RollPro'] + $val['CollectionFeeInHouse'] + $val['ReinstatementFees'] + $val['OtherFeesAlignments'] + $val['OneTimeFees'] + $val['NSFCheckFees'] + $val['OtherMiscellaneousIncome']
                            + $val['SalesTaxCollected'] + $val['RollSafe'] + $val['Chargebacks'] + $val['ManagementFee'] + $val['SubfranchiseeRoyaltyIncome']);
                    }
                }
            }
            foreach ($lastcogsdata as $value) {
                foreach ($value as $val) {
                    if (isset($lastcogs[$val['Date']])) {
                        $lastcogs[$val['Date']] += ($val['depreciation_inventory'] + $val['paidout_epocharge'] + $val['skipstolenchargeoffs'] +
                            $val['insurancechargeoffs'] + $val['returneddamagednonrepairable'] + $val['otherchargeoff'] + $val['pastdueaccountchargeoff'] +
                            $val['inventorycostadjustment'] + $val['clubremittance']);
                    } else {
                        $lastcogs[$val['Date']] = ($val['depreciation_inventory'] + $val['paidout_epocharge'] + $val['skipstolenchargeoffs'] +
                            $val['insurancechargeoffs'] + $val['returneddamagednonrepairable'] + $val['otherchargeoff'] + $val['pastdueaccountchargeoff'] +
                            $val['inventorycostadjustment'] + $val['clubremittance']);
                    }
                }
            }
            foreach ($lastrev as $key => $value) {
                $lastgros[$key] = $lastrev[$key] - $lastcogs[$key];
            }
            $lastexpe = [];
            foreach ($lastexpdata as $value) {
                foreach ($value as $val) {
                    if (isset($lastexpe[$val->Date])) {
                        $lastexpe[$val->Date] += ($val->PartsInventoryRepair + $val->LaborInventoryRepair + $val->RadioAdmin + $val->PrintMedia + $val->Sponsorships + $val->InternetOnline + $val->SpecialEvents + $val->CashShortLong
                            + $val->BankCardFees + $val->BankServiceCharges + $val->BankChargesOther + $val->LegalFees + $val->AccountingFees + $val->ProfessionalFeesOther + $val->PropertyGeneralLiability + $val->OfficeSupplies
                            + $val->Postage + $val->Freight + $val->GeneralSupplies + $val->PostageFreightSuppliesOther + $val->RentExpense + $val->Utilities + $val->Security + $val->PestControl
                            + $val->RepairMaintenancBuilding + $val->RepairsMaintenanceEquip + $val->EquipmentRental + $val->DepreciationExpenseFFE + $val->AmortizationExpense + $val->RepairMaintenanceVehicles + $val->FuelOilVehicle
                            + $val->VehicleInsurance + $val->VehicleLicenses + $val->CharitableContributions + $val->CustomerSettlements + $val->Softwarelicensefees + $val->ComputerSupplies + $val->ComputerMaintenanceRepair
                            + $val->TelephoneCommunications + $val->Salary + $val->TotalHourly + $val->Overtimehourly + $val->Holiday + $val->Bonus + $val->MileageReimbursement + $val->TravelExpense
                            + $val->MealsEntertainment + $val->TravelEntertainmentOther + $val->DuesDeductible + $val->DuesSubscriptionsOther + $val->UnemploymentTaxes + $val->FICAMatch
                            + $val->RetirementBenefits + $val->InsuranceExpenseEmployeeOther + $val->GroupHealthLifeInsurance + $val->WorkerCompensation
                            + $val->EmployeeProcurement + $val->DrugScreening + $val->SeminarsEducation + $val->EmployeeTraining + $val->Uniforms + $val->AwardsGifts
                            + $val->LeasedEmployees + $val->FranchiseTax + $val->PersonalProperty + $val->RealEstate + $val->SalesUseTax + $val->WasteTiretax + $val->BusinessLicensesPermits
                            + $val->RoyaltyFeesOther + $val->OperationalOverhead + $val->PayrollExpensesOther
                        );
                    } else {
                        $lastexpe[$val->Date] = ($val->PartsInventoryRepair + $val->LaborInventoryRepair + $val->RadioAdmin + $val->PrintMedia + $val->Sponsorships + $val->InternetOnline + $val->SpecialEvents + $val->CashShortLong
                            + $val->BankCardFees + $val->BankServiceCharges + $val->BankChargesOther + $val->LegalFees + $val->AccountingFees + $val->ProfessionalFeesOther + $val->PropertyGeneralLiability + $val->OfficeSupplies
                            + $val->Postage + $val->Freight + $val->GeneralSupplies + $val->PostageFreightSuppliesOther + $val->RentExpense + $val->Utilities + $val->Security + $val->PestControl
                            + $val->RepairMaintenancBuilding + $val->RepairsMaintenanceEquip + $val->EquipmentRental + $val->DepreciationExpenseFFE + $val->AmortizationExpense + $val->RepairMaintenanceVehicles + $val->FuelOilVehicle
                            + $val->VehicleInsurance + $val->VehicleLicenses + $val->CharitableContributions + $val->CustomerSettlements + $val->Softwarelicensefees + $val->ComputerSupplies + $val->ComputerMaintenanceRepair
                            + $val->TelephoneCommunications + $val->Salary + $val->TotalHourly + $val->Overtimehourly + $val->Holiday + $val->Bonus + $val->MileageReimbursement + $val->TravelExpense
                            + $val->MealsEntertainment + $val->TravelEntertainmentOther + $val->DuesDeductible + $val->DuesSubscriptionsOther + $val->UnemploymentTaxes + $val->FICAMatch
                            + $val->RetirementBenefits + $val->InsuranceExpenseEmployeeOther + $val->GroupHealthLifeInsurance + $val->WorkerCompensation
                            + $val->EmployeeProcurement + $val->DrugScreening + $val->SeminarsEducation + $val->EmployeeTraining + $val->Uniforms + $val->AwardsGifts
                            + $val->LeasedEmployees + $val->FranchiseTax + $val->PersonalProperty + $val->RealEstate + $val->SalesUseTax + $val->WasteTiretax + $val->BusinessLicensesPermits
                            + $val->RoyaltyFeesOther + $val->OperationalOverhead + $val->PayrollExpensesOther);
                    }
                }
            }
            $lastnetincome = [];
            foreach ($lastgros as $key => $value) {
                $lastnetincome[$key] = $lastgros[$key] - $lastexpe[$key];
            }

            return view('ppt_view', compact('gros', 'cogs', 'rev', 'grossp', 'result', 'cog', 'expense', 'expe', 'net', 'netincome', 'lastrev', 'lastcogs', 'lastgros', 'lastexpe', 'lastnetincome'));
        } else {
            return redirect('/');
        }
    }
    //LOAD PAGE WITH DEFAULT LOCATION DATA
    public function user_bonus()
    {
        if (session()->has('userloginid') && (session::get('userrole') == 'Manager' || session::get('userrole') == 'Director' || session::get('userrole') == 'Sales Manager')) {
            $id = Session::get('userloginid');
            $userdata = SiteUsers::all();
            $fname = $userdata[0]->firstname;
            $lname = $userdata[0]->lastname;
            $name = $fname . " " . $lname;

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
                // $prevdate = date("m-Y", strtotime("first day of previous month", strtotime("-1 month")));
                $prevyear = (explode("-", $prevdate));
                $shwgraph = DB::table('Showgraph')->where('status', '1')->get()->pluck('id')->toArray();
                $year = $prevyear[1];
                $previousyear = $year - 1;
                $previous = $prevyear[0] . "-" . $previousyear;
                for ($i = 12; $i >= 1; $i--) {
                    $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$i months"));
                }

                $customers = Customer::where([['Date', '=', $prevdate], ['Location', '=', $loc]])->get();
                @$customer_count = $customers[0]->Customers;

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
                return view('bonus_calculator', compact('name', 'year', 'previousyear', 'loc', 'location', 'shwgraph', 'prevdate', 'cal', 'sumrdata1', 'sumcdata1', 'sumedata1', 'gross1', 'netdata', 'rev',  'cog', 'exp', 'grossp', 'netinc', 'cust', 'prevsumrdata', 'prevsumcdata', 'prevgross', 'prevsumedata', 'prevnetdata', 'pstdue', 'customer_count'));
            }
        } elseif (session()->has('userloginid') && session::get('userrole') == 'Sales Employee') {
            $data = Upload::select('file')->get()->toArray();
            return view('sales-training', compact('data'));
        } else {
            return view('user-login');
        }
    }

    //LOAD DATA ,WHEN WE SELECT ANOTHER LOCATION
    public function bonus_calculation(Request $request)
    {
        $id = Session::get('userloginid');
        $userdata = SiteUsers::all();
        $fname = $userdata[0]->firstname;
        $lname = $userdata[0]->lastname;
        $name = $fname . " " . $lname;

        $data = $request->all();
        $date = $data['date'];
        $loc = $data['location'];
        $customers = Customer::where([['Date', '=', $date], ['Location', '=', $loc]])->get();
        @$customer_count =  $customers[0]->Customers;

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

        // $prevdate = date("m-Y", strtotime("first day of previous month"));
        $prevdate = date("m-Y", strtotime("first day of previous month", strtotime("-1 month")));
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
        return view('bonus_calculator', compact('customer_count', 'name', 'year', 'prevdate', 'previousyear', 'shwgraph', 'location', 'loc', 'rev', 'date', 'cog', 'exp', 'grossp', 'cal', 'netinc', 'cust',  'prevdate', 'months', 'sumrdata', 'sumcdata', 'sumedata', 'netdata', 'gross', 'prevsumrdata1', 'prevsumcdata1', 'prevgross1', 'prevsumedata1', 'prevnetdata1', 'pstdue'));
    }

    public function customer_count(Request $request)
    {
        $id = Session::get('userloginid');
        $userdata = SiteUsers::all();
        $fname = $userdata[0]->firstname;
        $lname = $userdata[0]->lastname;
        $name = $fname . " " . $lname;

        $data = $request->all();
        $added_customers = $data['customers'];
        $date = $data['date'];
        $loc = $data['location'];
        $customers = Customer::where([['Date', '=', $date], ['Location', '=', $loc]])->get();

        $customer_count = $customers[0]->Customers = $customers[0]->Customers + $added_customers;

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

        // $prevdate = date("m-Y", strtotime("first day of previous month"));
        $prevdate = date("m-Y", strtotime("first day of previous month", strtotime("-1 month")));


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
                $custdata = customer::where([['Location', '=', $loc], ['Date', '=', $value]])->sum(DB::raw($customer_count));
                // $custdata = $customer_count;
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
        return response()->json(['name' => $name, 'year' => $year, 'prevdate' => $prevdate, 'previousyear' => $previousyear, 'shwgraph' => $shwgraph, 'location' => $location, 'loc' => $loc, 'rev' => $rev, 'date' => $date, 'cog' => $cog, 'exp' => $exp, 'grossp' => $grossp, 'cal' => $cal, 'netinc' => $netinc, 'cust' => $cust,  'prevdate' => $prevdate, 'months' => $months, 'sumrdata' => $sumrdata, 'sumcdata' => $sumcdata, 'sumedata' => $sumedata, 'netdata' => $netdata, 'gross' => $gross, 'prevsumrdata1' => $prevsumrdata1, 'prevsumcdata1' => $prevsumcdata1, 'prevgross1' => $prevgross1, 'prevsumedata1' => $prevsumedata1, 'prevnetdata1' => $prevnetdata1, 'pstdue' => $pstdue, 'customer_count' => $customer_count]);
    }
    public function company_access()
    {
        $title = ['B&B', 'Rental Concepts', 'RCKY', 'OZK'];
        $Directors = SiteUsers::where('role', 'Director')->get();
        $Managers = SiteUsers::where('role', 'Manager')->get();

        return view('company_access', compact('Directors', 'title', 'Managers'));
    }
    public function give_company_access(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            if (strpos($key, 'directors_') === 0) {
                $numericPart = substr($key, strlen('directors_'));

                Company_access::updateOrCreate(
                    ['director_id' => $numericPart], // Find by ID
                    ['company' => $value] // Update or create with new value
                );
            }
        }
        return redirect()->back()->with('success', 'Access Updated');
    }

    public function give_company_access_manager(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            if (strpos($key, 'managers_') === 0) {
                $numericPart = substr($key, strlen('managers_'));
                Company_access::updateOrCreate(
                    ['director_id' => $numericPart], // Find by ID
                    ['company' => implode(',', $value)] // Update or create with new value
                );
            }
        }
        return redirect()->back()->with('success', 'Access Updated');
    }

    public function highlight(Request $request)
    {

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
            return view('highlight', compact('year', 'previousyear', 'loc', 'location', 'shwgraph', 'prevdate', 'cal', 'sumrdata1', 'sumcdata1', 'sumedata1', 'gross1', 'netdata', 'rev',  'cog', 'exp', 'grossp', 'netinc', 'cust', 'prevsumrdata', 'prevsumcdata', 'prevgross', 'prevsumedata', 'prevnetdata', 'pstdue', 'graphdata'));
        }
    }
}
