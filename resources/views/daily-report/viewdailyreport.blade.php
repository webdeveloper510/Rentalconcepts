@extends('layout.main')
@section('main-content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.8rem;
    }

    th,
    td {
        padding: 4px;
        text-align: right;
        border: 1px solid #000;
    }

    th {
        background-color: #f2f2f2;
        text-align: center;
    }

    thead th[rowspan] {
        vertical-align: middle;
    }

    .table-bordered {
        border: 2px solid #000;
    }

    .card-header,
    .card-body {
        padding: 10px;
    }

    .card-header h4,
    .card-header p {
        margin: 0;
    }

    .card-header {
        border-bottom: 2px solid #000;
        text-align: center;
    }

    .card {
        border: none;
        box-shadow: none;
    }

    div#data-container {
        margin-left: 130px;
        margin-top: 110px;
    }

    .date-div {
        position: absolute;
        margin-left: 170px;
        margin-top: 10px;
    }

    .store-div {
        position: absolute;
        margin-left: 465px;
        margin-top: 10px;
    }
</style>

<div class="container">
    <form method="POST" action="">
        @csrf
        <div class="row">
            <div class="col-6 date-div">
                <label>Select Date</label>
                <hr style="width:40%">
                <div class="col-5">
                    <div class="input-group date datepicker">
                        <input type="text" class="form-control" id="date" name="date" value="" />
                        <span class="input-group-append">
                            <span class="input-group-text  d-block" style="width: 45px;height: 38px;margin-right: 2px;">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-6 select store-div">
                <div style="float:right">
                    <label>Store</label>
                    <hr style="width:100%">
                    <select class="form-control" style="width:217px " id="location" name="location">
                        <option class="form-control" disabled>Select Store</option>
                        @if(!empty($storeNames))
                        @foreach($storeNames as $store)
                        <option class="form-control" value="{{$store}}">{{$store}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <input type="submit" value="submit" id="submit" style="display:none">
    </form>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div id="data-container" class="card">
                <div class="card-header text-center">
                    <h4>Rent To Own Management Summary</h4>
                    <p>Business Date: 7/31/2024</p>
                    <p>Store: 1 RNR-JACKSONVILLE</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th rowspan="2">**REVENUES**</th>
                                <th colspan="2">TODAY</th>
                                <th colspan="2">WEEK-TO-DATE</th>
                                <th colspan="2">PERIOD-TO-DATE</th>
                                <th colspan="2">YEAR-TO-DATE</th>
                            </tr>
                            <tr>
                                <th>$AMOUNT</th>
                                <th>%TOTAL</th>
                                <th>$AMOUNT</th>
                                <th>%TOTAL</th>
                                <th>$AMOUNT</th>
                                <th>%TOTAL</th>
                                <th>$AMOUNT</th>
                                <th>%TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>RENTAL REVENUES</td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                            <tr>
                                <td>EARLY PURCH OPTION</td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                            <tr>
                                <td>RETAIL CASH SALES</td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                            <tr>
                                <td>LDW/GRP FEES </td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                            <tr>
                                <td>PROCESSING FEES</td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                            <tr>
                                <td>RE-INSTATE FEES</td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                            <tr>
                                <td>RETURN CK FEES</td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                            <tr>
                                <td>OTHER CHARGES</td>
                                <td>10,677.18</td>
                                <td>100.0</td>
                                <td>17,622.87</td>
                                <td>100.0</td>
                                <td>104,981.20</td>
                                <td>100.0</td>
                                <td>743,858.60</td>
                                <td>100.0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#date').datepicker({
            format: "yyyy-mm",
            startView: "months",
            minViewMode: "months"
        });
    });
</script>
@endsection