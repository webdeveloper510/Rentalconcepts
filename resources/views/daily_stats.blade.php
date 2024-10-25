@extends('user-layout.Main')
@section('main-content')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<div class="container text-center">
    <a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;margin-left: -31px;"></a>
    <h3 style="float: left;margin-top: 46px;margin-left: 24px;">Daily-Report-Data</h3>
    <div class='row mt-5'>
        <div class="col-md-12">
            <table id="report-table" class="display">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Yesterday's Deliveries</th>
                        <th>Month to Date Deliveries</th>
                        <th>Last Month Deliveries</th>
                        <th>Last Year (month) Deliveries</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filteredData as $data)
                    <tr>
                        <td>{{ $data['Location'] }}</td>
                        <td>{{ $data['YesterdayDeliveries'] }}</td>
                        <td>{{ $data['MonthToDateDeliveries'] }}</td>
                        <td>{{ $data['LastMonthDeliveries'] }}</td>
                        <td>{{ $data['LastYearMonthDeliveries'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#report-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

@endsection