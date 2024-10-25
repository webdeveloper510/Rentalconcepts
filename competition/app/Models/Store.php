<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'daily_reports';
    protected $fillable = [
        'SummaryDate',
        'Store',
        'StoreName',
        'RentalIncome',
        'NetSales',
        'GRPAmount',
        'ProcessingFees',
        'LateFees',
        'ReturnedCheckCharge',
        'FeesAndCharges',
        'ClubAndESP',
        'TotalRevenue',
        'Tax',
        'NetReceivable',
        'NSFRefunds',
        'TotalBankDeposit',
        'TotalCash',
        'Deposit1',
        'Deposit2',
        'Deposit3',
        'Deposit4',
        'Deposit6',
        'RentalOverShort',
        'FreeTimeAmount',
        'FreeNewAgreements',
        'AgreementDeliveries',
        'PotentialRevenueDeliveries',
        'AgreementPickups',
        'PotentialRevenuePickups',
        'AgreementPayouts',
        'AgreementChargeoffs',
        'PotentialRevenueSkips',
        'OpenAgreementCount',
        'PotentialRevenue',
        'TotalPastDueNbr',
        'PD_Percent',
        'TotalPastDueAmount',
        'PastDue1_4Amount',
        'PastDue5_7Amount',
        'PastDue8_15Amount',
        'PastDue32_PlusAmount',
        'CustomerCount',
        'UnitsOnRent',
        'IdleUnits'
    ];
}
