<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Location;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use DB;
use App\Models\expensedata;
use App\Models\expensedata1;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class YeartodateExport implements FromView, ShouldAutoSize, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $date;
    protected $selctedloc;

    public function __construct($date, $selctedloc)
    {
        $this->date = $date;
        $this->selctedloc  = $selctedloc;
    }

    public function  view(): View
    {
        $date_time = new \DateTime('last month');
        $last_month = $date_time->format('F');

        $prevdate = date("m-Y", strtotime("first day of previous month"));
        $prevyear = (explode("-", $prevdate));

        $year = $prevyear[1];
        $previousyear = $year - 1;
        $previous = '01' . "-" . $year;
        $currprevious = $prevyear[0] . '-' . $previousyear;
        $curryearval = $prevyear[0] - 1;

        $rsum =  $rsum1 = $rsum2 = $rsum3 = $rsum4 = $rsum5 = $rsum6 = $rsum7 = $rsum8 = $rsum9 = $rsum10 = $rsum11 = $rsum12 = $rsum13 = $rsum14 = $rsum15 = $ryearsum = $ryearsum1 = $ryearsum2 = $ryearsum3 = $ryearsum4 = $ryearsum5 = $ryearsum6 = $ryearsum7 = $ryearsum8 = $ryearsum9 = $ryearsum10 = $ryearsum11 = $ryearsum12 = $ryearsum13 = $ryearsum14 = $ryearsum15 = $cogsm = $cogsm1 = $cogsm2 = $cogsm3 = $cogsm4 = $cogsm5 = $cogsm6 = $cogsm7 = $cogsm8 = $cogsm9 = $cogsm10 = $cogm = $cogm1 = $cogm2 = $cogm3 = $cogm4 = $cogm5 = $cogm6 = $cogm7 = $cogm8 = $cogm9 = $cogm10 = $esumm = $esumm1 = $esumm2 = $esumm3 = $esumm4 = $esumm5 = $esumm6 = $esumm7 = $esumm8 = $esumm9 = $esumm10 = $esumm11 = $esumm12 = $esumm13 = $esumm14 = $esumm15 = $esumm16 = $esumm17 = $esumm18 = $esumm19 = $esumm20 = $esumm21 = $esumm22 = $esumm23 = $esumm24 = $esumm25 = $esumm26 = $esumm27 = $esumm28 = $esumm29 = $esumm30 = $esumm31 = $esumm32 = $exsumm = $exsumm1 = $exsumm2 = $exsumm3 = $exsumm4 = $exsumm5 = $exsumm6 = $exsumm7 = $exsumm8 = $exsumm9 = $exsumm10 = $exsumm11 = $exsumm12 = $exsumm13 = $exsumm14 = $exsumm15 = $exsumm16 = $exsumm17 = $exsumm18 = $exsumm19 = $exsumm20 = $exsumm21 = $exsumm22 = $exsumm23 = $exsumm24 = $exsumm25 = $exsumm26 = $exsumm27 = $exsumm28 = $exsumm29 = $exsumm30 = $exsumm31 = $exsumm32 = $exsm33 = $exsm34 = $exsm35 = $exsm36 = $exsm37 = $exsm38 = $exsm39 = $exsm40 = $exsm41 = $exsm42 = $exsm43 = $exsm44 = $exsm45 = $exsm46 = $exsm47 = $exsm48 = $exsm49 = $exsm50 = $exsm51 = $exsm52 = $exsm53 = $exsm54 = $exsm55 = $exsm56 = $exsm57 = $exsm58 = $exsm59 = $exsm60 = $exsm61 = $exsm62 = $exsm63 = $exsm64 = $exsm65 = $exsm66 = $exsm67 = $exsm68 = $exsm69 = $exsm70 = $exsm71 = $exsm72 =$exsm73= $exsum33 = $exsum34 = $exsum35 = $exsum36 = $exsum37 = $exsum38 = $exsum39 = $exsum40 = $exsum41 = $exsum42 = $exsum43 = $exsum44 = $exsum45 = $exsum46 = $exsum47 = $exsum48 = $exsum49 = $exsum50 = $exsum51 = $exsum52 = $exsum53 = $exsum54 = $exsum55 = $exsum56 = $exsum57 = $exsum58 = $exsum59 = $exsum60 = $exsum61 = $exsum62 = $exsum63 = $exsum64 = $exsum65 = $exsum66 = $exsum67 = $exsum68 = $exsum69 = $exsum70 = $exsum71 =$esumm33=$exsumm33= $exsum72= $exsum73 = 0;

        $location = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
        for ($i = 0; $i < count($location); $i++) {
            $revenue1[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $prevdate)->get()->toArray();
            $revenue[] = revenuedata::where('Location', '=', $location[$i]->locationid)->where('Date', $currprevious)->get()->toArray();


            $cogs1[] =  Cogsdata::where('Location', '=', $location[$i]->locationid)->where('Date', $prevdate)->get()->toArray();
            $cogs[] =   Cogsdata::where('Location', '=', $location[$i]->locationid)->where('Date', $currprevious)->get()->toArray();

            $expdata1[] = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->get()->toArray();
            $expdata[] = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $currprevious]])->get()->toArray();
            $expens1[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $prevdate]])->get()->toArray();
            $expens1data[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $currprevious]])->get()->toArray();

            for ($m = 1; $m <= $prevyear[0]; $m++) {
                date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                $pyear = sprintf('%02d', $m) . '-' . $year;
                $reve[] = revenuedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
                $cogd[] = Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
                $exp[] = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
                $expp[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();

                $pyeardata = sprintf('%02d', $m) . '-' . $previousyear;
                $ryeardata[] = revenuedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
                $cyeardata[] = Cogsdata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
                $eyeardata[] = expensedata::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
                $exppyeardata[] = expensedata1::where([['Location', '=', $location[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
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
        //  --------------------------COGS (last all prev data of current Year)-------------------------------------
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
        //  --------------------------COGS (last all prev data of previous Year)-------------------------------------
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
          //  --------------------------Exp (last all prev data of current Year)-------------------------------------
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
                $esumm33 +=$val['PropertyInsurance'];
            }
        }
         //  --------------------------Exp (last all prev data of previous Year)-------------------------------------
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
                    $exsumm33 +=$val['PropertyInsurance'];
            }
        }
        //  --------------------------Exp1 (last all prev data of current Year)-------------------------------------
        foreach ($expp as $value) {
            foreach ($value as $val) {
                $exsm33 += $val['CharitableContributions'];
                $exsm34 += $val['CustomerSettlements'];
                $exsm35 += $val['Softwarelicensefees'];
                $exsm36 += $val['ComputerSupplies'];
                $exsm37 += $val['ComputerMaintenanceRepair'];
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
                $exsm72 += $val['otherIncome'];
                $exsm73 +=$val['purchasedisc'];
            }
        }
        //  --------------------------Exp1 (last all prev data of previous Year)-------------------------------------
        foreach ($exppyeardata as $value) {
            foreach ($value as $val) {
                $exsum33 += $val['CharitableContributions'];
                $exsum34 += $val['CustomerSettlements'];
                $exsum35 += $val['Softwarelicensefees'];
                $exsum36 += $val['ComputerSupplies'];
                $exsum37 += $val['ComputerMaintenanceRepair'];
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
                $exsum72 += $val['otherIncome'];
                $exsum73 +=$val['purchasedisc'];
            }
        }
        $revprevyeardata = array($rsum, $rsum1, $rsum2, $rsum3, $rsum4, $rsum5, $rsum6, $rsum7, $rsum8, $rsum9, $rsum10,    $rsum11, $rsum12, $rsum13, $rsum14, $rsum15);
        $revyeardata = array($ryearsum, $ryearsum1, $ryearsum2, $ryearsum3, $ryearsum4, $ryearsum5, $ryearsum6, $ryearsum7, $ryearsum8, $ryearsum9, $ryearsum10, $ryearsum11, $ryearsum12, $ryearsum13, $ryearsum14, $ryearsum15);

        $cogprevyeardata = array($cogsm, $cogsm1, $cogsm2, $cogsm3, $cogsm4, $cogsm5, $cogsm6, $cogsm7, $cogsm8, $cogsm9);
        $cogyeardata = array($cogm, $cogm1, $cogm2, $cogm3, $cogm4, $cogm5, $cogm6, $cogm7, $cogm8, $cogm9);
        $expprevyeardata = array($esumm, $esumm1, $esumm2, $esumm3, $esumm4, $esumm5, $esumm6, $esumm7, $esumm8, $esumm9, $esumm10, $esumm11, $esumm12, $esumm13, $esumm14, $esumm15, $esumm16, $esumm17, $esumm18, $esumm19, $esumm20, $esumm21, $esumm22, $esumm23, $esumm24, $esumm25, $esumm26, $esumm27, $esumm28, $esumm29, $esumm30, $esumm31, $esumm32, $exsm33, $exsm34, $exsm35, $exsm36, $exsm37, $exsm38, $exsm39, $exsm40, $exsm41, $exsm42, $exsm43, $exsm44, $exsm45, $exsm46, $exsm47, $exsm48, $exsm49, $exsm50, $exsm51, $exsm52, $exsm53, $exsm54, $exsm55, $exsm56, $exsm57, $exsm58, $exsm59, $exsm60, $exsm61, $exsm62, $exsm63, $exsm64, $exsm65, $exsm66, $exsm67, $exsm68, $exsm69, $exsm70, $exsm71,$esumm33,$exsm72,$exsm73);
        $expyeardata = array($exsumm, $exsumm1, $exsumm2, $exsumm3, $exsumm4, $exsumm5, $exsumm6, $exsumm7, $exsumm8, $exsumm9, $exsumm10, $exsumm11, $exsumm12, $exsumm13, $exsumm14, $exsumm15, $exsumm16, $exsumm17, $exsumm18, $exsumm19, $exsumm20, $exsumm21, $exsumm22, $exsumm23, $exsumm24, $exsumm25, $exsumm26, $exsumm27, $exsumm28, $exsumm29, $exsumm30, $exsumm31, $exsumm32, $exsum33, $exsum34, $exsum35, $exsum36, $exsum37, $exsum38, $exsum39, $exsum40, $exsum41, $exsum42, $exsum43, $exsum44, $exsum45, $exsum46, $exsum47, $exsum48, $exsum49, $exsum50, $exsum51, $exsum52, $exsum53, $exsum54, $exsum55, $exsum56, $exsum57, $exsum58, $exsum59, $exsum60, $exsum61, $exsum62, $exsum63, $exsum64, $exsum65, $exsum66, $exsum67, $exsum68, $exsum69, $exsum70, $exsum71,$exsumm33,$exsum72,$exsum73);
        view()->share(['last_month' => $last_month, 'previousyear' => $previousyear,'revprevyeardata' => $revprevyeardata, 'cogprevyeardata' => $cogprevyeardata, 'revyeardata' => $revyeardata, 'cogyeardata' => $cogyeardata, 'expprevyeardata' => $expprevyeardata, 'expyeardata' => $expyeardata, 'year' => $year]);

        return view('ytyexcel');
    }
    public function title(): string
    {
        return 'Y2Y';
    }
}
