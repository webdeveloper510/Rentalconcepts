@extends('user-layout.Main')
@section('main-content')
<div class="container text-center" style=" margin-left: 5px;">
    <a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;margin-left: -31px;"></a>
    <h3 style="    float: left;
    margin-top: 46px;
    margin-left: 24px;
">View Details</h3>
    <div class="container">
        <form method="POST" action="{{url('user/getdetail')}}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label>Select Date</label>
                    <hr style="width:40%;margin-left: 27%;">
                    <div class="col-5">
                        <div class="input-group date datepickerr" style=" margin-left: 65%;">
                            @if(@$cal['status']== 1)
                            <input type="text" class="form-control" id="date" name="date" value="{{$prevdate}}" />
                            @endif
                            @if(@$cal['status']== 0)
                            <input type="text" class="form-control" id="date" name="date" placeholder="Select Date" value="{{@$date}}" />
                            @endif
                            <span class="input-group-append">
                                <span class="input-group-text  d-block" style="width: 45px;height: 38px;margin-right: -2px;">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="display:block;" id="loc">
                    <div style="float:right">
                        <label>Location</label>
                        <hr style="width:100%">
                        <select class="form-control" style="width:217px " id="location" name="location" value="{{@$dat['location']}}">
                            <option class="form-control" selected disabled>Choose Location</option>
                            @if(!empty($location))
                            @foreach($location as $loca)
                            <option class="form-control" value="{{$loca->locationid}}" {{ ( $loca->locationid == @$loc) ?'selected':''}}>{{$loca->location}} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
    </div>
    <input type="submit" value="submit" id="submit" style="display:none">
    </form>
</div>
<div class="container">
    <table id="detail" class="table table-striped text-center" style="width:100% ;border:10px">
        <thead>
            <tr>
                <!--<th>Id</th>-->
                <th>S.no</th>
                <th>Month</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=> $dat)
            @php
            $date =$dat['date'];
            $month = explode('-', $date);
            $month_no = $month[0];
            $year = $month[1];
            $monthName = date("F", mktime(0, 0, 0, $month_no, 10));
            @endphp
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$monthName}} {{$year}}</td>
                @php
                $userid = base64_encode($dat['id']);
                @endphp
                <?php $loc = explode('public_html', $dat['file_location']); ?>
                <td>
                    <a href='{{route("download",$loc[1])}}' class='btn btn-primary'><i class="fa fa-download" aria-hidden="true"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    // $('#location').on('change', function() {
    //     var selecteddate = $("#date").val();
    //     var selectedlocation = $("#location").val();
    //     if (selecteddate) {
    //         $('#submit').click();
    //     }
    // });
    // $(document).ready(function() {
        
    //     var selecteddate = $("#date").val();
    //     var selectedlocation = $("#location").val();
    //     var url = "{{url('/user/front-det')}}";
    //     var token = '{{ csrf_token() }}';

    //     $.ajax({
    //         url: url,
    //         data: {
    //             loc: selectedlocation,
    //             date: selecteddate,
    //             _token: token,
    //         },
    //         type: 'POST',
    //         success: function(data) {
    //             var dat = data[0].date;
    //             monthNumber = dat.split("-")
    //             function toMonthName(monthNumber) {
    //                 const date = new Date();
    //                 date.setMonth(monthNumber - 1);
    //                 return date.toLocaleString('en-US', {
    //                     month: 'long',
    //                 });
    //             }
    //             if (data.length > 0) {
    //                 for (var i = 0; i < data.length; i++) {
    //                     var tr_str = "<tr>" +
    //                         "<td align='center'>" + (i + 1) + "</td>" +
    //                         "<td align='center'>" + toMonthName(monthNumber[0]) + ' '+ monthNumber[1] + "</td>" +
    //                         "<td align='center'></td>" +
    //                         "</tr>";
    //                     $("#detail tbody").append(tr_str);
    //                 }
    //             } else {
    //                 var tr_str = "<tr>" +
    //                     "<td align='center' colspan='4'>No record found.</td>" +
    //                     "</tr>";
    //                 $("#detail tbody").append(tr_str);
    //             }
    //         }
    //     });

    //     // if (selecteddate) {
    //     //     $('#submit').click();
    //     // }
    // });
</script>
@endsection