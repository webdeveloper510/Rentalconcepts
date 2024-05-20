@extends('layout.main')
@section('main-content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5" style=" width: 70%;margin-left: 322px;">
    <div class=" text-center">
        <h1>Visitor's Log</h1>
    </div>
    <table class="table table-bordered bg-white text-center" style="margin-top:inherit">
  <thead class="bg-light">
    <tr>
      <th>User</th>
      <th>Profile</th>
      <th>No. of visits</th>
      <th>Last Visit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user as $users)
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <div class="ms-3">
        {{$users['firstname'].' '.$users['lastname']}} 
          </div>
        </div>
      </td>
      <td>
       {{$users['role']}}
      </td>
      <td>
       {{$users['totalvisits']}}
      </td>
      <td> 
        {{date('m-d-Y', strtotime($users['updated_at']))}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</main>
@endsection