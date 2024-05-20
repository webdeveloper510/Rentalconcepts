@extends('user-layout.Main')
@section('main-content')
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 45%;"></a>
<h3 style="margin-top: -67px;margin-bottom: 74px;margin-left:120px;">Total Income</h3>
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
            }
        }
    }
?>
</div>
<div class="container mt-4 ">
    <form action="{{route('statsopt')}}" method="post" id="stats_option">
        @csrf
        <div class="col-12" style="display:block;" >
              
                <select class="form-control" style="width:250px" name="stats_cat" id="stats_cat">
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
                        <canvas id="chart-income" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered display nowrap" id="incometable" cellspacing="0" style="width:100%">
                <thead style="border-top: 2px solid;">
                    <th>Location</th>
                    <th>Last Month Income</th>
                    <th>Highest Income</th>
                    <th>YTD Income</th>
                </thead>
                <tbody>
                    @foreach($location as $val)
                    <tr>
                        <td style="border-right: 2px solid ;" class="no-sort">{{@$val->location}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">{{number_format(round(@$val->inc,0))}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">
                        @if(@$highest_incomes)
                            @foreach($highest_incomes as $location_id => $highest_income)
                                @if($location_id == $val->locationid)
                                    {{ number_format(round($highest_income, 0)) }}
                                @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="text-end no-sort">{{number_format(round(@$val->ytdinc,0))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

<script>
$(document).ready(function() {
        if ($('#stats_cat').val() == '') {
            $('#stats_cat').prop('disabled', false);
        }else{
            $('#stats_cat').prop('disabled', true);
        }
});
</script>
@endsection