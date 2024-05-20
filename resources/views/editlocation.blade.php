@extends('layout.main')
@section('main-content')
<div class="container mt-5">
    <div class="row mts-5">
        <div class="col-lg-7 mx-auto">
            <div class="container">

                <form action="{{ url('/update-location-data/'.$location->id) }}" method="post" class="add-location-form" role="form">
            
                    @csrf
                    <div class=" text-center">
                        <h1 class="text-secondary mt-3">Update Location</h1>
                    </div>
                    <input type="hidden" name="id"  value="{{$location->id}}">
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location Name</label>
                                    <input id="location" type="text" name="location" class="form-control" placeholder="Enter Location" value="{{$location->location}}">
                                      @error('location')
                                       <div style="color:red;">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input id="address" type="text" name="address" class="form-control" placeholder="Enter Address" value="{{$location->address}}">
                                      @error('address')
                                       <div style="color:red;">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input id="city" type="text" name="city" class="form-control" placeholder="Enter City" value="{{$location->city}}">
                                      @error('city')
                                       <div style="color:red;">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input id="state" type="text" name="state" class="form-control" placeholder="Enter State" value="{{$location->state}}">
                                      @error('state')
                                       <div style="color:red;">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip</label>
                                    <input id="zip" type="text" name="zip" class="form-control" placeholder="Enter Zip" value="{{$location->zip}}">
                                      @error('zip')
                                       <div style="color:red;">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input id="phone" type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{$location->phone}}">
                                      @error('phone')
                                       <div style="color:red;">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                      
                        <div class="row mt-5  text-center">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-secondary pt-2 btn-send" value="Update Location">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection