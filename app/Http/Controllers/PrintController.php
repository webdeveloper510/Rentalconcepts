<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Location;
use App\Models\Cogsdata;
use App\Models\revenuedata;
use App\Models\expensedata;
use App\Models\expensedata1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ViewExporter;
use App\Exports\MultiSheetSelectSpecificSheet;
use Session;
use DB;

class PrintController extends Controller
{

    public function index()
    {
        if (Session::has('loginid')) {
            $location = Location::select('*')->get();
            return view('packets', compact('location'));
        } else {
            return redirect('/admin');
        }
    }
    public function getlocat(Request $request)
    {
        $newDate = date('M-Y', strtotime('01-' . $request->date));
        $request->validate([
            'location' => 'required',
            'date' => 'required',
        ]);
        $location = Location::select('*')->get();
        $date = $request->date;
        $yearr = substr($date, 3);
       
        // $mdate = Carbon::createFromFormat('m-Y', $date); // create a Carbon instance from the date string
        // $monthName = $mdate->format('M');
        $monthNamee = date('M', strtotime('01-' . $date));
        // die;
        // $data_arg = [$date, $mdate,$monthName];
        $selctedloc = $request->location;
        $locname = Location::where('locationid', $selctedloc)->pluck('location')->first();
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
        $sum = $sum1 =  $sum2 =  $sum3 =  $sum4 =  $sum5 =  $sum6 =  $sum7 =  $sum8 =  $sum9 =  $sum10 =  $sum11 =
            $cogsum =  $cogsum1 = $cogsum2 =  $cogsum3 =  $cogsum4 =  $cogsum5 =  $cogsum6 = $cogsum7 =  $cogsum8 =  $cogsum9 =   $cogsum10 =
            $expsum = $expsum1 =  $expsum2 =  $expsum3 =  $expsum4 =   $expsum5 =   $expsum6 =  $expsum7 =  $expsum8 =  $expsum9 =
            $expsum10 = $expsum11 =  $expsum12 =  $expsum13 =  $expsum14 =  $expsum15 =  $expsum16 =  $expsum17 =  $expsum18 =  $expsum19 =  $expsum20 = $expsum21 =  $expsum22 =  $expsum23 =  $expsum24 =  $expsum25 =  $expsum26 =  $expsum27 =  $expsum28 =  $expsum29 =  $expsum30 =
            $expsum31 =  $expsum32 =  $expsum33 = $expsum34 =  $expsum35 =  $expsum36 =  $expsum37 =   $expsum38 =   $expsum39 =  $expsum40 = $expsum41 =  $expsum42 = $expsum43 = $expsum44 =  $expsum45 =  $expsum46 = $expsum47 =  $expsum48 = $expsum49 = $expsum50 = $expsum51 = $expsum52 = $expsum53 =  $expsum54 = $expsum55 = $expsum56 = $expsum57 = $expsum58 =  $expsum59 = $expsum60 = $expsum61 =  $expsum62 = $expsum63 = $expsum64 = $expsum65 = $expsum66 = $expsum67 =  $expsum68 = $expsum69 = $expsum70 = $expsum71 = $expsum72=0;
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
               
            }
        }

        $revv = [];
        $cogss = [];
        $totalrev = [];
        $totcog = [];
        $loca = Location::select('Location')->where('locationid', $selctedloc)->get()->toArray();
        $summ =  $summ1 =  $summ2 =  $summ3 =   $summ4 =  $summ5 =   $summ6 =   $summ7 =  $summ8 =   $summ9 =  $summ10 =    $summ11 =
            $cogsuum =   $cogsuum1 =  $cogsuum2 =  $cogsuum3 =  $cogsuum4 =  $cogsuum5 =  $cogsuum6 =  $cogsuum7 = $cogsuum8 =  $cogsuum9 = $cogsuum10 =
            $totalrevsum =  $totalrevsum1 =  $totalrevsum2 =  $totalrevsum3 =   $totalrevsum4 =  $totalrevsum5 =   $totalrevsum6 =   $totalrevsum7 =  $totalrevsum8 =   $totalrevsum9 =  $totalrevsum10 =    $totalrevsum11 = $totalcogsum =   $totalcogsum1 =  $totalcogsum2 =  $totalcogsum3 =  $totalcogsum4 =  $totalcogsum5 =  $totalcogsum6 =  $totalcogsum7 = $totalcogsum8 =  $totalcogsum9 = $totalcogsum10 = 0;
        $esumm34 = $exsumm34 = 0;
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

            $reven = revenuedata::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $cogsdat = Cogsdata::where([['Location', '=',  $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expdat = expensedata::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();
            $expensed = expensedata1::where([['Location', '=', $selctedloc], ['Date', '=', $pyear]])->get()->toArray();

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
        $expdata = array($expsum, $expsum1, $expsum2, $expsum3, $expsum4, $expsum5, $expsum6, $expsum7, $expsum8, $expsum9, $expsum10, $expsum11, $expsum12, $expsum13, $expsum14, $expsum15, $expsum16, $expsum17, $expsum18, $expsum19, $expsum20, $expsum21, $expsum22, $expsum23, $expsum24, $expsum25, $expsum26, $expsum27, $expsum28, $expsum29, $expsum30, $expsum31, $expsum32, $expsum33, $expsum34, $expsum35, $expsum36, $expsum37, $expsum38, $expsum39, $expsum40, $expsum41, $expsum42, $expsum43, $expsum44, $expsum45, $expsum46, $expsum47, $expsum48, $expsum49, $expsum50, $expsum51, $expsum52, $expsum53, $expsum54, $expsum55, $expsum56, $expsum57, $expsum58, $expsum59, $expsum60, $expsum61, $expsum62, $expsum63, $expsum64, $expsum65, $expsum66, $expsum67, $expsum68, $expsum69, $expsum70, $expsum71,$expsum72);
        $date_time = new \DateTime('last month');
        $last_monthh = $date_time->format('M');
        // print_r( date('M',strtotime($date_time)));die;

        $prevdate = date("m-Y", strtotime("first day of previous month"));
        $prevyear = (explode("-", $prevdate));

        $previousyear = $year - 1;
        $previous = '01' . "-" . $year;
        $currprevious = $prevyear[0] . '-' . $previousyear;
        $curryearval = $prevyear[0] - 1;
       
        $rsum =  $rsum1 = $rsum2 = $rsum3 = $rsum4 = $rsum5 = $rsum6 = $rsum7 = $rsum8 = $rsum9 = $rsum10 = $rsum11 = $rsum12 = $rsum13 = $rsum14 = $rsum15 = $ryearsum = $ryearsum1 = $ryearsum2 = $ryearsum3 = $ryearsum4 = $ryearsum5 = $ryearsum6 = $ryearsum7 = $ryearsum8 = $ryearsum9 = $ryearsum10 = $ryearsum11 = $ryearsum12 = $ryearsum13 = $ryearsum14 = $ryearsum15 = $cogsm = $cogsm1 = $cogsm2 = $cogsm3 = $cogsm4 = $cogsm5 = $cogsm6 = $cogsm7 = $cogsm8 = $cogsm9 = $cogsm10 = $cogm = $cogm1 = $cogm2 = $cogm3 = $cogm4 = $cogm5 = $cogm6 = $cogm7 = $cogm8 = $cogm9 = $cogm10 = $esumm = $esumm1 = $esumm2 = $esumm3 = $esumm4 = $esumm5 = $esumm6 = $esumm7 = $esumm8 = $esumm9 = $esumm10 = $esumm11 = $esumm12 = $esumm13 = $esumm14 = $esumm15 = $esumm16 = $esumm17 = $esumm18 = $esumm19 = $esumm20 = $esumm21 = $esumm22 = $esumm23 = $esumm24 = $esumm25 = $esumm26 = $esumm27 = $esumm28 = $esumm29 = $esumm30 = $esumm31 = $esumm32 = $esumm33 = $exsumm = $exsumm1 = $exsumm2 = $exsumm3 = $exsumm4 = $exsumm5 = $exsumm6 = $exsumm7 = $exsumm8 = $exsumm9 = $exsumm10 = $exsumm11 = $exsumm12 = $exsumm13 = $exsumm14 = $exsumm15 = $exsumm16 = $exsumm17 = $exsumm18 = $exsumm19 = $exsumm20 = $exsumm21 = $exsumm22 = $exsumm23 = $exsumm24 = $exsumm25 = $exsumm26 = $exsumm27 = $exsumm28 = $exsumm29 = $exsumm30 = $exsumm31 = $exsumm32 = $exsumm33 = $exsm33 = $exsm34 = $exsm35 = $exsm36 = $exsm37 = $exsm38 = $exsm39 = $exsm40 = $exsm41 = $exsm42 = $exsm43 = $exsm44 = $exsm45 = $exsm46 = $exsm47 = $exsm48 = $exsm49 = $exsm50 = $exsm51 = $exsm52 = $exsm53 = $exsm54 = $exsm55 = $exsm56 = $exsm57 = $exsm58 = $exsm59 = $exsm60 = $exsm61 = $exsm62 = $exsm63 = $exsm64 = $exsm65 = $exsm66 = $exsm67 = $exsm68 = $exsm69 = $exsm70 = $exsm71 = $exsm72 = $exsm73 = $exsum33 = $exsum34 = $exsum35 = $exsum36 = $exsum37 = $exsum38 = $exsum39 = $exsum40 = $exsum41 = $exsum42 = $exsum43 = $exsum44 = $exsum45 = $exsum46 = $exsum47 = $exsum48 = $exsum49 = $exsum50 = $exsum51 = $exsum52 = $exsum53 = $exsum54 = $exsum55 = $exsum56 = $exsum57 = $exsum58 = $exsum59 = $exsum60 = $exsum61 = $exsum62 = $exsum63 = $exsum64 = $exsum65 = $exsum66 = $exsum67 = $exsum68 = $exsum69 = $exsum70 = $exsum71 = $exsum72 = $exsum73 = 0;

        $locat = DB::table('locations')->select('*')->orderBy('Location', 'ASC')->get()->toArray();
        for ($i = 0; $i < count($location); $i++) {
            $revenue1[] = revenuedata::where('Location', '=', $locat[$i]->locationid)->where('Date', $prevdate)->get()->toArray();
            $revenue[] = revenuedata::where('Location', '=', $locat[$i]->locationid)->where('Date', $currprevious)->get()->toArray();

            $cogs1[] =  Cogsdata::where('Location', '=', $locat[$i]->locationid)->where('Date', $prevdate)->get()->toArray();
            $cogs[] =   Cogsdata::where('Location', '=', $locat[$i]->locationid)->where('Date', $currprevious)->get()->toArray();

            $expdata1[] = expensedata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $prevdate]])->get()->toArray();
            // $expdata[] = expensedata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $currprevious]])->get()->toArray();
            $expens1[] = expensedata1::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $prevdate]])->get()->toArray();
            $expens1data[] = expensedata1::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $currprevious]])->get()->toArray();
          
            for ($m = 1; $m <= $prevyear[0]; $m++) {
                date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                $pyear = sprintf('%02d', $m) . '-' . $year;
                $reve[] = revenuedata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
                $cogd[] = Cogsdata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
                $exp1[] = expensedata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();
                $expp[] = expensedata1::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyear]])->get()->toArray();

                $pyeardata = sprintf('%02d', $m) . '-' . $previousyear;
                $ryeardata[] = revenuedata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
                $cyeardata[] = Cogsdata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
                $eyeardata[] = expensedata::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
                $exppyeardata[] = expensedata1::where([['Location', '=', $locat[$i]->locationid], ['Date', '=', $pyeardata]])->get()->toArray();
            }
        } 
       
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

        foreach ($exp1 as $value) {
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
                $esumm33 += $val['PropertyInsurance'];
                $esumm34 += $val['TelevisionAdvertising'];
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
                $exsumm33 += $val['PropertyInsurance'];
                $exsumm34 +=  $val['TelevisionAdvertising'];
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
                $exsm73 += $val['purchasedisc'];
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
                $exsum73 += $val['purchasedisc'];
            }
        }
      
        $revprevyeardata = array($rsum, $rsum1, $rsum2, $rsum3, $rsum4, $rsum5, $rsum6, $rsum7, $rsum8, $rsum9, $rsum10,    $rsum11, $rsum12, $rsum13, $rsum14, $rsum15);
        $revyeardata = array($ryearsum, $ryearsum1, $ryearsum2, $ryearsum3, $ryearsum4, $ryearsum5, $ryearsum6, $ryearsum7, $ryearsum8, $ryearsum9, $ryearsum10, $ryearsum11, $ryearsum12, $ryearsum13, $ryearsum14, $ryearsum15);

        $cogprevyeardata = array($cogsm, $cogsm1, $cogsm2, $cogsm3, $cogsm4, $cogsm5, $cogsm6, $cogsm7, $cogsm8, $cogsm9);
        $cogyeardata = array($cogm, $cogm1, $cogm2, $cogm3, $cogm4, $cogm5, $cogm6, $cogm7, $cogm8, $cogm9);
        $expprevyeardata = array($esumm, $esumm1, $esumm2, $esumm3, $esumm4, $esumm5, $esumm6, $esumm7, $esumm8, $esumm9, $esumm10, $esumm11, $esumm12, $esumm13, $esumm14, $esumm15, $esumm16, $esumm17, $esumm18, $esumm19, $esumm20, $esumm21, $esumm22, $esumm23, $esumm24, $esumm25, $esumm26, $esumm27, $esumm28, $esumm29, $esumm30, $esumm31, $esumm32,  $exsm33, $exsm34, $exsm35, $exsm36, $exsm37, $exsm38, $exsm39, $exsm40, $exsm41, $exsm42, $exsm43, $exsm44, $exsm45, $exsm46, $exsm47, $exsm48, $exsm49, $exsm50, $exsm51, $exsm52, $exsm53, $exsm54, $exsm55, $exsm56, $exsm57, $exsm58, $exsm59, $exsm60, $exsm61, $exsm62, $exsm63, $exsm64, $exsm65, $exsm66, $exsm67, $exsm68, $exsm69, $exsm70, $exsm71, $esumm33, $exsm72, $exsm73);
        $expyeardata = array($exsumm, $exsumm1, $exsumm2, $exsumm3, $exsumm4, $exsumm5, $exsumm6, $exsumm7, $exsumm8, $exsumm9, $exsumm10, $exsumm11, $exsumm12, $exsumm13, $exsumm14, $exsumm15, $exsumm16, $exsumm17, $exsumm18, $exsumm19, $exsumm20, $exsumm21, $exsumm22, $exsumm23, $exsumm24, $exsumm25, $exsumm26, $exsumm27, $exsumm28, $exsumm29, $exsumm30, $exsumm31, $exsumm32, $exsum33, $exsum34, $exsum35, $exsum36, $exsum37, $exsum38, $exsum39, $exsum40, $exsum41, $exsum42, $exsum43, $exsum44, $exsum45, $exsum46, $exsum47, $exsum48, $exsum49, $exsum50, $exsum51, $exsum52, $exsum53, $exsum54, $exsum55, $exsum56, $exsum57, $exsum58, $exsum59, $exsum60, $exsum61, $exsum62, $exsum63, $exsum64, $exsum65, $exsum66, $exsum67, $exsum68, $exsum69, $exsum70, $exsum71, $exsumm33, $exsum72, $exsum73);
        $propertyinsurnce = $expdata[72];
        // print_r(($expprevyeardata[72] - $expyeardata[72])/$expyeardata[72] *100);die;
        view()->share(['newDate' => $newDate,'data' => $data, 'locname' => $locname, 'monthNamee' => $monthNamee,'propertyinsurnce'=>$propertyinsurnce ,'selctedloc' => $selctedloc, 'location' => $location, 'date' => $date, 'expense1' => $expense1, 'alldataa' => $alldataa, 'cog' => $cog, 'exp' => $exp, 'cogdataa' => $cogdataa, 'revenuedata' => $revenuedata, 'cogsdata' => $cogsdata, 'totalrevenuedata' => $totalrevenuedata, 'totalcogsdata' => $totalcogsdata, 'alldata' => $alldata, 'cogdata' => $cogdata, 'expdata' => $expdata, 'year' => $year, 'last_monthh' => $last_monthh, 'previousyear' => $previousyear, 'revprevyeardata' => $revprevyeardata, 'cogprevyeardata' => $cogprevyeardata, 'revyeardata' => $revyeardata, 'cogyeardata' => $cogyeardata, 'expprevyeardata' => $expprevyeardata, 'expyeardata' => $expyeardata, 'yearr' => $yearr]);
        $xfiles = Storage::files('public/excel');
        $xlsfileName = 'P&L_' . date('his') . '.xlsx';

        if (!$xfiles) {
            Excel::store(new MultiSheetSelectSpecificSheet($date, $selctedloc), 'public/excel/' . $xlsfileName);
        } else {
            Storage::delete($xfiles);
            Excel::store(new MultiSheetSelectSpecificSheet($date, $selctedloc), 'public/excel/' . $xlsfileName);
        }

        $pdf = PDF::loadView('pdf');
        $files = Storage::files('public/pdfs');
        $fileName = 'P&L_' . date('dhis') . '.pdf';

        if (!$files) {
            Storage::put('public/pdfs/' . $fileName, $pdf->output());
        } else {
            Storage::delete($files);
            Storage::put('public/pdfs/' . $fileName, $pdf->output());
        }
        $request->session()->flash('success', 'Click here to download!');
        return view('packets', compact('data', 'fileName', 'xlsfileName', 'monthNamee', 'location', 'date', 'selctedloc', 'alldata', 'cal', 'year', 'prevyear', 'cog', 'cogdata', 'exp', 'expdata', 'expense1', 'alldataa', 'cogdataa', 'selctedloc', 'revenuedata', 'cogsdata', 'loca', 'totalrevenuedata', 'totalcogsdata', 'newDate'));
    }
    public function downloadpdf($fileName)
    {
        return Storage::download('public/pdfs/' . $fileName);
    }
    public function downloadexcel($xlsfileName)
    {
        return Storage::download('public/excel/' . $xlsfileName);
    }
}
