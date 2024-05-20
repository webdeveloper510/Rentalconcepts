<table d="tblProfit" data-cols-width="35,15,17">
  <tr>
    <td></td>
    <td colspan='4' style="text-align:center;"><b>Profit and Loss Statement</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan='4' style="text-align:center;"><b>{{@$locname}}</b></td>
  </tr>
  <tr>
    <td></td>
    <td colspan='4' style="text-align:center;  border-bottom: 5px solid black;"><b>{{@$selctedloc}}</b></td>
  </tr>
  <tr>
  <th></th>
  <th style=" border-bottom: 5px solid black;"><b>@if(@$date){{@$monthName}}
    @else{{@$monthName}}
    @endif {{@$year}}</b></th>
  <th style=" border-bottom: 5px solid black;"><b>@if(@$date)
    Jan - {{@$monthName}}
    @else
    Jan - {{@$monthName}}
    @endif{{@$year}}</b></th>
  <th colspan="2" style=" border-bottom: 5px solid black;"><b> % of Income</b></th>
  <th></th>
  <th></th>
  </tr>
  <tr></tr>
  <tr>
    <td><b>Ordinary Income/Expense</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Income</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>4000-00 · Rental Income</td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome){{number_format(round(@$data[0]->RentalIncome,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[0]){{number_format(round(@$alldata[0]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->RentalIncome /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4100-00 · Cash Sales</td>
    <td style="text-align:right">@if(@$data[0]->CashSales)
      {{number_format(round(@$data[0]->CashSales,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[1]){{number_format(round(@$alldata[1]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->CashSales /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4105-00 · Early Purchase Option</td>
    <td style="text-align:right">@if(@$data[0]->EarlyPurchaseOption)
      {{number_format(round(@$data[0]->EarlyPurchaseOption,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[2]){{number_format(round(@$alldata[2]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->EarlyPurchaseOption /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else
    <b> - </b>
    @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4200-00 · Roll Pro</td>
    <td style="text-align:right">@if(@$data[0]->RollPro)
      {{number_format(round(@$data[0]->RollPro,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[3]){{number_format(round(@$alldata[3]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->RollPro /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else
    <b> - </b>
    @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4205-00 · Collection Fee –In-House</td>
    <td style="text-align:right">@if(@$data[0]->CollectionFeeInHouse)
      {{number_format(round(@$data[0]->CollectionFeeInHouse,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[4]){{number_format(round(@$alldata[4]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->CollectionFeeInHouse /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else
    <b> - </b>
    @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4210-00 · Reinstatement Fees</td>
    <td style="text-align:right">@if(@$data[0]->ReinstatementFees)
      {{number_format(round(@$data[0]->ReinstatementFees,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[5]){{number_format(round(@$alldata[5]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->ReinstatementFees /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else
    <b> -</b>
    @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4214-00 · Other Fees - Alignments</td>
    <td style="text-align:right">@if(@$data[0]->OtherFeesAlignments)
      {{number_format(round(@$data[0]->OtherFeesAlignments,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[6]){{number_format(round(@$alldata[6]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->OtherFeesAlignments /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else
    <b> - </b>
    @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>

  <tr>
    <td>4215-00 · One Time Fees</td>
    <td style="text-align:right">@if(@$data[0]->OneTimeFees)
      {{number_format(round(@$data[0]->OneTimeFees,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[7]){{number_format(round(@$alldata[7]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->OneTimeFees /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4225-00 · NSF Check Fees</td>
    <td style="text-align:right">@if(@$data[0]->NSFCheckFees)
      {{number_format(round(@$data[0]->NSFCheckFees,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[8]){{number_format(round(@$alldata[8]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->NSFCheckFees /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
      <td>4230-00 · Other Miscellaneous Income</td>
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
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
  <tr>
    <td>4240-00 · Roll Safe</td>
    <td style="text-align:right">@if(@$data[0]->RollSafe)
      {{number_format(round(@$data[0]->RollSafe,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$alldata[10]){{number_format(round(@$alldata[10]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->RollSafe /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[10] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>4250-00 · Chargebacks</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->Chargebacks)
      {{number_format(round(@$data[0]->Chargebacks,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[11]){{number_format(round(@$alldata[11]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$data[0]->Chargebacks /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else
    <b> -</b>
    @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[11] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr style="border-bottom: 3px solid black;">
    <td><b>Total Income</b></td>
    <td style="text-align:right">{{number_format(round(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks,0))}}</td>
    <td style="text-align:right">{{number_format(round(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))}}</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Cost of Goods Sold</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>5000-00 · Depreciation - Inventory</td>
    <td style="text-align:right">@if(@$cog[0]->depreciation_inventory){{number_format(round(@$cog[0]->depreciation_inventory,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$cogdata[0]){{number_format(round(@$cogdata[0]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->depreciation_inventory /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b>
    @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>5100-00 · Charge Off Expense</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>5102-00 · Cash Sale Charge Offs</td>
    <td style="text-align:right">@if(@$cog[0]->cashsalechargeoffs){{number_format(round(@$cog[0]->cashsalechargeoffs,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$cogdata[2]){{number_format(round(@$cogdata[2]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->cashsalechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>5103-00 · Skip/Stolen Charge Offs</td>
    <td style="text-align:right">@if(@$cog[0]->skipstolenchargeoffs){{number_format(round(@$cog[0]->skipstolenchargeoffs,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$cogdata[3]){{number_format(round(@$cogdata[3]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->skipstolenchargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      @else <b> -</b> @endif
    </td>

    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>5104-00 · Non-Repairable Charge Offs</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>5104-01 · Insurance Charge Offs</td>
    <td style="text-align:right">@if(@$cog[0]->insurancechargeoffs){{number_format(round(@$cog[0]->insurancechargeoffs,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$cogdata[4]){{number_format(round(@$cogdata[4]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>5104-02 · Returned Damaged/Non-Repairable</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$cog[0]->returneddamagednonrepairable){{number_format(round(@$cog[0]->returneddamagednonrepairable,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$cogdata[5]){{number_format(round(@$cogdata[5]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Total 5104-00 · Non-Repairable Charge Offs</b></td>
    <td style="text-align:right">{{number_format(round(@$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable,0))}}</td>
    <td style="text-align:right">{{number_format(round( @$cogdata[4] +@$cogdata[5] ))}}</td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 + @$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +@$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +@$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 ,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>5105-00 · Other Charge off</td>
    <td style="text-align:right">@if(@$cog[0]->otherchargeoff){{number_format(round(@$cog[0]->otherchargeoff,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$cogdata[6]){{number_format(round(@$cogdata[6]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->otherchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b>@endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>5105-01 · Past Due Account Charge Off</td>
    <td style="text-align:right">@if(@$cog[0]->pastdueaccountchargeoff){{number_format(round(@$cog[0]->pastdueaccountchargeoff,2))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$cogdata[7]){{number_format(round(@$cogdata[7]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->pastdueaccountchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>5106-00 · Inventory Cost Adjustment</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$cog[0]->inventorycostadjustment){{number_format(round(@$cog[0]->inventorycostadjustment,2))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$cogdata[8]){{number_format(round(@$cogdata[8]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->inventorycostadjustment /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Total 5100-00 · Charge Off Expense</b></td>
    <td style="text-align:right">{{number_format(round(@$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment ,0))}}</td>
    <td style="text-align:right">{{number_format(round( @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8],2))}}</td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->paidout_epocharge /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->cashsalechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->skipstolenchargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 +@$cog[0]->otherchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->pastdueaccountchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->inventorycostadjustment /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b>
    @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100  +
                          @$cogdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                           @$cogdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                            @$cogdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif
    </td>
  </tr>
  <tr>
    <td>5400-00 · Club Remittance</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$cog[0]->clubremittance){{number_format(round(@$cog[0]->clubremittance,2))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$cogdata[9]){{number_format(round(@$cogdata[9]))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->clubremittance /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Total COGS</b></td>
    <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance ,0))}}</td>
    <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9],0))}}</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$cog[0]->depreciation_inventory /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 +@$cog[0]->paidout_epocharge /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->cashsalechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->skipstolenchargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->insurancechargeoffs /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->returneddamagednonrepairable /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 +@$cog[0]->otherchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->pastdueaccountchargeoff /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->inventorycostadjustment /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100 + @$cog[0]->clubremittance /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$cogdata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +@$cogdata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                          @$cogdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                         @$cogdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100  +
                          @$cogdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                           @$cogdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                            @$cogdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 +
                            @$cogdata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100 ,1)}}% @else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Gross Profit</b></td>
    <td style="text-align:right">{{number_format(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -(@$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance))}}</td>
    <td style="text-align:right">{{number_format(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))}}</td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -(@$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance))/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))/ (@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Expense</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>6001-00 · Selling Expense</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>6069-00 · Inventory Repairs</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>6070-00 · Parts - Inventory Repair</td>
    <td style="text-align:right">@if(@$exp[0]->PartsInventoryRepair){{number_format(round(@$exp[0]->PartsInventoryRepair,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$expdata[0]){{number_format(round(@$expdata[0],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->PartsInventoryRepair/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      @else <b> -</b> @endif
    </td>
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[0] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>6071-00 · Labor - Inventory Repair</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->LaborInventoryRepair){{number_format(round(@$exp[0]->LaborInventoryRepair,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[1]){{number_format(round(@$expdata[1],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->LaborInventoryRepair/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%

      @else <b> -</b> @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[1] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Total 6069-00 · Inventory Repairs</b></td>
    <td style="text-align:right">{{number_format(round(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair,0))}}</td>
    <td style="text-align:right">{{number_format(round(@$expdata[0] + @$expdata[1],0))}}</td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round((@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b>@endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[0] + @$expdata[1])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>6490-00 · Advertising and Promotion</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>6500-00 · Radio - Admin</td>
    <td style="text-align:right">@if(@$exp[0]->RadioAdmin){{number_format(round(@$exp[0]->RadioAdmin,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$expdata[2]){{number_format(round(@$expdata[2],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->RadioAdmin /(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[2] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>6510-00 · Print Media</td>
    <td style="text-align:right">@if(@$exp[0]->PrintMedia){{number_format(round(@$exp[0]->PrintMedia,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$expdata[3]){{number_format(round(@$expdata[3],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->PrintMedia/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[3] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b> @endif</td>
  </tr>
  <tr>
    <td>6550-00 · Sponsorships</td>
    <td style="text-align:right">@if(@$exp[0]->Sponsorships){{number_format(round(@$exp[0]->Sponsorships,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$expdata[4]){{number_format(round(@$expdata[4],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->Sponsorships/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[4] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>6551-00 · Internet/Online</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->InternetOnline){{number_format(round(@$exp[0]->InternetOnline,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[5]){{number_format(round(@$expdata[5],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->InternetOnline/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[5] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Total 6490-00 · Advertising and Promotion</b></td>
    <td style="text-align: right;">{{number_format(round(@$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline,0))}}</td>
    <td style="text-align:right">{{number_format(round(@$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5],0))}}</td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round((@$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> - </b>@endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td>6530-00 · Special Events</td>
    <td style="text-align:right">@if(@$exp[0]->SpecialEvents){{number_format(round(@$exp[0]->SpecialEvents,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$expdata[6]){{number_format(round(@$expdata[6],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->SpecialEvents/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[6] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b> @endif</td>
  </tr>
  <tr>
    <td>6555-00 · Other Selling Expenses</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>6018-00 · Cash Short (Long)</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->CashShortLong){{number_format(round(@$exp[0]->CashShortLong,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[7]){{number_format(round(@$expdata[7],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->CashShortLong/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b> @endif</td>
  </tr>
  <tr>
    <td><b>Total 6555-00 · Other Selling Expenses</b></td>
    <td style="text-align:right">@if(@$exp[0]->CashShortLong){{number_format(round(@$exp[0]->CashShortLong,0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$expdata[7]){{number_format(round(@$expdata[7],0))}}
      @else
      <b> - </b>
      @endif
    </td>
    <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(@$exp[0]->CashShortLong/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[7] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
    <td><b>Total 6001-00 · Selling Expense</b></td>
    <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong,0))}}</td>
    <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7],0))}}</td>
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
      {{round(((@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
    </td>
    @else <b> -</b> @endif
    <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
  </tr>
  <tr>
      <td>6002-00 · General - Admin Expense</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  <tr>
      <td>6019-00 · Bank Charges</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6023-00 · Bank Card Fees</td>
      <td style="text-align:right">@if(@$exp[0]->BankCardFees){{number_format(round(@$exp[0]->BankCardFees,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[8]){{number_format(round(@$expdata[8],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->BankCardFees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[8] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b> @endif</td>
    </tr>
    <tr>
      <td>6025-00 · Bank Service Charges</td>
      <td style="text-align:right">@if(@$exp[0]->BankServiceCharges){{number_format(round(@$exp[0]->BankServiceCharges,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[9]){{number_format(round(@$expdata[9],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->BankServiceCharges/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6019-00 · Bank Charges - Other</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->BankChargesOther){{number_format(round(@$exp[0]->BankChargesOther,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[10]){{number_format(round(@$expdata[10],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->BankChargesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[10] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6019-00 · Bank Charges</b></td>
      <td style="text-align:right">{{number_format(round(@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[8] + @$expdata[9] +@$expdata[10],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[8] + @$expdata[9] +@$expdata[10])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6002-00 · General - Admin Expense</b></td>
      <td style="text-align:right">{{number_format(round(@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[8] + @$expdata[9] +@$expdata[10],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[8] + @$expdata[9] +@$expdata[10])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6029-00 · Professional Fees</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6034-00 · Legal Fees</td>
      <td style="text-align:right">@if(@$exp[0]->LegalFees){{number_format(round(@$exp[0]->LegalFees,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[11]){{number_format(round(@$expdata[11],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->LegalFees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[11] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6035-00 · Accounting Fees</td>
      <td style="text-align:right">@if(@$exp[0]->AccountingFees){{number_format(round(@$exp[0]->AccountingFees,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[12]){{number_format(round(@$expdata[12],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->AccountingFees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[12] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6029-00 · Professional Fees - Other</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->ProfessionalFeesOther){{number_format(round(@$exp[0]->ProfessionalFeesOther,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[13]){{number_format(round(@$expdata[13],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->ProfessionalFeesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[13] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6029-00 · Professional Fees</b></td>
      <td style="text-align:right">{{ number_format(round(@$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[11] +@$expdata[12] +@$expdata[13],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOtherr)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[11] +@$expdata[12] +@$expdata[13])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6039-00 · Insurance Expense - Admin</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6040-00 · Property - General Liability</td>
      <td style="text-align:right">@if(@$exp[0]->PropertyGeneralLiability){{number_format(round(@$exp[0]->PropertyGeneralLiability,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[14]){{number_format(round(@$expdata[14],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->PropertyGeneralLiability/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      @else <b> -</b> @endif</td>
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[14] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
    <td><b>Total 6039-00 · Insurance Expense - Admin</b></td>
      <td style="text-align:right">@if(@$exp[0]->PropertyGeneralLiability){{number_format(round(@$exp[0]->PropertyGeneralLiability,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[14]){{number_format(round(@$expdata[14],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->PropertyGeneralLiability)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[14])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
  
    <tr>
      <td>6059-00 · Postage, Freight,Supplies</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6000-00 · Office Supplies</td>
      <td style="text-align:right">@if(@$exp[0]->OfficeSupplies){{number_format(round(@$exp[0]->OfficeSupplies,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[15]){{number_format(round(@$expdata[15],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->OfficeSupplies/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[15] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6010-00 · Postage</td>
      <td style="text-align:right">@if(@$exp[0]->Postage){{number_format(round(@$exp[0]->Postage,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[16]){{number_format(round(@$expdata[16],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->Postage/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[16] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6015-00 · Freight</td>
      <td style="text-align:right">@if(@$exp[0]->Freight){{number_format(round(@$exp[0]->Freight,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[17]){{number_format(round(@$expdata[17],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->Freight/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[17] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6065-00 · General Supplies</td>
      <td style="text-align:right">@if(@$exp[0]->GeneralSupplies){{number_format(round(@$exp[0]->GeneralSupplies,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[18]){{number_format(round(@$expdata[18],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->GeneralSupplies/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[18] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else<b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6059-00 · Postage, Freight , Supplies - Other</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->PostageFreightSuppliesOther){{number_format(round(@$exp[0]->PostageFreightSuppliesOther,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[19]){{number_format(round(@$expdata[19],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->PostageFreightSuppliesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[19] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6059-00 · Postage, Freight, Supplies</b></td>
      <td style="text-align:right">{{number_format(round(@$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[15] + @$expdata[16]+@$expdata[17]+ @$expdata[18]+@$expdata[19],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[15] + @$expdata[16]+@$expdata[17]+ @$expdata[18]+@$expdata[19])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6068-00 · Occupancy Expense</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6300-00 · Rent Expense</td>
      <td style="text-align:right">@if(@$exp[0]->RentExpense){{number_format(round(@$exp[0]->RentExpense,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[20]){{number_format(round(@$expdata[20],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->RentExpense/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[20] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6305-00 · Utilities</td>
      <td style="text-align:right">@if(@$exp[0]->Utilities){{number_format(round(@$exp[0]->Utilities,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[21]){{number_format(round(@$expdata[21],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->Utilities/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[21] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6310-00 · Property Insurance</td>
      <td style="text-align:right">@if(@$exp[0]->PropertyInsurance){{number_format(round(@$exp[0]->PropertyInsurance,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[72]){{number_format(round(@$expdata[72],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->PropertyInsurance/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[72] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6315-00 · Security</td>
      <td style="text-align:right">@if(@$exp[0]->Security){{number_format(round(@$exp[0]->Security,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[22]){{number_format(round(@$expdata[22],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->Security/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[22] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6320-00 · Pest Control</td>
      <td style="text-align:right">@if(@$exp[0]->PestControl){{number_format(round(@$exp[0]->PestControl,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[23]){{number_format(round(@$expdata[23],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->PestControl/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[23] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6325-00 · Repair - Maintenance Building</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->RepairMaintenancBuilding){{number_format(round(@$exp[0]->RepairMaintenancBuilding,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[24]){{number_format(round(@$expdata[24],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->RepairMaintenancBuilding/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[24] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6068-00 · Occupancy Expense</b></td>
      <td style="text-align:right">{{number_format(round(@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding +@$exp[0]->PropertyInsurance,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[20] + @$expdata[21]+ @$expdata[22] +@$expdata[23] + @$expdata[24] + @$expdata[72],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->RentExpense + @$exp[0]->Utilities + @$exp[0]->PropertyInsurance+@$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->PropertyInsurance )/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[20] + @$expdata[21]+ @$expdata[22] +@$expdata[23] + @$expdata[24] + @$expdata[72])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6079-00 · Equipment Expense</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6330-00 · Repairs - Maintenance - Equip</td>
      <td style="text-align:right">@if(@$exp[0]->RepairsMaintenanceEquip){{number_format(round(@$exp[0]->RepairsMaintenanceEquip,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[25]){{number_format(round(@$expdata[25],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->RepairsMaintenanceEquip/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[25] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6335-00 · Equipment Rental</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->EquipmentRental){{number_format(round(@$exp[0]->EquipmentRental,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[26]){{number_format(round(@$expdata[26],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->EquipmentRental/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[26] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6079-00 · Equipment Expense</b></td>
      <td style="text-align:right">{{ number_format(round(@$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental ,0))}}</td>
      <td style="text-align:right">{{number_format(round( @$expdata[25] + @$expdata[26],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round((( @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[25] + @$expdata[26])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6100-00 · Depreciation Expense - F,F,E</td>
      <td style="text-align:right">@if(@$exp[0]->DepreciationExpenseFFE){{number_format(round(@$exp[0]->DepreciationExpenseFFE,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[27]){{number_format(round(@$expdata[27],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->DepreciationExpenseFFE/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[27] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6105-00 · Amortization Expense</td>
      <td style="text-align:right">@if(@$exp[0]->AmortizationExpense){{number_format(round(@$exp[0]->AmortizationExpense,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[28]){{number_format(round(@$expdata[28],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->AmortizationExpense/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[28] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6399-00 · Vehicle Expense</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6400-00 · Repair- Maintenance - Vehicles</td>
      <td style="text-align:right">@if(@$exp[0]->RepairMaintenanceVehicles){{number_format(round(@$exp[0]->RepairMaintenanceVehicles,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[29]){{number_format(round(@$expdata[29],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->RepairMaintenanceVehicles/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[29] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6405-00 · Fuel,Oil - Vehicle</td>
      <td style="text-align:right">@if(@$exp[0]->FuelOilVehicle){{number_format(round(@$exp[0]->FuelOilVehicle,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[30]){{number_format(round(@$expdata[30],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->FuelOilVehicle/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[30] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6420-00 · Vehicle Insurance</td>
      <td style="text-align:right">@if(@$exp[0]->VehicleInsurance){{number_format(round(@$exp[0]->VehicleInsurance,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[31]){{number_format(round(@$expdata[31],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->VehicleInsurance/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[31] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6430-00 · Vehicle Licenses</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$exp[0]->VehicleLicenses){{number_format(round(@$exp[0]->VehicleLicenses,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[32]){{number_format(round(@$expdata[32],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$exp[0]->VehicleLicenses/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[32] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6399-00 · Vehicle Expense</b></td>
      <td style="text-align:right">{{number_format(round(@$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[29] + @$expdata[30] + @$expdata[31] +@$expdata[32],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[29] + @$expdata[30] + @$expdata[31] +@$expdata[32])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6598-00 · Other</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6085-00 · Charitable Contributions</td>
      <td style="text-align:right">@if(@$expense1[0]->CharitableContributions){{number_format(round(@$expense1[0]->CharitableContributions,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[33]){{number_format(round(@$expdata[33],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->CharitableContributions/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[33] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6090-00 · Customer Settlements</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->CustomerSettlements){{number_format(round(@$expense1[0]->CustomerSettlements,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[34]){{number_format(round(@$expdata[34],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->CustomerSettlements/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[34] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6598-00 · Other</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[33] + @$expdata[34],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[33] + @$expdata[34])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6599-00 · Computer , Internet Expenses</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6600-00 · Software license fees</td>
      <td style="text-align:right">@if(@$expense1[0]->Softwarelicensefees){{number_format(round(@$expense1[0]->Softwarelicensefees,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[35]){{number_format(round(@$expdata[35],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->Softwarelicensefees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[35] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6610-00 · Computer Supplies</td>
      <td style="text-align:right">@if(@$expense1[0]->ComputerSupplies){{number_format(round(@$expense1[0]->ComputerSupplies,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[36]){{number_format(round(@$expdata[36],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->ComputerSupplies/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[36] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6615-00 · Computer Maintenance - Repair</td>
      <td>@if(@$expense1[0]->ComputerMaintenanceRepair){{number_format(round(@$expense1[0]->ComputerMaintenanceRepair,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[37]){{number_format(round(@$expdata[37],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->ComputerMaintenanceRepair/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[37] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6650-00 · Telephone , Communications</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->TelephoneCommunications){{number_format(round(@$expense1[0]->TelephoneCommunications,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[38]){{number_format(round(@$expdata[38],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->TelephoneCommunications/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[38] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6599-00 · Computer , Internet Expenses</b></td>
      <td style="text-align:right">{{number_format(round( @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications,0))}} </td>
      <td style="text-align:right">{{number_format(round(@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>7010-00 · Payroll Expenses</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6200-00 · Salaries - Wages</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6201-00 · Salary</td>
      <td style="text-align:right">@if(@$expense1[0]->Salary){{number_format(round(@$expense1[0]->Salary,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[39]){{number_format(round(@$expdata[39],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->Salary/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[39] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6202-00 · Hourly</td>
      <td style="text-align:right">@if(@$expense1[0]->TotalHourly){{number_format(round(@$expense1[0]->TotalHourly,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[40]){{number_format(round(@$expdata[40],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->TotalHourly/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[40] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6203-00 · Overtime hourly</td>
      <td style="text-align:right">@if(@$expense1[0]->Overtimehourly){{number_format(round(@$expense1[0]->Overtimehourly,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[41]){{number_format(round(@$expdata[41],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->Overtimehourly/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[41] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6204-00 · Holiday</td>
      <td style="text-align:right">@if(@$expense1[0]->Holiday){{number_format(round(@$expense1[0]->Holiday,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[42]){{number_format(round(@$expdata[42],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->Holiday/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[42] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6205-00 · Bonus</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->Bonus){{number_format(round(@$expense1[0]->Bonus,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[43]){{number_format(round(@$expdata[43],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->Bonus/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[43] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6200-00 · Salaries - Wages</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr> 
      <td>7011-00 · Other Employee Expense</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6074-00 · Travel ,Entertainment</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6077-00 · Mileage Reimbursement</td>
      <td style="text-align:right">@if(@$expense1[0]->MileageReimbursement){{number_format(round(@$expense1[0]->MileageReimbursement,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[44]){{number_format(round(@$expdata[44],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->MileageReimbursement/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[44] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6075-00 · Travel Expense</td>
      <td style="text-align:right">@if(@$expense1[0]->TravelExpense){{number_format(round(@$expense1[0]->TravelExpense,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[45]){{number_format(round(@$expdata[45],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->TravelExpense/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[45] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6078-00 · Meals , Entertainment</td>
      <td style="text-align:right">@if(@$expense1[0]->MealsEntertainment){{number_format(round(@$expense1[0]->MealsEntertainment,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[46]){{number_format(round(@$expdata[46],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->MealsEntertainment/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[46] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6074-00 · Travel , Entertainment - Other</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->TravelEntertainmentOther){{number_format(round(@$expense1[0]->TravelEntertainmentOther,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[47]){{number_format(round(@$expdata[47],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->TravelEntertainmentOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[47] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b> @endif</td>
    </tr>
    <tr>
      <td><b>Total 6074-00 · Travel , Entertainment</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6081-00 · Dues , Subscriptions</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6082-00 · Dues - Deductible</td>
      <td style="text-align:right">@if(@$expense1[0]->DuesDeductible){{number_format(round(@$expense1[0]->DuesDeductible,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[48]){{number_format(round(@$expdata[48],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->DuesDeductible/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[48] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6081-00 · Dues, Subscriptions - Other</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->DuesSubscriptionsOther){{number_format(round(@$expense1[0]->DuesSubscriptionsOther,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[49]){{number_format(round(@$expdata[49],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->DuesSubscriptionsOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[49] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6081-00 · Dues , Subscriptions</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther,0)) }}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[48] + @$expdata[49],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[48] + @$expdata[49])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b> @endif</td>
    </tr>
    <tr>
      <td>6220-00 · Payroll Taxes</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6221-00 · Unemployment Taxes</td>
      <td style="text-align:right">@if(@$expense1[0]->UnemploymentTaxes){{number_format(round(@$expense1[0]->UnemploymentTaxes,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[50]){{number_format(round(@$expdata[50],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->UnemploymentTaxes/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[50] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6226-00 · FICA Match</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->FICAMatch){{number_format(round(@$expense1[0]->FICAMatch,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[51]){{number_format(round(@$expdata[51],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->FICAMatch/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[51] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6220-00 · Payroll Taxes</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[50] + @$expdata[51],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[50] + @$expdata[51])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6235-00 · Retirement Benefits</td>
      <td style="text-align:right">@if(@$expense1[0]->RetirementBenefits){{number_format(round(@$expense1[0]->RetirementBenefits,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[52]){{number_format(round(@$expdata[52],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->RetirementBenefits/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[52] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b> @endif</td>
    </tr>
    <tr>
      <td>6239-00 · Insurance Expense - Employee</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6225-00 · Group Health , Life Insurance</td>
      <td style="text-align:right">@if(@$expense1[0]->GroupHealthLifeInsurance){{number_format(round(@$expense1[0]->GroupHealthLifeInsurance,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[54]){{number_format(round(@$expdata[54],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->GroupHealthLifeInsurance/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[54] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6230-00 · Worker's Compensation</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->WorkerCompensation){{number_format(round(@$expense1[0]->WorkerCompensation,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[55]){{number_format(round(@$expdata[55],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->WorkerCompensation/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[55] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 6239-00 · Insurance Expense - Employee</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->InsuranceExpenseEmployeeOther + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[53] + @$expdata[54] +@$expdata[55],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->InsuranceExpenseEmployeeOther + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%

        @else
        <b> -</b>
        @endif
      </td>
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[53] + @$expdata[54] +@$expdata[55])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else
        <b> - </b>
        @endif
      </td>
    </tr>
    <tr>
      <td>6245-00 · Employee Procurement</td>
      <td style="text-align:right">@if(@$expense1[0]->EmployeeProcurement){{number_format(round(@$expense1[0]->EmployeeProcurement,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[56]){{number_format(round(@$expdata[56],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->EmployeeProcurement/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}% @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[56] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6246-00 · Drug Screening</td>
      <td style="text-align:right">@if(@$expense1[0]->DrugScreening){{number_format(round(@$expense1[0]->DrugScreening,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[57]){{number_format(round(@$expdata[57],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->DrugScreening/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[57] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6255-00 · Seminars , Education</td>
      <td style="text-align:right">@if(@$expense1[0]->SeminarsEducation){{number_format(round(@$expense1[0]->SeminarsEducation,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[58]){{number_format(round(@$expdata[58],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->SeminarsEducation/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}% @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[58] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6260-00 · Employee Training</td>
      <td style="text-align:right">@if(@$expense1[0]->EmployeeTraining){{number_format(round(@$expense1[0]->EmployeeTraining,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[59]){{number_format(round(@$expdata[59],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->EmployeeTraining/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[59] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6265-00 · Uniforms</td>
      <td style="text-align:right">@if(@$expense1[0]->Uniforms){{number_format(round(@$expense1[0]->Uniforms,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[60]){{number_format(round(@$expdata[60],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->Uniforms/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%

        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[60] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6270-00 · Awards , Gifts</td>
      <td style="text-align:right">@if(@$expense1[0]->AwardsGifts){{number_format(round(@$expense1[0]->AwardsGifts,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[61]){{number_format(round(@$expdata[61],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->AwardsGifts/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[61] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6285-00 · Leased Employees</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->LeasedEmployees){{number_format(round(@$expense1[0]->LeasedEmployees,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[62]){{number_format(round(@$expdata[62],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->LeasedEmployees/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[62] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 7011-00 · Other Employee Expense</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch + @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] + @$expdata[52] + @$expdata[54]+ @$expdata[55] +@$expdata[56] +@$expdata[57] +@$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch + @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] + @$expdata[52] + @$expdata[54]+ @$expdata[55] +@$expdata[56] +@$expdata[57] +@$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>7010-00 · Payroll Expenses - Other</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->PayrollExpensesOther){{number_format(round(@$expense1[0]->PayrollExpensesOther,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[71]){{number_format(round(@$expdata[71],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->PayrollExpensesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,2)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[71] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,2)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 7010-00 · Payroll Expenses</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus + @$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+  @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther,0))}}</td>
      <td style="text-align:right">{{ number_format(round(@$expdata[39] + @$expdata[40] + @$expdata[41] + @$expdata[42] + @$expdata[43] + @$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] +@$expdata[52] + @$expdata[54] + @$expdata[55] + @$expdata[56] +@$expdata[57] + @$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62],0))  }}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus + @$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+  @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[39] + @$expdata[40] + @$expdata[41] + @$expdata[42] + @$expdata[43] + @$expdata[44] + @$expdata[45] + @$expdata[46] +@$expdata[47] + @$expdata[48] +@$expdata[49] +@$expdata[50] + @$expdata[51] +@$expdata[52] + @$expdata[54] + @$expdata[55] + @$expdata[56] +@$expdata[57] + @$expdata[58] +@$expdata[59] +@$expdata[60] +@$expdata[61] +@$expdata[62])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>7013-00 · Tax, License , Permit Expense</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6050-00 · Franchise Tax</td>
      <td style="text-align:right">@if(@$expense1[0]->FranchiseTax){{number_format(round(@$expense1[0]->FranchiseTax,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[63]){{number_format(round(@$expdata[63],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->FranchiseTax/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[63] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6052-00 · Personal Property</td>
      <td style="text-align:right">@if(@$expense1[0]->PersonalProperty){{number_format(round(@$expense1[0]->PersonalProperty,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[64]){{number_format(round(@$expdata[64],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->PersonalProperty/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[64] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6054-00 · Real Estate</td>
      <td style="text-align:right">@if(@$expense1[0]->RealEstate){{number_format(round(@$expense1[0]->RealEstate,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[65]){{number_format(round(@$expdata[65],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->RealEstate/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[65] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6056-00 · Sales , Use Tax</td>
      <td style="text-align:right">@if(@$expense1[0]->SalesUseTax){{number_format(round(@$expense1[0]->SalesUseTax,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[66]){{number_format(round(@$expdata[66],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->SalesUseTax/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[66] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6058-00 · Waste Tire tax</td>
      <td style="text-align:right">@if(@$expense1[0]->WasteTiretax){{number_format(round(@$expense1[0]->WasteTiretax,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[67]){{number_format(round(@$expdata[67],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->WasteTiretax/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[67] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6080-00 · Business Licenses , Permits</td>
      <td style="text-align:right">@if(@$expense1[0]->BusinessLicensesPermits){{number_format(round(@$expense1[0]->BusinessLicensesPermits,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[68]){{number_format(round(@$expdata[68],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->BusinessLicensesPermits/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[68] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else<b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6088-00 · Royalty Fees</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->RoyaltyFeesOther){{number_format(round(@$expense1[0]->RoyaltyFeesOther,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[69]){{number_format(round(@$expdata[69],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->RoyaltyFeesOther/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[69] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total 7013-00 · Tax, License , Permit Expense</b></td>
      <td style="text-align:right">{{number_format(round(@$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther,0))}}</td>
      <td style="text-align:right">{{number_format(round(@$expdata[63] +@$expdata[64]  + @$expdata[65] + @$expdata[66] +@$expdata[67] +@$expdata[68] + @$expdata[69],0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[63] +@$expdata[64]  + @$expdata[65] + @$expdata[66] +@$expdata[67] +@$expdata[68] + @$expdata[69])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>6030-00 · Operational Overhead</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->OperationalOverhead){{number_format(round(@$expense1[0]->OperationalOverhead,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[70]){{number_format(round(@$expdata[70],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->OperationalOverhead/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[70] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total Expense</b></td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead,0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70],0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Net Ordinary Income</b></td>
      <td style="text-align:right">{{number_format(round((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities + @$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead),0))}}</td>
      <td style="text-align:right">{{number_format(round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70]),0))}}</td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities + @$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead))/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks))) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70]))/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11])))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    @if(in_array(@$selctedloc , array(2202, 2204, 2205)))
    <tr>
      <td>4230-00 · Other Miscellaneous Income</td>
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
      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$alldata[9] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}%@else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>7002-00 · Other Income</td>
      <td style="text-align:right">@if(@$expense1[0]->otherIncome){{number_format(round(@$expense1[0]->otherIncome,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$expdata[73]){{number_format(round(@$expdata[73],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->otherIncome/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[73] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td>7004-00 · Purchase Discount</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expense1[0]->purchasedisc){{number_format(round(@$expense1[0]->purchasedisc,0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$expdata[74]){{number_format(round(@$expdata[74],0))}}
        @else
        <b> - </b>
        @endif
      </td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(@$expense1[0]->purchasedisc/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(@$expdata[74] /(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]) *100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    <tr>
      <td><b>Total Other Income</b></td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc,0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$alldata[9]+ @$expdata[73] + @$expdata[74],0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$alldata[9]+ @$expdata[73] + @$expdata[74])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>

    </tr>
    <tr>
      <td>Net Other Income</td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc,0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round(@$alldata[9]+ @$expdata[73] + @$expdata[74],0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((@$data[0]->OtherMiscellaneousIncome+ @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees  + @$data[0]->RollSafe + @$data[0]->Chargebacks)) *100,1)}}%
      </td>
      @else <b> -</b> @endif
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((@$alldata[9]+ @$expdata[73] + @$expdata[74])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>

    <tr>
      <td><b>Net Income</b></td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead) + @$data[0]->OtherMiscellaneousIncome + @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc,0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">{{number_format(round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70]) +@$alldata[9]+ @$expdata[73] + @$expdata[74] ,0))}}</td>
      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks != '0')
        {{round(((((@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks -( @$cog[0]->depreciation_inventory + @$cog[0]->paidout_epocharge + @$cog[0]->cashsalechargeoffs + @$cog[0]->skipstolenchargeoffs + @$cog[0]->insurancechargeoffs + @$cog[0]->returneddamagednonrepairable + @$cog[0]->otherchargeoff + @$cog[0]->pastdueaccountchargeoff + @$cog[0]->inventorycostadjustment + @$cog[0]->clubremittance)) -(@$exp[0]->LaborInventoryRepair + @$exp[0]->PartsInventoryRepair + @$exp[0]->RadioAdmin + @$exp[0]->PrintMedia  + @$exp[0]->Sponsorships  + @$exp[0]->InternetOnline + @$exp[0]->SpecialEvents + @$exp[0]->CashShortLong + @$exp[0]->BankCardFees + @$exp[0]->BankServiceCharges + @$exp[0]->BankChargesOther + @$exp[0]->LegalFees + @$exp[0]->AccountingFees + @$exp[0]->ProfessionalFeesOther + @$exp[0]->PropertyGeneralLiability + @$exp[0]->OfficeSupplies + @$exp[0]->Postage +@$exp[0]->Freight +@$exp[0]->GeneralSupplies+@$exp[0]->PostageFreightSuppliesOther +@$exp[0]->RentExpense + @$exp[0]->Utilities +@$exp[0]->PropertyInsurance+ @$exp[0]->Security + @$exp[0]->PestControl +@$exp[0]->RepairMaintenancBuilding + @$exp[0]->RepairsMaintenanceEquip + @$exp[0]->EquipmentRental + @$exp[0]->DepreciationExpenseFFE + @$exp[0]->AmortizationExpense + @$exp[0]->RepairMaintenanceVehicles + @$exp[0]->FuelOilVehicle + @$exp[0]->VehicleInsurance +@$exp[0]->VehicleLicenses + @$expense1[0]->CharitableContributions + @$expense1[0]->CustomerSettlements + @$expense1[0]->Softwarelicensefees + @$expense1[0]->ComputerSupplies + @$expense1[0]->ComputerMaintenanceRepair + @$expense1[0]->TelephoneCommunications + @$expense1[0]->Salary + @$expense1[0]->TotalHourly +  @$expense1[0]->Overtimehourly +  @$expense1[0]->Holiday + @$expense1[0]->Bonus +@$expense1[0]->MileageReimbursement + @$expense1[0]->TravelExpense + @$expense1[0]->MealsEntertainment + @$expense1[0]->TravelEntertainmentOther + @$expense1[0]->DuesDeductible + @$expense1[0]->DuesSubscriptionsOther +@$expense1[0]->UnemploymentTaxes + @$expense1[0]->FICAMatch+ @$expense1[0]->RetirementBenefits + @$expense1[0]->GroupHealthLifeInsurance + @$expense1[0]->WorkerCompensation + @$expense1[0]->EmployeeProcurement +@$expense1[0]->DrugScreening +@$expense1[0]->SeminarsEducation + @$expense1[0]->EmployeeTraining + @$expense1[0]->Uniforms +@$expense1[0]->AwardsGifts + @$expense1[0]->LeasedEmployees + @$expense1[0]->PayrollExpensesOther + @$expense1[0]->FranchiseTax + @$expense1[0]->PersonalProperty + @$expense1[0]->RealEstate + @$expense1[0]->SalesUseTax + @$expense1[0]->WasteTiretax + @$expense1[0]->BusinessLicensesPermits + @$expense1[0]->RoyaltyFeesOther + @$expense1[0]->OperationalOverhead)+ @$data[0]->OtherMiscellaneousIncome + @$expense1[0]->otherIncome + @$expense1[0]->purchasedisc)/(@$data[0]->RentalIncome + @$data[0]->CashSales + @$data[0]->EarlyPurchaseOption +@$data[0]->RollPro + @$data[0]->CollectionFeeInHouse + @$data[0]->ReinstatementFees + @$data[0]->OtherFeesAlignments + @$data[0]->OtherMiscellaneousIncome +@$data[0]->OneTimeFees + @$data[0]->NSFCheckFees + @$data[0]->RollSafe + @$data[0]->Chargebacks))) *100,1)}}%
        @else <b> -</b> @endif
      </td>

      <td style="text-align:right; border-bottom: 5px solid black;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11]){{round(((((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))-(@$expdata[0] + @$expdata[1] + @$expdata[2] +@$expdata[3]  + @$expdata[4] + @$expdata[5] + @$expdata[6] + @$expdata[7] + @$expdata[8] + @$expdata[9] +@$expdata[10] +@$expdata[11] +@$expdata[12] +@$expdata[13] + @$expdata[14] + @$expdata[15] +@$expdata[16] +@$expdata[17]+@$expdata[18]+@$expdata[19]+@$expdata[20]+@$expdata[21]+@$expdata[22] + @$expdata[23] +@$expdata[24] +@$expdata[25]+@$expdata[26]+@$expdata[27]+@$expdata[28]+@$expdata[29]+@$expdata[30]+@$expdata[31] +@$expdata[32] +@$expdata[33] + @$expdata[34]+@$expdata[35] + @$expdata[36] +@$expdata[37] +@$expdata[38] + @$expdata[39] + @$expdata[40] +@$expdata[41] +@$expdata[42] +@$expdata[43] +@$expdata[44] + @$expdata[45] +@$expdata[46] +@$expdata[47] +@$expdata[48] + @$expdata[49] +@$expdata[50] + @$expdata[51]  + @$expdata[52] + @$expdata[53] + @$expdata[54]+ @$expdata[55] + @$expdata[56]+ @$expdata[57] + @$expdata[58] + @$expdata[59] + @$expdata[60] + @$expdata[61] + @$expdata[62] + @$expdata[63]+ @$expdata[64] + @$expdata[65] + @$expdata[66]+ @$expdata[67]+ @$expdata[68] + @$expdata[69]+ @$expdata[70])+@$alldata[9]+ @$expdata[73] + @$expdata[74])/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8]  +@$alldata[9]  + @$alldata[10] + @$alldata[11])))*100,1)}}% @else <b>-</b>@endif</td>
    </tr>
    @endif
</table>