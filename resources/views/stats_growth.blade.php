@extends('user-layout.Main')
@section('main-content')
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 45%;"></a>
<h3 style="margin-top: -67px;margin-left:120px;">Deliveries</h3>
<!-- <h3 style="margin-bottom: 74px;margin-left:120px;">Deliveries</h3> -->
  <div class="container mt-5">
      <div class="tab-content" id="myTabContent">
        <table class="table-bordered text-center display nowrap" style="width:100%" id = "deliverytbl">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Deliveries</th>
                    <th>Expectations</th>
                    <th>Expectation Difference</th>
                </tr>
            </thead>
            <tbody>
          <?php 
            foreach ($delivery as $key => $value) {
              echo "<tr>";
              $locationName = App\Models\Location::where('locationid',$value->location)->pluck('location')->first();
              echo "<td class='text-left' style='padding-left: 9px;'>$locationName</td>";
              echo "<td>$value->delivery</td>"; 
              echo "<td>$value->deliveries</td>"; 
              $expcted = $value->delivery - $value->deliveries;
              echo "<td>$expcted</td>"; 
              echo "</tr>";
            }
            ?>  
            </tbody>
        </table>
      </div>
  </div>
@endsection