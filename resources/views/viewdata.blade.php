@extends('layout.main')
@section('main-content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5 " style=" width: 70%;margin-left: 322px;">

    <div class=" text-center">
        <h1>Data</h1>
    </div>
    <table id="example" class=" table table-striped table-bordered text-center" style="width:100% ;border:10px">
        @if(session()->has('success'))
        <div class="alert " style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('info'))
        <div class="alert  text-white" style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
            {{ session()->get('info') }}
        </div>
        @endif
        <thead>
            <tr>

                <th>Date</th>
                <th>Location Id</th>
                <th>Location</th>
                <th>Sales Tax Coll</th>
                <th>Rental Income</th>
                <th>Cash Sales</th>
                <th>Cash Sales-Non-inventory</th>
                <th>Early Purchase Option</th>
                <th>Roll Pro</th>
                <th>Collection Fee-In-House</th>
                <th>Reinstatement Fees</th>
                <th>Other Fees-Alignments</th>
                <th>One Time Fees</th>
                <th>Customer Count</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->Date}}</td>
                <td>{{$data->locationid}}</td>
                <td>{{$data->location}}</td>
                <td>{{$data->SalesTaxColl}}</td>
                <td>{{$data->RentalIncome}}</td>
                <td>{{$data->CashSales}}</td>
                <td>{{$data->CashSalesNoninventory}}</td>
                <td>{{$data->EarlyPurchaseOption}}</td>
                <td>{{$data->RollPro}}</td>
                <td>{{$data->CollectionFeeInHouse}}</td>
                <td>{{$data->ReinstatementFees}}</td>
                <td>{{$data->OtherFeesAlignments}}</td>
                <td>{{$data->OneTimeFees}}</td>
                <td>{{$data->Customers}}</td>
                @php
                $dataid = base64_encode($data->id);
                @endphp
                <td>
                    <a href="" id="editCompany" class="getid" data-toggle="modal" data-target='#practice_modal' data-id="{{base64_decode($dataid)}}"><i class="fas fa-edit text-success"></i></a>
                    <!-- <a href="{{ url('/delete-admin-data',$data->id) }}"><i class="fa fa-trash text-danger" style="margin-left:18px;"></i></a> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade addid" id="">
        <div class="modal-dialog" style="height:450px">
 
            <div class="modal-content">
                
                <div class="modal-body">
                    <form action="{{ url('/update-admin-data/') }}" method="post" role="form">
                        @csrf
                        <div class=" text-center">
                            <h1 class="text-secondary mt-3">Data</h1>
                        </div>
                        <input type="hidden" id="ccid" name="color_id" value="">
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control" id="date" name="date" style="font-weight:300" value="" />
                                            <span class="input-group-append">
                                                <span class="input-group-text  d-block" style=" width: 43px;
                                                height: 36px;
                                                background-color: #ebebeb!important;
                                                margin-top: 1px;
                                                border-radius: unset;">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>location</label>
                                        <select class="form-control" name="location" style="font-weight:300" >
                                        <option value="" id="loc" ></option>
                                        @foreach($loc as $row)
										<option value="{{ $row->locationid }}" >{{$row->location}}</option>
										@endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sales Tax Coll</label>
                                        <input type="text" name="SalesTaxColl" id="SalesTaxColl" class="form-control" autocomplete="off" value="">
                                        @error('SalesTaxColl')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rental Income</label>
                                        <input id="RentalIncome" type="text" name="RentalIncome" class="form-control" autocomplete="off" value="">
                                        @error('RentalIncome')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cash Sales</label>
                                        <input id="CashSales" type="text" name="CashSales" class="form-control" autocomplete="off" value="">
                                        @error('CashSales')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cash Sales Non-inventory</label>
                                        <input id="CashSalesNoninventory" type="text" name="CashSalesNoninventory" class="form-control" autocomplete="off" value="">
                                        @error('CashSalesNoninventory')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Early Purchase Option</label>
                                        <input id="EarlyPurchaseOption" type="text" name="EarlyPurchaseOption" class="form-control" autocomplete="off" value="">
                                        @error('EarlyPurchaseOption')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Roll Pro</label>
                                        <input id="RollPro" type="text" name="RollPro" class="form-control" autocomplete="off" value="">
                                        @error('RollPro')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Collection Fee In-House</label>
                                        <input type="text" name="CollectionFeeInHouse" id="CollectionFeeInHouse" class="form-control " autocomplete="off" value="">
                                        @error('CollectionFeeInHouse')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reinstatement Fees</label>
                                        <input type="text" name="ReinstatementFees" id="ReinstatementFees" class="form-control" autocomplete="off" value="">
                                        @error('ReinstatementFees')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Other Fees Alignments</label>
                                        <input type="text" name="OtherFeesAlignments" id="OtherFeesAlignments" class="form-control " autocomplete="off" value="">
                                        @error('OtherFeesAlignments')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>One Time Fees</label> 
                                        <input type="text" name="OneTimeFees" class="form-control" id="OneTimeFees" autocomplete="off" value="">
                                        @error('OneTimeFees')
                                        <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5  text-center">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-secondary pt-2  btn-send" value="Update Data">
                                </div>
                            </div>
                        </div>
                        @if(session()->has('message'))
                        <div class="alert " style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
                            {{ session()->get('info') }}
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: "yyyy-mm",
            startView: "months",
            minViewMode: "months"
        });
    });
</script>
<script>
   $(".getid").click(function () {
      var cid = $(this).attr("data-id");
     
      $('.addid').attr('id', 'practice_modal'+cid);
      var token = '{{ csrf_token() }}';
      var url = "{{url('/admin/getcustomer')}}";
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
      $.ajax({
                url: url,
                data: {
                    location_id: cid,
                    _token: token,
                },
                type: 'POST',
                success: function(data) {
                       var json = $.parseJSON(data);
                    //    console.log(json)
                       $("#loc").text(json[0].location);
                       $("#ccid").val(json[0].id);
                       $("#date").val(json[0].Date);
                       $("#SalesTaxColl").val(json[0].SalesTaxColl);
                       $("#RentalIncome").val(json[0].RentalIncome);
                       $("#CashSales").val(json[0].CashSales);
                       $("#CashSalesNoninventory").val(json[0].CashSalesNoninventory);
                       $("#EarlyPurchaseOption").val(json[0].EarlyPurchaseOption);
                       $("#RollPro").val(json[0].RollPro);
                       $("#CollectionFeeInHouse").val(json[0].CollectionFeeInHouse);
                       $("#ReinstatementFees").val(json[0].ReinstatementFees);
                       $("#OtherFeesAlignments").val(json[0].OtherFeesAlignments);
                       $("#OneTimeFees").val(json[0].OneTimeFees);
                       $('#practice_modal'+cid).modal('show');
                }
            });

});
    </script>
@endsection