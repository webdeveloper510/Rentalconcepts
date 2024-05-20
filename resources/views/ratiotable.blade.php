<table>
    <tr></tr>
    <tr></tr>
    <tr>
        <td rowspan="2" style="font-size:22px;"><b>Profit-Loss Ratio</b></td>
        <td  rowspan="2" colspan="6"  style="font-size:22px;text-align:center;"><b>{{@$locname}}</b></td>
    </tr>
    <tr></tr>
   
    <tr >
        <th rowspan="2" ></th>
        <th style="background-color: #f44336;color:white;font-size:12px;" rowspan="2"><b>2401 - Jacksonville</b></th>
        <th style="background-color: #f44336;color:white" rowspan="2"></th>
        <th style="background-color: #f44336;color:white;font-size:12px;" rowspan="2"><b>{{@$locname}}</b></th>
        <th style="background-color: #f44336;color:white" rowspan="2"></th>
        <th style="background-color: #f44336;color:white;font-size:12px;" rowspan="2"><b>Total Company</b></th>
    </tr>
    <tr></tr>
    <tr>
        <td><b>4000-00 · Rental Income</b></td>
        <td style="text-align:right">@if(@$alldataa[0]){{number_format(round(@$alldataa[0],0))}}@else <b> - </b>@endif</td>
        <td></td>
        <td style="text-align:right">@if(@$revenuedata[0]){{number_format(round(@$revenuedata[0],0))}}@else <b> - </b>@endif</td>
        <td></td>
        <td style="text-align:right">@if(@$totalrevenuedata[0]){{number_format(round(@$totalrevenuedata[0],0))}}@else <b> - </b>@endif</td>
    </tr>
    <tr>
            <td><b>5000-00 · Depreciation - Inventory</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogdataa[0]){{number_format(round(@$cogdataa[0],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogsdata[0]){{number_format(round(@$cogsdata[0],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;"></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalcogsdata[0]){{number_format(round(@$totalcogsdata[0],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;"></td>

        </tr>
        <tr>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[0]-@$cogdataa[0],0))}}</td>
            <td style="text-align:right">@if(@$alldataa[0]){{number_format(((@$alldataa[0]-@$cogdataa[0])/@$alldataa[0])*100)}}%@else <b> - </b>@endif</td>
            <td style="text-align:right">{{number_format(round(@$revenuedata[0]-@$cogsdata[0],0))}}</td>
            <td style="text-align:right">@if(@$revenuedata[0]){{number_format(((@$revenuedata[0]-@$cogsdata[0])/@$revenuedata[0])*100)}}@else
                <b> -</b> @endif%
            </td>
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[0]-@$totalcogsdata[0],0))}}</td>
            <td style="text-align:right">@if(@$revenuedata[0]){{number_format(((@$totalrevenuedata[0]-@$totalcogsdata[0])/@$totalrevenuedata[0])*100)}}%@else
                <b> -</b> @endif
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td><b>4100-00 · Cash Sales</b></td>
            <td style="text-align:right">@if(@$alldataa[1]){{number_format(round(@$alldataa[1],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td style="text-align:right">@if(@$revenuedata[1]){{number_format(round(@$revenuedata[1],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td style="text-align:right">@if(@$totalrevenuedata[1]){{number_format(round(@$totalrevenuedata[1],0))}}@else <b> - </b> @endif</td>

        </tr>
        <tr>
            <td><b>5102-00 · Cash Sale Charge Offs</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogdataa[2]){{number_format(round(@$cogdataa[2],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogsdata[2]){{number_format(round(@$cogsdata[2],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalcogsdata[2]){{number_format(round(@$totalcogsdata[2],0))}}@else <b> - </b> @endif</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[1]-@$cogdataa[2],0))}}</td>
            <td style="text-align:right">@if(@$alldataa[1]){{number_format(((@$alldataa[1]-@$cogdataa[2])/@$alldataa[1])*100)}}%@else <b> - </b> @endif</td>
            <td style="text-align:right"> {{number_format(round(@$revenuedata[1]-@$cogsdata[2],0))}}</td>
            <td style="text-align:right">@if(@$revenuedata[1]){{number_format(((@$revenuedata[1]-@$cogsdata[2])/@$revenuedata[1])*100)}}@else <b>-</b>@endif%</td>
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[1]-@$totalcogsdata[2],0))}}</td>
            <td style="text-align:right">@if(@$totalrevenuedata[1]){{number_format(((@$totalrevenuedata[1]-@$totalcogsdata[2])/@$totalrevenuedata[1])*100)}}%@else <b> - </b> @endif</td>
        </tr>
        <tr></tr>
        <tr>
            <td><b>4105-00 · Early Purchase Option</b></td>
            <td style="text-align:right">@if(@$alldataa[2]){{number_format(round(@$alldataa[2],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td style="text-align:right">@if(@$revenuedata[2]){{number_format(round(@$revenuedata[2],0))}} @else <b> - </b> @endif</td>
            <td></td>
            <td style="text-align:right">@if(@$totalrevenuedata[2]){{number_format(round(@$totalrevenuedata[2],0))}} @else <b> - </b> @endif</td>
        </tr>
        <tr>
            <td><b>5101-00 · Paid Out - EPO Charge Offs</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogdataa[1]){{number_format(round(@$cogdataa[1],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogsdata[1]){{number_format(round(@$cogsdata[1],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalcogsdata[1]){{number_format(round(@$totalcogsdata[1],0))}}@else <b> - </b> @endif</td>
        </tr>
       <tr></tr>
        <tr>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[2]-@$cogdataa[1],0))}}</td>
            <td style="text-align:right">@if(@$alldataa[2]){{number_format(((@$alldataa[2]-@$cogdataa[1])/@$alldataa[2])*100)}}%@else <b> - </b> @endif</td>
            
            <td style="text-align:right">{{number_format(round(@$revenuedata[2]-@$cogsdata[1],0))}}</td>
            <td style="text-align:right">@if(@$revenuedata[2]){{number_format(((@$revenuedata[2]-@$cogsdata[1])/@$revenuedata[2])*100)}}@else <b>-</b>@endif%</td>
            
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[2]-@$totalcogsdata[1],0))}}</td>
            <td style="text-align:right">@if(@$totalrevenuedata[2]){{number_format(((@$totalrevenuedata[2]-@$totalcogsdata[1])/@$totalrevenuedata[2])*100)}}%@else <b> - </b> @endif</td>
        </tr>
        <tr></tr>
        <tr>
            <td><b>4200-00 · Roll Pro</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$alldataa[3]){{number_format(round(@$alldataa[3],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6;">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] != '0')
                {{round(@$alldataa[3]/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11])*100,1)}}%
                @endif
            </td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$revenuedata[3]){{number_format(round(@$revenuedata[3],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                {{round(@$revenuedata[3]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                @endif
            </td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalrevenuedata[3]){{number_format(round(@$totalrevenuedata[3],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                {{round(@$totalrevenuedata[3]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                @endif
            </td>
        </tr>
        <tr>
            <td><b>4240-00 · Roll Safe</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$alldataa[10]){{number_format(round(@$alldataa[10],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] != '0')
                {{round(@$alldataa[10]/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11])*100,1)}}%
                @endif
            </td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$revenuedata[10]){{number_format(round(@$revenuedata[10],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                {{round(@$revenuedata[10]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                @endif
            </td>

            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalrevenuedata[10]){{number_format(round(@$totalrevenuedata[10],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                {{round(@$totalrevenuedata[10]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                @endif
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[3]+@$alldataa[10],0))}}</td>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$revenuedata[3]+@$revenuedata[10],0))}}</td>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[3]+@$totalrevenuedata[10],0))}}</td>
        </tr>
        <tr></tr>
        <tr>
            <td><b>5400-00 · Club Remittance</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogdataa[9]){{number_format(round(@$cogdataa[9],0))}}@else <b> - </b> @endif</td>
        
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogsdata[9]){{number_format(round(@$cogsdata[9],0))}}@else <b> - </b> @endif</td>
           
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalcogsdata[9]){{number_format(round(@$totalcogsdata[9],0))}}@else <b> - </b> @endif</td>
           
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[3]+@$alldataa[10]-@$cogdataa[9],0))}}</td>
            <td style="text-align:right">@if(@$alldataa[3]){{number_format(((@$alldataa[3]+@$alldataa[10]-@$cogdataa[9])/(@$alldataa[3]+@$alldataa[10]))*100)}}%@else <b> - </b> @endif</td>
            
            <td style="text-align:right">{{number_format(round(@$revenuedata[3]+@$revenuedata[10]-@$cogsdata[9],0))}}</td>
            <td style="text-align:right">@if(@$revenuedata[3]+@$revenuedata[10]){{number_format(((@$revenuedata[3]+@$revenuedata[10]-@$cogsdata[9])/(@$revenuedata[3]+@$revenuedata[10]))*100)}}@else <b>-</b>@endif%</td>
           
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[3]+@$totalrevenuedata[10]-@$totalcogsdata[9],0))}}</td>
            <td style="text-align:right">@if(@$totalcogsdata[9]){{number_format(((@$totalrevenuedata[3]+@$totalrevenuedata[10]-@$totalcogsdata[9])/(@$totalrevenuedata[3]+@$totalrevenuedata[10]))*100)}}%@else <b> - </b> @endif</td>
        </tr>
        <tr></tr>
        <tr>
            <td><b>4205-00 · Collection Fee - In-House</b></td>
            <td style="text-align:right">@if(@$alldataa[4]){{number_format(round(@$alldataa[4],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td style="text-align:right">@if(@$revenuedata[4]){{number_format(round(@$revenuedata[4],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td style="text-align:right">@if(@$totalrevenuedata[4]){{number_format(round(@$totalrevenuedata[4],0))}}@else <b> - </b> @endif</td>
        </tr>
        <tr>
            <td><b>4210-00 · Reinstatement Fees</b></td>
            <td style="text-align:right">@if(@$alldataa[5]){{number_format(round(@$alldataa[5],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] != '0')
                {{round(@$alldataa[5]/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11])*100,1)}}%
                @endif
            </td>
            <td style="text-align:right">@if(@$revenuedata[5]){{number_format(round(@$revenuedata[5],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                {{round(@$revenuedata[5]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                @endif
            </td>
            <td style="text-align:right">@if(@$totalrevenuedata[5]){{number_format(round(@$totalrevenuedata[5],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                {{round(@$totalrevenuedata[5]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                @endif
            </td>
        </tr>
        <tr>
            <td><b>4214-00 · Other Fees - Alignments</b></td>
            <td style="text-align:right">@if(@$alldataa[6]){{number_format(round(@$alldataa[6],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] != '0')
                {{round(@$alldataa[6]/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11])*100,1)}}%
                @endif
            </td>

            <td style="text-align:right">@if(@$revenuedata[6]){{number_format(round(@$revenuedata[6],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                {{round(@$revenuedata[6]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                @endif
            </td>
          
            <td style="text-align:right">@if(@$totalrevenuedata[6]){{number_format(round(@$totalrevenuedata[6],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                {{round(@$totalrevenuedata[6]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                @endif
            </td>
        </tr>
        <tr>
            <td><b>4215-00 · One Time Fees</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$alldataa[7]){{number_format(round(@$alldataa[7],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] != '0')
                {{round(@$alldataa[7]/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11])*100,1)}}%
                @endif
            </td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$revenuedata[7]){{number_format(round(@$revenuedata[7],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                {{round(@$revenuedata[7]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                @endif
            </td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalrevenuedata[7]){{number_format(round(@$totalrevenuedata[7],0))}}@else <b> - </b> @endif</td>
            <td  style="text-align:right;border-bottom: 5px solid black;background-color:#96CAD6">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                {{round(@$totalrevenuedata[7]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                @endif
            </td>
        </tr> 
        <tr>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[4] +@$alldataa[5]+ @$alldataa[6] +@$alldataa[7],0))}}</td>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$revenuedata[4] +@$revenuedata[5]+ @$revenuedata[6] +@$revenuedata[7],0))}}</td>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[4] +@$totalrevenuedata[5]+ @$totalrevenuedata[6] +@$totalrevenuedata[7],0))}}</td>
        </tr>
        <tr></tr>
        <tr>
            <td><b>4230-00 · Other Miscellaneous Income</b></td>
            <td style="text-align:right">@if(@$alldataa[9]){{number_format(round(@$alldataa[9],0))}}@else <b> - </b> @endif</td>
            <td style="color:#f44336;text-align:right">@if(@$cogdataa[4]){{number_format(((@$alldataa[9])/(@$cogdataa[4]))*100)}}%@else <b> - </b> @endif</td>
           
            <td style="text-align:right">@if(@$revenuedata[9]){{number_format(round(@$revenuedata[9],0))}}@else <b> - </b> @endif</td>
            <td style="color:#f44336;text-align:right">@if(@$cogsdata[4]){{number_format(((@$revenuedata[9])/(@$cogsdata[4]))*100)}}@else <b>-</b>@endif%</td>
            <td style="text-align:right">@if(@$totalrevenuedata[9]){{number_format(round(@$totalrevenuedata[9],0))}}@else <b> - </b> @endif</td>
            <td style="color:#f44336;text-align:right">@if(@$totalcogsdata[4]){{number_format(((@$totalrevenuedata[9])/(@$totalcogsdata[4]))*100)}}%@else <b> - </b> @endif</td>
        </tr>
        <tr>
            <td><b>5104-01 · Insurance Charge Offs</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogdataa[4]){{number_format(round(@$cogdataa[4],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$cogsdata[4]){{number_format(round(@$cogsdata[4],0))}}@else <b> - </b> @endif</td>
            <td></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">@if(@$totalcogsdata[4]){{number_format(round(@$totalcogsdata[4],0))}}@else <b> - </b> @endif</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[9]-@$cogdataa[4],0))}}</td>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$revenuedata[9]-@$cogsdata[4],0))}}</td>
            <td></td>
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[9]-@$totalcogsdata[4],0))}}</td>
        </tr>
        <tr></tr>
        <tr>
            <td><b>5104-02 · Returned Damaged/Non-Repairable</b></td>
            <td style="text-align:right">@if(@$cogdataa[5]){{number_format(round(@$cogdataa[5],0))}}@else <b> - </b> @endif</td>

            <td style="text-align:right;background-color:#96CAD6">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] != '0')
                {{round(@$cogdataa[5]/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11])*100,2)}}%
                @endif
            </td>
            <td style="text-align:right">@if(@$cogsdata[5]){{number_format(round(@$cogsdata[5],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                {{round(@$cogsdata[5]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,2)}}%
                @endif
            </td>
            <td style="text-align:right">@if(@$totalcogsdata[5]){{number_format(round(@$totalcogsdata[5],0))}}@else <b> - </b> @endif</td>
            <td style="text-align:right;background-color:#96CAD6">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                {{round(@$totalcogsdata[5]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,2)}}%
                @endif
            </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td><b>5105-01 · Past Due Account Charge Off</b></td>
            <td style="text-align:right" >@if(@$cogdataa[7]){{number_format(round(@$cogdataa[7],0))}}@else <b> - </b> @endif</td>
            <td style="background-color:#96CAD6;text-align:right">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] != '0')
                {{round(@$cogdataa[7]/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11])*100,2)}}%
                @endif
            </td>
           
            <td style="text-align:right">@if(@$cogsdata[7]){{number_format(round(@$cogsdata[7],0))}}@else <b> - </b> @endif</td>
            <td style="background-color:#96CAD6;text-align:right">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                {{round(@$cogsdata[7]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,2)}}%
                @endif
            </td>
            
            <td style="text-align:right">@if(@$totalcogsdata[7]){{number_format(round(@$totalcogsdata[7],0))}}@else <b> - </b> @endif</td>
            <td style="background-color:#96CAD6;text-align:right">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                {{round(@$totalcogsdata[7]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,2)}}%
                @endif
            </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td><b>Total Income</b></td>
            <td style="text-align:right">{{number_format(round(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11]))}}</td>
           
            <td></td>
            <td style="text-align:right">{{number_format(round(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11]))}}</td>
           
            <td></td>
            <td style="text-align:right">{{number_format(round(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11]))}}</td>
        </tr>
 <tr>
            <td><b>Total COGS</b></td>
            <td  style="text-align:right;border-bottom: 5px solid black;">{{number_format(round(@$cogdataa[0] + @$cogdataa[1] +@$cogdataa[2] + @$cogdataa[3]+ @$cogdataa[4] + @$cogdataa[5] + @$cogdataa[6] + @$cogdataa[7] +@$cogdataa[8] +@$cogdataa[9],0))}}</td>
            <td  style="text-align:right;border-bottom: 5px solid black;"></td>
  
            <td  style="text-align:right;border-bottom: 5px solid black;">{{number_format(round(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9],0))}}</td>
            <td  style="text-align:right;border-bottom: 5px solid black;"></td>

            <td  style="text-align:right;border-bottom: 5px solid black;">{{number_format(round(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9],0))}}</td>

        </tr>
        <tr>
            <td><b>Gross Profit</b></td>
            <td style="text-align:right">{{number_format(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] -(@$cogdataa[0] + @$cogdataa[1] +@$cogdataa[2] + @$cogdataa[3]+ @$cogdataa[4] + @$cogdataa[5] + @$cogdataa[6] + @$cogdataa[7] +@$cogdataa[8] +@$cogdataa[9]))}}</td>
            <td style="text-align:right">@if(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11]){{number_format(((@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11] -(@$cogdataa[0] + @$cogdataa[1] +@$cogdataa[2] + @$cogdataa[3]+ @$cogdataa[4] + @$cogdataa[5] + @$cogdataa[6] + @$cogdataa[7] +@$cogdataa[8] +@$cogdataa[9]))/(@$alldataa[0] + @$alldataa[1] + @$alldataa[2] + @$alldataa[3]+ @$alldataa[4] +@$alldataa[5] + @$alldataa[6] +@$alldataa[7] + @$alldataa[8] + @$alldataa[9] + @$alldataa[10] + @$alldataa[11]))*100)}}%@else <b>-</b> @endif</td>
            <td style="text-align:right">{{number_format(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] -(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9]))}}</td>
            <td style="text-align:right">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11]){{number_format((@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] -(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9]))/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100)}}%@else <b>-</b> @endif</td>

            <td style="text-align:right">{{number_format(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] -(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9]))}}</td>

        </tr>
</table>