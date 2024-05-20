@extends('user-layout.Main')
@section('main-content')

<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;margin-left: 296px"/></a>
<h3 class="text-left" style="float: left;margin-top: 48px;margin-left: 158px;">YTD-DATE</h3>
<table class="table table-bordered " style="margin-left: 25px;width: 95%;">
    <thead>
        <th></th>
        <th>{{$last_month.' '.$year}}</th>
        <th>{{$last_month.' '.$previousyear}}</th>
        <th>Jan - {{$last_month .' '.$year}}</th>
        <th style="border: none; text-align:center">Jan - {{$last_month .' '.$previousyear}}</th>
        <th>Y2Y Change</th>
        <th>Y2D Change</th>
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
            <td><b>Income</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>4000-00 · Rental Income</td>
            <td class="text-end">{{number_format(round($alldata[0],0))}}</td>          
            <td class="text-end">{{number_format(round($revprevdata[0],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[0],0))}}</td>
            <td class="text-end">{{number_format(round($revyeardata[0],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[0] -$revprevdata[0],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[0] -$revyeardata[0],0))}}</td>
        </tr>
        <tr>
            <td>4100-00 · Cash Sales</td>
            <td class="text-end">{{number_format(round($alldata[1],0))}}</td>
            <td class="text-end">{{number_format(round($revprevdata[1],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[1],0))}}</td>
            <td class="text-end">{{number_format(round($revyeardata[1],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[1] -$revprevdata[1],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[1] -$revyeardata[1],0))}}</td>
        </tr>
        <tr>
            <td>4102-00 · Cash Sales Non-inventory</td>
            <td class="text-end">{{number_format(round($alldata[12],0))}}
            </td>
            <td class="text-end">{{number_format(round($revprevdata[12],0))}}
            </td>
            <td class="text-end">{{number_format(round($revprevyeardata[12],0))}}
            </td>
            <td class="text-end">{{number_format(round($revyeardata[12],0))}}
            </td>
            <td class="text-end">{{number_format(round($alldata[12] -$revprevdata[12],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[12] -$revyeardata[12],0))}}</td>
        </tr>
        <tr>
            <td>4105-00 · Early Purchase Option</td>
            <td class="text-end">{{number_format(round($alldata[2],0))}}
            </td>
            <td class="text-end">{{number_format(round($revprevdata[2],0))}}
            </td>
            <td class="text-end">{{number_format(round($revprevyeardata[2],0))}}</td>
            <td class="text-end">{{number_format(round($revyeardata[2],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[2] -$revprevdata[2],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[2] -$revyeardata[2],0))}}</td>
        </tr>
        <tr>
            <td>4200-00 · Roll Pro</td>
            <td class="text-end">{{number_format(round($alldata[3],0))}} </td>
            <td class="text-end">{{number_format(round($revprevdata[3],0))}} </td>
            <td class="text-end"> {{number_format(round($revprevyeardata[3],0))}}</td>
            <td class="text-end"> {{number_format(round($revyeardata[3],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[3] -$revprevdata[3],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[3] -$revyeardata[3],0))}}</td>
        </tr>
        <tr>
            <td>4205-00 · Collection Fee –In-House</td>
            <td class="text-end"> {{number_format(round($alldata[4],0))}}</td>
            <td class="text-end">{{number_format(round($revprevdata[4],0))}} </td>
            <td class="text-end"> {{number_format(round($revprevyeardata[4],0))}}</td>
            <td class="text-end"> {{number_format(round($revyeardata[4],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[4] -$revprevdata[4],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[4] -$revyeardata[4],0))}}</td>
        </tr>
        <tr>
            <td>4210-00 · Reinstatement Fees</td>
            <td class="text-end"> {{number_format(round($alldata[5],0))}}</td>
            <td class="text-end"> {{number_format(round($revprevdata[5],0))}}</td>
            <td class="text-end"> {{number_format(round($revprevyeardata[5],0))}}</td>
            <td class="text-end"> {{number_format(round($revyeardata[5],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[5] -$revprevdata[5],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[5] -$revyeardata[5],0))}}</td>
        </tr>
        <tr>
            <td>4214-00 · Other Fees - Alignments</td>
            <td class="text-end"> {{number_format(round($alldata[6],0))}}</td>
            <td class="text-end">{{number_format(round($revprevdata[6],0))}} </td>
            <td class="text-end"> {{number_format(round($revprevyeardata[6],0))}}</td>
            <td class="text-end"> {{number_format(round($revyeardata[6],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[6] -$revprevdata[6],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[6] -$revyeardata[6],0))}}</td>
        </tr>
        <tr>
            <td>4215-00 · One Time Fees</td>
            <td class="text-end"> {{number_format(round($alldata[7],0))}}</td>
            <td class="text-end"> {{number_format(round($revprevdata[7],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[7],0))}} </td>
            <td class="text-end">{{number_format(round($revyeardata[7],0))}} </td>
            <td class="text-end">{{number_format(round($alldata[7] -$revprevdata[7],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[7] -$revyeardata[7],0))}}</td>
        </tr>
        <tr>
            <td>4225-00 · NSF Check Fees</td>
            <td class="text-end">{{number_format(round($alldata[8],0))}} </td>
            <td class="text-end">{{number_format(round($revprevdata[8],0))}} </td>
            <td class="text-end"> {{number_format(round($revprevyeardata[8],0))}}</td>
            <td class="text-end"> {{number_format(round($revyeardata[8],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[8] -$revprevdata[8],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[8] -$revyeardata[8],0))}}</td>
        </tr>
        <tr>
            <td>4230-00 · Other Miscellaneous Income</td>
            <td class="text-end"> {{number_format(round($alldata[9],0))}}</td>
            <td class="text-end"> {{number_format(round($revprevdata[9],0))}}</td>
            <td class="text-end"> {{number_format(round($revprevyeardata[9],0))}}</td>
            <td class="text-end"> {{number_format(round($revyeardata[9],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[9] -$revprevdata[9],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[9] -$revyeardata[9],0))}}</td>

        </tr>
        <tr>
            <td>4235-00 · Sales Tax Collected</td>
            <td class="text-end"> {{number_format(round($alldata[13],0))}}</td>
            <td class="text-end">{{number_format(round($revprevdata[13],0))}} </td>
            <td class="text-end"> {{number_format(round($revprevyeardata[13],0))}}</td>
            <td class="text-end"> {{number_format(round($revyeardata[13],0))}}</td>
            <td class="text-end">{{number_format(round($alldata[13] -$revprevdata[13],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[13] -$revyeardata[13],0))}}</td>

        </tr>
        <tr>
            <td>4240-00 · Roll Safe</td>
          <td class="text-end"> {{number_format(round($alldata[10],0))}}</td>
          <td class="text-end">{{number_format(round($revprevdata[10],0))}} </td>
          <td class="text-end">{{number_format(round($revprevyeardata[10],0))}} </td>
          <td class="text-end"> {{number_format(round($revyeardata[10],0))}}</td>
          <td class="text-end">{{number_format(round($alldata[10] -$revprevdata[10],0))}}</td>
          <td class="text-end">{{number_format(round($revprevyeardata[10] -$revyeardata[10],0))}}</td>
        </tr>
        <tr>
            <td>4250-00 · Chargebacks</td>
            <td class="text-end">{{number_format(round($alldata[11],0))}} </td>
            <td class="text-end"> {{number_format(round($revprevdata[11],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[11],0))}} </td>
            <td class="text-end">{{number_format(round($revyeardata[11],0))}} </td>
            <td class="text-end">{{number_format(round($alldata[11] -$revprevdata[11],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[11] -$revyeardata[11],0))}}</td>
        </tr>
        <tr>
            <td>4245-00 · Management Fee</td>
            <td class="text-end">{{number_format(round($alldata[14],0))}} </td>
            <td class="text-end"> {{number_format(round($revprevdata[14],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[14],0))}} </td>
            <td class="text-end">{{number_format(round($revyeardata[14],0))}} </td>
            <td class="text-end">{{number_format(round($alldata[14] -$revprevdata[14],0))}}</td>
            <td class="text-end">{{number_format(round($revprevyeardata[14] -$revyeardata[14],0))}}</td>
        </tr>
        <tr>
            <td >4300-00 · Sub-franchisee Royalty Income</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($alldata[15],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($revprevdata[15],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($revprevyeardata[15],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($revyeardata[15],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($alldata[15] -$revprevdata[15],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($revprevyeardata[15] -$revyeardata[15],0))}}</td>
        </tr>
        <tr style="border-bottom: 3px solid #000;">
            <td><b>Total Income</b></td>
            <td class="text-end">{{number_format(round(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] + @$alldata[12]+ @$alldata[13]+ @$alldata[14]+ @$alldata[15],0))}}</td>
            <td class="text-end">{{number_format(round(@$revprevdata[0] + @$revprevdata[1] + @$revprevdata[2] + @$revprevdata[3]+ @$revprevdata[4] +@$revprevdata[5] + @$revprevdata[6] +@$revprevdata[7] + @$revprevdata[8] + @$revprevdata[9] + @$revprevdata[10] + @$revprevdata[11] + @$revprevdata[12]+ @$revprevdata[13]+ @$revprevdata[14]+ @$revprevdata[15],0))}} </td>
            <td class="text-end">{{number_format(round(@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15],0))}} </td>
            <td class="text-end">{{number_format(round(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15],0))}} </td>
            <td class="text-end">{{number_format(round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] + @$alldata[12]+ @$alldata[13]+ @$alldata[14]+ @$alldata[15])-(@$revprevdata[0] + @$revprevdata[1] + @$revprevdata[2] + @$revprevdata[3]+ @$revprevdata[4] +@$revprevdata[5] + @$revprevdata[6] +@$revprevdata[7] + @$revprevdata[8] + @$revprevdata[9] + @$revprevdata[10] + @$revprevdata[11] + @$revprevdata[12]+ @$revprevdata[13]+ @$revprevdata[14]+ @$revprevdata[15]),0))}}</td>
            <td class="text-end">{{number_format(round((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15])-(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15]),0))}}</td>

        </tr>
        <!---------------------------------- Another table ---------------------------------------->
        <tr>
            <td><b>Cost of Goods Sold</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>5000-00 · Depreciation - Inventory</td>
            <td class="text-end"> {{number_format(round($cogdata[0],0))}}</td>
            <td class="text-end"> {{number_format(round($cogprevdata[0],0))}}</td>
            <td class="text-end"> {{number_format(round($cogprevyeardata[0],0))}}</td>
            <td class="text-end"> {{number_format(round($cogyeardata[0],0))}}</td>
            <td class="text-end">{{number_format(round($cogdata[0] -$cogprevdata[0],0))}}</td>
            <td class="text-end">{{number_format(round($cogprevyeardata[0] -$cogyeardata[0],0))}}</td>
        </tr>
        <tr>
            <td>5100-00 · Charge Off Expense</td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>5101-00 · Paid Out & EPO Charge Offs</td>
            <td class="text-end">{{number_format(round($cogdata[1],0))}} </td>
            <td class="text-end">{{number_format(round($cogprevdata[1],0))}} </td>
            <td class="text-end">{{number_format(round($cogprevyeardata[1],0))}} </td>
            <td class="text-end">{{number_format(round($cogyeardata[1],0))}} </td>
            <td class="text-end">{{number_format(round($cogdata[1] -$cogprevdata[1],0))}}</td>
            <td class="text-end">{{number_format(round($cogprevyeardata[1] -$cogyeardata[1],0))}}</td>
        </tr>
        <tr>
            <td>5102-00 · Cash Sale Charge Offs</td>
           <td class="text-end">{{number_format(round($cogdata[2],0))}} </td>
           <td class="text-end"> {{number_format(round($cogprevdata[2],0))}}</td>
           <td class="text-end"> {{number_format(round($cogprevyeardata[2],0))}}</td>
           <td class="text-end"> {{number_format(round($cogyeardata[2],0))}}</td>
           <td class="text-end">{{number_format(round($cogdata[2] -$cogprevdata[2],0))}}</td>
           <td class="text-end">{{number_format(round($cogprevyeardata[2] -$cogyeardata[2],0))}}</td>
        </tr>
        <tr>
            <td>5103-00 · Skip/Stolen Charge Offs</td>
           <td class="text-end">{{number_format(round($cogdata[3],0))}}</td>
           <td class="text-end"> {{number_format(round($cogprevdata[3],0))}}</td>
           <td class="text-end"> {{number_format(round($cogprevyeardata[3],0))}}</td>
           <td class="text-end"> {{number_format(round($cogyeardata[3],0))}}</td>
           <td class="text-end">{{number_format(round($cogdata[3] -$cogprevdata[3],0))}}</td>
           <td class="text-end">{{number_format(round($cogprevyeardata[3] -$cogyeardata[3],0))}}</td>
        </tr>
        <tr>
            <td>5104-00 · Non-Repairable Charge Offs</td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
        </tr>
        <tr>
            <td>5104-01 · Insurance Charge Offs</td>
          <td class="text-end"> {{number_format(round($cogdata[4],0))}} </td>
          <td class="text-end"> {{number_format(round($cogprevdata[4],0))}}</td>
          <td class="text-end">{{number_format(round($cogprevyeardata[4],0))}} </td>
          <td class="text-end">{{number_format(round($cogyeardata[4],0))}} </td>
          <td class="text-end">{{number_format(round($cogdata[4] -$cogprevdata[4],0))}}</td>
          <td class="text-end">{{number_format(round($cogprevyeardata[4] -$cogyeardata[4],0))}}</td>
        </tr>
        <tr>
            <td>5104-02 · Returned Damaged/Non-Repairable</td>
            <td  style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogdata[5],0))}}</td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($cogprevdata[5],0))}}</td>
            <td  style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogprevyeardata[5],0))}} </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogyeardata[5],0))}} </td>
            <td  style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($cogdata[5] -$cogprevdata[5],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($cogprevyeardata[5] -$cogyeardata[5],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 5104-00 · Non-Repairable Charge Offs</b></td>
           <td class="text-end">{{number_format(round($cogdata[4] + $cogdata[5],0))}} </td>
           <td class="text-end"> {{number_format(round($cogprevdata[4] + $cogprevdata[5],0))}}</td>
           <td  class="text-end"> {{number_format(round($cogprevyeardata[4] +$cogprevyeardata[5],0))}}</td>
           <td class="text-end">{{number_format(round($cogyeardata[4] +$cogyeardata[5],0))}} </td>
           <td class="text-end"> {{number_format(round(($cogdata[4] + $cogdata[5])-($cogprevdata[4] + $cogprevdata[5]),0))}}</td>
            <td class="text-end"> {{number_format(round(($cogprevyeardata[4] +$cogprevyeardata[5])-($cogyeardata[4] +$cogyeardata[5]),0))}}</td>

        </tr>
        <!---------------------------------- Another table ---------------------------------------->
        <tr>
            <td>5105-00 · Other Charge off</td>
            <td class="text-end">{{number_format(round($cogdata[6],0))}} </td>
            <td class="text-end"> {{number_format(round($cogprevdata[6],0))}}</td>
            <td class="text-end"> {{number_format(round($cogprevyeardata[6],0))}}</td>
            <td class="text-end"> {{number_format(round($cogyeardata[6],0))}}</td>
            <td class="text-end">{{number_format(round($cogdata[6] -$cogprevdata[6],0))}}</td>
            <td class="text-end">{{number_format(round($cogprevyeardata[6] -$cogyeardata[6],0))}}</td>
        </tr>
        <tr>
            <td>5105-01 · Past Due Account Charge Off</td>
            <td class="text-end">{{number_format(round($cogdata[7],0))}} </td>
            <td class="text-end"> {{number_format(round($cogprevdata[7],0))}}</td>
            <td class="text-end">{{number_format(round($cogprevyeardata[7],0))}} </td>
            <td class="text-end">{{number_format(round($cogyeardata[7],0))}} </td>
            <td class="text-end">{{number_format(round($cogdata[7] -$cogprevdata[7],0))}}</td>
            <td class="text-end">{{number_format(round($cogprevyeardata[7] -$cogyeardata[7],0))}}</td>
        </tr>
        <tr>
            <td>5106-00 · Inventory Cost Adjustment</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogdata[8],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogprevdata[8],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogprevyeardata[8],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">    {{number_format(round($cogyeardata[8],0))}}        </td>
            <td style="border-bottom: 1px solid #000;"class="text-end">{{number_format(round($cogdata[8] -$cogprevdata[8],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($cogprevyeardata[8] -$cogyeardata[8],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 5100-00 · Charge Off Expense</b></td>
            <td class="text-end">{{number_format(round($cogdata[1] +$cogdata[2]+$cogdata[3] +$cogdata[4]+$cogdata[5]+$cogdata[6]+$cogdata[7]+$cogdata[8],0))}} </td>
            <td class="text-end"> {{number_format(round($cogprevdata[1] +$cogprevdata[2]+$cogprevdata[3] +$cogprevdata[4]+$cogprevdata[5]+$cogprevdata[6]+$cogprevdata[7]+$cogprevdata[8],0))}} </td>
            <td class="text-end">{{number_format(round($cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8],0))}} </td>
            <td class="text-end"> {{number_format(round($cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8],0))}}</td>
            <td class="text-end"> {{number_format(round(($cogdata[1] +$cogdata[2]+$cogdata[3] +$cogdata[4]+$cogdata[5]+$cogdata[6]+$cogdata[7]+$cogdata[8])-($cogprevdata[1] +$cogprevdata[2]+$cogprevdata[3] +$cogprevdata[4]+$cogprevdata[5]+$cogprevdata[6]+$cogprevdata[7]+$cogprevdata[8]),0))}}</td>
            <td class="text-end"> {{number_format(round(($cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8])-($cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]),0))}}</td>

        </tr>
        <tr>
            <td>5400-00 · Club Remittance</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogdata[9],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogprevdata[9],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogprevyeardata[9],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($cogyeardata[9],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($cogdata[9] -$cogprevdata[9],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($cogprevyeardata[9] -$cogyeardata[9],0))}}</td>
        </tr>
        <tr style="border-bottom: 3px solid #000;">
            <td><b>Total COGS</b></td>
            <td style="border-bottom: 1px solid #000;" class="text-end">    {{number_format(round($cogdata[0] +$cogdata[1] +$cogdata[2]+$cogdata[3] +$cogdata[4]+$cogdata[5]+$cogdata[6]+$cogdata[7]+$cogdata[8]+$cogdata[9],0))}}        </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogprevdata[0] +$cogprevdata[1] +$cogprevdata[2]+$cogprevdata[3] +$cogprevdata[4]+$cogprevdata[5]+$cogprevdata[6]+$cogprevdata[7]+$cogprevdata[8]+$cogprevdata[9],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9],0))}}</td>
            <td  style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round(($cogdata[0] +$cogdata[1] +$cogdata[2]+$cogdata[3] +$cogdata[4]+$cogdata[5]+$cogdata[6]+$cogdata[7]+$cogdata[8]+$cogdata[9])-($cogprevdata[0] +$cogprevdata[1] +$cogprevdata[2]+$cogprevdata[3] +$cogprevdata[4]+$cogprevdata[5]+$cogprevdata[6]+$cogprevdata[7]+$cogprevdata[8]+$cogprevdata[9]),0))}}</td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round(($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]),0))}}</td>

        </tr>
        <tr style="border-bottom: 3px solid #000;">
            <td><b>Gross Profit</b></td>
            <td class="text-end">{{number_format(round((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] + @$alldata[12]+ @$alldata[13]+ @$alldata[14]+ @$alldata[15]) -($cogdata[0] +$cogdata[1] +$cogdata[2]+$cogdata[3] +$cogdata[4]+$cogdata[5]+$cogdata[6]+$cogdata[7]+$cogdata[8]+$cogdata[9]),0))}} </td>
            <td class="text-end">{{number_format(round((@$revprevdata[0] + @$revprevdata[1] + @$revprevdata[2] + @$revprevdata[3]+ @$revprevdata[4] +@$revprevdata[5] + @$revprevdata[6] +@$revprevdata[7] + @$revprevdata[8] + @$revprevdata[9] + @$revprevdata[10] + @$revprevdata[11] + @$revprevdata[12]+ @$revprevdata[13]+ @$revprevdata[14]+ @$revprevdata[15]) -($cogprevdata[0] +$cogprevdata[1] +$cogprevdata[2]+$cogprevdata[3] +$cogprevdata[4]+$cogprevdata[5]+$cogprevdata[6]+$cogprevdata[7]+$cogprevdata[8]+$cogprevdata[9]),0))}} </td>
            <td class="text-end"> {{number_format(round((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]),0))}}</td>
            <td class="text-end"> {{number_format(round((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]),0))}}</td>
            <td class="text-end"> {{number_format(round(((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] + @$alldata[12]+ @$alldata[13]+ @$alldata[14]+ @$alldata[15]) -($cogdata[0] +$cogdata[1] +$cogdata[2]+$cogdata[3] +$cogdata[4]+$cogdata[5]+$cogdata[6]+$cogdata[7]+$cogdata[8]+$cogdata[9]))-(@$revprevdata[0] + @$revprevdata[1] + @$revprevdata[2] + @$revprevdata[3]+ @$revprevdata[4] +@$revprevdata[5] + @$revprevdata[6] +@$revprevdata[7] + @$revprevdata[8] + @$revprevdata[9] + @$revprevdata[10] + @$revprevdata[11] + @$revprevdata[12]+ @$revprevdata[13]+ @$revprevdata[14]+ @$revprevdata[15]) -($cogprevdata[0] +$cogprevdata[1] +$cogprevdata[2]+$cogprevdata[3] +$cogprevdata[4]+$cogprevdata[5]+$cogprevdata[6]+$cogprevdata[7]+$cogprevdata[8]+$cogprevdata[9]),0))}}</td>
            <td  class="text-end"> {{number_format(round(((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]))-(@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]),0))}}</td>

        </tr>
        <!---------------------------------- Another table ---------------------------------------->
        <tr>
            <td><b>Expense</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6001-00 · Selling Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6069-00 · Inventory Repairs</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6070-00 · Parts - Inventory Repair</td>
           <td class="text-end"> {{number_format(round($expdata[0],0))}}</td>
           <td class="text-end">{{number_format(round($expprevdata[0],0))}}</td>
           <td class="text-end"> {{number_format(round($expprevyeardata[0],0))}}</td>
           <td class="text-end">{{number_format(round($expyeardata[0],0))}} </td>
           <td class="text-end">{{number_format(round($expdata[0] -$expprevdata[0],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[0] -$expyeardata[0],0))}}</td>
        </tr>
        <tr>
            <td>6071-00 · Labor - Inventory Repair</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expdata[1],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[1],0))}}
               
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[1],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[1],0))}} </td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[1] -$expprevdata[1],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expprevyeardata[1] -$expyeardata[1],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6069-00 · Inventory Repairs</b></td>
            <td class="text-end">{{$expdata[0] + $expdata[1]}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[0] + $expprevdata[1],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[0] + $expprevyeardata[1],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[0]+ $expyeardata[1],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[0] + $expdata[1])-($expprevdata[0] + $expprevdata[1]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[0] + $expprevyeardata[1])-($expyeardata[0] + $expyeardata[1]),0))}}</td>

        </tr>
        <tr>
            <td>6490-00 · Advertising and Promotion</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6500-00 · Radio - Admin</td>
            <td class="text-end"> {{number_format(round($expdata[2],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[2],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[2],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[2],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[2] -$expprevdata[2],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[2] -$expyeardata[2],0))}}</td>
        </tr>
        <tr>
            <td>6510-00 · Print Media</td>
            <td class="text-end">{{number_format(round($expdata[3],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[3],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[3],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[3],0))}}  </td> 
            <td class="text-end">{{number_format(round($expdata[3] -$expprevdata[3],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[3] -$expyeardata[3],0))}}</td>
        </tr>
        <tr>
            <td>6550-00 · Sponsorships</td>
            <td class="text-end"> {{number_format(round($expdata[4],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[4],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[4],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[4],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[4] -$expprevdata[4],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[4] -$expyeardata[4],0))}}</td>
        </tr>
        <tr>
            <td>6551-00 · Internet/Online</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[5],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[5],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[5],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[5],0))}} </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[5] -$expprevdata[5],0))}}</td>
            <td  style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expprevyeardata[5] -$expyeardata[5],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6490-00 · Advertising and Promotion</b></td>
            <td class="text-end"> {{number_format(round($expdata[2]+$expdata[3]+$expdata[4]+$expdata[5],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[2]+$expprevdata[3]+$expprevdata[4]+$expprevdata[5],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5],0))}}</td>
            <td class="text-end">{{number_format(round(($expdata[2]+$expdata[3]+$expdata[4]+$expdata[5])-($expprevdata[2]+$expprevdata[3]+$expprevdata[4]+$expprevdata[5]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5])-($expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]),0))}}</td>
        </tr>
        <tr>
            <td>6530-00 · Special Events</td>
            <td class="text-end"> {{number_format(round($expdata[6],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[6],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[6],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[6],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[6] -$expprevdata[6],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[6] -$expyeardata[6],0))}}</td>
        </tr>
        <tr>
            <td>6555-00 · Other Selling Expenses</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6018-00 · Cash Short (Long)</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[7],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[7],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[7],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[7],0))}} </td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[7] -$expprevdata[7],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expprevyeardata[7] -$expyeardata[7],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6555-00 · Other Selling Expenses</b></td>
            <td  class="text-end">{{number_format(round($expdata[7],0))}}</td>
            <td  class="text-end">{{number_format(round($expprevdata[7],0))}}</td>
            <td  class="text-end">{{number_format(round($expprevyeardata[7],0))}}</td>
            <td  class="text-end">{{number_format(round($expyeardata[7],0))}} </td>
            <td  class="text-end">{{number_format(round($expdata[7] -$expprevdata[7],0))}}</td>
            <td  class="text-end">{{number_format(round($expprevyeardata[7] -$expyeardata[7],0))}}</td>
        </tr>
        <!---------------------------------- Another table ---------------------------------------->
        <tr>
            <td><b>Total 6001-00 · Selling Expense</b></td>
            <td class="text-end">{{$expdata[0] + $expdata[1]+$expdata[2]+$expdata[3]+$expdata[4]+$expdata[5]}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[0] + $expprevdata[1] +$expprevdata[2]+$expprevdata[3]+$expprevdata[4]+$expprevdata[5],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[0]+ $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[0] + $expdata[1]+$expdata[2]+$expdata[3]+$expdata[4]+$expdata[5])-($expprevdata[0] + $expprevdata[1] +$expprevdata[2]+$expprevdata[3]+$expprevdata[4]+$expprevdata[5]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[0] + $expprevyeardata[1]+$expprevyeardata[2]+$expprevyeardata[3]+$expprevyeardata[4]+$expprevyeardata[5])-($expyeardata[0]+ $expyeardata[1]+$expyeardata[2]+$expyeardata[3]+$expyeardata[4]+$expyeardata[5]),0))}}</td>
        </tr>
        <tr>
            <td>6002-00 · General & Admin Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6019-00 · Bank Charges</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6023-00 · Bank Card Fees</td>
            <td class="text-end"> {{number_format(round($expdata[8],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[8],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[8],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[8],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[8] -$expprevdata[8],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[8] -$expyeardata[8],0))}}</td>
        </tr>
        <tr>
            <td>6025-00 · Bank Service Charges</td>
            <td class="text-end">{{number_format(round($expdata[9],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[9],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[9],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[9],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[9] -$expprevdata[9],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[9] -$expyeardata[9],0))}}</td>
        </tr>
        <tr>
            <td>6019-00 · Bank Charges - Other</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[10],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[10],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[10],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[10],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[10] -$expprevdata[10],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[10] -$expyeardata[10],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6019-00 · Bank Charges</b></td>
            <td class="text-end"> {{number_format(round($expdata[8]+$expdata[9]+$expdata[10],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[8]+$expprevdata[9]+$expprevdata[10],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[8]+$expyeardata[9]+$expyeardata[10],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[8]+$expdata[9]+$expdata[10])-($expprevdata[8]+$expprevdata[9]+$expprevdata[10]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[8]+$expprevyeardata[9]+$expprevyeardata[10]) -($expyeardata[8]+$expyeardata[9]+$expyeardata[10]),0))}}</td>
        </tr>
        <!---------------------------------- Another table ---------------------------------------->
        <tr>
            <td><b>Total 6002-00 · General & Admin Expense</b></td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>6029-00 · Professional Fees</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6034-00 · Legal Fees</td>
            <td class="text-end">{{number_format(round($expdata[11],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[11],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[11],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[11],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[11] -$expprevdata[11],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[11] -$expyeardata[11],0))}}</td>
        </tr>
        <tr>
            <td>6035-00 · Accounting Fees</td>
            <td class="text-end"> {{number_format(round($expdata[12],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[12],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[12],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[12],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[12] -$expprevdata[12],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[12] -$expyeardata[12],0))}}</td>
        </tr>
        <tr>
            <td>6029-00 · Professional Fees - Other</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[13],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[13],0))}}
               
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[13],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[13],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[13] -$expprevdata[13],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[13] -$expyeardata[13],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6029-00 · Professional Fees</b></td>
            <td class="text-end">{{number_format(round($expdata[11]+$expdata[12]+$expdata[13],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[11]+$expprevdata[12]+$expprevdata[13],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[11]+$expyeardata[12]+$expyeardata[13],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[11]+$expdata[12]+$expdata[13])-($expprevdata[11]+$expprevdata[12]+$expprevdata[13]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[11]+$expprevyeardata[12]+$expprevyeardata[13]) -($expyeardata[11]+$expyeardata[12]+$expyeardata[13]),0))}}</td>
        </tr>
        <tr>
            <td>6039-00 · Insurance Expense - Admin</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6040-00 · Property & General Liability</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[14],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[14],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[14],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[14],0))}}  </td>
            <td style="border-bottom: 1px solid #000;"class="text-end">{{number_format(round($expdata[14] -$expprevdata[14],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[14] -$expyeardata[14],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6039-00 · Insurance Expense - Admin</b></td>
            <td class="text-end">{{number_format(round($expdata[14],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[14],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[14],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[14],0))}}  </td>
            <td style="border-bottom: 1px solid #000;"class="text-end">{{number_format(round($expdata[14] -$expprevdata[14],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[14] -$expyeardata[14],0))}}</td>
        </tr>
        <tr>
            <td>6059-00 · Postage, Freight & Supplies</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6000-00 · Office Supplies</td>
            <td class="text-end">{{number_format(round($expdata[15],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[15],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[15],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[15],0))}}  </td>
            <td class="text-end">{{number_format(round($expdata[15] -$expprevdata[15],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[15] -$expyeardata[15],0))}}</td>
        </tr>
        <tr>
            <td>6010-00 · Postage</td>
            <td class="text-end">{{number_format(round($expdata[16],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[16],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[16],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[16],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[16] -$expprevdata[16],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[16] -$expyeardata[16],0))}}</td>
        </tr>
        <tr>
            <td>6015-00 · Freight</td>
            <td class="text-end">{{number_format(round($expdata[17],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[17],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[17],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[17],0))}}  </td>
            <td class="text-end">{{number_format(round($expdata[17] -$expprevdata[17],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[17] -$expyeardata[17],0))}}</td>
        </tr>
        <tr>
            <td>6065-00 · General Supplies</td>
            <td class="text-end">{{number_format(round($expdata[18],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[18],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[18],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[18],0))}}  </td>
            <td class="text-end">{{number_format(round($expdata[18] -$expprevdata[18],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[18] -$expyeardata[18],0))}}</td>
        </tr>
        <tr>
            <td>6059-00 · Postage, Freight & Supplies - Other</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[19],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[19],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[19],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[19],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[19] -$expprevdata[19],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[19] -$expyeardata[19],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6059-00 · Postage, Freight & Supplies</b></td>
            <td class="text-end">{{number_format(round($expdata[15]+$expdata[16]+$expdata[17]+$expdata[18]+$expdata[19],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[15]+$expprevdata[16]+$expprevdata[17]+$expprevdata[18]+$expprevdata[19],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[15]+$expdata[16]+$expdata[17]+$expdata[18]+$expdata[19])-($expprevdata[15]+$expprevdata[16]+$expprevdata[17]+$expprevdata[18]+$expprevdata[19]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[15]+$expprevyeardata[16]+$expprevyeardata[17]+$expprevyeardata[18]+$expprevyeardata[19]) -($expyeardata[15]+$expyeardata[16]+$expyeardata[17]+$expyeardata[18]+$expyeardata[19]),0))}}</td>

        </tr>
        <tr>
            <td>6068-00 · Occupancy Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6300-00 · Rent Expense</td>
            <td class="text-end">{{number_format(round($expdata[20],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[20],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[20],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[20],0))}}  </td>
            <td class="text-end">{{number_format(round($expdata[20] -$expprevdata[20],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[20] -$expyeardata[20],0))}}</td>

        </tr>
        <tr>
            <td>6305-00 · Utilities</td>
           <td class="text-end"> {{number_format(round($expdata[21],0))}}</td>
           <td class="text-end"> {{number_format(round($expprevdata[21],0))}}</td>
           <td class="text-end">{{number_format(round($expprevyeardata[21],0))}} </td>
           <td class="text-end">{{number_format(round($expyeardata[21],0))}}  </td>
           <td class="text-end">{{number_format(round($expdata[21] -$expprevdata[21],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[21] -$expyeardata[21],0))}}</td>
        </tr>
        <tr>
            <td>6315-00 · Security</td>
            <td class="text-end"> {{number_format(round($expdata[22],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[22],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[22],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[22],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[22] -$expprevdata[22],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[22] -$expyeardata[22],0))}}</td>
        </tr>
        <tr>
            <td>6320-00 · Pest Control</td>
            <td class="text-end"> {{number_format(round($expdata[23],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[23],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[23],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[23],0))}}  </td>
            <td class="text-end">{{number_format(round($expdata[23] -$expprevdata[23],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[23] -$expyeardata[23],0))}}</td>
        </tr>
        <tr>
            <td>6325-00 · Repair & Maintenance Building</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[24],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[24],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[24],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[24],0))}}  </td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[24] -$expprevdata[24],0))}}</td>
            <td style="border-bottom: 1px solid #000;"   class="text-end">{{number_format(round($expprevyeardata[24] -$expyeardata[24],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6068-00 · Occupancy Expense</b></td>
            <td class="text-end">{{number_format(round($expdata[20]+$expdata[21]+$expdata[22]+$expdata[23]+$expdata[24],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[20]+$expprevdata[21]+$expprevdata[22]+$expprevdata[23]+$expprevdata[24],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[20]+$expdata[21]+$expdata[22]+$expdata[23]+$expdata[24])-($expprevdata[20]+$expprevdata[21]+$expprevdata[22]+$expprevdata[23]+$expprevdata[24]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]) -($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]),0))}}</td>

        </tr>
        <tr>
            <td>6079-00 · Equipment Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6330-00 · Repairs & Maintenance - Equip</td>
            <td class="text-end">{{number_format(round($expdata[25],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[25],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[25],0))}} </td> 
            <td class="text-end">{{number_format(round($expyeardata[25],0))}}  </td>
            <td class="text-end">{{number_format(round($expdata[25] -$expprevdata[25],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[25] -$expyeardata[25],0))}}</td>
        </tr>
        <tr>
            <td>6335-00 · Equipment Rental</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[26],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[26],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[26],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[26],0))}}  </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[26] -$expprevdata[26],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[26] -$expyeardata[26],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6079-00 · Equipment Expense</b></td>
            <td class="text-end">{{number_format(round($expdata[25]+$expdata[26],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[25]+$expprevdata[26],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[25]+$expprevyeardata[26],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[25]+$expyeardata[26],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[25]+$expdata[26])-($expprevdata[25]+$expprevdata[26]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[25]+$expprevyeardata[26]) -($expyeardata[25]+$expyeardata[26]),0))}}</td>
        </tr>
        <tr>
            <td>6100-00 · Depreciation Expense - F,F&E</td>
            <td class="text-end"> {{number_format(round($expdata[27],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[27],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[27],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[27],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[27] -$expprevdata[27],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[27] -$expyeardata[27],0))}}</td>
        </tr>
        <tr>
            <td>6105-00 · Amortization Expense</td>
            <td class="text-end">{{number_format(round($expdata[28],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[28],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[28],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[28],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[28] -$expprevdata[28],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[28] -$expyeardata[28],0))}}</td>
        </tr>
        <tr>
            <td>6399-00 · Vehicle Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6400-00 · Repair & Maintenance - Vehicles</td>
            <td class="text-end">{{number_format(round($expdata[29],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[29],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[29],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[29],0))}}  </td>
            <td class="text-end">{{number_format(round($expdata[29] -$expprevdata[29],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[29] -$expyeardata[29],0))}}</td>
        </tr>
        <tr>
            <td>6405-00 · Fuel & Oil - Vehicle</td>
            <td class="text-end">{{number_format(round($expdata[30],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[30],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[30],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[30],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[30] -$expprevdata[30],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[30] -$expyeardata[30],0))}}</td>
        </tr>
        <tr>
            <td>6420-00 · Vehicle Insurance</td>
            <td class="text-end">{{number_format(round($expdata[31],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[31],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[31],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[31],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[31] -$expprevdata[31],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[31] -$expyeardata[31],0))}}</td>
        <tr>
            <td>6430-00 · Vehicle Licenses</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[32],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[32],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[32],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[32],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[32] -$expprevdata[32],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[32] -$expyeardata[32],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6399-00 · Vehicle Expense</b></td>
            <td class="text-end">{{number_format(round($expdata[29]+$expdata[30]+$expdata[31]+$expdata[32],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[29]+$expprevdata[30]+$expprevdata[31]+$expprevdata[32],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[29]+$expdata[30]+$expdata[31]+$expdata[32])-($expprevdata[29]+$expprevdata[30]+$expprevdata[31]+$expprevdata[32]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[29]+$expprevyeardata[30]+$expprevyeardata[31]+$expprevyeardata[32]) -($expyeardata[29]+$expyeardata[30]+$expyeardata[31]+$expyeardata[32]),0))}}</td>

        <tr>
            <td>6598-00 · Other</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6085-00 · Charitable Contributions</td>
            <td class="text-end">{{number_format(round($expdata[33],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[33],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[33],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[33],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[33] -$expprevdata[33],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[33] -$expyeardata[33],0))}}</td>
        </tr>
        <tr>
            <td>6090-00 · Customer Settlements</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[34],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[34],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[34],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[34],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[34] -$expprevdata[34],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[34] -$expyeardata[34],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6598-00 · Other</b></td>
            <td class="text-end">{{number_format(round($expdata[33] + $expdata[34],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[33] +$expprevdata[34],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[33]+$expprevyeardata[34],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[33]+$expyeardata[34],0))}}</td>
            <td class="text-end">{{number_format(round(($expdata[33] + $expdata[34])-($expprevdata[33] +$expprevdata[34]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[33]+$expprevyeardata[34])-($expyeardata[33]+$expyeardata[34]),0))}}</td>
        </tr>
        <tr>
            <td>6599-00 · Computer & Internet Expenses</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6600-00 · Software license fees</td>
            <td class="text-end">{{number_format(round($expdata[35],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[35],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[35],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[35],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[35] -$expprevdata[35],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[35] -$expyeardata[35],0))}}</td>
        </tr>
        <tr>
            <td>6610-00 · Computer Supplies</td>
            <td class="text-end"> {{number_format(round($expdata[36],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[36],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[36],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[36],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[36] -$expprevdata[36],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[36] -$expyeardata[36],0))}}</td>
        </tr>
        <tr>
            <td>6615-00 · Computer Maintenance & Repair</td>
            <td class="text-end">{{number_format(round($expdata[37],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[37],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[37],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[37],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[37] -$expprevdata[37],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[37] -$expyeardata[37],0))}}</td>
        </tr>
        <tr>
            <td>6650-00 · Telephone & Communications</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[38],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[38],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[38],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[38],0))}}</td>
            <td  style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[38] -$expprevdata[38],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expprevyeardata[38] -$expyeardata[38],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6599-00 · Computer & Internet Expenses</b></td>
            <td class="text-end">{{number_format(round($expdata[35]+$expdata[36]+$expdata[37]+$expdata[38],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[35]+$expprevdata[36]+$expprevdata[37]+$expprevdata[38],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[35]+$expdata[36]+$expdata[37]+$expdata[38])-($expprevdata[35]+$expprevdata[36]+$expprevdata[37]+$expprevdata[38]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[35]+$expprevyeardata[36]+$expprevyeardata[37]+$expprevyeardata[38]) -($expyeardata[35]+$expyeardata[36]+$expyeardata[37]+$expyeardata[38]),0))}}</td>

        </tr>
        <tr>
            <td>7010-00 · Payroll Expenses</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6200-00 · Salaries & Wages</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6201-00 · Salary</td>
            <td class="text-end">{{number_format(round($expdata[39],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[39],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[39],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[39],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[39] -$expprevdata[39],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[39] -$expyeardata[39],0))}}</td>
        </tr>
        <tr>
            <td>6202-00 · Hourly</td>
            <td class="text-end"> {{number_format(round($expdata[40],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[40],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[40],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[40],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[40] -$expprevdata[40],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[40] -$expyeardata[40],0))}}</td>
        </tr>
        <tr>
            <td>6203-00 · Overtime hourly</td>
            <td class="text-end">{{number_format(round($expdata[41],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[41],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[41],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[41],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[41] -$expprevdata[41],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[41] -$expyeardata[41],0))}}</td>
        </tr>
        <tr>
            <td>6204-00 · Holiday</td>
            <td class="text-end">{{number_format(round($expdata[42],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[42],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[42],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[42],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[42] -$expprevdata[42],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[42] -$expyeardata[42],0))}}</td>
        </tr>
        <tr>
            <td>6205-00 · Bonus</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[43],0))}} </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[43],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[43],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[43],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[43] -$expprevdata[43],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expprevyeardata[43] -$expyeardata[43],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6200-00 · Salaries & Wages</b></td>
            <td class="text-end"> {{number_format(round($expdata[39]+$expdata[40]+$expdata[41]+$expdata[42]+$expdata[43],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[39]+$expprevdata[40]+$expprevdata[41]+$expprevdata[42]+$expprevdata[43],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[39]+$expdata[40]+$expdata[41]+$expdata[42]+$expdata[43])-($expprevdata[39]+$expprevdata[40]+$expprevdata[41]+$expprevdata[42]+$expprevdata[43]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]) -($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]),0))}}</td>
        </tr>
        <tr>
            <td>7011-00 · Other Employee Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6074-00 · Travel & Entertainment</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6077-00 · Mileage Reimbursement</td>
            <td class="text-end"> {{number_format(round($expdata[44],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[44],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[44],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[44],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[44] -$expprevdata[44],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[44] -$expyeardata[44],0))}}</td>
        </tr>
        <tr>
            <td>6075-00 · Travel Expense</td>
            <td class="text-end">{{number_format(round($expdata[45],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[45],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[45],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[45],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[45] -$expprevdata[45],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[45] -$expyeardata[45],0))}}</td>
        </tr>
        <tr>
            <td>6078-00 · Meals & Entertainment</td>
            <td class="text-end">{{number_format(round($expdata[46],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[46],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[46],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[46],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[46] -$expprevdata[46],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[46] -$expyeardata[46],0))}}</td>
        </tr>
        <tr>
            <td>6074-00 · Travel & Entertainment - Other</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[47],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[47],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[47],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">   {{number_format(round($expyeardata[47],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[47] -$expprevdata[47],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expprevyeardata[47] -$expyeardata[47],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6074-00 · Travel & Entertainment</b></td>
            <td class="text-end"> {{number_format(round($expdata[44]+$expdata[45]+$expdata[46]+$expdata[47],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[44]+$expprevdata[45]+$expprevdata[46]+$expprevdata[47],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[44]+$expdata[45]+$expdata[46]+$expdata[47])-($expprevdata[44]+$expprevdata[45]+$expprevdata[46]+$expprevdata[47]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]) -($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]),0))}}</td>
       </tr>
        <tr>
            <td>6081-00 · Dues & Subscriptions</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6082-00 · Dues - Deductible</td>
            <td class="text-end">{{number_format(round($expdata[48],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[48],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[48],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[48],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[48] -$expprevdata[48],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[48] -$expyeardata[48],0))}}</td>
        </tr>
        <tr>
            <td>6081-00 · Dues & Subscriptions - Other</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[49],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[49],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[49],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[49],0))}} </td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[49] -$expprevdata[49],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[49] -$expyeardata[49],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6081-00 · Dues & Subscriptions</b></td>
            <td class="text-end">{{number_format(round($expdata[48]+$expdata[49],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[48]+$expprevdata[49],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[48]+$expprevyeardata[49],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[48]+$expyeardata[49],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[48]+$expdata[49])-($expprevdata[48]+$expprevdata[49]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[48]+$expprevyeardata[49]) -($expyeardata[48]+$expyeardata[49]),0))}}</td>
        </tr>
        <tr>
            <td>6220-00 · Payroll Taxes</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6221-00 · Unemployment Taxes</td>
            <td class="text-end">{{number_format(round($expdata[50],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[50],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[50],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[50],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[50] -$expprevdata[50],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[50] -$expyeardata[50],0))}}</td>
        </tr>
        <tr>
            <td>6226-00 · FICA Match</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[51],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[51],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[51],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> {{number_format(round($expyeardata[51],0))}}           </td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[51] -$expprevdata[51],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[51] -$expyeardata[51],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6220-00 · Payroll Taxes</b></td>
            <td class="text-end">{{number_format(round($expdata[50]+$expdata[51],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[50]+$expprevdata[51],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[50]+$expprevyeardata[51],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[50]+$expyeardata[51],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[50]+$expdata[51])-($expprevdata[50]+$expprevdata[51]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[50]+$expprevyeardata[51]) -($expyeardata[50]+$expyeardata[51]),0))}}</td>
        </tr>
        <tr>
            <td>6235-00 · Retirement Benefits</td>
            <td class="text-end">{{number_format(round($expdata[52],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[52],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[52],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[52],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[52] -$expprevdata[52],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[52] -$expyeardata[52],0))}}</td>
        </tr>
        <tr>
            <td>6239-00 · Insurance Expense - Employee</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6225-00 · Group Health & Life Insurance</td>
            <td class="text-end"> {{number_format(round($expdata[54],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[54],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[54],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[54],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[54] -$expprevdata[54],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[54] -$expyeardata[54],0))}}</td>
        </tr>
        <tr>
            <td>6230-00 · Worker's Compensation</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[55],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[55],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[55],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">    {{number_format(round($expyeardata[55],0))}}        </td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expdata[55] -$expprevdata[55],0))}}</td>
            <td style="border-bottom: 1px solid #000;"  class="text-end">{{number_format(round($expprevyeardata[55] -$expyeardata[55],0))}}</td>
        </tr>
        <tr>
            <td>6239-00 · Insurance Expense - Employee - Other</td>
            <td class="text-end">{{number_format(round($expdata[53],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[53],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[53],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[53],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[53] -$expprevdata[53],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[53] -$expyeardata[53],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 6239-00 · Insurance Expense - Employee</b></td>
            <td class="text-end">{{number_format(round($expdata[52]+$expdata[53]+$expdata[54]+$expdata[55],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[52]+$expprevdata[53]+$expprevdata[54]+$expprevdata[55],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55],0))}} </td>
            <td class="text-end">{{number_format(round(($expdata[52]+$expdata[53]+$expdata[54]+$expdata[55])-($expprevdata[52]+$expprevdata[53]+$expprevdata[54]+$expprevdata[55]),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]) -($expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]),0))}}</td>
        </tr>
        <tr>
            <td>6245-00 · Employee Procurement</td>
            <td class="text-end"> {{number_format(round($expdata[56],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[56],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[56],0))}}</td> 
            <td class="text-end">{{number_format(round($expyeardata[56],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[56] -$expprevdata[56],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[56] -$expyeardata[56],0))}}</td>

        </tr>
        <tr>
            <td>6246-00 · Drug Screening</td>
            <td class="text-end">{{number_format(round($expdata[57],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[57],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[57],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[57],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[57] -$expprevdata[57],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[57] -$expyeardata[57],0))}}</td>
        </tr>
        <tr>
            <td>6255-00 · Seminars & Education</td>
            <td class="text-end"> {{number_format(round($expdata[58],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[58],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[58],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[58],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[58] -$expprevdata[58],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[58] -$expyeardata[58],0))}}</td>
        </tr>
        <tr>
            <td>6260-00 · Employee Training</td>
            <td class="text-end">{{number_format(round($expdata[59],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[59],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[59],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[59],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[59] -$expprevdata[59],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[59] -$expyeardata[59],0))}}</td>
        </tr>
        <tr>
            <td>6265-00 · Uniforms</td>
            <td class="text-end">{{number_format(round($expdata[60],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[60],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[60],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[60],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[60] -$expprevdata[60],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[60] -$expyeardata[60],0))}}</td>
        </tr>
        <tr>
            <td>6270-00 · Awards & Gifts</td>
            <td class="text-end"> {{number_format(round($expdata[61],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[61],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevyeardata[61],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[61],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[61] -$expprevdata[61],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[61] -$expyeardata[61],0))}}</td>
        </tr>
        <tr>
            <td>6285-00 · Leased Employees</td>
            <td class="text-end"> {{number_format(round($expdata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[62],0))}}</td>
            <td class="text-end">{{number_format(round($expyeardata[62],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[62] -$expprevdata[62],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[62] -$expyeardata[62],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 7011-00 · Other Employee Expense</b></td>
            <td class="text-end">{{number_format(round($expdata[39]+$expdata[40]+$expdata[41]+$expdata[42]+$expdata[43]+$expdata[44]+$expdata[45]+$expdata[46]+$expdata[47] +$expdata[48]+$expdata[49]+$expdata[50]+$expdata[51]+$expdata[52]+$expdata[53]+$expdata[54]+$expdata[55]+$expdata[56]+$expdata[57]+$expdata[58]+$expdata[59]+$expdata[60]+$expdata[61]+$expdata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[39]+$expprevdata[40]+$expprevdata[41]+$expprevdata[42]+$expprevdata[43]+$expprevdata[44]+$expprevdata[45]+$expprevdata[46]+$expprevdata[47]+$expprevdata[48]+$expprevdata[49]+$expprevdata[50]+$expprevdata[51]+$expprevdata[52]+$expprevdata[53]+$expprevdata[54]+$expprevdata[55]+$expprevdata[56]+$expprevdata[57]+$expprevdata[58]+$expprevdata[59]+$expprevdata[60]+$expprevdata[61]+$expprevdata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62],0))}} </td>
            <td class="text-end">{{number_format(round((($expdata[39]+$expdata[40]+$expdata[41]+$expdata[42]+$expdata[43]+$expdata[44]+$expdata[45]+$expdata[46]+$expdata[47] +$expdata[48]+$expdata[49]+$expdata[50]+$expdata[51]+$expdata[52]+$expdata[53]+$expdata[54]+$expdata[55]+$expdata[56]+$expdata[57]+$expdata[58]+$expdata[59]+$expdata[60]+$expdata[61]+$expdata[62])-($expprevdata[39]+$expprevdata[40]+$expprevdata[41]+$expprevdata[42]+$expprevdata[43]+$expprevdata[44]+$expprevdata[45]+$expprevdata[46]+$expprevdata[47]+$expprevdata[48]+$expprevdata[49]+$expprevdata[50]+$expprevdata[51]+$expprevdata[52]+$expprevdata[53]+$expprevdata[54]+$expprevdata[55]+$expprevdata[56]+$expprevdata[57]+$expprevdata[58]+$expprevdata[59]+$expprevdata[60]+$expprevdata[61]+$expprevdata[62])),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[39]+$expprevyeardata[40]+$expprevyeardata[41]+$expprevyeardata[42]+$expprevyeardata[43]+$expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]) -($expyeardata[39]+$expyeardata[40]+$expyeardata[41]+$expyeardata[42]+$expyeardata[43]+$expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]),0))}}</td>
        </tr>
        <tr>
            <td>7010-00 · Payroll Expenses - Other</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[71],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[71],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[71],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[71],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[71] -$expprevdata[71],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[71] -$expyeardata[71],0))}}</td> 
        <tr>
            <td><b>Total 7010-00 · Payroll Expenses</b></td>
            <td class="text-end">{{number_format(round($expdata[44]+$expdata[45]+$expdata[46]+$expdata[47] +$expdata[48]+$expdata[49]+$expdata[50]+$expdata[51]+$expdata[52]+$expdata[53]+$expdata[54]+$expdata[55]+$expdata[56]+$expdata[57]+$expdata[58]+$expdata[59]+$expdata[60]+$expdata[61]+$expdata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[44]+$expprevdata[45]+$expprevdata[46]+$expprevdata[47]+$expprevdata[48]+$expprevdata[49]+$expprevdata[50]+$expprevdata[51]+$expprevdata[52]+$expprevdata[53]+$expprevdata[54]+$expprevdata[55]+$expprevdata[56]+$expprevdata[57]+$expprevdata[58]+$expprevdata[59]+$expprevdata[60]+$expprevdata[61]+$expprevdata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62],0))}}</td>
            <td class="text-end"> {{number_format(round($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62],0))}} </td>
            <td class="text-end">{{number_format(round((($expdata[44]+$expdata[45]+$expdata[46]+$expdata[47] +$expdata[48]+$expdata[49]+$expdata[50]+$expdata[51]+$expdata[52]+$expdata[53]+$expdata[54]+$expdata[55]+$expdata[56]+$expdata[57]+$expdata[58]+$expdata[59]+$expdata[60]+$expdata[61]+$expdata[62])-($expprevdata[44]+$expprevdata[45]+$expprevdata[46]+$expprevdata[47]+$expprevdata[48]+$expprevdata[49]+$expprevdata[50]+$expprevdata[51]+$expprevdata[52]+$expprevdata[53]+$expprevdata[54]+$expprevdata[55]+$expprevdata[56]+$expprevdata[57]+$expprevdata[58]+$expprevdata[59]+$expprevdata[60]+$expprevdata[61]+$expprevdata[62])),0))}}</td>
            <td class="text-end">{{number_format(round(($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]) -($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]),0))}}</td>
        </tr>
        <tr>
            <td>7013-00 · Tax, License & Permit Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6050-00 · Franchise Tax</td>
            <td class="text-end"> {{number_format(round($expdata[63],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[63],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[63],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[63],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[63] -$expprevdata[63],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[53] -$expyeardata[53],0))}}</td>
        </tr>
        <tr>
            <td>6052-00 · Personal Property</td>
            <td class="text-end">{{number_format(round($expdata[64],0))}} </td>
            <td class="text-end">{{number_format(round($expprevdata[64],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[64],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[64],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[64] -$expprevdata[64],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[64] -$expyeardata[64],0))}}</td>
        </tr>
        <tr>
            <td>6054-00 · Real Estate</td>
            <td class="text-end"> {{number_format(round($expdata[65],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[65],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[65],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[65],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[65] -$expprevdata[65],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[65] -$expyeardata[65],0))}}</td>
        </tr>
        <tr>
            <td>6056-00 · Sales & Use Tax</td>
            <td class="text-end"> {{number_format(round($expdata[66],0))}}</td>
            <td class="text-end"> {{number_format(round($expprevdata[66],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[66],0))}} </td>
            <td class="text-end">{{number_format(round($expyeardata[66],0))}} </td>
            <td class="text-end">{{number_format(round($expdata[66] -$expprevdata[66],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[66] -$expyeardata[66],0))}}</td>
        </tr>
        <tr>
            <td>6058-00 · Waste Tire tax</td>
            <td class="text-end"> {{number_format(round($expdata[67],0))}}</td>
            <td class="text-end">{{number_format(round($expprevdata[67],0))}} </td>
            <td class="text-end">{{number_format(round($expprevyeardata[67],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[67],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[67] -$expprevdata[67],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[67] -$expyeardata[67],0))}}</td>
        </tr>
        <tr>
            <td>6080-00 · Business Licenses & Permits</td>
            <td class="text-end">{{number_format(round($expdata[68],0))}} </td>
            <td class="text-end"> {{number_format(round($expprevdata[68],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[68],0))}} </td>
            <td class="text-end"> {{number_format(round($expyeardata[68],0))}}</td>
            <td class="text-end">{{number_format(round($expdata[68] -$expprevdata[68],0))}}</td>
            <td class="text-end">{{number_format(round($expprevyeardata[68] -$expyeardata[68],0))}}</td>
        </tr>
        <tr>
            <td>6088-00 · Royalty Fees</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[69],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[69],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[69],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[69],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[69] -$expprevdata[69],0))}}</td>
            <td style="border-bottom: 1px solid #000;"class="text-end">{{number_format(round($expprevyeardata[69] -$expyeardata[69],0))}}</td>
        </tr>
        <tr>
            <td><b>Total 7013-00 · Tax, License & Permit Expense</b></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
        </tr>
        <tr>
            <td>6030-00 · Operational Overhead</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[70],0))}}

            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevdata[70],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[70],0))}}
            </td>

            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expyeardata[70],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expdata[70] -$expprevdata[70],0))}}</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">{{number_format(round($expprevyeardata[70] -$expyeardata[70],0))}}</td>
        </tr>
        <!-- <tr>
            <td><b>Total Expense</b></td>
            <td style="border-bottom: 1px solid #000;" class="text-end"></td>
            <td style="border-bottom: 1px solid #000;" class="text-end"></td>
            <td style="border-bottom: 1px solid #000;" class="text-end">
            </td>

            <td style="border-bottom: 1px solid #000;" class="text-end"></td>
        </tr>
        <tr>
            <td><b>Net Ordinary Income</b></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
        </tr>
        <tr>
            <td><b>Other Income/Expense</b></td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>Other Income</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>7005-00 · Recovery of Charged-Off Accts</td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>7001-00 · Proceeds from Sale of Assets</td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>7001-06 · Sale of Dallas</td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>7002-00 · Other Income</td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>7003-00 · Interest Income</td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>7004-00 · Purchase Discount</td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>7006-00 · Insurance Proceeds Received</td>
            <td style="border-bottom: 1px solid #000;" class="text-end">
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end">
            </td>
            <td style="border-bottom: 1px solid #000;" class="text-end"></td>
        </tr>
        <tr>
            <td><b>Total Other Income</b></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
        </tr>
        <tr>
            <td><b>Other Expense</b></td>
            <td style="border-bottom: 1px solid #000;" class="text-end"></td>
            <td style="border-bottom: 1px solid #000;" class="text-end"></td>
            <td style="border-bottom: 1px solid #000;" class="text-end">
            </td>

            <td style="border-bottom: 1px solid #000;" class="text-end"></td>
        </tr>
        <tr>
            <td>7001-01 · Loss(Gain)on Disposal of assets</td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
        </tr>
        <tr>
            <td>8000-00 · Interest Expense</td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
            <td class="text-end"> </td>
        </tr>
        <tr>
            <td>9000-00 · Overhead Allocation</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>9999-00 · Ask My Accountant</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
        </tr>
        <tr>
            <td>Total Other Expense</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
        </tr>
        <tr>
            <td>Net Other Income</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
        </tr>
        <tr>
            <td>Net Income</td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
            <td  style="border-bottom: 1px solid #000;" class="text-end"> </td>
        </tr> -->
    </tbody>
</table>
@endsection