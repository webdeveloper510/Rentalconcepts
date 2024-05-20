@extends('layout.main')
@section('main-content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg "style="    width: 70%;
    margin-left: 322px;">
    <button class="btn btn-lg text-white bg-gradient-primary" style=" width:100%; margin-top: 20px;">Permissions</button>
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
    <div class="form-group py-2 " id="checked_fields">
        <div class="row" style="margin-left: 24px;">
        <div class="col-6">
        @foreach($location as $loc)
        <div class="form-check">
            <label class="form-check-label" style="font-weight:600">
                <input class="form-check-input checkbox_value" name="checked_permiss" onclick='handleClick(this.value)' type="checkbox" id="{{$loc->locationid}}" value="{{$loc->locationid}}">
                {{$loc->location}}
            </label>
        </div>
        @endforeach
        </div>
        <div class="col-6">
           <b>Select Default Location:</b>
           <select class="form-control defaultloc">
                <option class="form-control" selected disabled>Choose Location</option>
           </select>
        </div>
        </div>
    </div>
</main>
@endsection