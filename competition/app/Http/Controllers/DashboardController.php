<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Group;
use App\Models\Permission;
use App\Models\expensedata;
use App\Models\expensedata1;
use App\Models\Cogsdata;
use App\Models\revenuedata;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = session()->get('userloginid');
        $userRole = session()->get('role');
        // echo $userRole;
        // die;

        $data = collect(); // Initialize as an empty collection

        // Check if the user role is Manager
        if ($userRole === "Manager") {
            // Get location permissions for the user
            $locationsPermission = Permission::where('userid', $userId)
                ->where('allowed', 1)
                ->pluck('locationid');

            $previousMonth = Carbon::now()->subMonth()->format('m-Y');
            $group = ["A", "B", "C", "D"];

            // Retrieve locations that match the allowed locations and groups, ordered by group
            $allowedLocations = Group::whereIn('group', $group)
                ->whereIn('location_id', $locationsPermission)
                ->where('assigned', 1)
                ->select('location_id', 'group')
                ->orderBy('group', 'asc')
                ->get()
                ->groupBy('group');

            // Flatten the `allowedLocations` to get a list of location IDs
            $locationIds = $allowedLocations->flatten(1)->pluck('location_id');

            // Retrieve net income data
            $netIncomeData = $this->getNetIncome($locationIds, $previousMonth);

            // Retrieve customer data based on location IDs and previous month
            $customersData = Customer::whereIn('Location', $locationIds)
                ->where('Date', $previousMonth)
                ->select('Location', 'Customers')
                ->get()
                ->keyBy('Location');

            // Map the data with group information
            $data = $allowedLocations->flatMap(function ($locations, $group) use ($customersData, $netIncomeData) {
                return $locations->map(function ($location) use ($group, $customersData, $netIncomeData) {
                    $locationId = $location->location_id;
                    return [
                        'Location' => $locationId,
                        'Group' => $group,
                        'Customers' => $customersData->has($locationId) ? $customersData[$locationId]->Customers : 0,
                        'NetIncome' => isset($netIncomeData[$locationId]) ? number_format($netIncomeData[$locationId]['NetIncome'], 2) : 0
                    ];
                });
            })->sortByDesc('Customers');
        }

        // Return the data to the Blade view only for Manager role
        return view('dashboard', compact('data'));
    }


    public function competitionStoreData(Request $request)
    {
        $userId = session()->get('userloginid');
        $userRole = session()->get('role');
        $group = $request->query('group');

        // Retrieve Locations based on user role
        if ($userRole !== 'Super admin') {
            $allowedLocations = Permission::where('userid', $userId)
                ->where('allowed', 1)
                ->pluck('locationid');
        } else {
            $allowedLocations = Group::where('group', $group)
                ->where('assigned', 1)
                ->pluck('location_id');
        }

        $locationIds = Group::where([
            'group' => $group,
            'assigned' => 1
        ])->pluck('location_id');

        if ($locationIds->isEmpty()) {
            return response()->json([]);
        }

        $previousMonth = Carbon::now()->subMonth()->format('m-Y');
        // $previousMonth = '11-2024';

        // Get Net Income
        $netIncomeData = $this->getNetIncome($locationIds, $previousMonth);

        // Retrieve customer data based on location IDs and previous month
        $customersData = Customer::whereIn('Location', $locationIds)
            ->where('Date', $previousMonth)
            ->select('Location', 'Customers')
            ->get()
            ->keyBy('Location');

        $data = $locationIds->mapWithKeys(function ($locationId) use ($customersData, $netIncomeData) {
            return [
                $locationId => [
                    'Location' => $locationId,
                    'Customers' => $customersData->has($locationId) ? $customersData[$locationId]->Customers : 0,
                    'NetIncome' => isset($netIncomeData[$locationId]) ? number_format($netIncomeData[$locationId]['NetIncome'], 2) : 0
                ]
            ];
        })->filter(function ($item) use ($allowedLocations) {
            return $allowedLocations->contains($item['Location']);
        })->sortByDesc('Customers');

        return response()->json($data->values());
    }

    public function getNetIncome($locationIds, $previousMonth)
    {
        $revenueColumns = [
            'SalesTaxColl',
            'RentalIncome',
            'CashSales',
            'CashSalesNoninventory',
            'EarlyPurchaseOption',
            'RollPro',
            'CollectionFeeInHouse',
            'ReinstatementFees',
            'OtherFeesAlignments',
            'OneTimeFees',
            'NSFCheckFees',
            'OtherMiscellaneousIncome',
            'SalesTaxCollected',
            'RollSafe',
            'Chargebacks',
            'ManagementFee',
            'SubfranchiseeRoyaltyIncome'
        ];

        $cogsColumns = [
            'depreciation_inventory',
            'paidout_epocharge',
            'cashsalechargeoffs',
            'skipstolenchargeoffs',
            'insurancechargeoffs',
            'returneddamagednonrepairable',
            'nonrepairablechargeoffs',
            'otherchargeoff',
            'pastdueaccountchargeoff',
            'inventorycostadjustment',
            'chargeoffexpenseother',
            'clubremittance',
            'rentrefunds',
            'partsinventoryrepair',
            'laborinventoryrepair',
            'inventoryrepairother'
        ];

        $expenseColumns = [
            'RadioAdmin',
            'TelevisionAdvertising',
            'RadioTVProduction',
            'PrintMedia',
            'PrintProduction',
            'PostageAdvertising',
            'FreightAdvertising',
            'NewspaperMagazineAdvertising',
            'OtherPrint',
            'TelephoneDirectories',
            'MarqueeBillboards',
            'CustomerReferrals',
            'WebsiteDevelopment',
            'Sponsorships',
            'InternetOnline',
            'AdvertisingandPromotionOther',
            'SpecialEvents',
            'Website',
            'CashShortLong',
            'VINSearchFees',
            'InternalPostage',
            'AdministrativeCollections',
            'OtherSellingExpensesOther',
            'SellingExpenseOther',
            'BadChecks',
            'NSFCheckFees',
            'BankCardFees',
            'BankServiceCharges',
            'LateFees',
            'GeneralAdminExpenseOther',
            'LegalFees',
            'AccountingFees',
            'ConsultingFees',
            'ProfessionalFeesOther',
            'PropertyGeneralLiability',
            'OfficersLife',
            'InsuranceExpenseAdminOther',
            'OfficeSupplies',
            'Postage',
            'Freight',
            'GeneralSupplies',
            'PostageFreightSuppliesOther',
            'RentExpense',
            'Utilities',
            'PropertyInsurance',
            'Security',
            'PestControl',
            'RepairMaintenancBuilding',
            'RelocationExpenses',
            'OccupancyExpenseOther',
            'RepairsMaintenanceEquip',
            'EquipmentRental',
            'EquipmentExpenseOther',
            'DepreciationExpenseFFE',
            'AmortizationExpense',
            'RepairMaintenanceVehicles',
            'FuelOilVehicle',
            'LeaseVehicle',
            'VehicleInsurance',
            'VehicleLicenses',
            'VehicleExpenseOther',
            'DepreciationExpense'
        ];

        $expense1Columns = [
            'CharitableContributions',
            'CustomerSettlements',
            'OtherOther',
            'Softwarelicensefees',
            'ComputerSupplies',
            'ComputerMaintenanceRepair',
            'TelephoneCommunications',
            'ComputerInternetExpensesOther',
            'MiscellaneousExpense',
            'Salary',
            'TotalHourly',
            'Overtimehourly',
            'Holiday',
            'Bonus',
            'BonusReimbursementDue',
            'SalariesWagesOther',
            'MileageReimbursement',
            'TravelExpense',
            'MealsEntertainment',
            'TravelEntertainmentOther',
            'DuesDeductible',
            'DuesNonDeductible',
            'DuesSubscriptionsOther',
            'FFCRATaxes',
            'UnemploymentTaxes',
            'FICAMatch',
            'PayrollTaxesOther',
            'RetirementBenefits',
            'GroupHealthLifeInsurance',
            'WorkerCompensation',
            'InsuranceExpenseEmployeeOther',
            'MedicalExpenses',
            'EmployeeProcurement',
            'DrugScreening',
            'EmployeeMovingExpense',
            'SeminarsEducation',
            'EmployeeTraining',
            'Uniforms',
            'AwardsGifts',
            'Banquet',
            'SpecialEvents',
            'LeasedEmployees',
            'MovingExpenseAdministrative',
            'OtherEmployeeExpenseOther',
            'PayrollExpensesOther',
            'FranchiseTax',
            'PersonalProperty',
            'RealEstate',
            'SalesUseTax',
            'WasteTiretax',
            'MiscellaneousTax',
            'BusinessLicensesPermits',
            'FinesPenalties',
            'RoyaltyFeesSherwood',
            'RoyaltyFeesMabelvale',
            'RoyaltyFeesConway',
            'RoyaltyFeesFayetteville',
            'RoyaltyFeesRogers',
            'RoyaltyFeesDallas',
            'RoyaltyFeesFtSmith',
            'RoyaltyFeesAdmin',
            'RoyaltyFeesOther',
            'TaxLicensePermitExpenseOther',
            'OperationalOverhead'
        ];

        $locationSums = [];
        foreach ($locationIds as $locationId) {
            // Sum up total for Revenue data
            $revenueSum = revenuedata::where('Location', $locationId)
                ->where('Date', $previousMonth)
                ->sum(DB::raw(implode(' + ', $revenueColumns)));

            // Sum up total for COGS data
            $cogsSum = Cogsdata::where('Location', $locationId)
                ->where('Date', $previousMonth)
                ->sum(DB::raw(implode(' + ', $cogsColumns)));

            // Sum up total for Expense data
            $expenseSum = expensedata::where('Location', $locationId)
                ->where('Date', $previousMonth)
                ->sum(DB::raw(implode(' + ', $expenseColumns)));

            // Sum up total for Expense 1 data
            $expenseSum1 = expensedata1::where('Location', $locationId)
                ->where('Date', $previousMonth)
                ->sum(DB::raw(implode(' + ', $expense1Columns)));

            $grossProfit = round($revenueSum - $cogsSum, 0);
            $totalExpenses = round($expenseSum + $expenseSum1, 0);
            $netIncome = round($grossProfit - $totalExpenses, 0);

            // Calculate the net income ratio, avoiding division by zero
            $totalNetIncome = $revenueSum ? round($netIncome / $revenueSum, 2) : 0;

            // Store the total for the current location
            $locationSums[$locationId] = [
                'RevenueSum' => $revenueSum,
                'COGSSum' => $cogsSum,
                'ExpenseSum' => $totalExpenses,
                'NetIncome' => $totalNetIncome
            ];
        }

        return $locationSums;
    }
}
