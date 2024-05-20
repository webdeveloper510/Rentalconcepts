@extends('user-layout.Main')
@section('main-content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container text-center">
    <img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;">
    <h2 class="text-center">Bonus Calculator</h2>
</div>

<div class="container">
    <form method="POST" id="form1" action="{{url('/ytdate')}}" style="  float: left;margin-top: -50px;">
        @csrf
        <input type="checkbox" id="ytdbonus" style="height: 19px; width: 33px; display:none;">
        <input type="submit" value="submit" id="submitdate" style="display:none">
    </form>

    <input type="hidden" id="abc" value="{{@$loc}}">
    <form id="bonusUser" method="POST" action="{{ url('user/bonus') }}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div style="float:left;">
                    <label>
                        <h6>Manager : <?= strtoupper(@$name) ?></h6>
                    </label></br>
                </div>
            </div>

            <div class="col-12" style="display:block; margin-top: -56px;" id="loc">
                <div style="float:right;    margin-top: 4px;">
                    <label>Location</label>
                    <hr style="width:100%">
                    @if(@$cal['status']== 1)
                    <input type="text" class="form-control" id="date" name="date" value="{{$prevdate}}" style="display:none;" />
                    @endif
                    @if(@$cal['status']== 0)
                    <input type="text" class="form-control" id="date" name="date" value="{{@$date}}" style="display:none;" />
                    @endif
                    <select class="form-control" style="width:217px " id="location" name="location">
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
                <th><b>{{ date_create_from_format('m-Y', @$prevdate)->format('M-Y') }}</b></th>
                <th><b>YTD</b></th>
            </tr>
            <tr>
                <td> <b>Revenue</b></td>
                @if(@$cal['status'] == 0)
                <td class="revsum" id="revenue">
                    @if(@$sumrdata != '0')
                    {{number_format($sumrdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @else
                <td class="revsum">
                    @if(@$sumrdata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumrdata1)}}
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @endif
                <td class="ytdrevsum"></td>
            </tr>

            <tr>
                <td><b>COGS</b></td>

                @if(@$cal['status']== 0)
                <td class="cogsum">
                    @if(@$sumcdata && @$sumcdata != '0')
                    {{number_format($sumcdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @else
                <td class="cogsum">
                    @if(@$sumcdata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumcdata1)}}
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @endif
                <td class="ytdcogsum"></td>
            </tr>
            <tr>
                <td><b>Gross Profit</b></td>
                @if(@$cal['status']== 0)
                <td class="grossprofit">
                    @if(@$gross && @$gross != '0')

                    {{number_format($gross)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @else
                <td class="grossprofit">
                    @if(@$gross1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$gross1)}}
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @endif
                <td class="ytdgrossprofit"></td>
            </tr>
            <tr>
                <td><b>Expenses </b></td>
                @if(@$cal['status']== 0)
                <td class="expense">
                    @if(@$sumedata && @$sumedata != '0')
                    {{number_format(@$sumedata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @else
                <td class="expense">
                    @if(@$sumedata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumedata1)}}
                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @endif
                <td class="ytdexpense"></td>
            </tr>
            <tr>
                <td><b>Net Income</b></td>
                @if(@$cal['status']== 0)

                <td class="netincome" id="netincome">
                    @if($netdata != '0')

                    {{number_format($netdata)}}
                    @else
                    <b> - </b>

                    @endif
                </td>
                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @else
                <td class="netincome">
                    @if(@$netdata != '0')
                    {{number_format(@$netdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>

                <!----------------------------------- PREVIOUS YEAR DATA -------------------------------------------->
                @endif
                <td class="ytdnetincome"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr></br></tr>
            <!-- <tr>
                <td><b>Customer Actual</b></td>
                <td>
                    @if(@$customer_count)
                    {{ @$customer_count }}
                    @else
                    <b> - </b>
                    @endif
                </td>
            </tr> 
           <tr>
                <td><b>Add Customer</b></td>
                <td>
                    <input type="number" min="0" name="added_customer" id="added_customer" style="width:20%;" />
                     <button id="add_cus_btn"  style="margin-bottom: 2px;">OK</button>
                </td>
            </tr> 
             <tr>
                <td><b>Customer Possible</b></td>
                <td id="customer_count">
                    {{ @$customer_count  }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> -->
        </tbody>
    </table>
</div>
<!-- <div class="container" style="width:60%">
    <table class="table " style=" margin-left: 127px; width:72%">
        <tbody>
            <tr>
                <th></th>
                <th><b>{{ date_create_from_format('m-Y', @$prevdate)->format('M-Y') }}</b></th>
                <th><b>YTD</b></th>
            </tr>
            <tr>
                <td> <b>Revenue</b></td>
                @if(@$cal['status'] == 0)
                <td class="revsum" id="revenue">
                    @if(@$sumrdata != '0')
                    {{number_format($sumrdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="revsum">
                    @if(@$sumrdata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumrdata1)}}
                    @endif
                </td>
                @endif
                <td class="ytdrevsum"></td>
            </tr>

            <tr>
                <td><b>COGS</b></td>

                @if(@$cal['status']== 0)
                <td class="cogsum">
                    @if(@$sumcdata && @$sumcdata != '0')
                    {{number_format($sumcdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="cogsum">
                    @if(@$sumcdata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumcdata1)}}
                    @endif
                </td>
                @endif
                <td class="ytdcogsum"></td>
            </tr>
            <tr>
                <td><b>Gross Profit</b></td>
                @if(@$cal['status']== 0)
                <td class="grossprofit">
                    @if(@$gross && @$gross != '0')

                    {{number_format($gross)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="grossprofit">
                    @if(@$gross1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$gross1)}}
                    @endif
                </td>
                @endif
                <td class="ytdgrossprofit"></td>
            </tr>
            <tr>
                <td><b>Expenses </b></td>
                @if(@$cal['status']== 0)
                <td class="expense">
                    @if(@$sumedata && @$sumedata != '0')
                    {{number_format(@$sumedata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>
                @else
                <td class="expense">
                    @if(@$sumedata1 == '0')
                    <b> - </b>
                    @else
                    {{number_format(@$sumedata1)}}
                    @endif
                </td>
                @endif
                <td class="ytdexpense"></td>
            </tr>
            <tr>
                <td><b>Net Income</b></td>
                @if(@$cal['status']== 0)

                <td class="netincome" id="netincome">
                    @if($netdata != '0')

                    {{number_format($netdata)}}
                    @else
                    <b> - </b>

                    @endif
                </td>
                @else
                <td class="netincome">
                    @if(@$netdata != '0')
                    {{number_format(@$netdata)}}
                    @else
                    <b> - </b>
                    @endif
                </td>

                @endif
                <td class="ytdnetincome"></td>
            </tr>
            <tr>
                <td><b>Potential Bonus</b></td>
                <td><b> - </b></td>
                <td><b> - </b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div> -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            document.getElementById("ytdbonus").click();
        }, 100);
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(function() {
        $('button#add_cus_btn').click(function(e) {
            e.preventDefault();
            var customers = document.getElementById('added_customer').value;
            var date = document.getElementById('date').value;
            var location = document.getElementById('location').value;
            $.ajax({
                type: 'POST',
                url: "{{ url('/customer_count') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    customers: customers,
                    date: date,
                    location: location,
                },
                // dataType: 'json',
                success: function(data) {
                    console.log(data.customer_possible);
                    document.getElementById('customer_count').innerHTML = data.customer_count;
                },
                error: function(error) {
                    console.error(error);
                }
            });
        })
    });
</script>

@endsection