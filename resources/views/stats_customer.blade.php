@extends('user-layout.Main')
@section('main-content')
<style>
    /* Add this CSS to your styles */
    table {
        border-collapse: collapse;
        width: 100%;
        overflow-x: auto;
        display: block;
    }

    thead th {
        position: sticky;
        top: 0;
        background: white;
        z-index: 2;
        /* Ensure header is above table cells */
    }

    tbody td,
    thead th {
        padding: 8px 16px;
        border: 1px solid #ddd;
    }

    tbody td:first-child,
    thead th:first-child {
        position: sticky;
        left: 0;
        background: white;
        z-index: 3;
        /* Ensure the first column is above other cells and the header */
    }

    /* Additional styling for better visual appearance */
    .container {
        overflow-x: auto;
    }

    .table-bordered {
        border: 1px solid #ddd;
        width: 100%;
        display: table;
    }
</style>
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt=""
        class="img-fluid" style=" max-width: 8%;  margin-left: 45%;"></a>
<h3 style="margin-top: -67px;margin-bottom: 74px;margin-left:120px;">Customer Growth</h3>
<div class="customer">
    <?php
foreach ($data as $key => $value) {
    if ($key == 'current') {
        foreach ($value as $ikey => $val) {
            if ($ikey == 'cust') {
                foreach ($val as $k => $v) {
                    echo "<input type='hidden'  class='c_val' value= $v>";
                    echo "<input type='hidden'  class='c_key' value= $k>";
                }
            }
        }
    }
    if ($key == 'previous') {
        foreach ($value as $ikey => $val) {
            if ($ikey == 'cust') {
                foreach ($val as $k => $v) {
                    echo "<input type='hidden'  class='prevc_val' value= $v>";
                    echo "<input type='hidden'  class='prevc_key' value= $k>";
                }
            }
        }
    }
    if ($key == 'lastPrevious') {
        foreach ($value as $ikey => $val) {
            if ($ikey == 'cust') {
                foreach ($val as $k => $v) {
                    echo "<input type='hidden'  class='lastc_val' value= $v>";
                    echo "<input type='hidden'  class='lastc_key' value= $k>";
                }
            }
        }
    }
}
    ?>
</div>
<div class="container mt-4 ">
    <form action="{{route('custopt')}}" method="post" id="cust_option">
        @csrf
        <div class="col-12" style="display:block;">

            <select class="form-control" style="width:250px" name="cust_cat" id="cust_cat">
                <option class="form-control" selected value="">Select Option</option>
                @foreach($title as $key => $value)
                    <option class="form-control" value="{{$key}}" {{ isset($company) && ($value == $company->company) ? 'selected' : '' }} {{isset($categ) && ($key == $categ) ? 'selected' : '' }}>{{$value}}</option>
                @endforeach
            </select>

        </div>
        <input type="submit" value="submit" style="display:none">
    </form>
</div>
<div class="container showmessage mt-5 mb-5">
    @if(isset($message))
        <div class="alert alert-success errmsgtxt mt-5 mb-5">
            {{$message}}
        </div>
    @endif
</div>
<div class="container mt-5 customergh">
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="shadow-primary border-radius-lg py-3 pe-1" style=" height: 360px">
                    <div class="chart">
                        <canvas id="chart-cust" class="chart-canvas" height="170" style="height: 312px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center mt-5">
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered display nowrap" id="incometable" cellspacing="0" style="width:100%">
                <thead style="border-top: 2px solid;">
                    <th>Location</th>
                    <th>Customers</th>
                </thead>
                <tbody>
                    @foreach($loca as $val)
                        <tr>
                            <td style="border-right: 2px solid ;" class="no-sort">{{@$val->location}}</td>
                            <td class="text-center" style="border-right: 2px solid ;">{{number_format(@$val->cust)}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container mt-5">
    <h3 style="margin-left:120px;" class="mt-5">Customer Stats</h3>
    <hr>
    <div class="tab-content mt-5" id="myTabContent">
        <table class="table-bordered text-center display nowrap" style="width:100%" id="customertable">
            <thead>
                <tr>
                    <th>Location</th>
                    <?php
$prev = date("M-Y", strtotime("first day of previous month"));
$p = explode('-', $prev);
$prevformat = $p[1] . '-' . $p[0];
$years = date('Y-m-d', strtotime($prevformat . " -3 year"));
$curryear = date("Y-m-d", strtotime("first day of previous month"));
$result = Carbon\CarbonPeriod::create($years, '1 month', $curryear);
foreach ($result as $dt) {
    $ym = $dt->format("M-Y");
    echo "<th>" . $ym . "</th>";
}
                        ?>
                </tr>
            </thead>
            <tbody>
                <?php
$groupedData = [];
foreach ($cust as $value) {
    foreach ($value as $val) {
        $location = $val['Location'];
        $customers = $val['Customers'];
        $groupedData[$location][] = $customers;
    }
}
foreach ($groupedData as $location => $customersList) {
    echo "<tr>";
    $locationName = App\Models\Location::where('locationid', $location)->pluck('location')->first();
    echo "<td class='text-left' style='padding-left: 9px;'>$locationName</td>";
    foreach ($customersList as $key => $customers) {
        echo "<td>$customers</td>";
        $key = $key;
    }
    for ($i = 1; $i < (count($result) - $key); $i++) {
        echo "<td>-</td>";
    }
    echo "</tr>";
}
                    ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        if ($('#cust_cat').val() == '') {
            $('#cust_cat').prop('disabled', false);
        } else {
            $('#cust_cat').prop('disabled', true);
        }


    });
</script>

@endsection