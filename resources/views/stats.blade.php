@extends('user-layout.Main')
@section('main-content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet"> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 45%;"></a>
<h3 style="  margin-top: -67px;
    margin-bottom: 74px;
    margin-left:120px;"> Stats</h3>
<form action="{{url('user/view-stats')}}" method="post">
    @csrf
    <div class="col-12" style="display:block;">
        <div style=" float: right;margin-right: 56px;margin-top: -125px;">
            <label>Date</label>
            <div class="input-group date datepicker" style="width: 100%;">
                @if(@$cal['status']== 1)
                <input type="text" class="form-control" id="dat" onchange="myfun()" name="datee" value="{{$prevdate}}" />
                @else
                <input type="text" class="form-control" id="dat" onchange="myfun()" name="datee" value="{{@$date}}" />
                @endif
                <span class="input-group-append">
                    <span class="input-group-text  d-block" style=" width: 45px;height: 38px;margin-right: 2px;">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
        <div style=" float: right;margin-right: 296px;margin-top: -121px;">
            <label>Sort by:</label>
            <select class="form-control" id="sortopt">
                <option selected disabled>--Select option--</option>
                <option value="Customers">Customers</option>
                <option value="Income">Income</option>
            </select>
        </div>
    </div>
    <input type="submit" value="submit" id="sbmit-btn" style="display:none">
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#loctabl').DataTable({
            "bLengthChange": false,
            "bPaginate": true,
            scrollX: true,
            info: false,
            "searching": false
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#sortopt').on('change', function() {
            var opt = $("#sortopt").val();
            var location = @json($location);
            if (opt == 'Customers') {
                $('#loctabl').DataTable({
                    "order": [
                        [1, "asc"]
                    ],
                    destroy: true,
                    "bLengthChange": false,
                    "bPaginate": true,
                    info: false,
                    scrollX: true,
                    "searching": false
                });
            } else {
                $('#loctabl').DataTable({
                    "order": [
                        [2, "asc"]
                    ],
                    // ordering:true,
                    destroy: true,

                    "bLengthChange": false,
                    "bPaginate": true,
                    info: false,
                    scrollX: true,
                    "searching": false
                });
            }
        });
    });
</script>
<script>
    function myfun() {
        var selecteddate = $("#dat").val();
        if (selecteddate) {
            $('#sbmit-btn').click();
        }
    }
</script>
<div class="container text-center">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered" id="loctabl" cellspacing="0">
                <thead style="border-top: 2px solid;">
                    <th>Location</th>
                    <th>Customers</th>
                    <th>Income</th>
                    <th>Gross Profit</th>
                    <th>GP%</th>
                    <th>Net Income</th>
                    <th>Profit Margin</th>
                    <th>PayOffs</th>
                    <th>YTD Income</th>
                    <th>YTD Net Income</th>
                    <th>YTD GP</th>
                </thead>
                <tbody>
                    @foreach($location as $val)
                    <tr>
                        <td style="border-right: 2px solid ;">{{@$val->location}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">@if(@$val->tval != ''){{@$val->tval}} @else
                            <b>-</b>@endif
                        </td>
                        <td class="text-end" style="border-right: 2px solid ;">{{number_format(round(@$val->income,0))}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">{{number_format(round(@$val->grosvalu,0))}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">@if(@$val->income != 0)
                            {{number_format(round((@$val->grosvalu/@$val->income)*100,2))}}%
                            @else <b>-</b>@endif
                        </td>
                        <td class="text-end" style="border-right: 2px solid ;">{{number_format(round(@$val->netvalu,0))}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">@if(@$val->income != 0)
                            {{number_format(round((@$val->netvalu/@$val->income)*100,2))}}%
                            @else <b>-</b>@endif
                        </td>
                        <td class="text-end" style="border-right: 2px solid ;">{{number_format(round(@$val->payoff,0))}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">{{number_format(round(@$val->ytdinc,0))}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">{{number_format(round(@$val->ytdnetinc,0))}}</td>
                        <td class="text-end" style="border-right: 2px solid ;">@if(@$val->ytdinc != 0)
                            {{number_format(round((@$val->ytdnetinc/@$val->ytdinc)*100,2))}}%
                            @else <b>-</b>@endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection