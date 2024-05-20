@extends('layout.main')
@section('main-content')
<div class="container mt-5">
    <div class="row mts-5">
        <div class="col-lg-7 mx-auto">
            <div class="container">
           
                <form action="{{ url('/admin/directory') }}" method="post" class="content-form" role="form" style="height:570px;top: 50%;">
                @if(Session::has('success'))
                <div class="alert alert-danger text-white" style="
    margin-left: 115px;

    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
                            {{ Session::get('success') }}
                        </div>
                @endif
                    @csrf
                    <div class=" text-center">
                        <h1 class="text-secondary mt-3">Directory</h1>
                    </div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location Id</label>
                                    <input type="text" name="locationid" class="form-control" autocomplete="off" value="" placeholder="Enter Location Id">
                                    @error('locationid')
             <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
             @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Manager</label>
                                    <input type="text" name="manager" class="form-control" autocomplete="off" value="" placeholder="Enter Manager">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control"  placeholder="Enter Phone"  autocomplete="off" value="">
                                 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input id="fax" type="text" name="fax" class="form-control" placeholder="Enter fax" autocomplete="off" value="">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input id="location" type="text" name="location" class="form-control" placeholder="Enter Location" autocomplete="off" value="">
                                  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Regional</label>
                                    <input id="regional" type="text" name="regional" class="form-control" placeholder="Enter Regional" autocomplete="off" value="">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control "  placeholder="Enter Email" autocomplete="off" value="">
                                    @error('email')
             <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
             @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Director</label>
                                    <input id="director" type="text" name="director" class="form-control"  placeholder="Enter Director" autocomplete="off" value="">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mgr Mobile </label>
                                    <input type="text" name="mobilenumber" class="form-control" autocomplete="off" value="">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  text-center">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-secondary pt-2  btn-send" value="Submit">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection