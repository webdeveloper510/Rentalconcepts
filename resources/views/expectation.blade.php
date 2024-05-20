@extends('layout.main')
@section('main-content')
<style>
    .form-check-input:checked[type=checkbox] {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
    background-color: red;
    border: none;
}
</style>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5" style=" width: 70%;margin-left: 322px;">

    <div class=" text-center">
        <h1>View Expectations</h1>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddata">
        Add New +
    </button>
    <div class="form-group py-2">
        <div class="input-field">
            <select class="form-control selectuser" id="selectuser">
                <option class="form-control" name="userid" selected disabled>Select User(Role)</option>
                @foreach($userdata as $data)
                <option  value="{{$data->id}}"class="form-control">{{$data->firstname.'   '.$data->lastname.' ('.$data->role.') '. '      '. $data->email}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="adddata" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('expect_data')}}" method="post" id="expcted_data">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Location:</label>
                            <select class="form-control" id="locat">
                                <option class="form-control" selected disabled>Select Option</option>
                                @foreach($loc as $location)
                                <option class="form-control" value="{{$location['locationid']}}">{{$location['location']}}</option>
                                @endforeach
                            </select>
                            @error('deliveries')
                            <div style="color:red; font-weight: 100;font-size: small;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Avg Delivery per month:</label>
                            <input type="text" name="deliveries" class="form-control">
                            @error('deliveries')
                            <div style="color:red; font-weight: 100;font-size: small;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Customers:</label>
                            <input type="text" name="Customers" class="form-control">
                            @error('Customers')
                            <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>% Collected:</label>
                            <input type="text" name="Collected" class="form-control">
                            @error('Collected')
                            <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Past Due %:</label>
                            <input type="text" name="Pastdue" class="form-control">
                            @error('Pastdue')
                            <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Net Income:</label>
                            <input type="text" name="Netinc" class="form-control">
                            @error('Netinc')
                            <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add Data">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <table id="tabl" class="table table-bordered " style=" display: block;
    overflow-x: auto;
    white-space: nowrap;     height: 541px;
    ">
        <thead>
            <tr>
                <th>Permissions</th>
                <th>S.no</th>
                <th>Location</th>
                <th colspan="2">Avg Deliveries per month</th>
                <th colspan="2">Customers</th>
                <th colspan="2">% Collected</th>
                <th colspan="2">Past Due %</th>
                <th colspan="2">Net Income</th>
            </tr>
        </thead>
        <tbody>
            <tr>                
                <td></td>
                <td></td><td></td>
                <td>Expected</td>
                <td>Calculated</td>
                <td>Expected</td>
                <td>Calculated</td>
                <td>Expected</td>
                <td>Calculated</td>
                <td>Expected</td>
                <td>Calculated</td>
                <td>Expected</td>
                <td>Calculated</td>

            </tr>
            @foreach($calculated_data as $key =>$value)
            <tr>
            <!-- <div class="form-group py-2 " id="checked_fields"> -->
                <td>
                    <input class="form-check-input checkbox_value" name="checked_permiss" onclick='handleClick(this.value)' type="checkbox" id="{{$value->locationid}}" value="{{$value->locationid}}"/>
                </td>
            <!-- </div> -->
                <td>{{$key + 1}}</td>
                <td>{{$value->location}}</td>
                <td>{{$value->exp_del}}</td>
                <td>{{$value->delivery}}</td>
                <td>{{$value->exp_cust}}</td>
                <td>{{$value->Customers}}</td>
                <td>{{$value->exp_coll}}</td>
                @if($value->ideal == '' || $value->ideal == 0)
                <td>-</td>
                @else
                <td>{{round($value->RentalIncome/$value->ideal *100,0)}} %</td>
                @endif

                <td>{{$value->exp_pastdue}}</td>

                @if($value->ytdinc == '' || $value->ytdinc == 0)
                <td>-</td>
                @else
                <td>{{round(($value->pastdueaccountchargeoff/$value->ytdinc) *100,0)}} %</td>
                @endif

                <td>{{$value->exp_netin}}</td>
                @if($value->ytdnetinc < 0 ) 
                <td>({{abs(round($value->ytdnetinc,2))}})</td>
                    @else
                    <td>{{number_format(round($value->ytdnetinc,2))}}</td>
                    @endif
            </tr>
            @endforeach
        </tbody>
    </table>

</main>

<script>
    $('#expcted_data').submit(function(e) {
        e.preventDefault();
        let location = $('#locat').val();
        let deliveries = $('input[name = deliveries]').val();
        let Customers = $('input[name = Customers]').val();
        let Collected = $('input[name = Collected]').val();
        let pastdue = $('input[name = Pastdue]').val();
        let netincome = $('input[name = Netinc]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "{{route('expect_data')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                'location': location,
                "deliveries": deliveries,
                'Customers': Customers,
                'pastdue': pastdue,
                'netincome': netincome,
                'collected': Collected
            },
            success: function(data) {
                window.location.reload(true);
            }
        })
    });
</script>

@endsection