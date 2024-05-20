<html>

<head>
    <style>
        .page_break {
            page-break-after: always;
        }

        td {
            font-size: smaller;
        }
    </style>
</head>

<body>
    <header>
        <h3 style="text-align:center;margin-bottom:2px;">Rental Concepts, LLC<br>Profit-Loss Statement<br>{{@$monthNamee}} {{@$yearr}} </h3>
        <h5 style="text-align:left;margin-top: -50px;margin-left: 29px;"><?php echo  date('h:i A'); ?><br>
            <?php echo date('m/d/Y');  ?><br>
            Accrual Basis <br>
        </h5>
        <hr>
    </header>
    <table class="table table-bordered page_break" style="font-size:90%;width:100%;margin-left:8px">
        <thead>
            <tr>
                <td>
                    <h4><u>Location : {{ @$locname}}</u></h4>
                </td>
            </tr>
            <th> </th>
            <th style="border-bottom: 1px solid #000;">                
                {{@$newDate}}
            </th>
            <th style="border-bottom: 1px solid #000;">
                @if(@$monthNamee == 'Jan')
                {{@$monthNamee}}
                @else
                Jan - {{@$newDate}}
                @endif
            </th>
            <th colspan="2" style="border: none; text-align:center;border-bottom: 1px solid #000;"> % of Income</th>
        </thead>
        <tbody>
            <tr></tr>
            <tr>
                <td><b>Ordinary Income/Expense</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Income</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4000-00 · Rental Income</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome){{number_format(round(@$data[0]->RentalIncome,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[0]){{number_format(round(@$alldata[0]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->RentalIncome /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4100-00 · Cash Sales</td>
                <td style="text-align: right;">@if(@$data[0]->CashSales)
                    {{number_format(round(@$data[0]->CashSales,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[1]){{number_format(round(@$alldata[1]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->CashSales /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4105-00 · Early Purchase Option</td>
                <td style="text-align: right;">@if(@$data[0]->EarlyPurchaseOption)
                    {{number_format(round(@$data[0]->EarlyPurchaseOption,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[2]){{number_format(round(@$alldata[2]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->EarlyPurchaseOption /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else
                <b> - </b>
                @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4200-00 · Roll Pro</td>
                <td style="text-align: right;">@if(@$data[0]->RollPro)
                    {{number_format(round(@$data[0]->RollPro,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[3]){{number_format(round(@$alldata[3]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->RollPro /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else
                <b> - </b>
                @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4205-00 · Collection Fee –In-House</td>
                <td style="text-align: right;">@if(@$data[0]->CollectionFeeInHouse)
                    {{number_format(round(@$data[0]->CollectionFeeInHouse,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[4]){{number_format(round(@$alldata[4]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->CollectionFeeInHouse /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else
                <b> - </b>
                @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4210-00 · Reinstatement Fees</td>
                <td style="text-align: right;">@if(@$data[0]->ReinstatementFees)
                    {{number_format(round(@$data[0]->ReinstatementFees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[5]){{number_format(round(@$alldata[5]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->ReinstatementFees /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else
                <b> -</b>
                @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4214-00 · Other Fees - Alignments</td>
                <td style="text-align: right;">@if(@$data[0]->OtherFeesAlignments)
                    {{number_format(round(@$data[0]->OtherFeesAlignments,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[6]){{number_format(round(@$alldata[6]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->OtherFeesAlignments /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else
                <b> - </b>
                @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4215-00 · One Time Fees</td>
                <td style="text-align: right;">@if(@$data[0]->OneTimeFees)
                    {{number_format(round(@$data[0]->OneTimeFees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[7]){{number_format(round(@$alldata[7]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->OneTimeFees /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4225-00 · NSF Check Fees</td>
                <td style="text-align: right;">@if(@$data[0]->NSFCheckFees)
                    {{number_format(round(@$data[0]->NSFCheckFees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[8]){{number_format(round(@$alldata[8]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->NSFCheckFees /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4230-00 · Other Miscellaneous Income</td>
                <td style="text-align:right">@if(@$data[0]->OtherMiscellaneousIncome)
                    {{number_format(round(@$data[0]->OtherMiscellaneousIncome,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align:right">@if(@$alldata[9]){{number_format(round(@$alldata[9]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->OtherMiscellaneousIncome /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4240-00 · Roll Safe</td>
                <td style="text-align: right;">@if(@$data[0]->RollSafe)
                    {{number_format(round(@$data[0]->RollSafe,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[10]){{number_format(round(@$alldata[10]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->RollSafe /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[10] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4250-00 · Chargebacks</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->Chargebacks)
                    {{number_format(round(@$data[0]->Chargebacks,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[11]){{number_format(round(@$alldata[11]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->Chargebacks /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else
                <b> -</b>
                @endif<td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[11] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr style="border-bottom: 3px solid #000;">
                <td style=" text-indent: 15%;"><b>Total Income</b></td>
                <td style="text-align: right;">{{number_format(round(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome+ @$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11]))}}</td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Cost of Goods Sold</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5000-00 · Depreciation - Inventory</td>
                <td style="text-align: right;">@if(@$cog[0]->depreciation_inventory){{number_format(round(@$cog[0]->depreciation_inventory,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$cogdata[0]){{number_format(round(@$cogdata[0]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->depreciation_inventory /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b>
                @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5100-00 · Charge Off Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5101-00 · Paid Out & EPO Charge Offs</td>
                <td style="text-align: right;">@if(@$cog[0]->paidout_epocharge){{number_format(round(@$cog[0]->paidout_epocharge,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$cogdata[1]){{number_format(round(@$cogdata[1]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->paidout_epocharge /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b>@endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5102-00 · Cash Sale Charge Offs</td>
                <td style="text-align: right;">@if(@$cog[0]->cashsalechargeoffs){{number_format(round(@$cog[0]->cashsalechargeoffs,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$cogdata[2]){{number_format(round(@$cogdata[2]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->cashsalechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5103-00 · Skip/Stolen Charge Offs</td>
                <td style="text-align: right;">@if(@$cog[0]->skipstolenchargeoffs){{number_format(round(@$cog[0]->skipstolenchargeoffs,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$cogdata[3]){{number_format(round(@$cogdata[3]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->skipstolenchargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5104-00 · Non-Repairable Charge Offs</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 27%;">5104-01 · Insurance Charge Offs</td>
                <td style="text-align: right;">@if(@$cog[0]->insurancechargeoffs){{number_format(round(@$cog[0]->insurancechargeoffs,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$cogdata[4]){{number_format(round(@$cogdata[4]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 27%;">5104-02 · Returned Damaged/Non-Repairable</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cog[0]->returneddamagednonrepairable){{number_format(round(@$cog[0]->returneddamagednonrepairable,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cogdata[5]){{number_format(round(@$cogdata[5]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 5104-00 · Non-Repairable Charge Offs</b></td>
                <td style="text-align: right;">{{number_format(round(@$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable,0))}}</td>
                <td style="text-align: right;">{{number_format(round( @$cogdata[4] +@$cogdata[5] ))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 + @$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +@$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +@$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 ,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5105-00 · Other Charge off</td>
                <td style="text-align: right;">@if(@$cog[0]->otherchargeoff){{number_format(round(@$cog[0]->otherchargeoff,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$cogdata[6]){{number_format(round(@$cogdata[6]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->otherchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b>@endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5105-01 · Past Due Account Charge Off</td>
                <td style="text-align: right;">@if(@$cog[0]->pastdueaccountchargeoff){{number_format(round(@$cog[0]->pastdueaccountchargeoff,2))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$cogdata[7]){{number_format(round(@$cogdata[7]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->pastdueaccountchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5106-00 · Inventory Cost Adjustment</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cog[0]->inventorycostadjustment){{number_format(round(@$cog[0]->inventorycostadjustment,2))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cogdata[8]){{number_format(round(@$cogdata[8]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->inventorycostadjustment /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 5100-00 · Charge Off Expense</b></td>
                <td style="text-align: right;">{{number_format(round(@$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment ,0))}}</td>
                <td style="text-align: right;">{{number_format(round( @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8],2))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->paidout_epocharge /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->cashsalechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->skipstolenchargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 +@$cog[0]->otherchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->pastdueaccountchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->inventorycostadjustment /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b>
                @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100  +
                          @$cogdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                           @$cogdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                            @$cogdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5400-00 · Club Remittance</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cog[0]->clubremittance){{number_format(round(@$cog[0]->clubremittance,2))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cogdata[9]){{number_format(round(@$cogdata[9]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->clubremittance /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr style="border-bottom: 3px solid #000;">
                <td style="text-indent:15%;"><b>Total COGS</b></td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance ,0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9],0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$cog[0]->depreciation_inventory /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 +@$cog[0]->paidout_epocharge /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->cashsalechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->skipstolenchargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 +@$cog[0]->otherchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->pastdueaccountchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->inventorycostadjustment /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->clubremittance /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$cogdata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +@$cogdata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100  +
                          @$cogdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                           @$cogdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                            @$cogdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 +
                            @$cogdata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100 ,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr style="border-bottom: 3px solid #000;">
                <td style=" text-indent: 15%;"><b>Gross Profit</b></td>
                <td style="text-align: right;">{{number_format(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -(@$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance))}}</td>
                <td style="text-align: right;">{{number_format(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -(@$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance))/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))/ (@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Expense</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6001-00 · Selling Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6069-00 · Inventory Repairs</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6070-00 · Parts - Inventory Repair</td>
                <td style="text-align: right;">@if(@$exp[0]->PartsInventoryRepair){{number_format(round(@$exp[0]->PartsInventoryRepair,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[0]){{number_format(round(@$expdata[0],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->PartsInventoryRepair/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif</td>
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6071-00 · Labor - Inventory Repair</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->LaborInventoryRepair){{number_format(round(@$exp[0]->LaborInventoryRepair,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[1]){{number_format(round(@$expdata[1],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->LaborInventoryRepair/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6069-00 · Inventory Repairs</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[0] + @$expdata[1],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round((@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b>@endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[0] + @$expdata[1])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6490-00 · Advertising and Promotion</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6500-00 · Radio - Admin</td>
                <td style="text-align: right;">@if(@$exp[0]->RadioAdmin){{number_format(round(@$exp[0]->RadioAdmin,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[2]){{number_format(round(@$expdata[2],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->RadioAdmin /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent: 25%;">6510-00 · Print Media</td>
                <td style="text-align: right;">@if(@$exp[0]->PrintMedia){{number_format(round(@$exp[0]->PrintMedia,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[3]){{number_format(round(@$expdata[3],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->PrintMedia/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6550-00 · Sponsorships</td>
                <td style="text-align: right;">@if(@$exp[0]->Sponsorships){{number_format(round(@$exp[0]->Sponsorships,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[4]){{number_format(round(@$expdata[4],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->Sponsorships/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6551-00 · Internet/Online</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->InternetOnline){{number_format(round(@$exp[0]->InternetOnline,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[5]){{number_format(round(@$expdata[5],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->InternetOnline/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6490-00 · Advertising and Promotion</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round((@$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b>@endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6530-00 · Special Events</td>
                <td style="text-align: right;">@if(@$exp[0]->SpecialEvents){{number_format(round(@$exp[0]->SpecialEvents,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[6]){{number_format(round(@$expdata[6],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->SpecialEvents/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6555-00 · Other Selling Expenses</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6018-00 · Cash Short (Long)</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->CashShortLong){{number_format(round(@$exp[0]->CashShortLong,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[7]){{number_format(round(@$expdata[7],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->CashShortLong/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6555-00 · Other Selling Expenses</b></td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->CashShortLong){{number_format(round(@$exp[0]->CashShortLong,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[7]){{number_format(round(@$expdata[7],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->CashShortLong/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6001-00 · Selling Expense</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6002-00 · General & Admin Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6019-00 · Bank Charges</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6023-00 · Bank Card Fees</td>
                <td style="text-align: right;">@if(@$exp[0]->BankCardFees){{number_format(round(@$exp[0]->BankCardFees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[8]){{number_format(round(@$expdata[8],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->BankCardFees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6025-00 · Bank Service Charges</td>
                <td style="text-align: right;">@if(@$exp[0]->BankServiceCharges){{number_format(round(@$exp[0]->BankServiceCharges,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[9]){{number_format(round(@$expdata[9],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->BankServiceCharges/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6019-00 · Bank Charges - Other</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->BankChargesOther){{number_format(round(@$exp[0]->BankChargesOther,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[10]){{number_format(round(@$expdata[10],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->BankChargesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[10] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6019-00 · Bank Charges</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[8] + @$expdata[9] +@$expdata[10],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[8] + @$expdata[9] +@$expdata[10])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6002-00 · General & Admin Expense</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[8] + @$expdata[9] +@$expdata[10],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[8] + @$expdata[9] +@$expdata[10])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6029-00 · Professional Fees</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6034-00 · Legal Fees</td>
                <td style="text-align: right;">@if(@$exp[0]->LegalFees){{number_format(round(@$exp[0]->LegalFees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[11]){{number_format(round(@$expdata[11],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->LegalFees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[11] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6035-00 · Accounting Fees</td>
                <td style="text-align: right;">@if(@$exp[0]->AccountingFees){{number_format(round(@$exp[0]->AccountingFees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[12]){{number_format(round(@$expdata[12],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->AccountingFees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[12] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6029-00 · Professional Fees - Other</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->ProfessionalFeesOther){{number_format(round(@$exp[0]->ProfessionalFeesOther,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[13]){{number_format(round(@$expdata[13],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->ProfessionalFeesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[13] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6029-00 · Professional Fees</b></td>
                <td style="text-align: right;">{{ number_format(round(@$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[11] +@$expdata[12] +@$expdata[13],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOtherr)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[11] +@$expdata[12] +@$expdata[13])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6039-00 · Insurance Expense - Admin</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6040-00 · Property & General Liability</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->PropertyGeneralLiability){{number_format(round(@$exp[0]->PropertyGeneralLiability,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[14]){{number_format(round(@$expdata[14],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->PropertyGeneralLiability/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[14] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6039-00 · Insurance Expense - Admin</b></td>
                <td style="text-align: right;">@if(@$exp[0]->PropertyGeneralLiability){{number_format(round(@$exp[0]->PropertyGeneralLiability,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[14]){{number_format(round(@$expdata[14],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->PropertyGeneralLiability)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[14])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6059-00 · Postage, Freight & Supplies</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6000-00 · Office Supplies</td>
                <td style="text-align: right;">@if(@$exp[0]->OfficeSupplies){{number_format(round(@$exp[0]->OfficeSupplies,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[15]){{number_format(round(@$expdata[15],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->OfficeSupplies/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[15] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6010-00 · Postage</td>
                <td style="text-align: right;">@if(@$exp[0]->Postage){{number_format(round(@$exp[0]->Postage,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[16]){{number_format(round(@$expdata[16],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->Postage/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[16] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6015-00 · Freight</td>
                <td style="text-align: right;">@if(@$exp[0]->Freight){{number_format(round(@$exp[0]->Freight,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[17]){{number_format(round(@$expdata[17],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->Freight/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[17] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6065-00 · General Supplies</td>
                <td style="text-align: right;">@if(@$exp[0]->GeneralSupplies){{number_format(round(@$exp[0]->GeneralSupplies,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[18]){{number_format(round(@$expdata[18],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->GeneralSupplies/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[18] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else<b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6059-00 · Postage, Freight & Supplies - Other</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->PostageFreightSuppliesOther){{number_format(round(@$exp[0]->PostageFreightSuppliesOther,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[19]){{number_format(round(@$expdata[19],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->PostageFreightSuppliesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[19] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6059-00 · Postage, Freight & Supplies</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[15] + @$expdata[16]+@$expdata[17]+ @$expdata[18]+@$expdata[19],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[15] + @$expdata[16]+@$expdata[17]+ @$expdata[18]+@$expdata[19])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6068-00 · Occupancy Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6300-00 · Rent Expense</td>
                <td style="text-align: right;">@if(@$exp[0]->RentExpense){{number_format(round(@$exp[0]->RentExpense,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[20]){{number_format(round(@$expdata[20],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->RentExpense/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[20] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6305-00 · Utilities</td>
                <td style="text-align: right;">@if(@$exp[0]->Utilities){{number_format(round(@$exp[0]->Utilities,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[21]){{number_format(round(@$expdata[21],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->Utilities/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[21] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6310-00 · Property Insurance</td>
                <td style="text-align: right;">@if(@$exp[0]->PropertyInsurance){{number_format(round(@$exp[0]->PropertyInsurance,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(isset($propertyinsurnce)){{number_format(round($propertyinsurnce,0))}}
                    @else
                    <b> - </b>
                    @endif
                  
                  
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->PropertyInsurance/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[72] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6315-00 · Security</td>
                <td style="text-align: right;">@if(@$exp[0]->Security){{number_format(round(@$exp[0]->Security,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[22]){{number_format(round(@$expdata[22],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->Security/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[22] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6320-00 · Pest Control</td>
                <td style="text-align: right;">@if(@$exp[0]->PestControl){{number_format(round(@$exp[0]->PestControl,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[23]){{number_format(round(@$expdata[23],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->PestControl/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[23] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6325-00 · Repair & Maintenance Building</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->RepairMaintenancBuilding){{number_format(round(@$exp[0]->RepairMaintenancBuilding,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[24]){{number_format(round(@$expdata[24],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->RepairMaintenancBuilding/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[24] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6068-00 · Occupancy Expense</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[20] + @$expdata[21]+ @$expdata[22] +@$expdata[23] + @$expdata[24] + @$expdata[72],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->PropertyInsurance )/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[20] + @$expdata[21]+ @$expdata[22] +@$expdata[23] + @$expdata[24] + @$expdata[72])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6079-00 · Equipment Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6330-00 · Repairs & Maintenance - Equip</td>
                <td style="text-align: right;">@if(@$exp[0]->RepairsMaintenanceEquip){{number_format(round(@$exp[0]->RepairsMaintenanceEquip,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[25]){{number_format(round(@$expdata[25],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->RepairsMaintenanceEquip/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[25] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6335-00 · Equipment Rental</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->EquipmentRental){{number_format(round(@$exp[0]->EquipmentRental,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[26]){{number_format(round(@$expdata[26],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->EquipmentRental/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[26] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6079-00 · Equipment Expense</b></td>
                <td style="text-align: right;">{{ number_format(round(@$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental ,0))}}</td>
                <td style="text-align: right;">{{number_format(round( @$expdata[25] + @$expdata[26],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round((( @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[25] + @$expdata[26])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:20%;">6100-00 · Depreciation Expense - F,F&E</td>
                <td style="text-align: right;">@if(@$exp[0]->DepreciationExpenseFFE){{number_format(round(@$exp[0]->DepreciationExpenseFFE,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[27]){{number_format(round(@$expdata[27],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->DepreciationExpenseFFE/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[27] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6105-00 · Amortization Expense</td>
                <td style="text-align: right;">@if(@$exp[0]->AmortizationExpense){{number_format(round(@$exp[0]->AmortizationExpense,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[28]){{number_format(round(@$expdata[28],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->AmortizationExpense/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[28] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6399-00 · Vehicle Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6400-00 · Repair & Maintenance - Vehicles</td>
                <td style="text-align: right;">@if(@$exp[0]->RepairMaintenanceVehicles){{number_format(round(@$exp[0]->RepairMaintenanceVehicles,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[29]){{number_format(round(@$expdata[29],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->RepairMaintenanceVehicles/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[29] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6405-00 · Fuel & Oil - Vehicle</td>
                <td style="text-align: right;">@if(@$exp[0]->FuelOilVehicle){{number_format(round(@$exp[0]->FuelOilVehicle,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[30]){{number_format(round(@$expdata[30],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->FuelOilVehicle/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[30] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6420-00 · Vehicle Insurance</td>
                <td style="text-align: right;">@if(@$exp[0]->VehicleInsurance){{number_format(round(@$exp[0]->VehicleInsurance,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[31]){{number_format(round(@$expdata[31],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->VehicleInsurance/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[31] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6430-00 · Vehicle Licenses</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$exp[0]->VehicleLicenses){{number_format(round(@$exp[0]->VehicleLicenses,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[32]){{number_format(round(@$expdata[32],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$exp[0]->VehicleLicenses/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[32] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6399-00 · Vehicle Expense</b></td>
                <td style="text-align: right;">{{number_format(round(@$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[29] + @$expdata[30] + @$expdata[31] +@$expdata[32],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[29] + @$expdata[30] + @$expdata[31] +@$expdata[32])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6598-00 · Other</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6085-00 · Charitable Contributions</td>
                <td style="text-align: right;">@if(@$expense1[0]->CharitableContributions){{number_format(round(@$expense1[0]->CharitableContributions,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[33]){{number_format(round(@$expdata[33],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->CharitableContributions/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[33] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6090-00 · Customer Settlements</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->CustomerSettlements){{number_format(round(@$expense1[0]->CustomerSettlements,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[34]){{number_format(round(@$expdata[34],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->CustomerSettlements/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[34] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6598-00 · Other</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[33] + @$expdata[34],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[33] + @$expdata[34])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6599-00 · Computer & Internet Expenses</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6600-00 · Software license fees</td>
                <td style="text-align: right;">@if(@$expense1[0]->Softwarelicensefees){{number_format(round(@$expense1[0]->Softwarelicensefees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[35]){{number_format(round(@$expdata[35],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->Softwarelicensefees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[35] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6610-00 · Computer Supplies</td>
                <td style="text-align: right;">@if(@$expense1[0]->ComputerSupplies){{number_format(round(@$expense1[0]->ComputerSupplies,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[36]){{number_format(round(@$expdata[36],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->ComputerSupplies/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[36] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6615-00 · Computer Maintenance & Repair</td>
                <td>@if(@$expense1[0]->ComputerMaintenanceRepair){{number_format(round(@$expense1[0]->ComputerMaintenanceRepair,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[37]){{number_format(round(@$expdata[37],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->ComputerMaintenanceRepair/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[37] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6650-00 · Telephone & Communications</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->TelephoneCommunications){{number_format(round(@$expense1[0]->TelephoneCommunications,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[38]){{number_format(round(@$expdata[38],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->TelephoneCommunications/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[38] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6599-00 · Computer & Internet Expenses</b></td>
                <td style="text-align: right;">{{number_format(round( @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications,0))}} </td>
                <td style="text-align: right;">{{number_format(round(@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7010-00 · Payroll Expenses</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6200-00 · Salaries & Wages</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6201-00 · Salary</td>
                <td style="text-align: right;">@if(@$expense1[0]->Salary){{number_format(round(@$expense1[0]->Salary,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[39]){{number_format(round(@$expdata[39],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->Salary/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[39] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6202-00 · Hourly</td>
                <td style="text-align: right;">@if(@$expense1[0]->TotalHourly){{number_format(round(@$expense1[0]->TotalHourly,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[40]){{number_format(round(@$expdata[40],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->TotalHourly/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[40] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6203-00 · Overtime hourly</td>
                <td style="text-align: right;">@if(@$expense1[0]->Overtimehourly){{number_format(round(@$expense1[0]->Overtimehourly,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[41]){{number_format(round(@$expdata[41],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->Overtimehourly/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[41] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6204-00 · Holiday</td>
                <td style="text-align: right;">@if(@$expense1[0]->Holiday){{number_format(round(@$expense1[0]->Holiday,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[42]){{number_format(round(@$expdata[42],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->Holiday/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[42] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6205-00 · Bonus</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->Bonus){{number_format(round(@$expense1[0]->Bonus,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[43]){{number_format(round(@$expdata[43],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->Bonus/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[43] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6200-00 · Salaries & Wages</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7011-00 · Other Employee Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6074-00 · Travel & Entertainment</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6077-00 · Mileage Reimbursement</td>
                <td style="text-align: right;">@if(@$expense1[0]->MileageReimbursement){{number_format(round(@$expense1[0]->MileageReimbursement,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[44]){{number_format(round(@$expdata[44],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->MileageReimbursement/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[44] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6075-00 · Travel Expense</td>
                <td style="text-align: right;">@if(@$expense1[0]->TravelExpense){{number_format(round(@$expense1[0]->TravelExpense,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[45]){{number_format(round(@$expdata[45],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->TravelExpense/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[45] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6078-00 · Meals & Entertainment</td>
                <td style="text-align: right;">@if(@$expense1[0]->MealsEntertainment){{number_format(round(@$expense1[0]->MealsEntertainment,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[46]){{number_format(round(@$expdata[46],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->MealsEntertainment/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[46] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6074-00 · Travel & Entertainment - Other</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->TravelEntertainmentOther){{number_format(round(@$expense1[0]->TravelEntertainmentOther,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[47]){{number_format(round(@$expdata[47],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->TravelEntertainmentOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[47] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6074-00 · Travel & Entertainment</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6081-00 · Dues & Subscriptions</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6082-00 · Dues - Deductible</td>
                <td style="text-align: right;">@if(@$expense1[0]->DuesDeductible){{number_format(round(@$expense1[0]->DuesDeductible,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[48]){{number_format(round(@$expdata[48],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->DuesDeductible/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[48] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6081-00 · Dues & Subscriptions - Other</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->DuesSubscriptionsOther){{number_format(round(@$expense1[0]->DuesSubscriptionsOther,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[49]){{number_format(round(@$expdata[49],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->DuesSubscriptionsOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[49] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6081-00 · Dues & Subscriptions</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther,0)) }}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[48] + @$expdata[49],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[48] + @$expdata[49])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6220-00 · Payroll Taxes</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6221-00 · Unemployment Taxes</td>
                <td style="text-align: right;">@if(@$expense1[0]->UnemploymentTaxes){{number_format(round(@$expense1[0]->UnemploymentTaxes,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[50]){{number_format(round(@$expdata[50],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->UnemploymentTaxes/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[50] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6226-00 · FICA Match</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->FICAMatch){{number_format(round(@$expense1[0]->FICAMatch,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[51]){{number_format(round(@$expdata[51],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->FICAMatch/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[51] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6220-00 · Payroll Taxes</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[50] + @$expdata[51],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[50] + @$expdata[51])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6235-00 · Retirement Benefits</td>
                <td style="text-align: right;">@if(@$expense1[0]->RetirementBenefits){{number_format(round(@$expense1[0]->RetirementBenefits,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[52]){{number_format(round(@$expdata[52],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->RetirementBenefits/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[52] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b> @endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 27%;">6239-00 · Insurance Expense - Employee</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 27%;">6225-00 · Group Health & Life Insurance</td>
                <td style="text-align: right;">@if(@$expense1[0]->GroupHealthLifeInsurance){{number_format(round(@$expense1[0]->GroupHealthLifeInsurance,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[54]){{number_format(round(@$expdata[54],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->GroupHealthLifeInsurance/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[54] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 27%;">6230-00 · Worker's Compensation</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->WorkerCompensation){{number_format(round(@$expense1[0]->WorkerCompensation,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[55]){{number_format(round(@$expdata[55],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->WorkerCompensation/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[55] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 6239-00 · Insurance Expense - Employee</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->InsuranceExpenseEmployeeOther + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[53] + @$expdata[54] +@$expdata[55],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->InsuranceExpenseEmployeeOther + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%

                    @else
                    <b> -</b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[53] + @$expdata[54] +@$expdata[55])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6245-00 · Employee Procurement</td>
                <td style="text-align: right;">@if(@$expense1[0]->EmployeeProcurement){{number_format(round(@$expense1[0]->EmployeeProcurement,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[56]){{number_format(round(@$expdata[56],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->EmployeeProcurement/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}% @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[56] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6246-00 · Drug Screening</td>
                <td style="text-align: right;">@if(@$expense1[0]->DrugScreening){{number_format(round(@$expense1[0]->DrugScreening,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[57]){{number_format(round(@$expdata[57],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->DrugScreening/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[57] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6255-00 · Seminars & Education</td>
                <td style="text-align: right;">@if(@$expense1[0]->SeminarsEducation){{number_format(round(@$expense1[0]->SeminarsEducation,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[58]){{number_format(round(@$expdata[58],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->SeminarsEducation/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}% @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[58] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6260-00 · Employee Training</td>
                <td style="text-align: right;">@if(@$expense1[0]->EmployeeTraining){{number_format(round(@$expense1[0]->EmployeeTraining,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[59]){{number_format(round(@$expdata[59],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->EmployeeTraining/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[59] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6265-00 · Uniforms</td>
                <td style="text-align: right;">@if(@$expense1[0]->Uniforms){{number_format(round(@$expense1[0]->Uniforms,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[60]){{number_format(round(@$expdata[60],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->Uniforms/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%

                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[60] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6270-00 · Awards & Gifts</td>
                <td style="text-align: right;">@if(@$expense1[0]->AwardsGifts){{number_format(round(@$expense1[0]->AwardsGifts,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[61]){{number_format(round(@$expdata[61],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->AwardsGifts/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[61] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6285-00 · Leased Employees</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->LeasedEmployees){{number_format(round(@$expense1[0]->LeasedEmployees,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[62]){{number_format(round(@$expdata[62],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->LeasedEmployees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[62] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 7011-00 · Other Employee Expense</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch + @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] + @$expdata[52] + @$expdata[54]+ @$expdata[55] +@$expdata[56] +@$expdata[57] +@$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch + @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] + @$expdata[52] + @$expdata[54]+ @$expdata[55] +@$expdata[56] +@$expdata[57] +@$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7010-00 · Payroll Expenses - Other</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->PayrollExpensesOther){{number_format(round(@$expense1[0]->PayrollExpensesOther,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[71]){{number_format(round(@$expdata[71],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->PayrollExpensesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,2)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[71] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,2)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 7010-00 · Payroll Expenses</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus + @$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+  @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther,0))}}</td>
                <td style="text-align: right;">{{ number_format(round(@$expdata[39] + @$expdata[40] + @$expdata[41] + @$expdata[42] + @$expdata[43] + @$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] +@$expdata[52] + @$expdata[54] + @$expdata[55] + @$expdata[56] +@$expdata[57] + @$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62],0))  }}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus + @$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+  @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[39] + @$expdata[40] + @$expdata[41] + @$expdata[42] + @$expdata[43] + @$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] +@$expdata[52] + @$expdata[54] + @$expdata[55] + @$expdata[56] +@$expdata[57] + @$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7013-00 · Tax, License & Permit Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6050-00 · Franchise Tax</td>
                <td style="text-align: right;">@if(@$expense1[0]->FranchiseTax){{number_format(round(@$expense1[0]->FranchiseTax,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[63]){{number_format(round(@$expdata[63],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->FranchiseTax/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[63] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6052-00 · Personal Property</td>
                <td style="text-align: right;">@if(@$expense1[0]->PersonalProperty){{number_format(round(@$expense1[0]->PersonalProperty,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[64]){{number_format(round(@$expdata[64],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->PersonalProperty/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[64] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6054-00 · Real Estate</td>
                <td style="text-align: right;">@if(@$expense1[0]->RealEstate){{number_format(round(@$expense1[0]->RealEstate,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[65]){{number_format(round(@$expdata[65],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->RealEstate/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[65] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6056-00 · Sales & Use Tax</td>
                <td style="text-align: right;">@if(@$expense1[0]->SalesUseTax){{number_format(round(@$expense1[0]->SalesUseTax,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[66]){{number_format(round(@$expdata[66],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->SalesUseTax/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[66] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6058-00 · Waste Tire tax</td>
                <td style="text-align: right;">@if(@$expense1[0]->WasteTiretax){{number_format(round(@$expense1[0]->WasteTiretax,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[67]){{number_format(round(@$expdata[67],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->WasteTiretax/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[67] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6080-00 · Business Licenses & Permits</td>
                <td style="text-align: right;">@if(@$expense1[0]->BusinessLicensesPermits){{number_format(round(@$expense1[0]->BusinessLicensesPermits,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[68]){{number_format(round(@$expdata[68],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->BusinessLicensesPermits/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[68] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else<b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6088-00 · Royalty Fees</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->RoyaltyFeesOther){{number_format(round(@$expense1[0]->RoyaltyFeesOther,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[69]){{number_format(round(@$expdata[69],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->RoyaltyFeesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[69] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total 7013-00 · Tax, License & Permit Expense</b></td>
                <td style="text-align: right;">{{number_format(round(@$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther,0))}}</td>
                <td style="text-align: right;">{{number_format(round(@$expdata[63] +@$expdata[64]  + @$expdata[65] + @$expdata[66] +@$expdata[67] +@$expdata[68] + @$expdata[69],0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[63] +@$expdata[64]  + @$expdata[65] + @$expdata[66] +@$expdata[67] +@$expdata[68] + @$expdata[69])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6030-00 · Operational Overhead</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->OperationalOverhead){{number_format(round(@$expense1[0]->OperationalOverhead,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[70]){{number_format(round(@$expdata[70],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->OperationalOverhead/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[70] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Total Expense</b></td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities + @$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead,0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70],0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:15%;"><b>Net Ordinary Income</b></td>
                <td style="text-align: right;">{{number_format(round((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead),0))}}</td>
                <td style="text-align: right;">{{number_format(round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70]),0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead))/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks))) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70]))/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11])))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            @if(in_array(@$selctedloc , array(2202, 2204, 2205)))
            <tr>
                <td style=" text-indent: 20%;">4230-00 · Other Miscellaneous Income</td>
                <td style="text-align: right;">@if(@$data[0]->OtherMiscellaneousIncome)
                    {{number_format(round(@$data[0]->OtherMiscellaneousIncome,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$alldata[9]){{number_format(round(@$alldata[9]))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$data[0]->OtherMiscellaneousIncome /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                </td>
                @else <b> - </b> @endif
                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$alldata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7002-00 · Other Income</td>
                <td style="text-align: right;">@if(@$expense1[0]->otherIncome){{number_format(round(@$expense1[0]->otherIncome,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$expdata[73]){{number_format(round(@$expdata[73],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->otherIncome/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[73] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">7004-00 · Purchase Discount</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expense1[0]->purchasedisc){{number_format(round(@$expense1[0]->purchasedisc,0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$expdata[74]){{number_format(round(@$expdata[74],0))}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(@$expense1[0]->purchasedisc/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(@$expdata[74] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            <tr>
                <td style="text-indent:20%;"><b>Total Other Income</b></td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc,0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$alldata[9]+ @$expdata[73] + @$expdata[74],0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$alldata[9]+ @$expdata[73] + @$expdata[74])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>

            </tr>
            <tr>
                <td style="text-indent:15%;">Net Other Income</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc,0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">{{number_format(round(@$alldata[9]+ @$expdata[73] + @$expdata[74],0))}}</td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
                </td>
                @else <b> -</b> @endif
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((@$alldata[9]+ @$expdata[73] + @$expdata[74])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>

            <tr>
                <td style=" text-indent: 15%;"><b>Net Income</b></td>
                <td style="text-align: right;">{{number_format(round((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead) + @$data[0]->OtherMiscellaneousIncome + @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc,0))}}</td>
                <td style="text-align: right;">{{number_format(round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70]) +@$alldata[9]+ @$expdata[73] + @$expdata[74] ,0))}}</td>
                <td style="text-align: right;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
                    {{round(((((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead)+ @$data[0]->OtherMiscellaneousIncome + @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks))) *100,1)}}%
                    @else <b> -</b> @endif
                </td>

                <td style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] +@$alldata[9] + @$alldata[10] + @$alldata[11]){{round(((((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70])+@$alldata[9]+ @$expdata[73] + @$expdata[74])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  + @$alldata[9] + @$alldata[10] + @$alldata[11])))*100,1)}}% @else <b>-</b>@endif</td>
            </tr>
            @endif
        </tbody>
    </table>
    <h3 style="text-align:center;margin-bottom:2px;">Profit-Loss Ratio</h3><br>
    <hr>
    <table class="table table-bordered page_break" style="font-size:95%;margin-left:25px">
        <thead>
            <th></th>
            <th style="border-bottom: 1px solid #000;">2401 - Jacksonville</th>
            <th></th>
            <th style="border-bottom: 1px solid #000;">{{@$locname}}</th>
            <th></th>
            <th style="border-bottom: 1px solid #000;">Total Company</th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td><b>4000-00 · Rental Income</b></td>
                <td style="text-align: right;">@if(@$alldata[0]){{number_format(round(@$alldata[0],0))}}@else <b> - </b>@endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$revenuedata[0]){{number_format(round(@$revenuedata[0],0))}}@else <b> - </b>@endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$totalrevenuedata[0]){{number_format(round(@$totalrevenuedata[0],0))}}@else <b> - </b>@endif</td>
                <td></td>
            </tr>
            <tr>
                <td><b>5000-00 · Depreciation - Inventory</b></td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cogdata[0]){{number_format(round(@$cogdata[0],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$cogsdata[0]){{number_format(round(@$cogsdata[0],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="border-bottom: 1px solid #000; text-align: right;">@if(@$totalcogsdata[0]){{number_format(round(@$totalcogsdata[0],0))}}@else <b> - </b> @endif</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[0]-@$cogdata[0],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$alldata[0]){{number_format(((@$alldata[0]-@$cogdata[0])/@$alldata[0])*100)}}%@else <b> - </b>@endif</td> -->
                <td style="text-align: right;">{{number_format(round(@$revenuedata[0]-@$cogsdata[0],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$revenuedata[0]){{number_format(((@$revenuedata[0]-@$cogsdata[0])/@$revenuedata[0])*100)}}@else -->
                <!-- <b> -</b> @endif% -->
                <!-- </td> -->
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[0]-@$totalcogsdata[0],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$revenuedata[0]){{number_format(((@$totalrevenuedata[0]-@$totalcogsdata[0])/@$totalrevenuedata[0])*100)}}%@else
                    <b> -</b> @endif
                </td> -->
            </tr>
            <tr></tr>
            <tr>
                <td><b>4100-00 · Cash Sales</b></td>
                <td style="text-align: right;">@if(@$alldata[1]){{number_format(round(@$alldata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$revenuedata[1]){{number_format(round(@$revenuedata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$totalrevenuedata[1]){{number_format(round(@$totalrevenuedata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>

            </tr>
            <tr>
                <td><b>5102-00 · Cash Sale Charge Offs</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogdata[2]){{number_format(round(@$cogdata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogsdata[2]){{number_format(round(@$cogsdata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$totalcogsdata[2]){{number_format(round(@$totalcogsdata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[1]-@$cogdata[2],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$alldata[1]){{number_format(((@$alldata[1]-@$cogdata[2])/@$alldata[1])*100)}}%@else <b> - </b> @endif</td> -->
                <td style="text-align: right;">{{number_format(round(@$revenuedata[1]-@$cogsdata[2],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$revenuedata[1]){{number_format(((@$revenuedata[1]-@$cogsdata[2])/@$revenuedata[1])*100)}}@else <b>-</b>@endif%</td> -->
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[1]-@$totalcogsdata[2],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$totalrevenuedata[1]){{number_format(((@$totalrevenuedata[1]-@$totalcogsdata[2])/@$totalrevenuedata[1])*100)}}%@else <b> - </b> @endif</td> -->
            </tr>
            <tr>
                <td><b>4105-00 · Early Purchase Option</b></td>
                <td style="text-align: right;">@if(@$alldata[2]){{number_format(round(@$alldata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$revenuedata[2]){{number_format(round(@$revenuedata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$totalrevenuedata[2]){{number_format(round(@$totalrevenuedata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
            </tr>
            <tr>
                <td><b>5101-00 · Paid Out & EPO Charge Offs</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogdata[1]){{number_format(round(@$cogdata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogsdata[1]){{number_format(round(@$cogsdata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$totalcogsdata[1]){{number_format(round(@$totalcogsdata[1],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr style="border-bottom: 1px solid #000;">
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[2]-@$cogdata[1],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$alldata[2]){{number_format(((@$alldata[2]-@$cogdata[1])/@$alldata[2])*100)}}%@else <b> - </b> @endif</td> -->
                <td style="text-align: right;">{{number_format(round(@$revenuedata[2]-@$cogsdata[1],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$revenuedata[2]){{number_format(((@$revenuedata[2]-@$cogsdata[1])/@$revenuedata[2])*100)}}@else <b>-</b>@endif%</td> -->
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[2]-@$totalcogsdata[1],0))}}</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$totalrevenuedata[2]){{number_format(((@$totalrevenuedata[2]-@$totalcogsdata[1])/@$totalrevenuedata[2])*100)}}%@else <b> - </b> @endif</td> -->
            </tr>
            <tr>
                <td><b>4200-00 · Roll Pro</b></td>
                <td style="text-align: right;">@if(@$alldata[3]){{number_format(round(@$alldata[3],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[3]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$revenuedata[3]){{number_format(round(@$revenuedata[3],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[3]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$totalrevenuedata[3]){{number_format(round(@$totalrevenuedata[3],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[3]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td> -->
            </tr>
            <tr>
                <td><b>4240-00 · Roll Safe</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$alldata[10]){{number_format(round(@$alldata[10],0))}}@else <b> - </b> @endif</td>
                <td></td> <!-- <td  style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[10]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$revenuedata[10]){{number_format(round(@$revenuedata[10],0))}}@else <b> - </b> @endif</td>
                <td></td> <!-- <td  style="text-align: right;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[10]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$totalrevenuedata[10]){{number_format(round(@$totalrevenuedata[10],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right; border-bottom: 1px solid #000;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[10]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td> -->
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[3]+@$alldata[10],0))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$revenuedata[3]+@$revenuedata[10],0))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[3]+@$totalrevenuedata[10],0))}}</td>
                <td></td>
            </tr>
            <tr>
                <td><b>5400-00 · Club Remittance</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogdata[9]){{number_format(round(@$cogdata[9],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogsdata[9]){{number_format(round(@$cogsdata[9],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$totalcogsdata[9]){{number_format(round(@$totalcogsdata[9],0))}}@else <b> - </b> @endif</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[3]+@$alldata[10]-@$cogdata[9],0))}}</td>
                <td></td> <!-- <td  style="text-align: right;">@if(@$alldata[3]){{number_format(((@$alldata[3]+@$alldata[10]-@$cogdata[9])/(@$alldata[3]+@$alldata[10]))*100)}}%@else <b> - </b> @endif</td> -->
                <td style="text-align: right;">{{number_format(round(@$revenuedata[3]+@$revenuedata[10]-@$cogsdata[9],0))}}</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$revenuedata[3]+@$revenuedata[10]){{number_format(((@$revenuedata[3]+@$revenuedata[10]-@$cogsdata[9])/(@$revenuedata[3]+@$revenuedata[10]))*100)}}@else <b>-</b>@endif%</td> -->
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[3]+@$totalrevenuedata[10]-@$totalcogsdata[9],0))}}</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$totalcogsdata[9]){{number_format(((@$totalrevenuedata[3]+@$totalrevenuedata[10]-@$totalcogsdata[9])/(@$totalrevenuedata[3]+@$totalrevenuedata[10]))*100)}}%@else <b> - </b> @endif</td> -->
            </tr>
            <tr>
                <td><b>4205-00 · Collection Fee - In-House</b></td>
                <td style="text-align: right;">@if(@$alldata[4]){{number_format(round(@$alldata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$revenuedata[4]){{number_format(round(@$revenuedata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right;">@if(@$totalrevenuedata[4]){{number_format(round(@$totalrevenuedata[4],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td><b>4210-00 · Reinstatement Fees</b></td>
                <td style="text-align: right;">@if(@$alldata[5]){{number_format(round(@$alldata[5],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[5]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$revenuedata[5]){{number_format(round(@$revenuedata[5],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[5]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$totalrevenuedata[5]){{number_format(round(@$totalrevenuedata[5],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[5]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td> -->
            </tr>
            <tr>
                <td><b>4214-00 · Other Fees - Alignments</b></td>
                <td style="text-align: right;">@if(@$alldata[6]){{number_format(round(@$alldata[6],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[6]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$revenuedata[6]){{number_format(round(@$revenuedata[6],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[6]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$totalrevenuedata[6]){{number_format(round(@$totalrevenuedata[6],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[6]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td> -->
            </tr>
            <tr>
                <td><b>4215-00 · One Time Fees</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$alldata[7]){{number_format(round(@$alldata[7],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[7]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$revenuedata[7]){{number_format(round(@$revenuedata[7],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[7]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td> -->
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$totalrevenuedata[7]){{number_format(round(@$totalrevenuedata[7],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[7]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td> -->
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[4] +@$alldata[5]+ @$alldata[6] +@$alldata[7],0))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$revenuedata[4] +@$revenuedata[5]+ @$revenuedata[6] +@$revenuedata[7],0))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[4] +@$totalrevenuedata[5]+ @$totalrevenuedata[6] +@$totalrevenuedata[7],0))}}</td>
            </tr>
            <tr>
                <td><b>4230-00 · Other Miscellaneous Income</b></td>
                <td style="text-align: right;">@if(@$alldata[9]){{number_format(round(@$alldata[9],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$cogdata[4]){{number_format(((@$alldata[9])/(@$cogdata[4]))*100)}}%@else <b> - </b> @endif</td> -->
                <td style="text-align: right;">@if(@$revenuedata[9]){{number_format(round(@$revenuedata[9],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$cogsdata[4]){{number_format(((@$revenuedata[9])/(@$cogsdata[4]))*100)}}@else <b>-</b>@endif%</td> -->
                <td style="text-align: right;">@if(@$totalrevenuedata[9]){{number_format(round(@$totalrevenuedata[9],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">>@if(@$totalcogsdata[4]){{number_format(((@$totalrevenuedata[9])/(@$totalcogsdata[4]))*100)}}%}@else <b> - </b> @endif</td> -->
            </tr>
            <tr>
                <td><b>5104-01 · Insurance Charge Offs</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogdata[4]){{number_format(round(@$cogdata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$cogsdata[4]){{number_format(round(@$cogsdata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">@if(@$totalcogsdata[4]){{number_format(round(@$totalcogsdata[4],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[9]-@$cogdata[4],0))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$revenuedata[9]-@$cogsdata[4],0))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[9]-@$totalcogsdata[4],0))}}</td>
            </tr>
            <tr>
                <td><b>5104-02 · Returned Damaged/Non-Repairable</b></td>
                <td style="text-align: right;">@if(@$cogdata[5]){{number_format(round(@$cogdata[5],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <!-- <td  style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$cogdata[5]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,2)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$cogsdata[5]){{number_format(round(@$cogsdata[5],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$cogsdata[5]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,2)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$totalcogsdata[5]){{number_format(round(@$totalcogsdata[5],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalcogsdata[5]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,2)}}%
                    @endif
                </td> -->
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><b>5105-01 · Past Due Account Charge Off</b></td>
                <td style="text-align: right;">@if(@$cogdata[7]){{number_format(round(@$cogdata[7],0))}}@else <b> - </b> @endif</td>
                <td></td> <!-- <td  style="text-align: right;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$cogdata[7]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,2)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$cogsdata[7]){{number_format(round(@$cogsdata[7],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$cogsdata[7]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,2)}}%
                    @endif
                </td> -->
                <td style="text-align: right;">@if(@$totalcogsdata[7]){{number_format(round(@$totalcogsdata[7],0))}}@else <b> - </b> @endif</td>
                <td></td><!-- <td  style="text-align: right;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalcogsdata[7]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,2)}}%
                    @endif
                </td> -->
            </tr>
            <tr>
                <td></td>
                <td style="border-bottom: 3px solid #000;"></td>
                <td></td>
                <td style="border-bottom: 3px solid #000;"></td>
                <td></td>
                <td style="border-bottom: 3px solid #000;"></td>
            </tr>
            <tr>
                <td><b>Total Income</b></td>
                <td style="text-align: right;">{{number_format(round(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11]))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11]))}}</td>
                <td></td>
                <td style="text-align: right;">{{number_format(round(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11]))}}</td>
            </tr>
            <tr>
                <td><b>Total COGS</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">{{number_format(round(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9],0))}}</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">{{number_format(round(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9],0))}}</td>
                <td></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">{{number_format(round(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9],0))}}</td>
            </tr>
            <tr>
                <td><b>Gross Profit</b></td>
                <td style="text-align: right; border-bottom: 1px solid #000;">{{number_format(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))}}</td>
                <td></td> <!-- <td  style="text-align: right; border-bottom: 1px solid #000;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11]){{number_format(((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100)}}%@else <b>-</b> @endif</td> -->
                <td style="text-align: right; border-bottom: 1px solid #000;">{{number_format(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] -(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9]))}}</td>
                <td></td><!-- <td  style="text-align: right; border-bottom: 1px solid #000;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11]){{number_format((@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] -(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9]))/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100)}}%@else <b>-</b> @endif</td> -->
                <td style="text-align: right; border-bottom: 1px solid #000;">{{number_format(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] -(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9]))}}</td>
                <td> </td><!-- <td  style="text-align: right; border-bottom: 1px solid #000;">@if((@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9])/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11]))
                    {{number_format((@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] -(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9]))/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100)}}%
                    @else
                    <b>-</b>
                    @endif
                </td> -->
            </tr>
            <td></td>
            <td style="border-bottom: 1px solid #000;"></td>
            <td></td>
            <td style="border-bottom: 1px solid #000;"></td>
            <td></td>
            <td style="border-bottom: 1px solid #000;"></td>
            </tr>
        </tbody>
    </table>
    <h3 style="text-align:center;margin-bottom:1px;">Y2Y</h3>
    <hr>
    <table class="table table-bordered " style="margin-left: 25px;width: 95%;font-size:90%">
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <thead>
            <th></th>
            <th style=" text-align:center;border-bottom: 1px solid #000;"><b> Jan - {{$last_monthh .' '.$year}}</b></th>
            <th style="text-align:center;border-bottom: 1px solid #000;"><b>Jan - {{$last_monthh .' '.$previousyear}}</b></th>
            <th style="text-align:center;border-bottom: 1px solid #000;"><b>$ Change</b></th>
            <th style="text-align:center;border-bottom: 1px solid #000;"><b>% Change</b></th>
        </thead>
        <tbody>
            <tr></tr>
            <tr>
                <td><b>Ordinary Income/Expense</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Income</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4000-00 · Rental Income</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[0],0))}}</td>
                <td style="text-align:right">{{number_format(round($revyeardata[0],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[0] -$revyeardata[0],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[0])
                    {{number_format(round(($revprevyeardata[0] - $revyeardata[0])/$revyeardata[0] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4100-00 · Cash Sales</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[1],0))}}</td>
                <td style="text-align:right">{{number_format(round($revyeardata[1],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[1] -$revyeardata[1],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[1])
                    {{number_format(round(($revprevyeardata[1] - $revyeardata[1])/$revyeardata[1] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4102-00 · Cash Sales Non-inventory</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[12],0))}}
                </td>
                <td style="text-align:right">{{number_format(round($revyeardata[12],0))}}
                </td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[12] - $revyeardata[12],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[12])
                    {{number_format(round(($revprevyeardata[12] - $revyeardata[12])/$revyeardata[12] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4105-00 · Early Purchase Option</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[2],0))}}</td>
                <td style="text-align:right">{{number_format(round($revyeardata[2],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[2] -$revyeardata[2],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[2])
                    {{number_format(round(($revprevyeardata[2] - $revyeardata[2])/$revyeardata[2] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4200-00 · Roll Pro</td>
                <td style="text-align:right"> {{number_format(round($revprevyeardata[3],0))}}</td>
                <td style="text-align:right"> {{number_format(round($revyeardata[3],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[3] -$revyeardata[3],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[3])
                    {{number_format(round(($revprevyeardata[3] - $revyeardata[3])/$revyeardata[3] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4205-00 · Collection Fee –In-House</td>
                <td style="text-align:right"> {{number_format(round($revprevyeardata[4],0))}}</td>
                <td style="text-align:right"> {{number_format(round($revyeardata[4],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[4] -$revyeardata[4],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[4])
                    {{number_format(round(($revprevyeardata[4] - $revyeardata[4])/$revyeardata[4] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4210-00 · Reinstatement Fees</td>
                <td style="text-align:right"> {{number_format(round($revprevyeardata[5],0))}}</td>
                <td style="text-align:right"> {{number_format(round($revyeardata[5],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[5] -$revyeardata[5],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[5])
                    {{number_format(round(($revprevyeardata[5] - $revyeardata[5])/$revyeardata[5] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4214-00 · Other Fees - Alignments</td>
                <td style="text-align:right"> {{number_format(round($revprevyeardata[6],0))}}</td>
                <td style="text-align:right"> {{number_format(round($revyeardata[6],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[6] -$revyeardata[6],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[6])
                    {{number_format(round(($revprevyeardata[6] - $revyeardata[6])/$revyeardata[6] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4215-00 · One Time Fees</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[7],0))}} </td>
                <td style="text-align:right">{{number_format(round($revyeardata[7],0))}} </td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[7] -$revyeardata[7],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[7])
                    {{number_format(round(($revprevyeardata[7] - $revyeardata[7])/$revyeardata[7] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4225-00 · NSF Check Fees</td>
                <td style="text-align:right"> {{number_format(round($revprevyeardata[8],0))}}</td>
                <td style="text-align:right"> {{number_format(round($revyeardata[8],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[8] -$revyeardata[8],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[8])
                    {{number_format(round(($revprevyeardata[8] - $revyeardata[8])/$revyeardata[8] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4230-00 · Other Miscellaneous Income</td>
                <td style="text-align:right"> {{number_format(round($revprevyeardata[9],0))}}</td>
                <td style="text-align:right"> {{number_format(round($revyeardata[9],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[9] -$revyeardata[9],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[9])
                    {{number_format(round(($revprevyeardata[9] - $revyeardata[9])/$revyeardata[9] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>

            </tr>
            <tr>
                <td style=" text-indent: 20%;">4235-00 · Sales Tax Collected</td>
                <td style="text-align:right"> {{number_format(round($revprevyeardata[13],0))}}</td>
                <td style="text-align:right"> {{number_format(round($revyeardata[13],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[13] -$revyeardata[13],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[13])
                    {{number_format(round(($revprevyeardata[13] - $revyeardata[13])/$revyeardata[13] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>

            </tr>
            <tr>
                <td style=" text-indent: 20%;">4240-00 · Roll Safe</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[10],0))}} </td>
                <td style="text-align:right"> {{number_format(round($revyeardata[10],0))}}</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[10] -$revyeardata[10],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[10])
                    {{number_format(round(($revprevyeardata[10] - $revyeardata[10])/$revyeardata[10] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4250-00 · Chargebacks</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[11],0))}} </td>
                <td style="text-align:right">{{number_format(round($revyeardata[11],0))}} </td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[11] -$revyeardata[11],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[11])
                    {{number_format(round(($revprevyeardata[11] - $revyeardata[11])/$revyeardata[11] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4245-00 · Management Fee</td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[14],0))}} </td>
                <td style="text-align:right">{{number_format(round($revyeardata[14],0))}} </td>
                <td style="text-align:right">{{number_format(round($revprevyeardata[14] -$revyeardata[14],0))}}</td>
                <td style="text-align:right"> @if($revyeardata[14])
                    {{number_format(round(($revprevyeardata[14] - $revyeardata[14])/$revyeardata[14] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">4300-00 · Sub-franchisee Royalty Income</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($revprevyeardata[15],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($revyeardata[15],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($revprevyeardata[15] -$revyeardata[15],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($revyeardata[15])
                    {{number_format(round(($revprevyeardata[15] - $revyeardata[0])/$revyeardata[15] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr style="border-bottom: 3px solid #000;">
                <td style=" text-indent: 15%;"><b>Total Income</b></td>
                <td style="text-align:right">{{number_format(round(@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15],0))}} </td>
                <td style="text-align:right">{{number_format(round(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15],0))}} </td>
                <td style="text-align:right">{{number_format(round((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15])-(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]),0))}}</td>
                <td style="text-align:right"> @if(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15])
                    {{number_format(round(((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) - (@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]))/(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <!---------------------------------- Another table ---------------------------------------->
            <tr>
                <td style=" text-indent: 15%;"><b>Cost of Goods Sold</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5000-00 · Depreciation - Inventory</td>
                <td style="text-align:right"> {{number_format(round($cogprevyeardata[0],0))}}</td>
                <td style="text-align:right"> {{number_format(round($cogyeardata[0],0))}}</td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[0] -$cogyeardata[0],0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[0])
                    {{number_format(round(($cogprevyeardata[0] - $cogyeardata[0])/$cogyeardata[0] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5100-00 · Charge Off Expense</td>
                <td style="text-align:right"></td>
                <td style="text-align:right"></td>
                <td style="text-align:right"></td>
                <td style="text-align:right"> </td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5101-00 · Paid Out , EPO Charge Offs</td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[1],0))}} </td>
                <td style="text-align:right">{{number_format(round($cogyeardata[1],0))}} </td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[1] -$cogyeardata[1],0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[1])
                    {{number_format(round(($cogprevyeardata[1] - $cogyeardata[1])/$cogyeardata[1] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5102-00 · Cash Sale Charge Offs</td>
                <td style="text-align:right"> {{number_format(round($cogprevyeardata[2],0))}}</td>
                <td style="text-align:right"> {{number_format(round($cogyeardata[2],0))}}</td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[2] -$cogyeardata[2],0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[2])
                    {{number_format(round(($cogprevyeardata[2] - $cogyeardata[2])/$cogyeardata[2] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5103-00 · Skip/Stolen Charge Offs</td>
                <td style="text-align:right"> {{number_format(round($cogprevyeardata[3],0))}}</td>
                <td style="text-align:right"> {{number_format(round($cogyeardata[3],0))}}</td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[3] -$cogyeardata[3],0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[3])
                    {{number_format(round(($cogprevyeardata[3] - $cogyeardata[3])/$cogyeardata[3] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">5104-00 · Non-Repairable Charge Offs</td>
                <td style="text-align:right"></td>
                <td style="text-align:right"></td>
                <td style="text-align:right"></td>
                <td style="text-align:right"></td>
            </tr>
            <tr>
                <td style=" text-indent: 27%;">5104-01 · Insurance Charge Offs</td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[4],0))}} </td>
                <td style="text-align:right">{{number_format(round($cogyeardata[4],0))}} </td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[4] -$cogyeardata[4],0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[4])
                    {{number_format(round(($cogprevyeardata[4] - $cogyeardata[4])/$cogyeardata[4] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 27%;">5104-02 · Returned Damaged/Non-Repairable</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogprevyeardata[5],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogyeardata[5],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogprevyeardata[5] -$cogyeardata[5],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($cogyeardata[5])
                    {{number_format(round(($cogprevyeardata[5] - $cogyeardata[5])/$cogyeardata[5] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 5104-00 · Non-Repairable Charge Offs</b></td>
                <td style="text-align:right"> {{number_format(round($cogprevyeardata[4] +$cogprevyeardata[5],0))}}</td>
                <td style="text-align:right">{{number_format(round($cogyeardata[4] +$cogyeardata[5],0))}} </td>
                <td style="text-align:right"> {{number_format(round(($cogprevyeardata[4] +$cogprevyeardata[5])-($cogyeardata[4] +$cogyeardata[5]),0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[4] +$cogyeardata[5])
                    {{number_format(round((($cogprevyeardata[4] +$cogprevyeardata[5])-($cogyeardata[4] +$cogyeardata[5]))/($cogyeardata[4] +$cogyeardata[5]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <!---------------------------------- Another table ---------------------------------------->
            <tr>
                <td style=" text-indent: 20%;">5105-00 · Other Charge off</td>
                <td style="text-align:right"> {{number_format(round($cogprevyeardata[6],0))}}</td>
                <td style="text-align:right"> {{number_format(round($cogyeardata[6],0))}}</td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[6] -$cogyeardata[6],0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[6])
                    {{number_format(round(($cogprevyeardata[6] - $cogyeardata[6])/$cogyeardata[6] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5105-01 · Past Due Account Charge Off</td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[7],0))}} </td>
                <td style="text-align:right">{{number_format(round($cogyeardata[7],0))}} </td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[7] -$cogyeardata[7],0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[7])
                    {{number_format(round(($cogprevyeardata[7] - $cogyeardata[7])/$cogyeardata[7] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5106-00 · Inventory Cost Adjustment</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogprevyeardata[8],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($cogyeardata[8],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogprevyeardata[8] -$cogyeardata[8],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($cogyeardata[8])
                    {{number_format(round(($cogprevyeardata[8] - $cogyeardata[8])/$cogyeardata[8] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 5100-00 · Charge Off Expense</b></td>
                <td style="text-align:right">{{number_format(round($cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8],0))}} </td>
                <td style="text-align:right"> {{number_format(round($cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8],0))}}</td>
                <td style="text-align:right"> {{number_format(round(($cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8])-($cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]),0))}}</td>
                <td style="text-align:right">@if($cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8])
                    {{number_format(round((($cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8])-($cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]))/($cogyeardata[1] + $cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">5400-00 · Club Remittance</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogprevyeardata[9],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($cogyeardata[9],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogprevyeardata[9] -$cogyeardata[9],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($cogyeardata[9])
                    {{number_format(round(($cogprevyeardata[9] - $cogyeardata[9])/$cogyeardata[9] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr style="border-bottom: 3px solid #000;">
                <td style=" text-indent: 15%;"><b>Total COGS</b></td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round(($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]),0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9])
                    {{number_format(round((($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))/($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr style="border-bottom: 3px solid #000">
                <td style=" text-indent: 15%;"><b>Gross Profit</b></td>
                <td style="text-align:right"> {{number_format(round((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]),0))}}</td>
                <td style="text-align:right"> {{number_format(round((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]),0))}}</td>
                <td> {{number_format(round(((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]),0))}}</td>
                <td style="text-align:right"> @if($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9])
                    {{number_format(round((((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))/($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <!---------------------------------- Another table ---------------------------------------->
            <tr>
                <td style=" text-indent: 20%;"><b>Expense</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6001-00 · Selling Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6069-00 · Inventory Repairs</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6070-00 · Parts - Inventory Repair</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[0],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[0],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[0] - $expyeardata[0],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[0])
                    {{number_format(round(($expprevyeardata[0] - $expyeardata[0])/$expyeardata[0] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6071-00 · Labor - Inventory Repair</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[1],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[1],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[1] -$expyeardata[1],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[1])
                    {{number_format(round(($expprevyeardata[1] - $expyeardata[1])/$expyeardata[1] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent:15%;"><b>Total 6069-00 · Inventory Repairs</b></td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[0] + $expprevyeardata[1],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[0]+ $expyeardata[1],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[0] + $expprevyeardata[1])-($expyeardata[0] + $expyeardata[1]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[0]+ $expyeardata[1])
                    {{number_format(round((($expprevyeardata[0] + $expprevyeardata[1])-($expyeardata[0] + $expyeardata[1]))/($expyeardata[0]+ $expyeardata[1]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6490-00 · Advertising and Promotion</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6500-00 · Radio - Admin</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[2],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[2],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[2] -$expyeardata[2],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[2])
                    {{number_format(round(($expprevyeardata[2] - $expyeardata[2])/$expyeardata[2] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6510-00 · Print Media</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[3],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[3],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[3] -$expyeardata[3],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[3])
                    {{number_format(round(($expprevyeardata[3] - $expyeardata[3])/$expyeardata[3] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6550-00 · Sponsorships</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[4],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[4],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[4] -$expyeardata[4],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[4])
                    {{number_format(round(($expprevyeardata[4] - $expyeardata[4])/$expyeardata[4] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6551-00 · Internet/Online</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[5],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[5],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[5] -$expyeardata[5],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[5])
                    {{number_format(round(($expprevyeardata[5] - $expyeardata[5])/$expyeardata[5] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6490-00 · Advertising and Promotion</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5],0))}}</td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5])-($expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5])
                    {{number_format(round((($expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5])-($expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]))/($expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6530-00 · Special Events</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[6],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[6],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[6] -$expyeardata[6],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[6])
                    {{number_format(round(($expprevyeardata[6] - $expyeardata[6])/$expyeardata[6] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6555-00 · Other Selling Expenses</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;">6018-00 · Cash Short (Long)</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[7],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[7],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[7] -$expyeardata[7],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[7])
                    {{number_format(round(($expprevyeardata[7] - $expyeardata[7])/$expyeardata[7] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6555-00 · Other Selling Expenses</b></td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[7],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[7],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[7] -$expyeardata[7],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[7])
                    {{number_format(round(($expprevyeardata[7] - $expyeardata[7])/$expyeardata[7] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <!---------------------------------- Another table ---------------------------------------->
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6001-00 · Selling Expense</b></td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[0]+ $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5])-($expyeardata[0]+ $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[0]+ $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5])
                    {{number_format(round((($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5])-($expyeardata[0]+ $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]))/($expyeardata[0]+ $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6002-00 · General , Admin Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6019-00 · Bank Charges</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6023-00 · Bank Card Fees</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[8],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[8],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[8] -$expyeardata[8],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[8])
                    {{number_format(round(($expprevyeardata[8] - $expyeardata[8])/$expyeardata[8] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6025-00 · Bank Service Charges</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[9],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[9],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[9] -$expyeardata[9],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[9])
                    {{number_format(round(($expprevyeardata[9] - $expyeardata[9])/$expyeardata[9] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6019-00 · Bank Charges - Other</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[10],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[10],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[10] -$expyeardata[10],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[10])
                    {{number_format(round(($expprevyeardata[10] - $expyeardata[10])/$expyeardata[10] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6019-00 · Bank Charges</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[8]+$expyeardata[9]+$expyeardata[10],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]) -($expyeardata[8]+$expyeardata[9]+$expyeardata[10]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[8]+$expyeardata[9]+$expyeardata[10])
                    {{number_format(round((($expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]) -($expyeardata[8]+$expyeardata[9]+$expyeardata[10]))/($expyeardata[8]+$expyeardata[9]+$expyeardata[10])*100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <!---------------------------------- Another table ---------------------------------------->
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6002-00 · General , Admin Expense</b></td>
                <td style="text-align:right"> </td>
                <td style="text-align:right"> </td>
                <td style="text-align:right"> </td>
                <td style="text-align:right"> </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6029-00 · Professional Fees</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6034-00 · Legal Fees</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[11],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[11],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[11] -$expyeardata[11],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[11])
                    {{number_format(round(($expprevyeardata[11] - $expyeardata[11])/$expyeardata[11] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6035-00 · Accounting Fees</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[12],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[12],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[12] -$expyeardata[12],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[12])
                    {{number_format(round(($expprevyeardata[12] - $expyeardata[12])/$expyeardata[12] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6029-00 · Professional Fees - Other</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[13],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[13],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[13] -$expyeardata[13],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[13])
                    {{number_format(round(($expprevyeardata[13] - $expyeardata[13])/$expyeardata[13] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6029-00 · Professional Fees</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[11]+$expyeardata[12]+$expyeardata[13],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]) -($expyeardata[11]+$expyeardata[12]+$expyeardata[13]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[11]+$expyeardata[12]+$expyeardata[13])
                    {{number_format(round((($expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]) -($expyeardata[11]+$expyeardata[12]+$expyeardata[13]))/($expyeardata[11]+$expyeardata[12]+$expyeardata[13])*100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6039-00 · Insurance Expense - Admin</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6040-00 · Property , General Liability</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[14],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[14],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[14] -$expyeardata[14],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[13])
                    {{number_format(round(($expprevyeardata[13] - $expyeardata[13])/$expyeardata[13] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6039-00 · Insurance Expense - Admin</b></td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[14],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[14],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[14] -$expyeardata[14],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[14])
                    {{number_format(round(($expprevyeardata[14] - $expyeardata[14])/$expyeardata[14] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6059-00 · Postage, Freight , Supplies</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6000-00 · Office Supplies</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[15],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[15],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[15] -$expyeardata[15],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[15])
                    {{number_format(round(($expprevyeardata[15] - $expyeardata[15])/$expyeardata[15] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6010-00 · Postage</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[16],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[16],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[16] -$expyeardata[16],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[16])
                    {{number_format(round(($expprevyeardata[16] - $expyeardata[16])/$expyeardata[16] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6015-00 · Freight</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[17],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[17],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[17] -$expyeardata[17],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[17])
                    {{number_format(round(($expprevyeardata[17] - $expyeardata[17])/$expyeardata[17] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6065-00 · General Supplies</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[18],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[18],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[18] -$expyeardata[18],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[18])
                    {{number_format(round(($expprevyeardata[18] - $expyeardata[18])/$expyeardata[18] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6059-00 · Postage, Freight , Supplies - Other</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[19],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[19],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[19] -$expyeardata[19],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[19])
                    {{number_format(round(($expprevyeardata[19] - $expyeardata[19])/$expyeardata[19] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6059-00 · Postage, Freight , Supplies</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]) -($expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19])
                    {{number_format(round((($expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]) -($expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]))/($expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6068-00 · Occupancy Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6300-00 · Rent Expense</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[20],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[20],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[20] -$expyeardata[20],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[20])
                    {{number_format(round(($expprevyeardata[20] - $expyeardata[20])/$expyeardata[20] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>

            </tr>
            <tr>
                <td style=" text-indent: 20%;">6305-00 · Utilities</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[21],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[21],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[21] -$expyeardata[21],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[21])
                    {{number_format(round(($expprevyeardata[21] - $expyeardata[21])/$expyeardata[21] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6310-00 · Property Insurance</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[72],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[72],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[72] -$expyeardata[72],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[72])
                    {{number_format(round(($expprevyeardata[72] - $expyeardata[72])/$expyeardata[72] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6315-00 · Security</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[22],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[22],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[22] -$expyeardata[22],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[22])
                    {{number_format(round(($expprevyeardata[22] - $expyeardata[22])/$expyeardata[22] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6320-00 · Pest Control</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[23],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[23],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[23] -$expyeardata[23],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[23])
                    {{number_format(round(($expprevyeardata[23] - $expyeardata[23])/$expyeardata[23] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6325-00 · Repair , Maintenance Building</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[24],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[24],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[24] -$expyeardata[24],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[24])
                    {{number_format(round(($expprevyeardata[24] - $expyeardata[24])/$expyeardata[24] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6068-00 · Occupancy Expense</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24] +$expprevyeardata[72]) -($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72])
                    {{number_format(round((($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]) -($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24] +$expyeardata[72]))/($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6079-00 · Equipment Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6330-00 · Repairs , Maintenance - Equip</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[25],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[25],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[25] -$expyeardata[25],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[25])
                    {{number_format(round(($expprevyeardata[25] - $expyeardata[25])/$expyeardata[25] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6335-00 · Equipment Rental</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[26],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[26],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[26] -$expyeardata[26],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[26])
                    {{number_format(round(($expprevyeardata[26] - $expyeardata[26])/$expyeardata[26] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6079-00 · Equipment Expense</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[25]+$expprevyeardata[26],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[25]+$expyeardata[26],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[25]+$expprevyeardata[26]) -($expyeardata[25]+$expyeardata[26]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[26])
                    {{number_format(round(($expprevyeardata[26] - $expyeardata[26])/$expyeardata[26] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6100-00 · Depreciation Expense - F,F,E</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[27],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[27],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[27] -$expyeardata[27],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[27])
                    {{number_format(round(($expprevyeardata[27] - $expyeardata[27])/$expyeardata[27] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6105-00 · Amortization Expense</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[28],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[28],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[28] -$expyeardata[28],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[28])
                    {{number_format(round(($expprevyeardata[28] - $expyeardata[28])/$expyeardata[28] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6399-00 · Vehicle Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6400-00 · Repair , Maintenance - Vehicles</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[29],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[29],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[29] -$expyeardata[29],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[29])
                    {{number_format(round(($expprevyeardata[29] - $expyeardata[29])/$expyeardata[29] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6405-00 · Fuel , Oil - Vehicle</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[30],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[30],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[30] -$expyeardata[30],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[30])
                    {{number_format(round(($expprevyeardata[30] - $expyeardata[30])/$expyeardata[30] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6420-00 · Vehicle Insurance</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[31],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[31],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[31] -$expyeardata[31],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[31])
                    {{number_format(round(($expprevyeardata[31] - $expyeardata[31])/$expyeardata[31] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            <tr>
                <td style=" text-indent: 20%;">6430-00 · Vehicle Licenses</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[32],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[32],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[32] -$expyeardata[32],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[32])
                    {{number_format(round(($expprevyeardata[32] - $expyeardata[32])/$expyeardata[32] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6399-00 · Vehicle Expense</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]) -($expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32])
                    {{number_format(round((($expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]) -($expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]))/($expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32])*100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>

            <tr>
                <td style=" text-indent: 20%;">6598-00 · Other</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6085-00 · Charitable Contributions</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[33],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[33],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[33] -$expyeardata[33],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[33])
                    {{number_format(round(($expprevyeardata[33] - $expyeardata[33])/$expyeardata[33] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6090-00 · Customer Settlements</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[34],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[34],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[34] -$expyeardata[34],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[34])
                    {{number_format(round(($expprevyeardata[34] - $expyeardata[34])/$expyeardata[34] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 25%;"><b>Total 6598-00 · Other</b></td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[33]+$expprevyeardata[34],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[33]+$expyeardata[34],0))}}</td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[33]+$expprevyeardata[34])-($expyeardata[33]+$expyeardata[34]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[33]+$expyeardata[34])
                    {{number_format(round((($expprevyeardata[33]+$expprevyeardata[34])-($expyeardata[33]+$expyeardata[34]))/($expyeardata[33]+$expyeardata[34])*100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6599-00 · Computer , Internet Expenses</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6600-00 · Software license fees</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[35],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[35],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[35] -$expyeardata[35],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[35])
                    {{number_format(round(($expprevyeardata[35] - $expyeardata[35])/$expyeardata[35] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6610-00 · Computer Supplies</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[36],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[36],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[36] -$expyeardata[36],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[36])
                    {{number_format(round(($expprevyeardata[36] - $expyeardata[36])/$expyeardata[36] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6615-00 · Computer Maintenance , Repair</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[37],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[37],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[37] -$expyeardata[37],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[37])
                    {{number_format(round(($expprevyeardata[37] - $expyeardata[37])/$expyeardata[37] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6650-00 · Telephone , Communications</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[38],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[38],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[38] -$expyeardata[38],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[38])
                    {{number_format(round(($expprevyeardata[38] - $expyeardata[38])/$expyeardata[38] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6599-00 · Computer , Internet Expenses</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]) -($expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38])
                    {{number_format(round((($expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]) -($expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]))/($expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38])*100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>

            </tr>
            <tr>
                <td style=" text-indent: 20%;">7010-00 · Payroll Expenses</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6200-00 · Salaries , Wages</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6201-00 · Salary</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[39],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[39],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[39] -$expyeardata[39],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[39])
                    {{number_format(round(($expprevyeardata[39] - $expyeardata[39])/$expyeardata[39] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6202-00 · Hourly</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[40],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[40],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[40] -$expyeardata[40],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[40])
                    {{number_format(round(($expprevyeardata[40] - $expyeardata[40])/$expyeardata[40] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6203-00 · Overtime hourly</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[41],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[41],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[41] -$expyeardata[41],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[41])
                    {{number_format(round(($expprevyeardata[41] - $expyeardata[41])/$expyeardata[41] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6204-00 · Holiday</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[42],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[42],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[42] -$expyeardata[42],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[42])
                    {{number_format(round(($expprevyeardata[42] - $expyeardata[42])/$expyeardata[42] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6205-00 · Bonus</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[43],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[43],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[43] -$expyeardata[43],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[43])
                    {{number_format(round(($expprevyeardata[43] - $expyeardata[43])/$expyeardata[43] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6200-00 · Salaries , Wages</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]) -($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43])
                    {{number_format(round((($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]) -($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]))/($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7011-00 · Other Employee Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6074-00 · Travel , Entertainment</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6077-00 · Mileage Reimbursement</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[44],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[44],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[44] -$expyeardata[44],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[44])
                    {{number_format(round(($expprevyeardata[44] - $expyeardata[44])/$expyeardata[44] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6075-00 · Travel Expense</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[45],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[45],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[45] -$expyeardata[45],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[45])
                    {{number_format(round(($expprevyeardata[45] - $expyeardata[45])/$expyeardata[45] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6078-00 · Meals , Entertainment</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[46],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[46],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[46] -$expyeardata[46],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[46])
                    {{number_format(round(($expprevyeardata[46] - $expyeardata[46])/$expyeardata[46] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6074-00 · Travel , Entertainment - Other</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[47],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[47],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[47] -$expyeardata[47],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[47])
                    {{number_format(round(($expprevyeardata[47] - $expyeardata[47])/$expyeardata[47] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6074-00 · Travel , Entertainment</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]) -($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47])
                    {{number_format(round((($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]) -($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]))/($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6081-00 · Dues , Subscriptions</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6082-00 · Dues - Deductible</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[48],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[48],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[48] -$expyeardata[48],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[48])
                    {{number_format(round(($expprevyeardata[48] - $expyeardata[48])/$expyeardata[48] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6081-00 · Dues , Subscriptions - Other</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[49],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[49],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[49] -$expyeardata[49],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[49])
                    {{number_format(round(($expprevyeardata[49] - $expyeardata[49])/$expyeardata[49] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6081-00 · Dues , Subscriptions</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[48]+$expprevyeardata[49],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[48]+$expyeardata[49],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[48]+$expprevyeardata[49]) -($expyeardata[48]+$expyeardata[49]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[48]+$expyeardata[49])
                    {{number_format(round((($expprevyeardata[48]+$expprevyeardata[49]) -($expyeardata[48]+$expyeardata[49]))/($expyeardata[48]+$expyeardata[49]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6220-00 · Payroll Taxes</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6221-00 · Unemployment Taxes</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[50],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[50],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[50] -$expyeardata[50],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[50])
                    {{number_format(round(($expprevyeardata[50] - $expyeardata[50])/$expyeardata[50] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6226-00 · FICA Match</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[51],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[51],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[51] -$expyeardata[51],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[51])
                    {{number_format(round(($expprevyeardata[51] - $expyeardata[51])/$expyeardata[51] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 6220-00 · Payroll Taxes</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[50]+$expprevyeardata[51],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[50]+$expyeardata[51],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[50]+$expprevyeardata[51]) -($expyeardata[50]+$expyeardata[51]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[50]+$expyeardata[51])
                    {{number_format(round((($expprevyeardata[50]+$expprevyeardata[51]) -($expyeardata[50]+$expyeardata[51]))/($expyeardata[50]+$expyeardata[51]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6235-00 · Retirement Benefits</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[52],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[52],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[52] -$expyeardata[52],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[52])
                    {{number_format(round(($expprevyeardata[52] - $expyeardata[52])/$expyeardata[52] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6239-00 · Insurance Expense - Employee</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6225-00 · Group Health , Life Insurance</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[54],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[54],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[54] -$expyeardata[54],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[51])
                    {{number_format(round(($expprevyeardata[51] - $expyeardata[51])/$expyeardata[51] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6230-00 · Worker's Compensation</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[55],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[55],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[55] -$expyeardata[55],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[51])
                    {{number_format(round(($expprevyeardata[51] - $expyeardata[51])/$expyeardata[51] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6239-00 · Insurance Expense - Employee - Other</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[53],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[53],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[53] -$expyeardata[53],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[51])
                    {{number_format(round(($expprevyeardata[51] - $expyeardata[51])/$expyeardata[51] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 12%;"><b>Total 6239-00 · Insurance Expense - Employee</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]) -($expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[51])
                    {{number_format(round(($expprevyeardata[51] - $expyeardata[51])/$expyeardata[51] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6245-00 · Employee Procurement</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[56],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[56],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[56] -$expyeardata[56],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[51])
                    {{number_format(round(($expprevyeardata[51] - $expyeardata[51])/$expyeardata[51] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>

            </tr>
            <tr>
                <td style=" text-indent: 20%;">6246-00 · Drug Screening</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[57],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[57],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[57] -$expyeardata[57],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[57])
                    {{number_format(round(($expprevyeardata[57] - $expyeardata[57])/$expyeardata[57] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6255-00 · Seminars , Education</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[58],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[58],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[58] -$expyeardata[58],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[58])
                    {{number_format(round(($expprevyeardata[58] - $expyeardata[58])/$expyeardata[58] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6260-00 · Employee Training</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[59],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[59],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[59] -$expyeardata[59],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[59])
                    {{number_format(round(($expprevyeardata[59] - $expyeardata[59])/$expyeardata[59] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6265-00 · Uniforms</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[60],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[60],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[60] -$expyeardata[60],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[60])
                    {{number_format(round(($expprevyeardata[60] - $expyeardata[60])/$expyeardata[60] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6270-00 · Awards , Gifts</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[61],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[61],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[61] -$expyeardata[61],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[61])
                    {{number_format(round(($expprevyeardata[61] - $expyeardata[61])/$expyeardata[61] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6285-00 · Leased Employees</td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[62],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[62],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[62] -$expyeardata[62],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[62])
                    {{number_format(round(($expprevyeardata[62] - $expyeardata[62])/$expyeardata[62] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 7011-00 · Other Employee Expense</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]) -($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]),0))}}</td>
                <td style="text-align:right"> @if($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62])
                    {{number_format(round((($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]) -($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]))/($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7010-00 · Payroll Expenses - Other</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[71],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[71],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[71] -$expyeardata[71],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[71])
                    {{number_format(round(($expprevyeardata[71] - $expyeardata[71])/$expyeardata[71] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 7010-00 · Payroll Expenses</b></td>
                <td style="text-align:right"> {{number_format(round($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62],0))}}</td>
                <td style="text-align:right"> {{number_format(round($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62],0))}} </td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]) -($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]),0))}}</td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">7013-00 · Tax, License , Permit Expense</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6050-00 · Franchise Tax</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[63],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[63],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[63] -$expyeardata[63],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[63])
                    {{number_format(round(($expprevyeardata[63] - $expyeardata[63])/$expyeardata[63] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6052-00 · Personal Property</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[64],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[64],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[64] -$expyeardata[64],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[62])
                    {{number_format(round(($expprevyeardata[62] - $expyeardata[62])/$expyeardata[62] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6054-00 · Real Estate</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[65],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[65],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[65] -$expyeardata[65],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[62])
                    {{number_format(round(($expprevyeardata[62] - $expyeardata[62])/$expyeardata[62] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6056-00 · Sales , Use Tax</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[66],0))}} </td>
                <td style="text-align:right">{{number_format(round($expyeardata[66],0))}} </td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[66] -$expyeardata[66],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[62])
                    {{number_format(round(($expprevyeardata[62] - $expyeardata[62])/$expyeardata[62] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6058-00 · Waste Tire tax</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[67],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[67],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[67] -$expyeardata[67],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[62])
                    {{number_format(round(($expprevyeardata[62] - $expyeardata[62])/$expyeardata[62] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-indent: 20%;">6080-00 · Business Licenses , Permits</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[68],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[68],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[68] -$expyeardata[68],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[68])
                    {{number_format(round(($expprevyeardata[68] - $expyeardata[68])/$expyeardata[68] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6088-00 · Royalty Fees</td>
                <td style="text-align:right;border-bottom: 1px solid #000">{{number_format(round($expprevyeardata[69],0))}}
                </td>
                <td style="text-align:right;border-bottom: 1px solid #000">{{number_format(round($expyeardata[69],0))}}</td>
                <td style="text-align:right;border-bottom: 1px solid #000">{{number_format(round($expprevyeardata[69] -$expyeardata[69],0))}}</td>
                <td style="text-align:right;border-bottom: 1px solid #000"> @if($expyeardata[69])
                    {{number_format(round(($expprevyeardata[69] - $expyeardata[69])/$expyeardata[69] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total 7013-00 · Tax, License , Permit Expense</b></td>
                <td style="text-align:right;">{{number_format(round($expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69],0))}}</td>
                <td style="text-align:right">{{number_format(round($expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69],0))}}</td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69])-($expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]),0))}}</td>
                <td style="text-align:right">@if($expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69])
                    {{number_format(round((($expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69])-($expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]))/($expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]),0))}}
                </td>
                @else
                <b> - </b>
                @endif
            </tr>
            <tr>
                <td style=" text-indent: 20%;">6030-00 · Operational Overhead</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[70],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[70],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[70] -$expyeardata[70],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[70])
                    {{number_format(round(($expprevyeardata[70] - $expyeardata[70])/$expyeardata[70] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style=" text-indent: 15%;"><b>Total Expense</b></td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round(($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70])-($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]),0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70])
                    {{number_format(round((($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70])-($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]))/($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]),2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-indent: 15%;"><b>Net Ordinary Income</b></td>
                <td style="text-align:right"> {{number_format(round(((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70]),0))}}</td>
                <td style="text-align:right"> {{number_format(round(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]),0))}}</td>
                <td style="text-align:right"> {{number_format(round((((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-
                    ($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70]))-(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70])),0))}}</td>

                <td style="text-align:right">@if(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]))
                    {{number_format(round(((((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-
                    ($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70]))-(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70])))/(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70])) *100,2))}}%
                    @else
                    <b>-</b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-indent: 20%;">7002.00- Other Income</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[73],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[73],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[73] -$expyeardata[73],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[73])
                    {{number_format(round(($expprevyeardata[73] - $expyeardata[73])/$expyeardata[73] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-indent: 20%;">7004.00- Purchase Discount</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[74],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[74],0))}}</td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[74] -$expyeardata[74],0))}}</td>
                <td style="text-align:right"> @if($expyeardata[74])
                    {{number_format(round(($expprevyeardata[74] - $expyeardata[74])/$expyeardata[74] *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-indent: 15%;"><b>Total Other Income</b></td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[73]+$expprevyeardata[74],0))}} </td>
                <td style="border-bottom: 1px solid #000;text-align:right"> {{number_format(round($expyeardata[74],0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round(($expprevyeardata[73]+$expprevyeardata[74]) -($expyeardata[73]+$expyeardata[74]),0))}}</td>
                <td style="border-bottom: 1px solid #000;text-align:right"> @if(($expyeardata[73]+$expyeardata[74]))
                    {{number_format(round((($expprevyeardata[73]+$expprevyeardata[74]) - ($expyeardata[73]+$expyeardata[74]))/($expyeardata[73]+$expyeardata[74]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
            <!-- <tr>
                <td style="text-indent: 15%;"><b>Net Other Income</b></td>
                <td style="text-align:right">{{number_format(round($expprevyeardata[73]+$expprevyeardata[74],0))}} </td>
                <td style="text-align:right"> {{number_format(round($expyeardata[73]+$expyeardata[74],0))}}</td>
                <td style="text-align:right">{{number_format(round(($expprevyeardata[73]+$expprevyeardata[74]) -($expyeardata[73]+$expyeardata[74]),0))}}</td>
                <td style="text-align:right"> @if(($expyeardata[73]+$expyeardata[74]))
                    {{number_format(round((($expprevyeardata[73]+$expprevyeardata[74]) - ($expyeardata[73]+$expyeardata[74]))/($expyeardata[73]+$expyeardata[74]) *100,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr> -->
            <tr>
                <td style="text-indent: 15%;"><b>Net Income</b></td>
                <td style="text-align:right">{{number_format(round((((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70]))+$expprevyeardata[73]+$expprevyeardata[74],0))}} </td>
                <td style="text-align:right"> {{number_format(round((((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]))+$expprevyeardata[73]+$expyeardata[74],0))}}</td>
                <td style="text-align:right">{{number_format(round((
                    ((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-
                    ($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70]+$expprevyeardata[73]+$expprevyeardata[74])-(
                    ((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]+$expyeardata[73]+$expyeardata[74]))),0))}}</td>
                <td style="text-align:right"> @if(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]+$expyeardata[73]+$expyeardata[74]))
                    {{number_format(round((((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-
                    ($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5]+$expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]+$expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]+$expprevyeardata[14]+$expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]+$expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]+$expprevyeardata[72]+$expprevyeardata[25]+$expprevyeardata[26]+$expprevyeardata[27]+$expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]+$expprevyeardata[33]+$expprevyeardata[34]+$expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]+$expprevyeardata[63]+$expprevyeardata[64]+ $expprevyeardata[65]+$expprevyeardata[66]+$expprevyeardata[67]+$expprevyeardata[68]+$expprevyeardata[69]+$expprevyeardata[70]+$expprevyeardata[73]+$expprevyeardata[74])
                    -(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]+$expyeardata[73]+$expyeardata[74])))/(((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revyeardata[9] + @$revyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]) -($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]))-
                    ($expyeardata[0] + $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]+$expyeardata[8]+$expyeardata[9]+$expyeardata[10]+$expyeardata[11]+$expyeardata[12]+$expyeardata[13]+$expyeardata[14]+$expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]+$expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]+$expyeardata[72]+$expyeardata[25]+$expyeardata[26]+$expyeardata[27]+$expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]+$expyeardata[33]+$expyeardata[34]+$expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]+$expyeardata[63]+$expyeardata[64]+ $expyeardata[65]+$expyeardata[66]+$expyeardata[67]+$expyeardata[68]+$expyeardata[69]+$expyeardata[70]+$expyeardata[73]+$expyeardata[74]))*100 ,2))}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>