@extends('user-layout.Main')
@section('main-content')
<a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style=" max-width: 8%;  margin-left: 627px;"></a>
<h3 style="  margin-top: -67px;
    margin-bottom: 74px;
    margin-left:120px;"> Sales Training</h3>
<div class="container" style=" margin-top: 120px;    margin-left: 190px;">
    @foreach($data as $d)
    <video width="320" height="240" controls>
  <source src="http://rentalconcepts.net/public/videouploads/{{$d['file']}}">
</video>
    @endforeach

</div>
@endsection