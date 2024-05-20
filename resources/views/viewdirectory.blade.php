@extends('layout.main')
@section('main-content')
<form method="POST" action="{{ url('/admin/viewdirectory') }}">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5 " style=" width: 70%;margin-left: 322px;">

        <div class=" text-center">
            <h1> View Directory</h1>
        </div>
        <!-- <input type="date"id="date" class="form-control mb-3" style="width:30%"> -->
        @if(Session::has('success'))
        <div class="alert alert-danger text-white" style="width: 73%;margin-left: 122px;font-size: smaller;background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));">
            {{ Session::get('success') }}
        </div>
        @endif
        <table id="example" class=" table table-striped table-bordered text-center" style="width:100% ;border:10px">

            <thead>
                <tr>
                    <th>Location Id</th>
                    <th>Manager</th>
                    <th>Phone</th>
                    <th>Fax</th>
                    <th>Location</th>
                    <th>Regional</th>
                    <th>Email</th>
                    <th>Director</th>
                    <th>Mgr Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>

            @foreach($datas as $data)
            <tr>
                <td>{{$data->locationid}}</td>
                <td>{{$data->manager}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->fax}}</td>
                <td>{{$data->location}}</td>
                <td>{{$data->regional}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->director}}</td>
                <td>{{$data->mobile}}</td>
                @php
                $dataid = base64_encode($data->id);
                @endphp
                <td>
                    <a href="{{url('/edit-directory/' . $dataid)}}"><i class="fas fa-edit text-success"></i></a>
                    <a href="{{url('/delete-directory/' . $dataid)}}"><i class="fa fa-trash text-danger" style="margin-left:18px;"></i></a>
                </td>
            </tr>
            @endforeach

        </table>
</form>
</main>
<script>
$(document).ready(function() {
    $('#example').DataTable({      
        "paging": false
    });

});
</script>
@endsection