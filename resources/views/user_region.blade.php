@extends('user-layout.Main')
@section('main-content')
<div class="container text-center" style=" margin-left: 25px;">
    <a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;margin-left: -31px;"></a>
    <h3 style="float: left;margin-top: 46px;margin-left: 24px;">Area-Data</h3>
    <div class='row mt-5'>
        <div class="col-md-6">
            <table class="table table-bordered mt-5">
                <h2 class="text-center mt-3"><b>North</b></h2>
                <tr>
                    <td><b> Customer</b></td>
                    <td>@if($sum == 0) -
                        @else{{number_format($sum)}}
                        @endif</td>
                </tr>
                <tr>
                    <td><b> Deliveries</b></td>
                    <td>@if($dsum == 0)
                        -
                        @else{{number_format($dsum)}}
                        @endif</td>
                </tr>
                <tr>
                    <td><b> Income</b></td>
                    <td>@if($revsum == 0)
                        -
                        @else{{number_format($revsum)}}
                        @endif</td>
                </tr>
                <tr>
                    <td><b> Past Due Account Charge Off</b></td>
                    <td>@if($revsum == 0)
                        -
                        @else{{number_format(($pastd/$revsum)*100)}}%
                        @endif</td>
                </tr>
                <tr>
                    <td><b> Net Income</b></td>
                    <td>@if($netin == 0)
                        -
                        @else{{number_format($netin)}}
                        @endif</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered mt-5">
                <h2 class="text-center mt-3"><b>South</b></h2>
                <tr>
                    <td><b> Customer</b></td>
                    <td>@if($othersum == 0)
                        -
                        @else
                        {{number_format($othersum)}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b> Deliveries</b></td>
                    <td>@if($delsum == 0)
                        -
                        @else
                        {{number_format($delsum)}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b> Income</b></td>
                    <td>@if($resum == 0)
                        -
                        @else{{number_format($resum)}}
                        @endif</td>
                </tr>
                <tr>
                    <td><b> Past Due Account Charge Off</b></td>
                    <td>@if($resum == 0)
                        -
                        @else
                        {{number_format(($pastacc/$resum)*100)}}%
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b> Net Income</b></td>
                    <td>@if($net == 0)
                        -
                        @else{{number_format($net)}}
                        @endif</td>
                </tr>
            </table>
        </div>
    </div>


</div>
@endsection