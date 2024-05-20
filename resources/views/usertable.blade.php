@extends('layout.main')
@section('main-content')
<form method="post" action="{{ url('/showusers') }}">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5" style=" width: 70%;margin-left: 322px;">
        @if(Session::has('success'))
        <p class="alert  text-white" style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('info'))
        <p class="alert  text-white" style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">{{ Session::get('info') }}</p>
        @endif
        <table id="example" class="table table-striped table-bordered text-center" style="width:100% ;border:10px">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siteusers as $users)
                <tr>
                    <td>{{$users->firstname}}</td>
                    <td>{{$users->lastname}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->phone}}</td>
                    <td>{{$users->role}}</td>
                    @php
                    $userid = base64_encode($users->id);
                    @endphp
                    <td>
                        <a href="{{ url('/edit/' . $userid)}}"><i class="fas fa-edit text-success"></i></a>
                        <a href="{{ url('/delete-data',$users->id) }}"><i class="fa fa-trash text-danger" style="margin-left:18px;"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</form>
</main>

@endsection