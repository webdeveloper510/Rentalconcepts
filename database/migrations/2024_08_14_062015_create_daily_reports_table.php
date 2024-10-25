<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
            $table->date('SummaryDate'); 
            $table->integer('Store');
            $table->string('StoreName'); 
            $table->decimal('RentalIncome', 15, 2); 
            $table->decimal('NetSales', 15, 2);
            $table->decimal('GRPAmount', 15, 2);
            $table->decimal('ProcessingFees', 15, 2);
            $table->decimal('LateFees', 15, 2);
            $table->decimal('ReturnedCheckCharge', 15, 2);
            $table->decimal('FeesAndCharges', 15, 2);
            $table->decimal('ClubAndESP', 15, 2);
            $table->decimal('TotalRevenue', 15, 2);
            $table->decimal('Tax', 15, 2);
            $table->decimal('NetReceivable', 15, 2);
            $table->decimal('NSFRefunds', 15, 2);
            $table->decimal('TotalBankDeposit', 15, 2);
            $table->decimal('TotalCash', 15, 2);
            $table->decimal('Deposit1', 15, 2);
            $table->decimal('Deposit2', 15, 2);
            $table->decimal('Deposit3', 15, 2);
            $table->decimal('Deposit4', 15, 2);
            $table->decimal('Deposit6', 15, 2);
            $table->decimal('RentalOverShort', 15, 2);
            $table->decimal('FreeTimeAmount', 15, 2);
            $table->integer('FreeNewAgreements'); 
            $table->integer('AgreementDeliveries');
            $table->decimal('PotentialRevenueDeliveries', 15, 2);
            $table->integer('AgreementPickups');
            $table->decimal('PotentialRevenuePickups', 15, 2);
            $table->integer('AgreementPayouts');
            $table->integer('AgreementChargeoffs');
            $table->decimal('PotentialRevenueSkips', 15, 2);
            $table->integer('OpenAgreementCount');
            $table->decimal('PotentialRevenue', 15, 2);
            $table->integer('TotalPastDueNbr');
            $table->decimal('PD_Percent', 5, 2); 
            $table->decimal('TotalPastDueAmount', 15, 2);
            $table->decimal('PastDue1_4Amount', 15, 2); 
            $table->decimal('PastDue5_7Amount', 15, 2);
            $table->decimal('PastDue8_15Amount', 15, 2);
            $table->decimal('PastDue32_PlusAmount', 15, 2); 
            $table->integer('CustomerCount');
            $table->integer('UnitsOnRent');
            $table->integer('IdleUnits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_reports');
    }
};
