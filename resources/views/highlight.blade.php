@php
@$variable = "Maximum Income : ".$graphdata['maxinc']." Date : ".$graphdata['date']." Location ".$graphdata['loc'];
@endphp
@extends('user-layout.Main')
@section('main-content')
<input type="hidden" class="grphid" value="{{implode(',',$shwgraph)}}">
<div class="container text-center">
    <img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;">
    <h2 class="text-center">Location Analysis</h2>
</div>
<div class="container">
    <form method="POST" action="{{url('/ytdate')}}" style="  float: left;margin-top: -50px;">
        @csrf
        <input type="checkbox" id="ytd" style="height: 19px; width: 33px;"><b>YTD DATA</b>
        <input type="submit" value="submit" id="submitdate" style="display:none">
    </form>
</div>
<div class="container">
    <input type="hidden" id="abc" value="{{@$loc}}">
    <form method="POST" action="{{ url('/highlights') }}">
        @csrf
        <div class="row">
            <div class="col-6" style="display:none;">
                <label>Select Date</label>
                <hr style="width:40%">
                <div class="col-5">
                    <div class="input-group date datepicker">
                        @if(@$cal['status']== 1)
                        <input type="text" class="form-control" id="date" name="date" value="{{$prevdate}}" />
                        @endif
                        @if(@$cal['status']== 0)
                        <input type="text" class="form-control" id="date" name="date" value="{{@$date}}" />
                        @endif
                        <span class="input-group-append">
                            <span class="input-group-text  d-block" style="width: 45px;height: 38px;margin-right: 2px;">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-6" style="display:block;" id="loc">
                <div style="float:left">
                    <label>Location</label>
                    <hr style="width:100%">
                    <select class="form-control" style="width:217px " id="location" name="location">
                        <!-- <option class="form-control" disabled>Choose Location</option> -->
                        @if(!empty($location))
                        @foreach($location as $loca)
                        <option class="form-control" value="{{$loca->locationid}}" {{ ( $loca->locationid == @$loc) ?'selected':''}}>{{$loca->location}} </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <input type="submit" value="submit" id="submit" style="display:none">
    </form>
</div>
<div class="container" style="width:60%">
    <table class="table " style=" margin-left: 127px; width:72%">
        <tbody>
            <tr>
                <th></th>
                <th><b>{{@$year}}</b></th>
                <th><b>{{@$previousyear}}</b></th>
                <th><b>$ Change</b></th>
                <th><b>% Change</b></th>
            </tr>
            <tr>
                <td> <b>Revenue</b></td>
                @if(@$cal['status']== 0)
                <td class="revsum" id="revenue">
                    @if(@$sumrdata != '0')
                    @if(!empty($rev))
                    @foreach($rev as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="keys" value="{{$keys}}">
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    {{number_format($sumrdata)}}
                    @else
                    <b> - </b>
                    @if(!empty($rev))
                    @foreach($rev as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="keys" value="{{$keys}}">
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevrevsum">
                    @if(@$prevsumrdata1 != '0')
                    {{number_format($prevsumrdata1)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="rchange">
                    {{number_format($sumrdata - $prevsumrdata1 )}}
                </td>
                <td class="rperchange">
                    @if($sumrdata)
                    {{round(($sumrdata - $prevsumrdata1)/$sumrdata *100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="revsum">
                    @if(@$sumrdata1 == '0')
                    @if(!empty($rev))
                    @foreach($rev as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="keys" value="{{$keys}}">
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    <b> - </b>
                    @else
                    @if(!empty($rev))
                    @foreach($rev as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="keys" value="{{$keys}}">
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    {{number_format(@$sumrdata1)}}
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @if(@$prevsumrdata != '0')
                <td class="prevrevsum">
                    {{number_format($prevsumrdata)}}
                </td>
                @else
                <b> - </b>
                @endif
                <td class="rchange">
                    {{number_format($sumrdata1 - $prevsumrdata )}}
                </td>
                <td class="rperchange">
                    @if($sumrdata1)
                    {{round(($sumrdata1 - $prevsumrdata)/$sumrdata1 * 100 ,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @endif
            </tr>

            <tr>
                <td><b>COGS</b></td>

                @if(@$cal['status']== 0)
                <td class="cogsum" style="border-bottom: 1px solid #000;">
                    @if(@$sumcdata && @$sumcdata != '0')
                    @if(!empty($cog))
                    @foreach($cog as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    {{number_format($sumcdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevcogsum" style="border-bottom: 1px solid #000;">
                    @if(@$prevsumcdata1 != '0')
                    {{number_format($prevsumcdata1)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="cchange">
                    {{number_format($sumcdata - $prevsumcdata1 )}}
                </td>
                <td class="cperchange">
                    @if($sumcdata)
                    {{round(($sumcdata - $prevsumcdata1)/$sumcdata *100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="cogsum" style="border-bottom: 1px solid #000;">
                    @if(!empty($cog))
                    @foreach($cog as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    @if(@$sumcdata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumcdata1)}}
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevcogsum" style="border-bottom: 1px solid #000;">
                    @if(@$prevsumcdata != '0')
                    {{number_format($prevsumcdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="cchange">
                    {{number_format($sumcdata1 - $prevsumcdata )}}
                </td>
                <td class="cperchange">
                    @if($sumcdata1)
                    {{round(($sumcdata1 - $prevsumcdata)/$sumcdata1 *100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @endif
            </tr>

            <tr>
                <td><b>Gross Profit</b></td>
                @if(@$cal['status']== 0)
                <td class="grossprofit">
                    @if(@$gross && @$gross != '0')
                    @if(!empty($grossp))
                    @foreach($grossp as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    {{number_format($gross)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevgrossprofit">
                    @if(@$prevgross1 != '0')
                    {{number_format($prevgross1)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="grosschange">
                    {{number_format($gross - $prevgross1 )}}
                </td>
                <td class="grossperchange">
                    @if($gross)
                    {{round(($gross - $prevgross1)/$gross * 100,2) }}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="grossprofit">
                    @if(!empty($grossp))
                    @foreach($grossp as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    @if(@$gross1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$gross1)}}
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevgrossprofit">
                    @if(@$prevgross != '0')
                    {{number_format($prevgross)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="grosschange">
                    {{number_format($gross1 - $prevgross )}}
                </td>
                <td class="grossperchange">
                    @if($gross1)
                    {{round(($gross1 - $prevgross)/$gross1 *100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @endif
            </tr>
            <tr>
                <td><b>Expenses </b></td>
                @if(@$cal['status']== 0)
                <td class="expense" style="border-bottom: 1px solid #000;">
                    @if(@$sumedata && @$sumedata != '0')
                    {{number_format(@$sumedata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevexpense" style="border-bottom: 1px solid #000;">
                    @if(@$prevsumedata1 != '0')
                    {{number_format($prevsumedata1)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="expchange">
                    {{number_format($sumedata - $prevsumedata1 )}}
                </td>
                <td class="expperchange">
                    @if($sumedata)
                    {{round(($sumedata - $prevsumedata1)/$sumedata *100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="expense" style="border-bottom: 1px solid #000;">
                    @if(@$sumedata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumedata1)}}
                    @endif

                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevexpense" style="border-bottom: 1px solid #000;">
                    @if(@$prevsumedata != '0')
                    {{number_format($prevsumedata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="expchange">
                    {{number_format($sumedata1 - $prevsumedata )}}
                </td>
                <td class="expperchange">
                    @if($sumedata1)
                    {{round(($sumedata1 - $prevsumedata)/$sumedata1 * 100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @endif
            </tr>
            <tr>
                <td><b>Net Income</b></td>
                @if(@$cal['status']== 0)

                <td class="netincome" id="netincome" style="border-bottom: 1px solid #000;">
                    @if($netdata != '0')
                    @if(!empty($netinc))
                    @foreach($netinc as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="match" value="{{$match}}">
                    @if($keys == $date)
                    @if($match == '0')
                    <b> - </b>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                    @else
                    <b> - </b>
                    @endif
                    {{number_format($netdata)}}
                    @else
                    <b> - </b>
                    @if(!empty($netinc))
                    @foreach($netinc as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevnetincome" style="border-bottom: 1px solid #000;">
                    @if(@$prevnetdata1 != '0')
                    {{number_format($prevnetdata1)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="netchange">
                    {{number_format($netdata - $prevnetdata1 )}}
                </td>
                <td class="netperchange">
                    @if($netdata)
                    {{round(($netdata - $prevnetdata1 )/$netdata * 100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="netincome" style="border-bottom: 1px solid #000;">
                    @if(!empty($netinc))
                    @foreach($netinc as $key=>$value)
                    @foreach($value as $keys=>$match)
                    <input type="hidden" class="match" value="{{$match}}">
                    @endforeach
                    @endforeach
                    @endif
                    @if(@$netdata != '0')
                    {{number_format(@$netdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>

                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                <td class="prevnetincome" style="border-bottom: 1px solid #000;">
                    @if(@$prevnetdata != '0')
                    {{number_format($prevnetdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <td class="netchange">
                    {{number_format($netdata - $prevnetdata )}}
                </td>
                <td class="netperchange">
                    @if($netdata)
                    {{round(($netdata - $prevnetdata)/$netdata *100,2)}}%
                    @else
                    <b> - </b>
                    @endif
                </td>
                @endif
            </tr>
            <tr>
                <td></td>
                <td style="border-bottom: 1px solid #000;"></td>
                <td style="border-bottom: 1px solid #000;"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="pastdueacc" style="border-bottom: 1px solid #000;">
    @if(!empty($pstdue))
    @foreach($pstdue as $key=>$value)
    @foreach($value as $keys=>$match)
    <input type="hidden" class="match" value="{{$match}}">
    @endforeach
    @endforeach
    @endif
</div>

</body>
@endsection