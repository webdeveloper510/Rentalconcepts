@extends('user-layout.Main')
@section('main-content')
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 694px;"></a>
<h3 style="  margin-top: -67px;
    margin-bottom: 74px;
    margin-left:120px;">Expectation</h3>
<form action="{{url('user/view-expectations')}}" method="post">
    @csrf
    <div class="col-12" style="display:block;" id="selectloc">
        <div style=" float: right;margin-right: 56px;margin-top: -125px;">
            <label>Location</label>
            <hr style="width:100%">
            <select class="form-control" style="width:217px " id="location" name="location">
                <!-- <option class="form-control" disabled>Choose Location</option> -->
                @if(!empty($location))
                @foreach($location as $loca)
                <option class="form-control" value="{{$loca->locationid}}" {{ ($loca->locationid == @$loc) ?'selected':''}}>{{$loca->location}} </option>                @endforeach
                @endif
            </select>
        </div>
    </div>
    <input type="submit" value="submit" id="sbmit-btn" style="display:none">
</form>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{@$calculated_data[0]->location}}</th>
                <th scope="col">Expected</th>
                <th scope="col">Calculated</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Average Deliveries</th>
                @if(!@$calculated_data)
                <td>-</td>
                <td>-</td>
                @else
                <td>{{@$calculated_data[0]->exp_del}}</td>
                <td>{{@$calculated_data[0]->delivery}}</td>
                @endif
               
            </tr>
            <tr>
                <th>Customers</th>
                @if(!$calculated_data)
                <td>-</td>
                <td>-</td>
                @else
                <td>{{@$calculated_data[0]->exp_cust}}</td>
                <td>{{@$calculated_data[0]->Customers}}</td>
                @endif
            </tr>
            <tr>
                <th>% Collected</th>
                @if(!@$calculated_data)
                <td>-</td>
                <td>-</td>
                @else
                <td>{{@$calculated_data[0]->exp_coll}}</td>
                @if(@$calculated_data[0]->ideal == '' || @$calculated_data[0]->ideal == 0)
                <td>-</td>
                @else
                <td>{{round(@$calculated_data[0]->RentalIncome/@$calculated_data[0]->ideal *100,0)}} %</td>
                @endif
                @endif
            </tr>
            <tr>
                <th>Past Due %</th>
                @if(!@$calculated_data)
                <td>-</td>
                <td>-</td>
                @else
                <td>{{@$calculated_data[0]->exp_pastdue}}</td>
                @if(@$calculated_data[0]->inc == '' || @$calculated_data[0]->inc == 0)
                <td>-</td>
                @else
                <td>{{round((@$calculated_data[0]->pastdueaccountchargeoff/@$calculated_data[0]->inc) *100,0)}} %</td>
                @endif
                @endif

            </tr>
            <tr>
                <th>Net Income</th>
                @if(!@$calculated_data)
                <td>-</td>
                <td>-</td>
                @else
                <td>{{@$calculated_data[0]->exp_netin}}</td>
                @if(@$calculated_data[0]->netinc < 0 )
                <td>({{abs(round(@$calculated_data[0]->netinc,2))}})</td>
                 @else
                <td>{{number_format(round(@$calculated_data[0]->netinc,2))}}</td>
                @endif
                @endif
            </tr>
        </tbody>
    </table>
</div>
@endsection