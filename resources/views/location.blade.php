@extends('layout.main')
@section('main-content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container mt-5">
    <div class="row mts-5">
        <div class="col-lg-7 mx-auto">
            <div class="container">
                <form method="POST" action="{{ url('admin/addlocationdata') }}" class="add-location-form" role="form" style="height: 564px; top:50%">
                    @if(session()->has('message'))
                    <div class="alert alert-success text-white"style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
                        {{session()->get('message') }}
                    </div>
                    @endif
                    @csrf
                    <div class=" text-center">
                        <h1 class="text-secondary mt-3">Add Location</h1>
                    </div>
                    <div class="controls">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location Id</label>
                                    <input id="locationid" type="text" name="locationid" class="form-control" placeholder="Enter Location Id">
                                    @error('locationid')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control" id="date" name="date" />
                                            <span class="input-group-append">
                                                <span class="input-group-text  d-block" style=" width: 37px;
                                                    height: -webkit-fill-available;
                                                        margin-right: -3px;">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                        @error('date')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location Name</label>
                                    <input id="location" type="text" name="location" class="form-control" placeholder="Enter Location">
                                    @error('location')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input id="address" type="text" name="address" class="form-control" placeholder="Enter Address">
                                    @error('address')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input id="city" type="text" name="city" class="form-control" placeholder="Enter City">
                                    @error('city')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input id="state" type="text" name="state" class="form-control" placeholder="Enter State">
                                    @error('state')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip</label>
                                    <input id="zip" type="text" name="zip" class="form-control" placeholder="Enter Zip">
                                    @error('zip')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input id="phone" type="text" name="phone" class="form-control" placeholder="Enter Phone">
                                    @error('phone')
                                    <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  text-center">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-secondary pt-2 btn-send" value="Add Location">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>
@endsection