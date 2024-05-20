@extends('user-layout.Main')
@section('main-content')
<div class="inc">
@foreach($result as $key=>$value) 
    <input type="hidden"  class="inc_val" value="{{$value}}" >
    <input type="hidden"  class="inc_key" value="{{$key}}" >
@endforeach
@foreach($rev as $key=>$value) 
    <input type="hidden"  class="r_val" value="{{$value}}" >
    <input type="hidden"  class="r_key" value="{{$key}}" >
@endforeach
@foreach($lastrev as $key=>$value) 
    <input type="hidden"  class="lastr_val" value="{{$value}}" >
    <input type="hidden"  class="lastr_key" value="{{$key}}" >
@endforeach
@foreach($cogs as $key=>$value) 
    <input type="hidden"  class="cog_val" value="{{$value}}" >
    <input type="hidden"  class="cog_key" value="{{$key}}" >
@endforeach
@foreach($lastcogs as $key=>$value) 
    <input type="hidden"  class="lastcog_val" value="{{$value}}" >
    <input type="hidden"  class="lastcog_key" value="{{$key}}" >
@endforeach
@foreach($cog as $key=>$value) 
    <input type="hidden"  class="c_val" value="{{$value}}" >
    <input type="hidden"  class="c_key" value="{{$key}}" >
@endforeach
@foreach($grossp as $key=>$value) 
    <input type="hidden"  class="gros_val" value="{{$value}}" >
    <input type="hidden"  class="gros_key" value="{{$key}}" >
@endforeach
@foreach($gros as $key=>$value) 
    <input type="hidden"  class="gro_val" value="{{$value}}" >
    <input type="hidden"  class="gro_key" value="{{$key}}" >
@endforeach
@foreach($lastgros as $key=>$value) 
    <input type="hidden"  class="lastgro_val" value="{{$value}}" >
    <input type="hidden"  class="lastgro_key" value="{{$key}}" >
@endforeach
@foreach($expense as $key=>$value) 
    <input type="hidden"  class="exp_val" value="{{$value}}" >
    <input type="hidden"  class="exp_key" value="{{$key}}" >
@endforeach
@foreach($expe as $key=>$value) 
    <input type="hidden"  class="ex_val" value="{{$value}}" >
    <input type="hidden"  class="ex_key" value="{{$key}}" >
@endforeach
@foreach($lastexpe as $key=>$value) 
    <input type="hidden"  class="lastex_val" value="{{$value}}" >
    <input type="hidden"  class="lastex_key" value="{{$key}}" >
@endforeach
@foreach($net as $key=>$value) 
    <input type="hidden"  class="net_val" value="{{$value}}" >
    <input type="hidden"  class="net_key" value="{{$key}}" >
@endforeach
@foreach($netincome as $key=>$value) 
    <input type="hidden"  class="n_val" value="{{$value}}" >
    <input type="hidden"  class="n_key" value="{{$key}}" >
@endforeach
@foreach($lastnetincome as $key=>$value) 
    <input type="hidden"  class="lstn_val" value="{{$value}}" >
    <input type="hidden"  class="lstn_key" value="{{$key}}" >
@endforeach
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <h3>Total Income</h3>
                    <div class="shadow-primary border-radius-lg py-3 pe-1" style=" height: 360px">
                        <div class="chart">
                            <canvas id="chart-income" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <h3>COGS</h3>
                    <div class="shadow-primary border-radius-lg py-3 pe-1" style=" height: 360px">
                        <div class="chart">
                            <canvas id="chart-cogsdata" class="chart-canvas" height="170" style=" height: 312px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <h3>Gross Profit</h3>
                    <div class = "shadow-primary border-radius-lg py-3 pe-1" style = " height: 360px">
                        <div class="chart">
                            <canvas id="chart-grprofit" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <h3>Expense</h3>
                    <div class = "shadow-primary border-radius-lg py-3 pe-1" style = " height: 360px">
                        <div class="chart">
                            <canvas id="chart-exp" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <h3>Net Income</h3>
                    <div class = "shadow-primary border-radius-lg py-3 pe-1" style = " height: 360px">
                        <div class="chart">
                            <canvas id="chart-netincome" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection