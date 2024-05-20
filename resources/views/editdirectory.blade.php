@extends('layout.main')
@section('main-content')
<div class="container mt-5">
    <div class="row mts-5">
        <div class="col-lg-7 mx-auto">
            <div class="container">

                <form action="{{ url('/updatedirectory/'.$editdata->id) }}" method="post" class="add-location-form" role="form">
                    @if(Session::has('success'))
                    <div class="alert alert-danger text-white" style="
    margin-left: 115px;
    margin-top: -40px;
    position: absolute;
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @csrf
                    <div class=" text-center">
                        <h1 class="text-secondary mt-3">Update Directory</h1>
                    </div>
                    <input type="hidden" name="id" value="{{$editdata->id}}">
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location Id</label>
                                    <input type="text" name="locationid" class="form-control" autocomplete="off" value="{{$editdata->locationid}}" placeholder="Enter Location Id">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Manager</label>
                                    <input type="text" name="manager" class="form-control" autocomplete="off" value="{{$editdata->manager}}" placeholder="Enter Manager">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" autocomplete="off" value="{{$editdata->phone}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input id="fax" type="text" name="fax" class="form-control" placeholder="Enter fax" autocomplete="off" value="{{$editdata->fax}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input id="location" type="text" name="location" class="form-control" placeholder="Enter Location" autocomplete="off" value="{{$editdata->location}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Regional</label>
                                    <input id="regional" type="text" name="regional" class="form-control" placeholder="Enter Regional" autocomplete="off" value="{{$editdata->regional}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control " placeholder="Enter Email" autocomplete="off" value="{{$editdata->email}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Director</label>
                                    <input id="director" type="text" name="director" class="form-control" placeholder="Enter Director" autocomplete="off" value="{{$editdata->director}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mgr Mobile </label>
                                    <input type="text" name="mobilenumber" class="form-control" autocomplete="off" value="{{$editdata->mobile}}">

                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  text-center">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-secondary pt-2  btn-send" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection