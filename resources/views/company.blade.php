@extends('user-layout.Main')
@section('main-content')
<style>
    .alert-success {
        color: white;
        background-color: #59c140;
        border-color: #badbcc;
        width: 50%;
        text-align: center;
        height: 65px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 143px;
        width: 69%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style> 
<div class="inc">
    <?php
    foreach($data as $key=>$value){
        if($key == 'current'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'result'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='inc_val' value= $v>";
                        echo "<input type='hidden'  class='inc_key' value= $k>";
                    }
                }
                if($ikey == 'cog'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='c_val' value= $v>";
                        echo "<input type='hidden'  class='c_key' value= $k>";
                    }
                }
                if($ikey == 'expense'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='exp_val' value= $v>";
                        echo "<input type='hidden'  class='exp_key' value= $k>";
                    }
                }
                if($ikey == 'net'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='net_val' value= $v>";
                        echo "<input type='hidden'  class='net_key' value= $k>";
                    }
                }
                if($ikey == 'grossp'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='gros_val' value= $v>";
                        echo "<input type='hidden'  class='gros_key' value= $k>";
                    }
                }
            }
        }
        if($key == 'previous'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'result'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='r_val' value= $v>";
                        echo "<input type='hidden'  class='r_key' value= $k>";
                    }
                }
                if($ikey == 'cog'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden' class='cog_val' value= $v>";
                        echo "<input type='hidden' class='cog_key' value= $k>";
                    }
                }
                if($ikey == 'expense'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='ex_val' value= $v>";
                        echo "<input type='hidden'  class='ex_key' value= $k>";
                    }
                }
                if($ikey == 'net'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='n_val' value= $v>";
                        echo "<input type='hidden'  class='n_key' value= $k>";
                    }
                }
                if($ikey == 'grossp'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='gro_val' value= $v>";
                        echo "<input type='hidden'  class='gro_key' value= $k>";
                    }
                }
            }
        }
        if($key == 'lastPrevious'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'result'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='lastr_val' value= $v>";
                        echo "<input type='hidden'  class='lastr_key' value= $k>";
                    }
                }
                if($ikey == 'cog'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden' class='lastcog_val' value= $v>";
                        echo "<input type='hidden' class='lastcog_key' value= $k>";
                    }
                }
                if($ikey == 'expense'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='lastex_val' value= $v>";
                        echo "<input type='hidden'  class='lastex_key' value= $k>";
                    }
                }
                if($ikey == 'net'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='lstn_val' value= $v>";
                        echo "<input type='hidden'  class='lstn_key' value= $k>";
                    }
                }
                if($ikey == 'grossp'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='lastgro_val' value= $v>";
                        echo "<input type='hidden'  class='lastgro_key' value= $k>";
                    }
                }
            }
        }
    }
    ?>
</div>

<div class="container mt-4 ">
    <form action="{{route('getoption')}}" method="post" id="submitopt">
        @csrf
        <div class="col-12" style="display:block;" >
                <select class="form-control" style="width:250px " id="data_cat" name="data_cat">  
                    <option class="form-control" selected disabled>Select Option</option>
                    <option class="form-control" value ="b&b"  {{ ( 'b&b'== @$categ) ?'selected':''}}>B&B - 3300</option>
                    <option class="form-control" value ="RentalConcepts" {{ ( 'RentalConcepts'== @$categ) ?'selected':''}}>Rental Concepts - 2400</option>
                    <option class="form-control" value ="rcky" {{ ( 'rcky'== @$categ) ?'selected':''}}>RCKY - 2200</option>
                    <option class="form-control" value ="ozk" {{ ( 'ozk'== @$categ) ?'selected':''}}>OZK - 4500</option>  
                </select>
        </div>
        <input type="submit" value="submit" style="display:none">
    </form>
</div>

<div class="container showmessage">
    @if(isset($message))
        <div class="alert alert-success msgtxt">
        {{$message}}
        </div>
    @endif
</div>
<div class="container mt-5 companydata">
    <div class="row mt-5">
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <h3>Total Income</h3>
                    <div class="shadow-primary border-radius-lg py-3 pe-1" style=" height: 360px">
                        <div class="chart">
                            <canvas id="chart-income" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
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
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <h3>Gross Profit</h3>
                    <div class = "shadow-primary border-radius-lg py-3 pe-1" style = " height: 360px">
                        <div class="chart">
                            <canvas id="chart-grprofit" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
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
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
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