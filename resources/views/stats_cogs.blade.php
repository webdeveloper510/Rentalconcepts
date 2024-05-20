@extends('user-layout.Main')
@section('main-content')
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 45%;"></a>
<h3 style="margin-top: -67px;margin-left:120px;">COGS</h3>
<div class="cogs">
<?php
    foreach($data as $key=>$value){
        if($key == 'current'){
            foreach($value as $ikey=>$val) {               
                if($ikey == 'cog'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='cog_val' value= $v>";
                        echo "<input type='hidden'  class='cog_key' value= $k>";
                    }
                }
            }
        }
        if($key == 'previous'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'cog'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='c_val' value= $v>";
                        echo "<input type='hidden'  class='c_key' value= $k>";
                    }
                }
            }
        }
        if($key == 'lastPrevious'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'cog'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='lastc_val' value= $v>";
                        echo "<input type='hidden'  class='lastc_key' value= $k>";
                    }
                }
            }
        }
    }
?>
</div>
<div class="container mt-4 ">
    <form action="{{route('statcog')}}" method="post" id="cogs_option">
        @csrf
        <div class="col-12" style="display:block;" >
                <!-- <select class="form-control" style="width:250px " name="cogs_cat" id="cogs_cat">  
                    <option class="form-control" selected disabled>Select Option</option>
                    <option class="form-control" value ="b&b"  {{ ( 'b&b'== @$categ) ?'selected':''}}>B&B - 3300</option>
                    <option class="form-control" value ="RentalConcepts" {{ ( 'RentalConcepts'== @$categ) ?'selected':''}}>Rental Concepts - 2400</option>
                    <option class="form-control" value ="rcky" {{ ( 'rcky'== @$categ) ?'selected':''}}>RCKY - 2200</option>
                    <option class="form-control" value ="ozk" {{ ( 'ozk'== @$categ) ?'selected':''}}>OZK - 4500</option>  
                </select> -->
                <select class="form-control" style="width:250px" name="cogs_cat" id="cogs_cat">
                <option class="form-control"  selected value="">Select Option</option>
                @foreach($title as $key=>$value)
                <option class="form-control" value="{{$key}}" {{ isset($company) && ($value == $company->company) ? 'selected' : '' }} {{isset($categ) && ($key == $categ) ? 'selected' : '' }}>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="submit" style="display:none"> 
    </form>
</div>
<div class="container showmessage mt-5 mb-5">
    @if(isset($message))
        <div class="alert alert-success ermsgtxt mt-5 mb-5">
        {{$message}}
        </div>
    @endif
</div>
<div class="container mt-5 stats" >
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="shadow-primary border-radius-lg py-3 pe-1" style=" height: 360px">
                    <div class="chart">
                        <canvas id="chart-cog" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

<script>
$(document).ready(function() {
        if ($('#cogs_cat').val() == '') {
            $('#cogs_cat').prop('disabled', false);
        }else{
            $('#cogs_cat').prop('disabled', true);
        }
});
</script>
@endsection