<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\revenuedata;
use App\Models\Cogsdata;
use App\Models\expensedata;
use App\Models\expensedata1;
use Session;

class CompanyController extends Controller
{
    public function index(){
        if(Session::has('userloginid'))
        {
            $locations = DB::table('locations')->orderBy('Location', 'ASC')->pluck('locationid')->toArray();
            $previousMonths = [];
            $currentDate = Carbon::now()->subMonth();
            while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('m-Y');
            $currentDate->subMonth();
            } 
            $prev_date = array_reverse($previousMonths);
            $month = []; 
            for ($m=1; $m<=12; $m++) {
                $month[] = date('m-Y', mktime(0,0,0,$m, 1, date('Y')-1));
            }
            $othermonth = []; 
            for ($m=1; $m <= 12 ; $m++) {
                $othermonth[] = date('m-Y', mktime(0,0,0,$m, 1, date('Y')-2));
            }
            $data = [
                'current' => self::processMonthlyData($locations, $prev_date),
                'previous' => self::processMonthlyData($locations, $month),
                'lastPrevious' => self::processMonthlyData($locations, $othermonth),
            ];
            return view('company', compact('data'));
        }
        else{
            return redirect('/');
        }
    }
    function processMonthlyData($locations, $dates) {
        $revenueData = revenuedata::whereIn('Location', $locations)
            ->whereIn('Date', $dates)
            ->get();
      
        $cogsData = Cogsdata::whereIn('Location', $locations)
            ->whereIn('Date', $dates)
            ->get();
        $expenseData = DB::table('expense')
            ->join('expense1', 'expense.id', '=', 'expense1.exp_id')
            ->whereIn('expense.Location', $locations)
            ->whereIn('expense.Date', $dates)
            ->select('expense.*', 'expense1.*')
            ->get();
            
        $result = [];
        if(!empty($revenueData)){
            foreach ($revenueData as $item) {
                $date = $item->Date;
                $result[$date] = ($result[$date] ?? 0) + self::calculateTotalRevenue($item);
            }
        }
        $cog = [];
        if(!empty($cogsData)){
        foreach ($cogsData as $item) {
            $date = $item->Date;
            $cog[$date] = ($cog[$date] ?? 0) + self::calculateTotalCogs($item);
        }
        }
        $expense = [];
        if(!empty($expenseData)){
            foreach ($expenseData as $item) {
                $date = $item->Date;
                $expense[$date] = ($expense[$date] ?? 0) + self::calculateTotalExpense($item);
            }
        }
        $grossp = [];
        foreach($result as $key =>$value){
                $grossp[$key]= $result[$key] - $cog[$key];
        }
        $net = [];
        foreach ($result as $key => $value) {
            $net[$key] = $result[$key] - $cog[$key] - $expense[$key];
        }
        $result= self::sortArrayByDateKey($result);
        $cog = self::sortArrayByDateKey($cog);
        $expense = self::sortArrayByDateKey($expense);
        $net = self::sortArrayByDateKey($net);
        $grossp = self::sortArrayByDateKey($grossp);
        return compact('result', 'cog', 'expense', 'net','grossp');
    }
    function sortArrayByDateKey(&$array) {
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
    function calculateTotalRevenue($item) {
        return (
            $item->RentalIncome + $item->CashSales + $item->CashSalesNoninventory +
            $item->EarlyPurchaseOption + $item->RollPro + $item->CollectionFeeInHouse +
            $item->ReinstatementFees + $item->OtherFeesAlignments + $item->OneTimeFees +
            $item->NSFCheckFees + $item->OtherMiscellaneousIncome +
            $item->SalesTaxCollected + $item->RollSafe + $item->Chargebacks +
            $item->ManagementFee + $item->SubfranchiseeRoyaltyIncome
        );
    }
    function calculateTotalCogs($item) {
        return (
            $item->depreciation_inventory + $item->paidout_epocharge + $item->cashsalechargeoffs +
            $item->skipstolenchargeoffs + $item->insurancechargeoffs +
            $item->returneddamagednonrepairable + $item->otherchargeoff +
            $item->pastdueaccountchargeoff + $item->inventorycostadjustment +
            $item->clubremittance
        );
    }
    
    function calculateTotalExpense($item) {
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
  
    public function data(Request $request){
        $categ = $request->data_cat ;
        if($request->data_cat == 'b&b'){
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [3000,4000])
            ->pluck('locationid')
            ->toArray();
        }
        elseif($request->data_cat == 'RentalConcepts'){
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2400,2500])
            ->pluck('locationid')
            ->toArray();
        }
        elseif($request->data_cat == 'rcky'){
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [2200,2300])
            ->pluck('locationid')
            ->toArray();
        }
        elseif($request->data_cat == 'ozk'){
            $locations = DB::table('locations')->orderBy('Location', 'ASC')
            ->whereBetween('locationid', [4000,5000])
            ->pluck('locationid')
            ->toArray();
        }
        $previousMonths = [];
        $currentDate = Carbon::now()->subMonth();
        while ($currentDate->year == Carbon::now()->year) {
        $previousMonths[] = $currentDate->format('m-Y');
        $currentDate->subMonth();
        } 
        $prev_date = array_reverse($previousMonths);
        $month = []; 
        for ($m=1; $m<=12; $m++) {
            $month[] = date('m-Y', mktime(0,0,0,$m, 1, date('Y')-1));
        }
        $othermonth = []; 
        for ($m=1; $m<=12; $m++) {
            $othermonth[] = date('m-Y', mktime(0,0,0,$m, 1, date('Y')-2));
        }
        $data = [
            'current' => self::processMonthlyData($locations, $prev_date),
            'previous' => self::processMonthlyData($locations, $month),
            'lastPrevious' => self::processMonthlyData($locations, $othermonth),
        ];
        $message = '';
        foreach ($data as $key => $value) {
            foreach($value as $k =>$v){
                if(count($v) == 0) 
                {
                   $message = 'No data is available for these locations';
                   return view('company',compact('message','data' ,'categ'));
                }
                else
                {
                    return view('company', compact('data','categ'));  
                }
       
            }
        }
    }
}
