@extends('user-layout.Main')
@section('main-content')

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<div class="container text-center" style=" margin-left: 5px;">
    <a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;margin-left: -31px;"></a>
    <h3 style="    float: left;
    margin-top: 46px;
    margin-left: 24px;
">Customers</h3>
</div>
<div style="margin: 20px;">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row" style="width: 100%;">
                <div class="col-12" style=" float:right;width:20%">
                <label>Select Date</label>
                    <div class="input-group date datepicker">
                        <input type="text" class="form-control" id="dates" name="datee" value="{{date('m-Y', strtotime('first day of previous month'))}}"/>
                        <span class="input-group-append">
                            <span class="input-group-text  d-block" style=" width: 45px;height: 38px;margin-right: 2px;">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
           
            <table id="table-loc" class=" table-bordered text-center display dataTable cell-border " style="width:100%">
                <thead>
                    <tr>
                        <th>Location Id</th>
                        <th class="currdate" style="width:20%;">{{date('F-Y', strtotime('first day of previous month'))}}</th>
                        <th>M2M Change</th>
                        <th>Average</th>
                        <th>Last Month</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customercount as $data)
                    <tr>
                        <td>{{$data['Location']}}</td>
                        <td>@if($data['Customers']){{$data['Customers']}}@else - @endif</td>
                        <td>{{intval($data['custval']) - intval($data['Customers'])}}</td>
                        <td>{{$data['averageval']}}</td>
                        <td>{{$data['last_month_december_data']}}</td>
                        <!-- <td>{{intval(intval($data['averageval'])) - intval($data['Customers'])}}</td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection