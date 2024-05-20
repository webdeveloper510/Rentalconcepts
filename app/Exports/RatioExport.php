<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Location;
use App\Models\Cogsdata;
use App\Models\revenuedata;
use App\Models\expensedata;
use App\Models\expensedata1;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;


class RatioExport implements FromView,ShouldAutoSize,WithTitle
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
    public function view(): View
    {
       
        $location = Location::select('*')->get();
        $mdate = Carbon::createFromFormat('m-Y', $this->date); // create a Carbon instance from the date string
        $monthName = $mdate->format('F');
        $locname = Location::where('locationid', $this->selctedloc)->pluck('location')->first();
        $data = revenuedata::where('Date', $this->date)->where('Location', $this->selctedloc)->get();
        $cog = Cogsdata::where('Date', $this->date)->where('Location', $this->selctedloc)->get();
        $exp = expensedata::where('Date', $this->date)->where('Location', $this->selctedloc)->get();
        $expense1 = expensedata1::where('Date', $this->date)->where('Location', $this->selctedloc)->get();
      
        $prevyear = (explode("-", $this->date));
        $year = $prevyear[1];
        $previousyear = $year - 1;
        $cal = array("status" => '0');
        $rev = [];
        $cogs = [];
        $exps = [];
        $expense11 = [];
        $sum = $sum1 =  $sum2 =  $sum3 =  $sum4 =  $sum5 =  $sum6 =  $sum7 =  $sum8 =  $sum9 =  $sum10 =  $sum11 =
            $cogsum =  $cogsum1 = $cogsum2 =  $cogsum3 =  $cogsum4 =  $cogsum5 =  $cogsum6 = $cogsum7 =  $cogsum8 =  $cogsum9 =   $cogsum10 =
            $expsum = $expsum1 =  $expsum2 =  $expsum3 =  $expsum4 =   $expsum5 =   $expsum6 =  $expsum7 =  $expsum8 =  $expsum9 =
            $expsum10 = $expsum11 =  $expsum12 =  $expsum13 =  $expsum14 =  $expsum15 =  $expsum16 =  $expsum17 =  $expsum18 =  $expsum19 =  $expsum20 = $expsum21 =  $expsum22 =  $expsum23 =  $expsum24 =  $expsum25 =  $expsum26 =  $expsum27 =  $expsum28 =  $expsum29 =  $expsum30 =
            $expsum31 =  $expsum32 =  $expsum33 = $expsum34 =  $expsum35 =  $expsum36 =  $expsum37 =   $expsum38 =   $expsum39 =  $expsum40 = $expsum41 =  $expsum42 = $expsum43 = $expsum44 =  $expsum45 =  $expsum46 = $expsum47 =  $expsum48 = $expsum49 = $expsum50 = $expsum51 = $expsum52 = $expsum53 =  $expsum54 = $expsum55 = $expsum56 = $expsum57 = $expsum58 =  $expsum59 = $expsum60 = $expsum61 =  $expsum62 = $expsum63 = $expsum64 = $expsum65 = $expsum66 = $expsum67 =  $expsum68 = $expsum69 = $expsum70 = $expsum71 = 0;
        for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $pyear = sprintf('%02d', $m) . '-' . $year;

            $revenue1 = revenuedata::where([['Location', '=', $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $cogsdata1 = Cogsdata::where([['Location', '=', $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expdata1 = expensedata::where([['Location', '=', $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expensedata1 = expensedata1::where([['Location', '=', $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();
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
            }
        }

        $revv = [];
        $cogss = [];
        $totalrev = [];
        $totcog = [];
        $loca = Location::select('Location')->where('locationid', $this->selctedloc)->get()->toArray();
        $summ =  $summ1 =  $summ2 =  $summ3 =   $summ4 =  $summ5 =   $summ6 =   $summ7 =  $summ8 =   $summ9 =  $summ10 =    $summ11 =
            $cogsuum =   $cogsuum1 =  $cogsuum2 =  $cogsuum3 =  $cogsuum4 =  $cogsuum5 =  $cogsuum6 =  $cogsuum7 = $cogsuum8 =  $cogsuum9 = $cogsuum10 =
            $totalrevsum =  $totalrevsum1 =  $totalrevsum2 =  $totalrevsum3 =   $totalrevsum4 =  $totalrevsum5 =   $totalrevsum6 =   $totalrevsum7 =  $totalrevsum8 =   $totalrevsum9 =  $totalrevsum10 =    $totalrevsum11 = $totalcogsum =   $totalcogsum1 =  $totalcogsum2 =  $totalcogsum3 =  $totalcogsum4 =  $totalcogsum5 =  $totalcogsum6 =  $totalcogsum7 = $totalcogsum8 =  $totalcogsum9 = $totalcogsum10 = 0;
        for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $pyear = sprintf('%02d', $m) . '-' . $year;
            // ---------------------   Single Location data-----------------
            $revenue1 = revenuedata::where([['Location', '=', '2401'], ['Date', '=', $pyear]])->get()->toArray();
            $cogsdata1 = Cogsdata::where([['Location', '=', '2401'], ['Date', '=', $pyear]])->get()->toArray();

            array_push($revv, $revenue1);
            array_push($cogss, $cogsdata1);
            // ---------------------   all Location data-----------------
            $totalrevenue = revenuedata::where('Date', '=', $pyear)->get()->toArray();
            $totalcogs = Cogsdata::where('Date', '=', $pyear)->get()->toArray();

            array_push($totalrev, $totalrevenue);
            array_push($totcog, $totalcogs);
        }
        foreach ($revv as $value) {
            foreach ($value as $val) {
                $summ += $val['RentalIncome'];
                $summ1 += $val['CashSales'];
                $summ2 += $val['EarlyPurchaseOption'];
                $summ3 += $val['RollPro'];
                $summ4 += $val['CollectionFeeInHouse'];
                $summ5 += $val['ReinstatementFees'];
                $summ6 += $val['OtherFeesAlignments'];
                $summ7 += $val['OneTimeFees'];
                $summ8 += $val['NSFCheckFees'];
                $summ9 += $val['OtherMiscellaneousIncome'];
                $summ10 += $val['RollSafe'];
                $summ11 += $val['Chargebacks'];
            }
        }
        foreach ($cogss as $value) {
            foreach ($value as $val) {
                $cogsuum += $val['depreciation_inventory'];
                $cogsuum1 += $val['paidout_epocharge'];
                $cogsuum2 += $val['cashsalechargeoffs'];
                $cogsuum3 += $val['skipstolenchargeoffs'];
                $cogsuum4 += $val['insurancechargeoffs'];
                $cogsuum5 += $val['returneddamagednonrepairable'];
                $cogsuum6 += $val['otherchargeoff'];
                $cogsuum7 += $val['pastdueaccountchargeoff'];
                $cogsuum8 += $val['inventorycostadjustment'];
                $cogsuum9 += $val['clubremittance'];
            }
        }
        //------------------------------- Total Company daTA----------------------------
        foreach ($totalrev as $value) {
            foreach ($value as $val) {
                $totalrevsum += $val['RentalIncome'];
                $totalrevsum1 += $val['CashSales'];
                $totalrevsum2 += $val['EarlyPurchaseOption'];
                $totalrevsum3 += $val['RollPro'];
                $totalrevsum4 += $val['CollectionFeeInHouse'];
                $totalrevsum5 += $val['ReinstatementFees'];
                $totalrevsum6 += $val['OtherFeesAlignments'];
                $totalrevsum7 += $val['OneTimeFees'];
                $totalrevsum8 += $val['NSFCheckFees'];
                $totalrevsum9 += $val['OtherMiscellaneousIncome'];
                $totalrevsum10 += $val['RollSafe'];
                $totalrevsum11 += $val['Chargebacks'];
            }
        }

        foreach ($totcog as $value) {
            foreach ($value as $val) {
                $totalcogsum += $val['depreciation_inventory'];
                $totalcogsum1 += $val['paidout_epocharge'];
                $totalcogsum2 += $val['cashsalechargeoffs'];
                $totalcogsum3 += $val['skipstolenchargeoffs'];
                $totalcogsum4 += $val['insurancechargeoffs'];
                $totalcogsum5 += $val['returneddamagednonrepairable'];
                $totalcogsum6 += $val['otherchargeoff'];
                $totalcogsum7 += $val['pastdueaccountchargeoff'];
                $totalcogsum8 += $val['inventorycostadjustment'];
                $totalcogsum9 += $val['clubremittance'];
            }
        }
        // -----------------------------------SELECTED LOCATION DATA-------------------------------------
        $rev1 = [];
        $cogs1 = [];

        $revsum =  $revsum1 =  $revsum2 =  $revsum3 =  $revsum4 =  $revsum5 =  $revsum6 =  $revsum7 =  $revsum8 =  $revsum9 = $revsum10 = $revsum11 = $cogsumm = $cogsumm1 =  $cogsumm2 =  $cogsumm3 =  $cogsumm4 = $cogsumm5 = $cogsumm6 = $cogsumm7 = $cogsumm8 = $cogsumm9 = $cogsumm10 = 0;

        for ($m = 1; $m <= $prevyear[0]; $m++) {
            date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $pyear = sprintf('%02d', $m) . '-' . $year;

            $reven = revenuedata::where([['Location', '=', $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $cogsdat = Cogsdata::where([['Location', '=',  $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expdat = expensedata::where([['Location', '=', $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expensed = expensedata1::where([['Location', '=', $this->selctedloc], ['Date', '=', $pyear]])->get()->toArray();

            array_push($rev1, $reven);
            array_push($cogs1, $cogsdat);
        }
        foreach ($rev1 as $value) {
            foreach ($value as $val) {
                $revsum += $val['RentalIncome'];
                $revsum1 += $val['CashSales'];
                $revsum2 += $val['EarlyPurchaseOption'];
                $revsum3 += $val['RollPro'];
                $revsum4 += $val['CollectionFeeInHouse'];
                $revsum5 += $val['ReinstatementFees'];
                $revsum6 += $val['OtherFeesAlignments'];
                $revsum7 += $val['OneTimeFees'];
                $revsum8 += $val['NSFCheckFees'];
                $revsum9 += $val['OtherMiscellaneousIncome'];
                $revsum10 += $val['RollSafe'];
                $revsum11 += $val['Chargebacks'];
            }
        }
        foreach ($cogs1 as $value) {
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
        $alldataa = array($summ, $summ1, $summ2, $summ3, $summ4, $summ5, $summ6, $summ7, $summ8, $summ9, $summ10, $summ11);
        $cogdataa = array($cogsuum, $cogsuum1, $cogsuum2, $cogsuum3, $cogsuum4, $cogsuum5, $cogsuum6, $cogsuum7, $cogsuum8, $cogsuum9);
        $revenuedata = array($revsum, $revsum1, $revsum2, $revsum3, $revsum4, $revsum5, $revsum6, $revsum7, $revsum8, $revsum9, $revsum10, $revsum11);
        $cogsdata = array($cogsumm, $cogsumm1, $cogsumm2, $cogsumm3, $cogsumm4, $cogsumm5, $cogsumm6, $cogsumm7, $cogsumm8, $cogsumm9);
        $totalrevenuedata = array($totalrevsum, $totalrevsum1, $totalrevsum2, $totalrevsum3, $totalrevsum4, $totalrevsum5, $totalrevsum6, $totalrevsum7, $totalrevsum8, $totalrevsum9, $totalrevsum10, $totalrevsum11);
        $totalcogsdata = array($totalcogsum, $totalcogsum1, $totalcogsum2, $totalcogsum3, $totalcogsum4, $totalcogsum5, $totalcogsum6, $totalcogsum7, $totalcogsum8, $totalcogsum9);
        $alldata = array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9, $sum10, $sum11);
        $cogdata = array($cogsum, $cogsum1, $cogsum2, $cogsum3, $cogsum4, $cogsum5, $cogsum6, $cogsum7, $cogsum8, $cogsum9);
        $expdata = array($expsum, $expsum1, $expsum2, $expsum3, $expsum4, $expsum5, $expsum6, $expsum7, $expsum8, $expsum9, $expsum10, $expsum11, $expsum12, $expsum13, $expsum14, $expsum15, $expsum16, $expsum17, $expsum18, $expsum19, $expsum20, $expsum21, $expsum22, $expsum23, $expsum24, $expsum25, $expsum26, $expsum27, $expsum28, $expsum29, $expsum30, $expsum31, $expsum32, $expsum33, $expsum34, $expsum35, $expsum36, $expsum37, $expsum38, $expsum39, $expsum40, $expsum41, $expsum42, $expsum43, $expsum44, $expsum45, $expsum46, $expsum47, $expsum48, $expsum49, $expsum50, $expsum51, $expsum52, $expsum53, $expsum54, $expsum55, $expsum56, $expsum57, $expsum58, $expsum59, $expsum60, $expsum61, $expsum62, $expsum63, $expsum64, $expsum65, $expsum66, $expsum67, $expsum68, $expsum69, $expsum70, $expsum71);
        view()->share(['data' => $data, 'locname' => $locname, 'monthName' => $monthName, 'location' => $location, 'date' => $this->date, 'expense1' => $expense1, 'alldataa' => $alldataa, 'cog' => $cog, 'exp' => $exp, 'cogdataa' => $cogdataa, 'revenuedata' => $revenuedata, 'cogsdata' => $cogsdata, 'totalrevenuedata' => $totalrevenuedata, 'totalcogsdata' => $totalcogsdata, 'alldata' => $alldata, 'cogdata' => $cogdata, 'expdata' => $expdata, 'year' => $year]);
        return view('ratiotable');
    }

    public function title(): string
    {
        return 'Reformat';
    }
}
