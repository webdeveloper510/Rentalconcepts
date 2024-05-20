<table class="table table-bordered " style="margin-left: 25px;width: 95%;">
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <thead>
        <th></th>
        <th style=" text-align:center;border-bottom: 1px solid #000;"><b> Jan - {{$last_month .' '.$year}}</b></th>
        <th style="text-align:center;border-bottom: 1px solid #000;"><b>Jan - {{$last_month .' '.$previousyear}}</b></th>
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
            <td><b>Income</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>4000-00 · Rental Income</td>
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
            <td>4100-00 · Cash Sales</td>
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
            <td>4102-00 · Cash Sales Non-inventory</td>
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
            <td>4105-00 · Early Purchase Option</td>
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
            <td>4200-00 · Roll Pro</td>
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
            <td>4205-00 · Collection Fee –In-House</td>
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
            <td>4210-00 · Reinstatement Fees</td>
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
            <td>4214-00 · Other Fees - Alignments</td>
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
            <td>4215-00 · One Time Fees</td>
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
            <td>4225-00 · NSF Check Fees</td>
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
            <td>4230-00 · Other Miscellaneous Income</td>
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
            <td>4235-00 · Sales Tax Collected</td>
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
            <td>4240-00 · Roll Safe</td>
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
            <td>4250-00 · Chargebacks</td>
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
            <td>4245-00 · Management Fee</td>
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
            <td>4300-00 · Sub-franchisee Royalty Income</td>
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
            <td><b>Total Income</b></td>
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
            <td><b>Cost of Goods Sold</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>5000-00 · Depreciation - Inventory</td>
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
            <td>5100-00 · Charge Off Expense</td>
            <td style="text-align:right"></td>
            <td style="text-align:right"></td>
            <td style="text-align:right"></td>
            <td style="text-align:right"> </td>
        </tr>
        <tr>
            <td>5101-00 · Paid Out , EPO Charge Offs</td>
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
            <td>5102-00 · Cash Sale Charge Offs</td>
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
            <td>5103-00 · Skip/Stolen Charge Offs</td>
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
            <td>5104-00 · Non-Repairable Charge Offs</td>
            <td style="text-align:right"></td>
            <td style="text-align:right"></td>
            <td style="text-align:right"></td>
            <td style="text-align:right"></td>
        </tr>
        <tr>
            <td>5104-01 · Insurance Charge Offs</td>
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
            <td>5104-02 · Returned Damaged/Non-Repairable</td>
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
            <td><b>Total 5104-00 · Non-Repairable Charge Offs</b></td>
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
            <td>5105-00 · Other Charge off</td>
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
            <td>5105-01 · Past Due Account Charge Off</td>
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
            <td>5106-00 · Inventory Cost Adjustment</td>
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
            <td><b>Total 5100-00 · Charge Off Expense</b></td>
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
            <td>5400-00 · Club Remittance</td>
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
            <td><b>Total COGS</b></td>
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
        <tr style="border-bottom: 3px solid #000;">
            <td><b>Gross Profit</b></td>
            <td style="text-align:right"> {{number_format(round((@$revprevyeardata[0] + @$revprevyeardata[1] + @$revprevyeardata[2] + @$revprevyeardata[3]+ @$revprevyeardata[4] +@$revprevyeardata[5] + @$revprevyeardata[6] +@$revprevyeardata[7] + @$revprevyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revprevyeardata[11] + @$revprevyeardata[12]+ @$revprevyeardata[13]+ @$revprevyeardata[14]+ @$revprevyeardata[15]) -($cogprevyeardata[0] +$cogprevyeardata[1] +$cogprevyeardata[2]+$cogprevyeardata[3] +$cogprevyeardata[4]+$cogprevyeardata[5]+$cogprevyeardata[6]+$cogprevyeardata[7]+$cogprevyeardata[8]+$cogprevyeardata[9]),0))}}</td>
            <td style="text-align:right"> {{number_format(round((@$revyeardata[0] + @$revyeardata[1] + @$revyeardata[2] + @$revyeardata[3]+ @$revyeardata[4] +@$revyeardata[5] + @$revyeardata[6] +@$revyeardata[7] + @$revyeardata[8] + @$revprevyeardata[9] + @$revprevyeardata[10] + @$revyeardata[11] + @$revyeardata[12]+ @$revyeardata[13]+ @$revyeardata[14]+ @$revyeardata[15])-($cogyeardata[0] +$cogyeardata[1] +$cogyeardata[2]+$cogyeardata[3] +$cogyeardata[4]+$cogyeardata[5]+$cogyeardata[6]+$cogyeardata[7]+$cogyeardata[8]+$cogyeardata[9]),0))}}</td>
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
            <td>6071-00 · Labor - Inventory Repair</td>
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
            <td><b>Total 6069-00 · Inventory Repairs</b></td>
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
            <td>6490-00 · Advertising and Promotion</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6500-00 · Radio - Admin</td>
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
            <td>6510-00 · Print Media</td>
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
            <td>6550-00 · Sponsorships</td>
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
            <td>6551-00 · Internet/Online</td>
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
            <td><b>Total 6490-00 · Advertising and Promotion</b></td>
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
            <td>6530-00 · Special Events</td>
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
            <td>6555-00 · Other Selling Expenses</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6018-00 · Cash Short (Long)</td>
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
            <td><b>Total 6555-00 · Other Selling Expenses</b></td>
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
            <td><b>Total 6001-00 · Selling Expense</b></td>
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
            <td>6002-00 · General , Admin Expense</td>
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
            <td>6025-00 · Bank Service Charges</td>
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
            <td>6019-00 · Bank Charges - Other</td>
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
            <td><b>Total 6019-00 · Bank Charges</b></td>
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
            <td><b>Total 6002-00 · General , Admin Expense</b></td>
            <td style="text-align:right"> </td>
            <td style="text-align:right"> </td>
            <td style="text-align:right"> </td>
            <td style="text-align:right"> </td>
        </tr>
        <tr>
            <td>6029-00 · Professional Fees</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6034-00 · Legal Fees</td>
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
            <td>6035-00 · Accounting Fees</td>
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
            <td>6029-00 · Professional Fees - Other</td>
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
            <td><b>Total 6029-00 · Professional Fees</b></td>
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
            <td>6039-00 · Insurance Expense - Admin</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6040-00 · Property , General Liability</td>
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
            <td><b>Total 6039-00 · Insurance Expense - Admin</b></td>
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
            <td>6059-00 · Postage, Freight , Supplies</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6000-00 · Office Supplies</td>
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
            <td>6010-00 · Postage</td>
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
            <td>6015-00 · Freight</td>
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
            <td>6065-00 · General Supplies</td>
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
            <td>6059-00 · Postage, Freight , Supplies - Other</td>
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
            <td><b>Total 6059-00 · Postage, Freight , Supplies</b></td>
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
            <td>6068-00 · Occupancy Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6300-00 · Rent Expense</td>
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
            <td>6305-00 · Utilities</td>
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
            <td>6315-00 · Security</td>
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
            <td>6320-00 · Pest Control</td>
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
            <td>6325-00 · Repair , Maintenance Building</td>
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
            <td><b>Total 6068-00 · Occupancy Expense</b></td>
            <td style="text-align:right"> {{number_format(round($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24],0))}}</td>
            <td style="text-align:right"> {{number_format(round($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24],0))}} </td>
            <td style="text-align:right">{{number_format(round(($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]) -($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]),0))}}</td>
            <td style="text-align:right"> @if($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24])
                {{number_format(round((($expprevyeardata[20]+$expprevyeardata[21]+$expprevyeardata[22]+$expprevyeardata[23]+$expprevyeardata[24]) -($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]))/($expyeardata[20]+$expyeardata[21]+$expyeardata[22]+$expyeardata[23]+$expyeardata[24]) *100,2))}}%
                @else
                <b> - </b>
                @endif
            </td>
        </tr>
        <tr>
            <td>6079-00 · Equipment Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6330-00 · Repairs , Maintenance - Equip</td>
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
            <td>6335-00 · Equipment Rental</td>
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
            <td><b>Total 6079-00 · Equipment Expense</b></td>
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
            <td>6100-00 · Depreciation Expense - F,F,E</td>
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
            <td>6105-00 · Amortization Expense</td>
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
            <td>6399-00 · Vehicle Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6400-00 · Repair , Maintenance - Vehicles</td>
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
            <td>6405-00 · Fuel , Oil - Vehicle</td>
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
            <td>6420-00 · Vehicle Insurance</td>
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
            <td>6430-00 · Vehicle Licenses</td>
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
            <td><b>Total 6399-00 · Vehicle Expense</b></td>
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
            <td>6598-00 · Other</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6085-00 · Charitable Contributions</td>
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
            <td>6090-00 · Customer Settlements</td>
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
            <td><b>Total 6598-00 · Other</b></td>
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
            <td>6599-00 · Computer , Internet Expenses</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6600-00 · Software license fees</td>
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
            <td>6610-00 · Computer Supplies</td>
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
            <td>6615-00 · Computer Maintenance , Repair</td>
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
            <td>6650-00 · Telephone , Communications</td>
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
            <td><b>Total 6599-00 · Computer , Internet Expenses</b></td>
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
            <td>7010-00 · Payroll Expenses</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6200-00 · Salaries , Wages</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6201-00 · Salary</td>
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
            <td>6202-00 · Hourly</td>
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
            <td>6203-00 · Overtime hourly</td>
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
            <td>6204-00 · Holiday</td>
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
            <td>6205-00 · Bonus</td>
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
            <td><b>Total 6200-00 · Salaries , Wages</b></td>
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
            <td>7011-00 · Other Employee Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6074-00 · Travel , Entertainment</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6077-00 · Mileage Reimbursement</td>
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
            <td>6075-00 · Travel Expense</td>
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
            <td>6078-00 · Meals , Entertainment</td>
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
            <td>6074-00 · Travel , Entertainment - Other</td>
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
            <td><b>Total 6074-00 · Travel , Entertainment</b></td>
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
            <td>6081-00 · Dues , Subscriptions</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6082-00 · Dues - Deductible</td>
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
            <td>6081-00 · Dues , Subscriptions - Other</td>
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
            <td><b>Total 6081-00 · Dues , Subscriptions</b></td>
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
            <td>6220-00 · Payroll Taxes</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6221-00 · Unemployment Taxes</td>
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
            <td>6226-00 · FICA Match</td>
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
            <td><b>Total 6220-00 · Payroll Taxes</b></td>
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
            <td>6235-00 · Retirement Benefits</td>
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
            <td>6239-00 · Insurance Expense - Employee</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6225-00 · Group Health , Life Insurance</td>
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
            <td>6230-00 · Worker's Compensation</td>
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
            <td>6239-00 · Insurance Expense - Employee - Other</td>
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
            <td><b>Total 6239-00 · Insurance Expense - Employee</b></td>
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
            <td>6245-00 · Employee Procurement</td>
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
            <td>6246-00 · Drug Screening</td>
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
            <td>6255-00 · Seminars , Education</td>
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
            <td>6260-00 · Employee Training</td>
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
            <td>6265-00 · Uniforms</td>
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
            <td>6270-00 · Awards , Gifts</td>
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
            <td>6285-00 · Leased Employees</td>
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
            <td><b>Total 7011-00 · Other Employee Expense</b></td>
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
            <td>7010-00 · Payroll Expenses - Other</td>
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
            <td><b>Total 7010-00 · Payroll Expenses</b></td>
            <td style="text-align:right"> {{number_format(round($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62],0))}}</td>
            <td style="text-align:right"> {{number_format(round($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62],0))}} </td>
            <td style="text-align:right">{{number_format(round(($expprevyeardata[44]+$expprevyeardata[45]+$expprevyeardata[46]+$expprevyeardata[47]+$expprevyeardata[48]+$expprevyeardata[49]+$expprevyeardata[50]+$expprevyeardata[51]+$expprevyeardata[52]+$expprevyeardata[53]+$expprevyeardata[54]+$expprevyeardata[55]+$expprevyeardata[56]+$expprevyeardata[57]+$expprevyeardata[58]+$expprevyeardata[59]+$expprevyeardata[60]+$expprevyeardata[61]+$expprevyeardata[62]) -($expyeardata[44]+$expyeardata[45]+$expyeardata[46]+$expyeardata[47]+$expyeardata[48]+$expyeardata[49]+$expyeardata[50]+$expyeardata[51]+$expyeardata[52]+$expyeardata[53]+$expyeardata[54]+$expyeardata[55]+$expyeardata[56]+$expyeardata[57]+$expyeardata[58]+$expyeardata[59]+$expyeardata[60]+$expyeardata[61]+$expyeardata[62]),0))}}</td>
        </tr>
        <tr>
            <td>7013-00 · Tax, License , Permit Expense</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6050-00 · Franchise Tax</td>
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
            <td>6052-00 · Personal Property</td>
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
            <td>6054-00 · Real Estate</td>
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
            <td>6056-00 · Sales , Use Tax</td>
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
            <td>6058-00 · Waste Tire tax</td>
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
            <td>6080-00 · Business Licenses , Permits</td>
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
            <td>6088-00 · Royalty Fees</td>
            <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[69],0))}}
            </td>
            <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expyeardata[69],0))}}</td>
            <td style="border-bottom: 1px solid #000;text-align:right">{{number_format(round($expprevyeardata[69] -$expyeardata[69],0))}}</td>
            <td style="border-bottom: 1px solid #000;text-align:right"> @if($expyeardata[69])
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