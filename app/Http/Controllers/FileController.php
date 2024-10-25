<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Location;
use App\Models\Data;
use App\Models\expensedata;
use App\Models\expensedata1;
use App\Models\Revenue;
use App\Models\Expect;
use App\Models\revenuedata;


class FileController extends Controller

{
    public function content()

    {
        $data = Location::all();
        if (Session::has('loginid')) {
            return view('manage-content', ['data' => $data]);
        } else {
            return redirect('/admin');
        }
    }
    public function editadmindata($id)
    {
        $loc = DB::table('locations')->select('location')->groupBy('location')->get()->toArray();
        // $user = Data::find(base64_decode($id));
        $user = revenuedata::find(base64_decode($id));
        // print_r($user);die;
        return view('editadmindata', compact('loc', 'user'));
    }
    public function updateadmindata(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'location' => 'required',
            'SalesTaxColl' => 'required',
            'RentalIncome' => 'required',
            'CashSales' => 'required',
            'CashSalesNoninventory' => 'required',
            'EarlyPurchaseOption' => 'required',
            'RollPro' => 'required',
            'CollectionFeeInHouse' => 'required',
            'ReinstatementFees' => 'required',
            'OtherFeesAlignments' => 'required',
            'OneTimeFees' => 'required'
        ]);
        $id = $request->color_id;
        $data = revenuedata::find($id);
        $data->Date = $request->date;
        $data->Location = $request->location;
        $data->SalesTaxColl = $request->SalesTaxColl;
        $data->RentalIncome = $request->RentalIncome;
        $data->CashSales = $request->CashSales;
        $data->CashSalesNoninventory = $request->CashSalesNoninventory;
        $data->EarlyPurchaseOption = $request->EarlyPurchaseOption;
        $data->RollPro = $request->RollPro;
        $data->CollectionFeeInHouse = $request->CollectionFeeInHouse;
        $data->ReinstatementFees = $request->ReinstatementFees;
        $data->OtherFeesAlignments = $request->OtherFeesAlignments;
        $data->OneTimeFees = $request->OneTimeFees;
        $data->save();
        return redirect('/admin/viewdata')->with('success', 'Data has been updated successfully.');
    }
    public function deleteadmindata($id)
    {
        $data = Data::find($id);
        $data->delete();
        return redirect('/admin/viewdata')->with('info', 'Data has been deleted successfully.');
    }

    public function file(Request $request)
    {
        $datas = new Revenue();
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        if ($request->hasfile('file')) {
            $datas->filename = $request->file;
            $name = time() . rand(1, 100) . '.' . $datas->filename->extension();
            if ($datas->filename->move(public_path('uploads'), $name)) {
                $files[] = $name;
            }
        }
        // $datas->save();
        $datas = [];


        if (($open = fopen(public_path() . '/uploads' . '/' . $name, "r")) !== FALSE) {
            $k = 0;
            while ($data = fgetcsv($open, 9000, ",")) {
                $k++;
                if ($k == 1) {
                    continue;
                }
                $datas[] = $data;
            }
            fclose($open);
        }

        // echo "<pre>";
        // print_r($datas);
        // die;

        foreach ($datas as $k => $data) {
            $a = date_create($data[0]);
            $date = date_format($a, "m/d/Y");
            $inputdate = (explode("/", $date));
            $cdate = $inputdate[0] . "-" . $inputdate[2];
            $dataa = array(
                "Date" => $cdate,
                "Location" => $data[1],
                "SalesTaxColl" => $data[2],
                "RentalIncome" => $data[3],
                "CashSales" => $data[4],
                "CashSalesNoninventory" => ($data[5] == '#N/A') ? 0 : $data[5],
                "EarlyPurchaseOption" => $data[6],
                "RollPro" => $data[7],
                "CollectionFeeInHouse" => $data[8],
                "ReinstatementFees" => $data[9],
                "OtherFeesAlignments" => $data[10],
                "OneTimeFees" => $data[11],
                "NSFCheckFees" => $data[12],
                "OtherMiscellaneousIncome" => $data[13],
                "SalesTaxCollected" => $data[14],
                "RollSafe" => $data[15],
                "Chargebacks" => $data[16],
                "ManagementFee" => $data[17],
                "SubfranchiseeRoyaltyIncome" => $data[18]
            );

            foreach ($dataa as $key => $value) {
                if ($value == '') {
                    $dataa[$key] = '0';
                }
            }

            // echo "<pre>";
            // print_r($dataa);

            $rev = DB::table('Revenue')->select('*')
                ->where('Date', $cdate)
                ->where('Location', $dataa['Location'])
                ->get()->toArray();

            // echo "<pre>";
            // print_r($rev);

            $del = DB::table('deliveries')->select('*')->where('date', $cdate)
                ->where('location', $dataa['Location'])
                ->get()->toArray();

            // echo "<pre>";
            // print_r($del);

            if (!$del) {
                $deldata =
                    array(
                        "date" => $cdate,
                        "location" => $data[1],
                        "delivery" => $data[173],
                        "ideal" => $data[180],
                        // "dummy_date" => '01-'.$cdate
                    );
                DB::table('deliveries')->insert($deldata);
            } else {
                $deldata =
                    array(
                        "date" => $cdate,
                        "location" => $data[1],
                        "delivery" => $data[173],
                        "ideal" => $data[180]
                    );
                $a = DB::table('deliveries')->where('date', $cdate)
                    ->where('location', $dataa['Location'])->update($deldata);
            }
            if (!$rev) {
                // echo "if";
                // die;

                $id = DB::table('Revenue')->insertGetId($dataa);
                Session::put('lastinsertid', $id);
                $fdataa = array(
                    'data_id' => Session::get('lastinsertid'),
                    "Date" => $cdate,
                    "Location" => $data[1],
                    'depreciation_inventory' => $data[19],
                    'paidout_epocharge' => $data[20],
                    'cashsalechargeoffs' => $data[21],
                    'skipstolenchargeoffs' => $data[22],
                    'insurancechargeoffs' => $data[23],
                    'returneddamagednonrepairable' => $data[24],
                    'nonrepairablechargeoffs' => $data[25],
                    'otherchargeoff' => $data[26],
                    'pastdueaccountchargeoff' => $data[27],
                    'inventorycostadjustment' => $data[28],
                    'chargeoffexpenseother' => $data[29],
                    'clubremittance' => $data[30],
                    'rentrefunds' => ($data[31] == '') ? 0 : $data[31],
                    'partsinventoryrepair' => $data[32],
                    'laborinventoryrepair' => $data[33],
                    'inventoryrepairother' => $data[34]
                );

                DB::table('Cogsdata')->insert($fdataa);
                $edata =
                    array(
                        'data_id' => Session::get('lastinsertid'),
                        "Date" => $cdate,
                        "Location" => $data[1],
                        "PartsInventoryRepair" => $data[32],
                        "LaborInventoryRepair" => $data[33],
                        "RadioAdmin" => $data[35],
                        "TelevisionAdvertising" => $data[36],
                        "RadioTVProduction" => $data[37],
                        "PrintMedia" => $data[38],
                        "PrintProduction" => $data[39],
                        "PostageAdvertising" => $data[40],
                        "FreightAdvertising" => $data[41],
                        "NewspaperMagazineAdvertising" => $data[42],
                        "OtherPrint" => $data[43],
                        "TelephoneDirectories" => $data[44],
                        "MarqueeBillboards" => $data[45],
                        "CustomerReferrals" => $data[46],
                        "WebsiteDevelopment" => $data[47],
                        "Sponsorships" => $data[48],
                        "InternetOnline" => $data[49],
                        "AdvertisingandPromotionOther" => $data[50],
                        "SpecialEvents" => $data[51],
                        "Website" => $data[52],
                        "CashShortLong" => $data[53],
                        'VINSearchFees' => $data[54],
                        'InternalPostage' => $data[55],
                        'AdministrativeCollections' => $data[56],
                        'OtherSellingExpensesOther' => $data[57],
                        'SellingExpenseOther' => $data[58],
                        'BadChecks' => $data[59],
                        'NSFCheckFees' => $data[60],
                        'BankCardFees' => $data[61],
                        'BankServiceCharges' => $data[62],
                        'LateFees' => $data[63],
                        'BankChargesOther' => $data[64],
                        'GeneralAdminExpenseOther' => $data[65],
                        'LegalFees' => $data[66],
                        'AccountingFees' => $data[67],
                        'ConsultingFees' => $data[68],
                        'ProfessionalFeesOther' =>  $data[69],
                        'PropertyGeneralLiability' => $data[70],
                        'OfficersLife' => $data[71],
                        'InsuranceExpenseAdminOther' =>  $data[72],
                        'OfficeSupplies' => $data[73],
                        'Postage' => $data[74],
                        'Freight' => $data[75],
                        'GeneralSupplies' =>  $data[76],
                        'PostageFreightSuppliesOther' =>  $data[77],
                        'RentExpense' =>  $data[78],
                        'Utilities' => $data[79],
                        'PropertyInsurance' => $data[80],
                        'Security' => $data[81],
                        'PestControl' => $data[82],
                        'RepairMaintenancBuilding' =>  $data[83],
                        'RelocationExpenses' =>  $data[84],
                        'OccupancyExpenseOther' => $data[85],
                        'RepairsMaintenanceEquip' => $data[86],
                        'EquipmentRental' => $data[87],
                        'EquipmentExpenseOther' => $data[88],
                        'DepreciationExpenseFFE' => $data[89],
                        'AmortizationExpense' => $data[90],
                        'RepairMaintenanceVehicles' => $data[91],
                        'FuelOilVehicle' =>  $data[92],
                        'LeaseVehicle' => $data[93],
                        'VehicleInsurance' => $data[94],
                        'VehicleLicenses' => $data[95],
                        'VehicleExpenseOther' => $data[96],
                        'DepreciationExpense' => $data[97]
                    );
                $eid = DB::table('expense')->insertGetId($edata);
                Session::put('elastinsertid', $eid);

                $e1data =
                    array(
                        "exp_id" => Session::get('elastinsertid'),
                        "Date" => $cdate,
                        "Location" => $data[1],
                        "CharitableContributions" => $data[98],
                        "CustomerSettlements" => $data[99],
                        "OtherOther" => $data[100],
                        "Softwarelicensefees" => $data[101],
                        "ComputerSupplies" => $data[102],
                        "ComputerMaintenanceRepair" => $data[103],
                        "TelephoneCommunications" => $data[104],
                        "ComputerInternetExpensesOther" => $data[105],
                        "MiscellaneousExpense" => $data[106],
                        "Salary" => $data[107],
                        "TotalHourly" => $data[108],
                        "Overtimehourly" => $data[109],
                        "Holiday" => $data[110],
                        "Bonus" => $data[111],
                        "BonusReimbursementDue" => $data[112],
                        "SalariesWagesOther" => $data[113],
                        "MileageReimbursement" => $data[114],
                        "TravelExpense" => $data[115],
                        "MealsEntertainment" => $data[116],
                        'TravelEntertainmentOther' => $data[117],
                        'DuesDeductible' => $data[118],
                        'DuesNonDeductible' => $data[119],
                        'DuesSubscriptionsOther' => $data[120],
                        'FFCRATaxes' => $data[121],
                        'UnemploymentTaxes' => $data[122],
                        'FICAMatch' => $data[123],
                        'PayrollTaxesOther' => $data[124],
                        'RetirementBenefits' => $data[125],
                        'GroupHealthLifeInsurance' => $data[126],
                        'WorkerCompensation' => $data[127],
                        'InsuranceExpenseEmployeeOther' => $data[128],
                        'MedicalExpenses' => $data[129],
                        'EmployeeProcurement' => $data[130],
                        'DrugScreening' => $data[131],
                        'EmployeeMovingExpense' => $data[132],
                        'SeminarsEducation' => $data[133],
                        'EmployeeTraining' => $data[134],
                        'Uniforms' => $data[135],
                        'AwardsGifts' => $data[136],
                        'Banquet' => $data[137],
                        'SpecialEvents' => $data[138],
                        'LeasedEmployees' => $data[139],
                        'MovingExpenseAdministrative' => $data[140],
                        'OtherEmployeeExpenseOther' => $data[141],
                        'PayrollExpensesOther' => $data[142],
                        'FranchiseTax' => $data[143],
                        'PersonalProperty' => $data[144],
                        'RealEstate' => $data[145],
                        'SalesUseTax' => $data[146],
                        'WasteTiretax' => $data[147],
                        'MiscellaneousTax' => $data[148],
                        'BusinessLicensesPermits' => $data[149],
                        'FinesPenalties' => $data[150],
                        'RoyaltyFeesSherwood' => $data[151],
                        'RoyaltyFeesMabelvale' => $data[152],
                        'RoyaltyFeesConway' => $data[153],
                        'RoyaltyFeesFayetteville' => $data[154],
                        'RoyaltyFeesRogers' => $data[155],
                        'RoyaltyFeesDallas' => $data[156],
                        'RoyaltyFeesFtSmith' => $data[157],
                        'RoyaltyFeesAdmin' => $data[158],
                        'RoyaltyFeesOther' => $data[159],
                        'TaxLicensePermitExpenseOther' => $data[160],
                        'OperationalOverhead' => $data[161],
                        'Payoffs' => $data[175],
                        'otherIncome' => $data[164],
                        'purchasedisc' => $data[166]
                    );
                $expdata = DB::table('expense1')->insert($e1data);
                $custdata =
                    array(
                        "data_id" => Session::get('lastinsertid'),
                        "Date" => $cdate,
                        "Location" => $data[1],
                        "Customers" => $data[172],
                        "IdealCust" => $data[177],
                        "IdealAgre" => $data[178]
                        // "dummy_date" => '01-'.$cdate
                    );

                DB::table('Customer')->insert($custdata);
            } else {
                // echo "else";
                // die;

                DB::table('Revenue')->where('Date', $cdate)
                    ->where('Location', $dataa['Location'])->update($dataa);
                // Session::put('lastinsertid',Session::get('lastinsertid'));
                $fdataa = array(
                    'data_id' => $rev[0]->id,
                    "Date" => $cdate,
                    "Location" => $data[1],
                    'depreciation_inventory' => $data[19],
                    'paidout_epocharge' => $data[20],
                    'cashsalechargeoffs' => $data[21],
                    'skipstolenchargeoffs' => $data[22],
                    'insurancechargeoffs' => $data[23],
                    'returneddamagednonrepairable' => $data[24],
                    'nonrepairablechargeoffs' => $data[25],
                    'otherchargeoff' => $data[26],
                    'pastdueaccountchargeoff' => $data[27],
                    'inventorycostadjustment' => $data[28],
                    'chargeoffexpenseother' => $data[29],
                    'clubremittance' => $data[30],
                    'rentrefunds' => ($data[31] == '') ? 0 : $data[31],
                    'partsinventoryrepair' => $data[32],
                    'laborinventoryrepair' => $data[33],
                    'inventoryrepairother' => $data[34]
                );

                // echo "<pre>";
                // print_r($fdataa);

                DB::table('Cogsdata')->where('data_id', $rev[0]->id)->where('Date', $cdate)
                    ->where('Location', $dataa['Location'])->update($fdataa);

                $edata =
                    array(
                        'data_id' => $rev[0]->id,
                        "Date" => $cdate,
                        "Location" => $data[1],
                        "PartsInventoryRepair" => $data[32],
                        "LaborInventoryRepair" => $data[33],
                        "RadioAdmin" => $data[35],
                        "TelevisionAdvertising" => $data[36],
                        "RadioTVProduction" => $data[37],
                        "PrintMedia" => $data[38],
                        "PrintProduction" => $data[39],
                        "PostageAdvertising" => $data[40],
                        "FreightAdvertising" => $data[41],
                        "NewspaperMagazineAdvertising" => $data[42],
                        "OtherPrint" => $data[43],
                        "TelephoneDirectories" => $data[44],
                        "MarqueeBillboards" => $data[45],
                        "CustomerReferrals" => $data[46],
                        "WebsiteDevelopment" => $data[47],
                        "Sponsorships" => $data[48],
                        "InternetOnline" => $data[49],
                        "AdvertisingandPromotionOther" => $data[50],
                        "SpecialEvents" => $data[51],
                        "Website" => $data[52],
                        "CashShortLong" => $data[53],
                        'VINSearchFees' => $data[54],
                        'InternalPostage' => $data[55],
                        'AdministrativeCollections' => $data[56],
                        'OtherSellingExpensesOther' => $data[57],
                        'SellingExpenseOther' => $data[58],
                        'BadChecks' => $data[59],
                        'NSFCheckFees' => $data[60],
                        'BankCardFees' => $data[61],
                        'BankServiceCharges' => $data[62],
                        'LateFees' => $data[63],
                        'BankChargesOther' => $data[64],
                        'GeneralAdminExpenseOther' => $data[65],
                        'LegalFees' => $data[66],
                        'AccountingFees' => $data[67],
                        'ConsultingFees' => $data[68],
                        'ProfessionalFeesOther' =>  $data[69],
                        'PropertyGeneralLiability' => $data[70],
                        'OfficersLife' => $data[71],
                        'InsuranceExpenseAdminOther' =>  $data[72],
                        'OfficeSupplies' => $data[73],
                        'Postage' => $data[74],
                        'Freight' => $data[75],
                        'GeneralSupplies' =>  $data[76],
                        'PostageFreightSuppliesOther' =>  $data[77],
                        'RentExpense' =>  $data[78],
                        'Utilities' => $data[79],
                        'PropertyInsurance' => $data[80],
                        'Security' => $data[81],
                        'PestControl' => $data[82],
                        'RepairMaintenancBuilding' =>  $data[83],
                        'RelocationExpenses' =>  $data[84],
                        'OccupancyExpenseOther' => $data[85],
                        'RepairsMaintenanceEquip' => $data[86],
                        'EquipmentRental' => $data[87],
                        'EquipmentExpenseOther' => $data[88],
                        'DepreciationExpenseFFE' => $data[89],
                        'AmortizationExpense' => $data[90],
                        'RepairMaintenanceVehicles' => $data[91],
                        'FuelOilVehicle' =>  $data[92],
                        'LeaseVehicle' => $data[93],
                        'VehicleInsurance' => $data[94],
                        'VehicleLicenses' => $data[95],
                        'VehicleExpenseOther' => $data[96],
                        'DepreciationExpense' => $data[97]
                    );

                // echo "<pre>";
                // print_r($edata);
                // die;

                DB::table('expense')->where('data_id', $rev[0]->id)->where('Date', $cdate)
                    ->where('Location', $dataa['Location'])->update($edata);;
                $c = DB::table('expense')->where('data_id', $rev[0]->id)->where('Date', $cdate)
                    ->where('Location', $dataa['Location'])->get();

                // echo "<pre>";
                // print_r($c);

                $e1data =
                    array(
                        "exp_id" => isset($c[0]->id) ? $c[0]->id : null,
                        "Date" => $cdate,
                        "Location" => $data[1],
                        "CharitableContributions" => $data[98],
                        "CustomerSettlements" => $data[99],
                        "OtherOther" => $data[100],
                        "Softwarelicensefees" => $data[101],
                        "ComputerSupplies" => $data[102],
                        "ComputerMaintenanceRepair" => $data[103],
                        "TelephoneCommunications" => $data[104],
                        "ComputerInternetExpensesOther" => $data[105],
                        "MiscellaneousExpense" => $data[106],
                        "Salary" => $data[107],
                        "TotalHourly" => $data[108],
                        "Overtimehourly" => $data[109],
                        "Holiday" => $data[110],
                        "Bonus" => $data[111],
                        "BonusReimbursementDue" => $data[112],
                        "SalariesWagesOther" => $data[113],
                        "MileageReimbursement" => $data[114],
                        "TravelExpense" => $data[115],
                        "MealsEntertainment" => $data[116],
                        'TravelEntertainmentOther' => $data[117],
                        'DuesDeductible' => $data[118],
                        'DuesNonDeductible' => $data[119],
                        'DuesSubscriptionsOther' => $data[120],
                        'FFCRATaxes' => $data[121],
                        'UnemploymentTaxes' => $data[122],
                        'FICAMatch' => $data[123],
                        'PayrollTaxesOther' => $data[124],
                        'RetirementBenefits' => $data[125],
                        'GroupHealthLifeInsurance' => $data[126],
                        'WorkerCompensation' => $data[127],
                        'InsuranceExpenseEmployeeOther' => $data[128],
                        'MedicalExpenses' => $data[129],
                        'EmployeeProcurement' => $data[130],
                        'DrugScreening' => $data[131],
                        'EmployeeMovingExpense' => $data[132],
                        'SeminarsEducation' => $data[133],
                        'EmployeeTraining' => $data[134],
                        'Uniforms' => $data[135],
                        'AwardsGifts' => $data[136],
                        'Banquet' => $data[137],
                        'SpecialEvents' => $data[138],
                        'LeasedEmployees' => $data[139],
                        'MovingExpenseAdministrative' => $data[140],
                        'OtherEmployeeExpenseOther' => $data[141],
                        'PayrollExpensesOther' => $data[142],
                        'FranchiseTax' => $data[143],
                        'PersonalProperty' => $data[144],
                        'RealEstate' => $data[145],
                        'SalesUseTax' => $data[146],
                        'WasteTiretax' => $data[147],
                        'MiscellaneousTax' => $data[148],
                        'BusinessLicensesPermits' => $data[149],
                        'FinesPenalties' => $data[150],
                        'RoyaltyFeesSherwood' => $data[151],
                        'RoyaltyFeesMabelvale' => $data[152],
                        'RoyaltyFeesConway' => $data[153],
                        'RoyaltyFeesFayetteville' => $data[154],
                        'RoyaltyFeesRogers' => $data[155],
                        'RoyaltyFeesDallas' => $data[156],
                        'RoyaltyFeesFtSmith' => $data[157],
                        'RoyaltyFeesAdmin' => $data[158],
                        'RoyaltyFeesOther' => $data[159],
                        'TaxLicensePermitExpenseOther' => $data[160],
                        'OperationalOverhead' => $data[161],
                        'Payoffs' => $data[175],
                        'otherIncome' => $data[164],
                        'purchasedisc' => $data[166]
                    );

                DB::table('expense1')->where('Date', $cdate)
                    ->where('Location', $dataa['Location'])->update($e1data);

                $custdata =
                    array(
                        'data_id' => $rev[0]->id,
                        "Date" => $cdate,
                        "Location" => $data[1],
                        "Customers" => $data[172],
                        "IdealCust" => $data[177],
                        "IdealAgre" => $data[178]
                    );
                $a = DB::table('Customer')->where('data_id', $rev[0]->id)->where('Date', $cdate)
                    ->where('Location', $dataa['Location'])->update($custdata);
            }
        }
        return redirect('admin/content')->with('message', 'File has been added successfully.');
    }

    // public function file(Request $request)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $datas = new Revenue();
    //         $request->validate([
    //             'file' => 'required|mimes:csv,txt'
    //         ]);
    //         if ($request->hasfile('file')) {
    //             $datas->filename = $request->file;
    //             $name = time() . rand(1, 100) . '.' . $datas->filename->extension();
    //             if ($datas->filename->move(public_path('uploads'), $name)) {
    //                 $files[] = $name;
    //             }
    //         }
    //         $datas->save();
    //         $datas = [];


    //         if (($open = fopen(public_path() . '/uploads' . '/' . $name, "r")) !== FALSE) {
    //             $k = 0;
    //             while ($data = fgetcsv($open, 9000, ",")) {
    //                 $k++;
    //                 if ($k == 1) {
    //                     continue;
    //                 }
    //                 $datas[] = $data;
    //             }
    //             fclose($open);
    //         }
    //         // print_r($datas);
    //         // die;
    //         foreach ($datas as $k => $data) {
    //             $a = date_create($data[0]);
    //             $date = date_format($a, "m/d/Y");
    //             $inputdate = (explode("/", $date));
    //             $cdate = $inputdate[0] . "-" . $inputdate[2];
    //             $dataa = array(
    //                 "Date" => $cdate,
    //                 "Location" => $data[1],
    //                 "SalesTaxColl" => $data[2],
    //                 "RentalIncome" => $data[3],
    //                 "CashSales" => $data[4],
    //                 "CashSalesNoninventory" => $data[5],
    //                 "EarlyPurchaseOption" => $data[6],
    //                 "RollPro" => $data[7],
    //                 "CollectionFeeInHouse" => $data[8],
    //                 "ReinstatementFees" => $data[9],
    //                 "OtherFeesAlignments" => $data[10],
    //                 "OneTimeFees" => $data[11],
    //                 "NSFCheckFees" => $data[12],
    //                 "OtherMiscellaneousIncome" => $data[13],
    //                 "SalesTaxCollected" => $data[14],
    //                 "RollSafe" => $data[15],
    //                 "Chargebacks" => $data[16],
    //                 "ManagementFee" => $data[17],
    //                 "SubfranchiseeRoyaltyIncome" => $data[18]
    //             );
    //             foreach ($dataa as $key => $value) {
    //                 if ($value == '') {
    //                     //   $value == '0';
    //                     $dataa[$key] = '0';
    //                 }
    //             }
    //             $rev = DB::table('Revenue')->select('*')
    //                 ->where('Date', $cdate)
    //                 ->where('Location', $dataa['Location'])
    //                 ->get()->toArray();
    //             $del = DB::table('deliveries')->select('*')->where('date', $cdate)
    //                 ->where('location', $dataa['Location'])
    //                 ->get()->toArray();
    //             if (!$del) {
    //                 $deldata =
    //                     array(
    //                         "date" => $cdate,
    //                         "location" => $data[1],
    //                         "delivery" => $data[173],
    //                         "ideal" => $data[180],
    //                         // "dummy_date" => '01-'.$cdate
    //                     );
    //                 DB::table('deliveries')->insert($deldata);
    //             } else {
    //                 $deldata =
    //                     array(
    //                         "date" => $cdate,
    //                         "location" => $data[1],
    //                         "delivery" => $data[173],
    //                         "ideal" => $data[180]
    //                     );
    //                 $a = DB::table('deliveries')->where('date', $cdate)
    //                     ->where('location', $dataa['Location'])->update($deldata);
    //             }
    //             if (!$rev) {
    //                 $id = DB::table('Revenue')->insertGetId($dataa);
    //                 Session::put('lastinsertid', $id);
    //                 $fdataa = array(
    //                     'data_id' => Session::get('lastinsertid'),
    //                     "Date" => $cdate,
    //                     "Location" => $data[1], 'depreciation_inventory' => $data[19], 'paidout_epocharge' => $data[20], 'cashsalechargeoffs' => $data[21], 'skipstolenchargeoffs' => $data[22], 'insurancechargeoffs' => $data[23], 'returneddamagednonrepairable' => $data[24], 'nonrepairablechargeoffs' => $data[25], 'otherchargeoff' => $data[26], 'pastdueaccountchargeoff' => $data[27], 'inventorycostadjustment' => $data[28], 'chargeoffexpenseother' => $data[29], 'clubremittance' => $data[30], 'rentrefunds' => $data[31], 'partsinventoryrepair' => $data[32], 'laborinventoryrepair' => $data[33], 'inventoryrepairother' => $data[34]
    //                 );
    //                 DB::table('Cogsdata')->insert($fdataa);
    //                 $edata =
    //                     array(
    //                         'data_id' => Session::get('lastinsertid'),
    //                         "Date" => $cdate,
    //                         "Location" => $data[1],
    //                         "PartsInventoryRepair" => $data[32],
    //                         "LaborInventoryRepair" => $data[33],
    //                         "RadioAdmin" => $data[35],
    //                         "TelevisionAdvertising" => $data[36],
    //                         "RadioTVProduction" => $data[37],
    //                         "PrintMedia" => $data[38],
    //                         "PrintProduction" => $data[39],
    //                         "PostageAdvertising" => $data[40],
    //                         "FreightAdvertising" => $data[41],
    //                         "NewspaperMagazineAdvertising" => $data[42],
    //                         "OtherPrint" => $data[43],
    //                         "TelephoneDirectories" => $data[44],
    //                         "MarqueeBillboards" => $data[45],
    //                         "CustomerReferrals" => $data[46],
    //                         "WebsiteDevelopment" => $data[47],
    //                         "Sponsorships" => $data[48],
    //                         "InternetOnline" => $data[49],
    //                         "AdvertisingandPromotionOther" => $data[50], "SpecialEvents" => $data[51], "Website" => $data[52], "CashShortLong" => $data[53], 'VINSearchFees' => $data[54], 'InternalPostage' => $data[55], 'AdministrativeCollections' => $data[56], 'OtherSellingExpensesOther' => $data[57], 'SellingExpenseOther' => $data[58], 'BadChecks' => $data[59], 'NSFCheckFees' => $data[60], 'BankCardFees' => $data[61], 'BankServiceCharges' => $data[62], 'LateFees' => $data[63], 'BankChargesOther' => $data[64], 'GeneralAdminExpenseOther' => $data[65], 'LegalFees' => $data[66], 'AccountingFees' => $data[67], 'ConsultingFees' => $data[68], 'ProfessionalFeesOther' =>  $data[69], 'PropertyGeneralLiability' => $data[70], 'OfficersLife' => $data[71], 'InsuranceExpenseAdminOther' =>  $data[72], 'OfficeSupplies' => $data[73], 'Postage' => $data[74], 'Freight' => $data[75], 'GeneralSupplies' =>  $data[76], 'PostageFreightSuppliesOther' =>  $data[77], 'RentExpense' =>  $data[78], 'Utilities' => $data[79], 'PropertyInsurance' => $data[80], 'Security' => $data[81], 'PestControl' => $data[82], 'RepairMaintenancBuilding' =>  $data[83], 'RelocationExpenses' =>  $data[84], 'OccupancyExpenseOther' => $data[85], 'RepairsMaintenanceEquip' => $data[86], 'EquipmentRental' => $data[87], 'EquipmentExpenseOther' => $data[88], 'DepreciationExpenseFFE' => $data[89], 'AmortizationExpense' => $data[90], 'RepairMaintenanceVehicles' => $data[91], 'FuelOilVehicle' =>  $data[92], 'LeaseVehicle' => $data[93], 'VehicleInsurance' => $data[94], 'VehicleLicenses' => $data[95], 'VehicleExpenseOther' => $data[96], 'DepreciationExpense' => $data[97]
    //                     );
    //                 $eid = DB::table('expense')->insertGetId($edata);
    //                 Session::put('elastinsertid', $eid);
    //                 $e1data =
    //                     array(
    //                         "exp_id" => Session::get('elastinsertid'),
    //                         "Date" => $cdate,
    //                         "Location" => $data[1],
    //                         "CharitableContributions" => $data[98],
    //                         "CustomerSettlements" => $data[99],
    //                         "OtherOther" => $data[100],
    //                         "Softwarelicensefees" => $data[101],
    //                         "ComputerSupplies" => $data[102],
    //                         "ComputerMaintenanceRepair" => $data[103],
    //                         "TelephoneCommunications" => $data[104],
    //                         "ComputerInternetExpensesOther" => $data[105],
    //                         "MiscellaneousExpense" => $data[106],
    //                         "Salary" => $data[107],
    //                         "TotalHourly" => $data[108],
    //                         "Overtimehourly" => $data[109],
    //                         "Holiday" => $data[110],
    //                         "Bonus" => $data[111],
    //                         "BonusReimbursementDue" => $data[112],
    //                         "SalariesWagesOther" => $data[113], "MileageReimbursement" => $data[114], "TravelExpense" => $data[115], "MealsEntertainment" => $data[116], 'TravelEntertainmentOther' => $data[117], 'DuesDeductible' => $data[118], 'DuesNonDeductible' => $data[119], 'DuesSubscriptionsOther' => $data[120], 'FFCRATaxes' => $data[121], 'UnemploymentTaxes' => $data[122], 'FICAMatch' => $data[123], 'PayrollTaxesOther' => $data[124], 'RetirementBenefits' => $data[125], 'GroupHealthLifeInsurance' => $data[126], 'WorkerCompensation' => $data[127], 'InsuranceExpenseEmployeeOther' => $data[128], 'MedicalExpenses' => $data[129], 'EmployeeProcurement' => $data[130], 'DrugScreening' => $data[131], 'EmployeeMovingExpense' => $data[132], 'SeminarsEducation' => $data[133], 'EmployeeTraining' => $data[134], 'Uniforms' => $data[135], 'AwardsGifts' => $data[136], 'Banquet' => $data[137], 'SpecialEvents' => $data[138], 'LeasedEmployees' => $data[139], 'MovingExpenseAdministrative' => $data[140], 'OtherEmployeeExpenseOther' => $data[141], 'PayrollExpensesOther' => $data[142], 'FranchiseTax' => $data[143], 'PersonalProperty' => $data[144], 'RealEstate' => $data[145], 'SalesUseTax' => $data[146], 'WasteTiretax' => $data[147], 'MiscellaneousTax' => $data[148], 'BusinessLicensesPermits' => $data[149], 'FinesPenalties' => $data[150], 'RoyaltyFeesSherwood' => $data[151], 'RoyaltyFeesMabelvale' => $data[152], 'RoyaltyFeesConway' => $data[153], 'RoyaltyFeesFayetteville' => $data[154], 'RoyaltyFeesRogers' => $data[155], 'RoyaltyFeesDallas' => $data[156], 'RoyaltyFeesFtSmith' => $data[157], 'RoyaltyFeesAdmin' => $data[158], 'RoyaltyFeesOther' => $data[159], 'TaxLicensePermitExpenseOther' => $data[160], 'OperationalOverhead' => $data[161], 'Payoffs' => $data[175], 'otherIncome' => $data[164], 'purchasedisc' => $data[166]
    //                     );
    //                 $expdata = DB::table('expense1')->insert($e1data);
    //                 $custdata =
    //                     array(
    //                         "data_id" => Session::get('lastinsertid'),
    //                         "Date" => $cdate,
    //                         "Location" => $data[1],
    //                         "Customers" => $data[172],
    //                         // "dummy_date" => '01-'.$cdate
    //                     );
    //                 DB::table('Customer')->insert($custdata);
    //             } else {
    //                 DB::table('Revenue')->where('Date', $cdate)
    //                     ->where('Location', $dataa['Location'])->update($dataa);
    //                 // Session::put('lastinsertid',Session::get('lastinsertid'));
    //                 $fdataa = array(
    //                     'data_id' => $rev[0]->id,  "Date" => $cdate,
    //                     "Location" => $data[1], 'depreciation_inventory' => $data[19], 'paidout_epocharge' => $data[20], 'cashsalechargeoffs' => $data[21], 'skipstolenchargeoffs' => $data[22], 'insurancechargeoffs' => $data[23], 'returneddamagednonrepairable' => $data[24], 'nonrepairablechargeoffs' => $data[25], 'otherchargeoff' => $data[26], 'pastdueaccountchargeoff' => $data[27], 'inventorycostadjustment' => $data[28], 'chargeoffexpenseother' => $data[29], 'clubremittance' => $data[30], 'rentrefunds' => $data[31], 'partsinventoryrepair' => $data[32], 'laborinventoryrepair' => $data[33], 'inventoryrepairother' => $data[34]
    //                 );
    //                 DB::table('Cogsdata')->where('data_id', $rev[0]->id)->where('Date', $cdate)
    //                     ->where('Location', $dataa['Location'])->update($fdataa);
    //                 $edata =
    //                     array(
    //                         'data_id' => $rev[0]->id,
    //                         "Date" => $cdate,
    //                         "Location" => $data[1],
    //                         "PartsInventoryRepair" => $data[32],
    //                         "LaborInventoryRepair" => $data[33],
    //                         "RadioAdmin" => $data[35],
    //                         "TelevisionAdvertising" => $data[36],
    //                         "RadioTVProduction" => $data[37],
    //                         "PrintMedia" => $data[38],
    //                         "PrintProduction" => $data[39],
    //                         "PostageAdvertising" => $data[40],
    //                         "FreightAdvertising" => $data[41],
    //                         "NewspaperMagazineAdvertising" => $data[42],
    //                         "OtherPrint" => $data[43],
    //                         "TelephoneDirectories" => $data[44],
    //                         "MarqueeBillboards" => $data[45],
    //                         "CustomerReferrals" => $data[46],
    //                         "WebsiteDevelopment" => $data[47],
    //                         "Sponsorships" => $data[48],
    //                         "InternetOnline" => $data[49],
    //                         "AdvertisingandPromotionOther" => $data[50], "SpecialEvents" => $data[51], "Website" => $data[52], "CashShortLong" => $data[53], 'VINSearchFees' => $data[54], 'InternalPostage' => $data[55], 'AdministrativeCollections' => $data[56], 'OtherSellingExpensesOther' => $data[57], 'SellingExpenseOther' => $data[58], 'BadChecks' => $data[59], 'NSFCheckFees' => $data[60], 'BankCardFees' => $data[61], 'BankServiceCharges' => $data[62], 'LateFees' => $data[63], 'BankChargesOther' => $data[64], 'GeneralAdminExpenseOther' => $data[65], 'LegalFees' => $data[66], 'AccountingFees' => $data[67], 'ConsultingFees' => $data[68], 'ProfessionalFeesOther' =>  $data[69], 'PropertyGeneralLiability' => $data[70], 'OfficersLife' => $data[71], 'InsuranceExpenseAdminOther' =>  $data[72], 'OfficeSupplies' => $data[73], 'Postage' => $data[74], 'Freight' => $data[75], 'GeneralSupplies' =>  $data[76], 'PostageFreightSuppliesOther' =>  $data[77], 'RentExpense' =>  $data[78], 'Utilities' => $data[79], 'PropertyInsurance' => $data[80], 'Security' => $data[81], 'PestControl' => $data[82], 'RepairMaintenancBuilding' =>  $data[83], 'RelocationExpenses' =>  $data[84], 'OccupancyExpenseOther' => $data[85], 'RepairsMaintenanceEquip' => $data[86], 'EquipmentRental' => $data[87], 'EquipmentExpenseOther' => $data[88], 'DepreciationExpenseFFE' => $data[89], 'AmortizationExpense' => $data[90], 'RepairMaintenanceVehicles' => $data[91], 'FuelOilVehicle' =>  $data[92], 'LeaseVehicle' => $data[93], 'VehicleInsurance' => $data[94], 'VehicleLicenses' => $data[95], 'VehicleExpenseOther' => $data[96], 'DepreciationExpense' => $data[97]
    //                     );


    //                 DB::table('expense')->where('data_id', $rev[0]->id)->where('Date', $cdate)
    //                     ->where('Location', $dataa['Location'])->update($edata);;
    //                 $c = DB::table('expense')->where('data_id', $rev[0]->id)->where('Date', $cdate)
    //                     ->where('Location', $dataa['Location'])->get();


    //                 $e1data =
    //                     array(
    //                         "exp_id" => isset($c[0]->id) ? $c[0]->id : null,
    //                         "Date" => $cdate,
    //                         "Location" => $data[1],
    //                         "CharitableContributions" => $data[98],
    //                         "CustomerSettlements" => $data[99],
    //                         "OtherOther" => $data[100],
    //                         "Softwarelicensefees" => $data[101],
    //                         "ComputerSupplies" => $data[102],
    //                         "ComputerMaintenanceRepair" => $data[103],
    //                         "TelephoneCommunications" => $data[104],
    //                         "ComputerInternetExpensesOther" => $data[105],
    //                         "MiscellaneousExpense" => $data[106],
    //                         "Salary" => $data[107],
    //                         "TotalHourly" => $data[108],
    //                         "Overtimehourly" => $data[109],
    //                         "Holiday" => $data[110],
    //                         "Bonus" => $data[111],
    //                         "BonusReimbursementDue" => $data[112],
    //                         "SalariesWagesOther" => $data[113],
    //                         "MileageReimbursement" => $data[114],
    //                         "TravelExpense" => $data[115],
    //                         "MealsEntertainment" => $data[116],
    //                         'TravelEntertainmentOther' => $data[117],
    //                         'DuesDeductible' => $data[118], 'DuesNonDeductible' => $data[119], 'DuesSubscriptionsOther' => $data[120], 'FFCRATaxes' => $data[121], 'UnemploymentTaxes' => $data[122], 'FICAMatch' => $data[123], 'PayrollTaxesOther' => $data[124], 'RetirementBenefits' => $data[125], 'GroupHealthLifeInsurance' => $data[126], 'WorkerCompensation' => $data[127], 'InsuranceExpenseEmployeeOther' => $data[128], 'MedicalExpenses' => $data[129], 'EmployeeProcurement' => $data[130], 'DrugScreening' => $data[131], 'EmployeeMovingExpense' => $data[132], 'SeminarsEducation' => $data[133], 'EmployeeTraining' => $data[134], 'Uniforms' => $data[135], 'AwardsGifts' => $data[136], 'Banquet' => $data[137], 'SpecialEvents' => $data[138], 'LeasedEmployees' => $data[139], 'MovingExpenseAdministrative' => $data[140], 'OtherEmployeeExpenseOther' => $data[141], 'PayrollExpensesOther' => $data[142], 'FranchiseTax' => $data[143], 'PersonalProperty' => $data[144], 'RealEstate' => $data[145], 'SalesUseTax' => $data[146], 'WasteTiretax' => $data[147], 'MiscellaneousTax' => $data[148], 'BusinessLicensesPermits' => $data[149], 'FinesPenalties' => $data[150], 'RoyaltyFeesSherwood' => $data[151], 'RoyaltyFeesMabelvale' => $data[152], 'RoyaltyFeesConway' => $data[153], 'RoyaltyFeesFayetteville' => $data[154], 'RoyaltyFeesRogers' => $data[155], 'RoyaltyFeesDallas' => $data[156], 'RoyaltyFeesFtSmith' => $data[157], 'RoyaltyFeesAdmin' => $data[158], 'RoyaltyFeesOther' => $data[159], 'TaxLicensePermitExpenseOther' => $data[160], 'OperationalOverhead' => $data[161], 'Payoffs' => $data[175], 'otherIncome' => $data[164], 'purchasedisc' => $data[166]
    //                     );

    //                 DB::table('expense1')->where('Date', $cdate)
    //                     ->where('Location', $dataa['Location'])->update($e1data);

    //                 $custdata =
    //                     array(
    //                         'data_id' => $rev[0]->id,
    //                         "Date" => $cdate,
    //                         "Location" => $data[1],
    //                         "Customers" => $data[172]
    //                     );
    //                 $a = DB::table('Customer')->where('data_id', $rev[0]->id)->where('Date', $cdate)
    //                     ->where('Location', $dataa['Location'])->update($custdata);
    //             }
    //         }
    //         DB::commit();

    //         return redirect('admin/content')->with('message', 'File has been added successfully.');
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    //     }
    // }
}
