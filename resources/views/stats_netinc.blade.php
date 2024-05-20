@extends('user-layout.Main')
@section('main-content')
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 45%;"></a>
<h3 style="margin-top: -67px;margin-left:120px;">Net Income</h3>
<div class="netincome">
<?php
    foreach($data as $key=>$value){
        if($key == 'current'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'net'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='neti_val' value= $v>";
                        echo "<input type='hidden'  class='neti_key' value= $k>";
                    }
                }
            }
        }
        if($key == 'previous'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'net'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='ne_val' value= $v>";
                        echo "<input type='hidden'  class='ne_key' value= $k>";
                    }
                }
            }
        }
        if($key == 'lastPrevious'){
            foreach($value as $ikey=>$val) {
                if($ikey == 'net'){
                    foreach($val as $k=> $v){
                        echo "<input type='hidden'  class='lastn_val' value= $v>";
                        echo "<input type='hidden'  class='lastn_key' value= $k>";
                    }
                }
            }
        }
    }
?>
</div>
<div class="container mt-4 ">
    <form action="{{route('netopt')}}" method="post" id="net_option">
        @csrf
        <div class="col-12" style="display:block;" >
              
                <select class="form-control" style="width:250px" name="net_cat" id="net_cat">
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
                        <canvas id="chart-net-income" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

<script>
$(document).ready(function() {
        if ($('#net_cat').val() == '') {
            $('#net_cat').prop('disabled', false);
        }else{
            $('#net_cat').prop('disabled', true);
        }
});
</script>
@endsection