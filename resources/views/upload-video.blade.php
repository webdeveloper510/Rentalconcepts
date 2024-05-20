@extends('user-layout.Main')
@section('main-content')
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 627px;"></a>
<h3 style="  margin-top: -67px;
    margin-bottom: 74px;
    margin-left:120px;"> Video Upload</h3>
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success text-white">
        {{Session::get('success')}}
    </div>
    @endif
    <form action="{{url('/video-upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <label style="margin-top: 9px;">Select Video to upload:</label>
            </div>
            <div class="col-md-10">
                <input type="file" class="form-control" name="file" id="file" style="    width: 70%;">
                <input type="submit" class="btn btn-success" value="Upload" name="submit" style="float:right;margin-top: -39px; margin-right: 131px;">
            </div>
            @error('file')
            <div style="color:red;margin-top:4px;">{{$message}}</div>
            @enderror
        </div>

    </form>
</div>
<div class="container" style=" margin-top: 60px;    margin-right: 41px;">
    @foreach($data as $d)
    <video width="320" height="240" controls>
        <source src="http://rentalconcepts.net/public/videouploads/{{$d['file']}}">
    </video>
    @endforeach
</div>
@endsection