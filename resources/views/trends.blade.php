@extends('user-layout.Main')
@section('main-content')
<style>
    .number-view {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Hide the default checkboxes */
    .toggle-checkbox {
        display: none;
    }

    /* Style the toggle switches */
    .toggle {
        display: inline-block;
        width: 40px;
        height: 20px;
        background-color: #ccc;
        border-radius: 20px;
        position: relative;
        cursor: pointer;
        margin-bottom: -4px;
    }

    /* Change background color of toggle switch when it's clicked */
    .toggle-checkbox:checked+.toggle {
        background-color: #be3b3b;
    }

    /* Style the toggle switches when they're on */
    .toggle:before {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: #fff;
        top: 1px;
        left: 1px;
        transition: 0.3s;
    }

    /* Move the toggle switches to the right when the checkboxes are checked */
    .toggle-checkbox:checked+.toggle:before {
        transform: translateX(20px);
    }
</style>

<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 694px;"></a>
<h3 style="  margin-top: -67px;
    margin-bottom: 74px;
    margin-left:120px;"> Trends</h3>
<form action="{{url('user/trends')}}" method="post">
    @csrf
    <div class="col-12" style="display:block;" id="selectloc">
        <div style=" float: right;margin-right: 56px;margin-top: -125px;">
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
    <input type="submit" value="submit" id="sbmit-btn" style="display:none">
</form>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
            <div class="card-header p-0 position-relative mt-3 mx-3 z-index-2 bg-transparent">
                <!-- <div class="number-view"><h3><b>Past Due Account</b></h3><span><input type="checkbox" id="pastdueAccount"/>Show All</span></div> -->
                <div class="number-view">
                    <h3><b>Past Due Account</b></h3><span><input type="checkbox" id="pastdueAccount" class="toggle-checkbox" />Show All <label for="pastdueAccount" class="toggle"></label></span>
                </div>

                <div class=" shadow-primary border-radius-lg py-3 pe-1" style="    background-image: linear-gradient(195deg, #980d1a 0%, #834545 100%); height: 360px">
                    <div class="chart">
                        <canvas id="chart" class="chart-canvas" height="170" style=" height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4 mb-4 " style="  margin-top: 4.0rem!important;">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent cust">
                <!-- <div class="number-view"><h3><b>Past Due Percentage</b></h3><span><input type="checkbox" id="pastduePercentage"/>Show All</span></div> -->
                <div class="number-view">
                    <h3><b>Past Due Percentage</b></h3><span><input type="checkbox" id="pastduePercentage" class="toggle-checkbox" />Show All<label for="pastduePercentage" class="toggle"></label></span>
                </div>

                <div class="bg-gradient-success  border-radius-lg py-3 pe-1" style="height: 360px;">
                    <div class="charts">
                        <canvas id="chart-per" class="chart-canvas" height="170" style=" height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
            <div class="card-header p-0 position-relative mt-3 mx-3 z-index-2 bg-transparent">
                <!-- <div class="number-view"><h3><b>Hourly-Percentage</b></h3><span><input type="checkbox" id="hourlyPercentage"/>Show All</span></div> -->
                <div class="number-view">
                    <h3><b>Hourly-Percentage</b></h3><span><input type="checkbox" id="hourlyPercentage" class="toggle-checkbox" />Show All<label for="hourlyPercentage" class="toggle"></label></span>
                </div>

                <div class=" shadow-primary border-radius-lg py-3 pe-1" style="    background-image: linear-gradient(195deg, #980d1a 0%, #834545 100%); height: 360px">
                    <div class="chart">
                        <canvas id="chart-hourly" class="chart-canvas" height="170" style=" height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4 mb-4 " style="  margin-top: 4.0rem!important;">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent cust">
                <!-- <div class="number-view"><h3><b>Overtime-Percentage</b></h3><span><input type="checkbox" id="overtimePercentage"/>Show All</span></div> -->
                <div class="number-view">
                    <h3><b>Overtime-Percentage</b></h3><span><input type="checkbox" id="overtimePercentage" class="toggle-checkbox" />Show All<label for="overtimePercentage" class="toggle"></label></span>
                </div>

                <div class="bg-gradient-success  border-radius-lg py-3 pe-1" style="height: 360px;">
                    <div class="charts">
                        <canvas id="chart-overtime" class="chart-canvas" height="170" style=" height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="csum" style="border-bottom: 1px solid #000;">

    @if(!empty($cog))
    @foreach($cog as $key=>$value)
    @foreach($value as $keys=>$match)
    <input type="hidden" class="keys" value="{{$keys}}">
    <input type="hidden" class="match" value="{{$match}}">
    @endforeach
    @endforeach

    @endif

</div>

<div class="pastdueper">

    @if(!empty(@$y))

    @foreach($y as $key=>$value)
    <input type="hidden" class="per" value="{{round($value,1)}}">
    @endforeach

    @endif

</div>
<div class="hourly">

    @if(!empty(@$h))

    @foreach($h as $key=>$value)
    <input type="hidden" class="hour" value="{{round($value,1)}}">
    @endforeach

    @endif

</div>
<div class="ovrtime">

    @if(!empty(@$o))

    @foreach($o as $key=>$value)
    <input type="hidden" class="overtime" value="{{round($value,1)}}">
    @endforeach
    @endif

</div>
@endsection