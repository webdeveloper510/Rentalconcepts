@extends('user-layout.Main')
@section('main-content')
<style>
.row {
    display: contents !important;
}

.dataTables_scrollBody {
    margin-top: -17px;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet"> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#data').DataTable({
        "bLengthChange": false,
        "bPaginate": true,
        ordering: false,
        info: false,
        scrollX: true,
        "searching": false,
        // "pageLength": 20,
        "paging": false
    });

});
</script>
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt=""
        class="img-fluid" style=" max-width: 8%;  margin-left: 694px;"></a>
<h3 style="  margin-top: -67px;
    margin-bottom: 74px;
    margin-left:120px;"> YTD ANALYSIS</h3>
    <div class="container text-center">
<div class="row">
<div class="col-sm-12">
<table class="table table-bordered " style="width: 90%;" id="data">
    <thead style="border-top: 2px solid;">
        <th style="border-right: 2px solid;">Location</th>
        <th style="border:none ;"></th>
        <th style="border:none ;"></th>
        <th style="border:none ;">Income</th>
        <th style="border-right: 2px solid;"></th>

        <th></th>
        <th style="border:none ;"></th>
        <th style="border:none ;">COGS</th>
        <th style="border-right: 2px solid;"></th>

        <th></th>
        <th style="border:none ;"></th>
        <th style="border:none ;">Gross Profit</th>
        <th style="border-right: 2px solid;"></th>

        <th></th>
        <th style="border:none ;"></th>
        <th style="border:none ;">Expense</th>
        <th style="border-right: 2px solid;"></th>

        <th></th>
        <th style="border:none ;"></th>
        <th style="border:none ;">Net Income</th>
        <th style="border-right: 2px solid;"></th>
    </thead>
    <tbody style="border-bottom: 2px solid ;">
        <tr>
            <td style="border-right: 2px solid ;"></td>
            <td><b>2024</b></td>
            <td><b>2023</b></td>
            <td><b>Change</b></td>
            <td style="border-right: 2px solid ;"><b>%</b></td>
            <td><b>2024</b></td>
            <td><b>2023</b></td>
            <td><b>Change</b></td>
            <td style="border-right: 2px solid ;"><b>%</b></td>
            <td><b>2024</b></td>
            <td><b>2023</b></td>
            <td><b>Change</b></td>
            <td style="border-right: 2px solid ;"><b>%</b></td>
            <td><b>2024</b></td>
            <td><b>2023</b></td>
            <td><b>Change</b></td>
            <td style="border-right: 2px solid ;"><b>%</b></td>
            <td><b>2024</b></td>
            <td><b>2023</b></td>
            <td><b>Change</b></td>
            <td style="border-right: 2px solid ;"><b>%</b></td>

        </tr>
        @foreach($location as $val)
        <tr>
            <td style="border-right: 2px solid ;">{{$val->location}}</td>
            <td>{{number_format(round($val->tval,0))}}</td>
            <td>{{number_format(round($val->rvalu,0))}}</td>
            <td>{{number_format(round($val->tval - $val->rvalu,0))}}</td>
            <td style="border-right: 2px solid ;"> @if($val->tval)
                {{number_format(round(($val->tval - $val->rvalu)/$val->tval *100,0))}}%
                @else
                <b> - </b>
                @endif
            </td>
            <td>{{number_format(round($val->cogvalu,0))}}</td>
            <td>{{number_format(round($val->cgvalu,0))}}</td>
            <td>{{number_format(round($val->cogvalu - $val->cgvalu,0))}}</td>
            <td style="border-right: 2px solid ;"> @if($val->cogvalu)
                {{number_format(round(($val->cogvalu - $val->cgvalu)/$val->cogvalu *100,0))}}%
                @else
                <b> - </b>
                @endif
            </td>
            <td>{{number_format(round($val->grosvalu,0))}}</td>
            <td>{{number_format(round($val->grossvalu,0))}}</td>
            <td>{{number_format(round($val->grosvalu - $val->grossvalu,0))}}</td>
            <td style="border-right: 2px solid ;"> @if($val->grosvalu)
                {{number_format(round(($val->grosvalu - $val->grossvalu)/$val->grosvalu *100,0))}}%
                @else
                <b> - </b>
                @endif
            </td>
            <td>{{number_format(round($val->expvalu,0))}}</td>
            <td>{{number_format(round($val->exvalu,0))}}</td>
            <td>{{number_format(round($val->expvalu - $val->exvalu,0))}}</td>
            <td style="border-right: 2px solid ;"> @if($val->expvalu)
                {{number_format(round(($val->expvalu - $val->exvalu)/$val->expvalu *100,0))}}%
                @else
                <b> - </b>
                @endif
            </td>
            <td>{{number_format(round($val->netvalu,0))}}</td>
            <td>{{number_format(round($val->netvalue,0))}}</td>
            <td>{{number_format(round($val->netvalu - $val->netvalue,0))}}</td>
            <td style="border-right: 2px solid ;"> @if($val->netvalu)
                {{number_format(round(($val->netvalu - $val->netvalue)/$val->netvalu *100,0))}}%
                @else
                <b> - </b>
                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
</div>
</div>
@endsection