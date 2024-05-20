@extends('user-layout.Main')
@section('main-content')
<style>
    .fa {
        font-size: x-large;
    }
</style>
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 694px;"></a>
<h3 style="    margin-top: -67px;
    margin-bottom: 74px;
    margin-left:169px;"> Ratios -Year to date</h3>
<form action="{{url('user/ratio')}}" method="post">
    @csrf
    <!-- <div class="col-6" style="margin-left: 1147px; margin-top: -79px; margin-bottom: 48px;width: 23%;"> -->
    <!-- <label>Location</label> -->

    <!-- </div> -->
    <input type="hidden" id="abc" value="{{@$selctedlocation}}">

    <table class="table table-bordered " style="margin-left: 166px;width: 80%;">
        <thead>
            <th></th>
            <th>2401 - Jacksonville</th>
            <th></th>
            <th style="  width: 21%;"><select class="selectpicker" data-style="btn-primary" style="  cursor: pointer;  background-color: darkred;
    color: white;  width: 196px;
    display: block;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    border: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" id="loc" name="loc">
                    @foreach($location as $loc)
                    <option class="form-control" value="{{$loc->locationid}}" {{($loc->locationid == @$selctedloc) ?'selected':''}}>{{$loc->location}}</option>
                    @endforeach
                </select></th>
            <!-- <th>/*@if($cal['status'] == '1') {{$location[0]->location}}@else{{@$loca[0]['Location']}}@endif</th> -->
            <th></th>
            <th>Total Company</th>
        </thead>
        <tbody>
            <tr></tr>
            <tr>
                <td><b>4000-00 · Rental Income</b></td>
                <td class="text-end">@if(@$alldata[0]){{number_format(round(@$alldata[0],0))}}@else <b> - </b>@endif</td>
                <td></td>
                <td class="text-end">@if(@$revenuedata[0]){{number_format(round(@$revenuedata[0],0))}}@else <b> - </b>@endif</td>
                <td></td>
                <td class="text-end">@if(@$totalrevenuedata[0]){{number_format(round(@$totalrevenuedata[0],0))}}@else <b> - </b>@endif</td>

            </tr>
            <tr>
                <td><b>5000-00 · Depreciation - Inventory</b></td>
                <td style="border-bottom: 1px solid #000;" class="text-end">@if(@$cogdata[0]){{number_format(round(@$cogdata[0],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="border-bottom: 1px solid #000;" class="text-end">@if(@$cogsdata[0]){{number_format(round(@$cogsdata[0],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td style="border-bottom: 1px solid #000;" class="text-end">@if(@$totalcogsdata[0]){{number_format(round(@$totalcogsdata[0],0))}}@else <b> - </b> @endif</td>

            </tr>
            <tr>
                <td></td>
                <td class="text-end">{{number_format(round(@$alldata[0]-@$cogdata[0],0))}}</td>
                <td class="text-end">@if(@$alldata[0]){{number_format(((@$alldata[0]-@$cogdata[0])/@$alldata[0])*100)}}%@else <b> - </b>@endif</td>
                <td class="text-end">{{number_format(round(@$revenuedata[0]-@$cogsdata[0],0))}}</td>
                <td class="text-end">@if(@$revenuedata[0]){{number_format(((@$revenuedata[0]-@$cogsdata[0])/@$revenuedata[0])*100)}}@else
                    <b> -</b> @endif%
                </td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[0]-@$totalcogsdata[0],0))}}</td>
                <td class="text-end">@if(@$revenuedata[0]){{number_format(((@$totalrevenuedata[0]-@$totalcogsdata[0])/@$totalrevenuedata[0])*100)}}%@else
                    <b> -</b> @endif</td>
            </tr>
            <tr>
                <td><b>4100-00 · Cash Sales</b></td>
                <td class="text-end">@if(@$alldata[1]){{number_format(round(@$alldata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end">@if(@$revenuedata[1]){{number_format(round(@$revenuedata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end">@if(@$totalrevenuedata[1]){{number_format(round(@$totalrevenuedata[1],0))}}@else <b> - </b> @endif</td>

            </tr>
            <tr>
                <td><b>5102-00 · Cash Sale Charge Offs</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogdata[2]){{number_format(round(@$cogdata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogsdata[2]){{number_format(round(@$cogsdata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$totalcogsdata[2]){{number_format(round(@$totalcogsdata[2],0))}}@else <b> - </b> @endif</td>

            </tr>
            <tr>
                <td></td>
                <td class="text-end">{{number_format(round(@$alldata[1]-@$cogdata[2],0))}}</td>
                <td class="text-end">@if(@$alldata[1]){{number_format(((@$alldata[1]-@$cogdata[2])/@$alldata[1])*100)}}%@else <b> - </b> @endif</td>
                <td class="text-end">{{number_format(round(@$revenuedata[1]-@$cogsdata[2],0))}}</td>
                <td class="text-end">@if(@$revenuedata[1]){{number_format(((@$revenuedata[1]-@$cogsdata[2])/@$revenuedata[1])*100)}}@else <b>-</b>@endif%</td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[1]-@$totalcogsdata[2],0))}}</td>
                <td class="text-end">@if(@$totalrevenuedata[1]){{number_format(((@$totalrevenuedata[1]-@$totalcogsdata[2])/@$totalrevenuedata[1])*100)}}%@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td><b>4105-00 · Early Purchase Option</b></td>
                <td class="text-end">@if(@$alldata[2]){{number_format(round(@$alldata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end">@if(@$revenuedata[2]){{number_format(round(@$revenuedata[2],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end">@if(@$totalrevenuedata[2]){{number_format(round(@$totalrevenuedata[2],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td><b>5101-00 · Paid Out & EPO Charge Offs</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogdata[1]){{number_format(round(@$cogdata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogsdata[1]){{number_format(round(@$cogsdata[1],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$totalcogsdata[1]){{number_format(round(@$totalcogsdata[1],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr style="border-bottom: 1px solid #000;">
                <td></td>
                <td class="text-end">{{number_format(round(@$alldata[2]-@$cogdata[1],0))}}</td>
                <td class="text-end">@if(@$alldata[2]){{number_format(((@$alldata[2]-@$cogdata[1])/@$alldata[2])*100)}}%@else <b> - </b> @endif</td>
                <td class="text-end">{{number_format(round(@$revenuedata[2]-@$cogsdata[1],0))}}</td>
                <td class="text-end">@if(@$revenuedata[2]){{number_format(((@$revenuedata[2]-@$cogsdata[1])/@$revenuedata[2])*100)}}@else <b>-</b>@endif%</td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[2]-@$totalcogsdata[1],0))}}</td>
                <td class="text-end">@if(@$totalrevenuedata[2]){{number_format(((@$totalrevenuedata[2]-@$totalcogsdata[1])/@$totalrevenuedata[2])*100)}}%@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td><b>4200-00 · Roll Pro</b></td>
                <td class="text-end">@if(@$alldata[3]){{number_format(round(@$alldata[3],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[3]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$revenuedata[3]){{number_format(round(@$revenuedata[3],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[3]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$totalrevenuedata[3]){{number_format(round(@$totalrevenuedata[3],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[3]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>4240-00 · Roll Safe</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$alldata[10]){{number_format(round(@$alldata[10],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[10]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$revenuedata[10]){{number_format(round(@$revenuedata[10],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[10]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$totalrevenuedata[10]){{number_format(round(@$totalrevenuedata[10],0))}}@else <b> - </b> @endif</td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[10]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-end">{{number_format(round(@$alldata[3]+@$alldata[10],0))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$revenuedata[3]+@$revenuedata[10],0))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[3]+@$totalrevenuedata[10],0))}}</td>
            </tr>
            <tr>
                <td><b>5400-00 · Club Remittance</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogdata[9]){{number_format(round(@$cogdata[9],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogsdata[9]){{number_format(round(@$cogsdata[9],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$totalcogsdata[9]){{number_format(round(@$totalcogsdata[9],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td></td>
                <td class="text-end">{{number_format(round(@$alldata[3]+@$alldata[10]-@$cogdata[9],0))}}</td>
                <td class="text-end">@if(@$alldata[3]){{number_format(((@$alldata[3]+@$alldata[10]-@$cogdata[9])/(@$alldata[3]+@$alldata[10]))*100)}}%@else <b> - </b> @endif</td>
                <td class="text-end">{{number_format(round(@$revenuedata[3]+@$revenuedata[10]-@$cogsdata[9],0))}}</td>
                <td class="text-end">@if(@$revenuedata[3]+@$revenuedata[10]){{number_format(((@$revenuedata[3]+@$revenuedata[10]-@$cogsdata[9])/(@$revenuedata[3]+@$revenuedata[10]))*100)}}@else <b>-</b>@endif%</td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[3]+@$totalrevenuedata[10]-@$totalcogsdata[9],0))}}</td>
                <td class="text-end">@if(@$totalcogsdata[9]){{number_format(((@$totalrevenuedata[3]+@$totalrevenuedata[10]-@$totalcogsdata[9])/(@$totalrevenuedata[3]+@$totalrevenuedata[10]))*100)}}%@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td><b>4205-00 · Collection Fee - In-House</b></td>
                <td class="text-end">@if(@$alldata[4]){{number_format(round(@$alldata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end">@if(@$revenuedata[4]){{number_format(round(@$revenuedata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end">@if(@$totalrevenuedata[4]){{number_format(round(@$totalrevenuedata[4],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td><b>4210-00 · Reinstatement Fees</b></td>
                <td class="text-end">@if(@$alldata[5]){{number_format(round(@$alldata[5],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[5]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$revenuedata[5]){{number_format(round(@$revenuedata[5],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[5]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$totalrevenuedata[5]){{number_format(round(@$totalrevenuedata[5],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[5]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>4214-00 · Other Fees - Alignments</b></td>
                <td class="text-end">@if(@$alldata[6]){{number_format(round(@$alldata[6],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[6]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$revenuedata[6]){{number_format(round(@$revenuedata[6],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[6]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$totalrevenuedata[6]){{number_format(round(@$totalrevenuedata[6],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[6]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>4215-00 · One Time Fees</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$alldata[7]){{number_format(round(@$alldata[7],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$alldata[7]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$revenuedata[7]){{number_format(round(@$revenuedata[7],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$revenuedata[7]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,1)}}%
                    @endif
                </td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$totalrevenuedata[7]){{number_format(round(@$totalrevenuedata[7],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalrevenuedata[7]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,1)}}%
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-end">{{number_format(round(@$alldata[4] +@$alldata[5]+ @$alldata[6] +@$alldata[7],0))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$revenuedata[4] +@$revenuedata[5]+ @$revenuedata[6] +@$revenuedata[7],0))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[4] +@$totalrevenuedata[5]+ @$totalrevenuedata[6] +@$totalrevenuedata[7],0))}}</td>
            </tr>
            <tr>
                <td><b>4230-00 · Other Miscellaneous Income</b></td>
                <td class="text-end">@if(@$alldata[9]){{number_format(round(@$alldata[9],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$cogdata[4]){{number_format(((@$alldata[9])/(@$cogdata[4]))*100)}}%@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[9]){{number_format(round(@$revenuedata[9],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$cogsdata[4]){{number_format(((@$revenuedata[9])/(@$cogsdata[4]))*100)}}@else <b>-</b>@endif%</td>
                <td class="text-end">@if(@$totalrevenuedata[9]){{number_format(round(@$totalrevenuedata[9],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">>@if(@$totalcogsdata[4]){{number_format(((@$totalrevenuedata[9])/(@$totalcogsdata[4]))*100)}}%}@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td><b>5104-01 · Insurance Charge Offs</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogdata[4]){{number_format(round(@$cogdata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$cogsdata[4]){{number_format(round(@$cogsdata[4],0))}}@else <b> - </b> @endif</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$totalcogsdata[4]){{number_format(round(@$totalcogsdata[4],0))}}@else <b> - </b> @endif</td>
            </tr>
            <tr>
                <td></td>
                <td class="text-end">{{number_format(round(@$alldata[9]-@$cogdata[4],0))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$revenuedata[9]-@$cogsdata[4],0))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[9]-@$totalcogsdata[4],0))}}</td>
            </tr>
            <tr>
                <td><b>5104-02 · Returned Damaged/Non-Repairable</b></td>
                <td class="text-end">@if(@$cogdata[5]){{number_format(round(@$cogdata[5],0))}}@else <b> - </b> @endif</td>

                <td class="text-end">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$cogdata[5]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,2)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$cogsdata[5]){{number_format(round(@$cogsdata[5],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$cogsdata[5]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,2)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$totalcogsdata[5]){{number_format(round(@$totalcogsdata[5],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalcogsdata[5]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,2)}}%
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><b>5105-01 · Past Due Account Charge Off</b></td>
                <td class="text-end">@if(@$cogdata[7]){{number_format(round(@$cogdata[7],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] != '0')
                    {{round(@$cogdata[7]/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11])*100,2)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$cogsdata[7]){{number_format(round(@$cogsdata[7],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] != '0')
                    {{round(@$cogsdata[7]/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100,2)}}%
                    @endif
                </td>
                <td class="text-end">@if(@$totalcogsdata[7]){{number_format(round(@$totalcogsdata[7],0))}}@else <b> - </b> @endif</td>
                <td class="text-end">@if(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] != '0')
                    {{round(@$totalcogsdata[7]/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100,2)}}%
                    @endif
                </td>
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
                <td class="text-end">{{number_format(round(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11]))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11]))}}</td>
                <td></td>
                <td class="text-end">{{number_format(round(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11]))}}</td>
            </tr>
            <tr>
                <td><b>Total COGS</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">{{number_format(round(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9],0))}}</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">{{number_format(round(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9],0))}}</td>
                <td></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">{{number_format(round(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9],0))}}</td>
            </tr>
            <tr>
                <td><b>Gross Profit</b></td>
                <td class="text-end" style="border-bottom: 1px solid #000;">{{number_format(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))}}</td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11]){{number_format(((@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11] -(@$cogdata[0] + @$cogdata[1] +@$cogdata[2] + @$cogdata[3]+ @$cogdata[4] + @$cogdata[5] + @$cogdata[6] + @$cogdata[7] +@$cogdata[8] +@$cogdata[9]))/(@$alldata[0] + @$alldata[1] + @$alldata[2] + @$alldata[3]+ @$alldata[4] +@$alldata[5] + @$alldata[6] +@$alldata[7] + @$alldata[8] + @$alldata[9] + @$alldata[10] + @$alldata[11]))*100)}}%@else <b>-</b> @endif</td>
                <td class="text-end" style="border-bottom: 1px solid #000;">{{number_format(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] -(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9]))}}</td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11]){{number_format((@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11] -(@$cogsdata[0] + @$cogsdata[1] +@$cogsdata[2] + @$cogsdata[3]+ @$cogsdata[4] + @$cogsdata[5] + @$cogsdata[6] + @$cogsdata[7] +@$cogsdata[8] +@$cogsdata[9]))/(@$revenuedata[0] + @$revenuedata[1] + @$revenuedata[2] + @$revenuedata[3]+ @$revenuedata[4] +@$revenuedata[5] + @$revenuedata[6] +@$revenuedata[7] + @$revenuedata[8] + @$revenuedata[9] + @$revenuedata[10] + @$revenuedata[11])*100)}}%@else <b>-</b> @endif</td>
                <td class="text-end" style="border-bottom: 1px solid #000;">{{number_format(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] -(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9]))}}</td>
                <td class="text-end" style="border-bottom: 1px solid #000;">@if((@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9])/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11]))
                {{number_format((@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11] -(@$totalcogsdata[0] + @$totalcogsdata[1] +@$totalcogsdata[2] + @$totalcogsdata[3]+ @$totalcogsdata[4] + @$totalcogsdata[5] + @$totalcogsdata[6] + @$totalcogsdata[7] +@$totalcogsdata[8] +@$totalcogsdata[9]))/(@$totalrevenuedata[0] + @$totalrevenuedata[1] + @$totalrevenuedata[2] + @$totalrevenuedata[3]+ @$totalrevenuedata[4] +@$totalrevenuedata[5] + @$totalrevenuedata[6] +@$totalrevenuedata[7] + @$totalrevenuedata[8] + @$totalrevenuedata[9] + @$totalrevenuedata[10] + @$totalrevenuedata[11])*100)}}%
                @else 
                <b>-</b>
                 @endif
                </td>
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
    <input type="submit" value="submit" id="sbmit-btn" style="display:none">
</form>
@endsection