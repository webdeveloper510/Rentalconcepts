@extends('layout.main')
@section('main-content')
<form method="POST" action="{{ url('/view-location-data') }}">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5 " style=" width: 70%;margin-left: 322px;">

        <div class=" text-center">
            <h1> Locations</h1>
        </div>
        <!-- <input type="date"id="date" class="form-control mb-3" style="width:30%"> -->
        <table id="example" class=" table table-striped table-bordered text-center" style="width:100% ;border:10px">
            @if(session()->has('success'))
            <div class="alert text-white" style="
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
                    <th>Location Id</th>
                    <th>Location Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locdata as $loc)
                <tr>
                    <td>{{$loc->locationid}}</td>
                    <td>{{$loc->location}}</td>
                    <td>{{$loc->address}}</td>
                    <td>{{$loc->city}}</td>
                    <td>{{$loc->state}}</td>
                    <td>{{$loc->zip}}</td>
                    <td>{{$loc->phone}}</td>
                    @php
                    $locid = base64_encode($loc->id);
                    @endphp
                    <td>
                        <a href="{{ url('/edit-location/' . $locid)}}"><i class="fas fa-edit text-success"></i></a>
                        <a href="{{ url('/delete-location',$loc->id) }}"><i class="fa fa-trash text-danger" style="margin-left:18px;"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</form>
</main>
@endsection