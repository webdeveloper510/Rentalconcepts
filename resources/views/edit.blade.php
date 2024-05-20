    @extends('layout.main')
    @section('main-content')
    <link rel="stylesheet" href="{{URL::asset('public/css/app.css')}}">
    <div class="background">
       <div class="shape"></div>
       <div class="shape"></div>
    </div>
    <form class="my-4" style="height:652px;" method="post" action="{{ url('/update-data/'.$user->id) }}">
       @csrf
       <h3>Update User</h3>
       <input type="hidden" name="id" value="" value="{{$user->id}}">
       <label for="firstname">First Name</label>
       <input class="form-control" type="text" name="firstname" placeholder="First Name" id="firstname" value="{{$user->firstname}}">
       @error('firstname')
       <div style="color:red;">{{ $message }}</div>
       @enderror

       <label for="lastname">Last Name</label>
       <input class="form-control" type="text" name="lastname" placeholder="Last Name" id="lastname" value="{{$user->lastname}}">
       @error('lastname')
       <div style="color:red;">{{ $message }}</div>
       @enderror

       <label for="email">Email</label>
       <input class="form-control" type="email" name="email" placeholder="Email" id="email" value="{{$user->email}}">
       @error('email')
       <div style="color:red;">{{ $message }}</div>
       @enderror


       <label for="phone">Phone</label>
       <input class="form-control" type="text" name="phone" placeholder="Phone number" id="phone" value="{{ $user->phone }}">
       @error('phone')
       <div style="color:red;">{{ $message }}</div>
       @enderror

       <label for="role">Role</label>
       <select class="form-control" name="role">
          <option class="form-control" {{ ($user->role == "") ? "selected" : "" }}>Select role</option>
          <option class="form-control" {{ ($user->role == "Super admin") ? "selected" : "" }}>Super admin</option>
          <option class="form-control" {{ ($user->role == "Manager") ? "selected" : "" }}>Manager</option>
          <option class="form-control" {{ ($user->role == "Director") ? "selected" : "" }}>Director </option>
       </select>


       <button class="btn btn-secondary" id="update_btn" style="margin-top:27px;">Update</button>

    </form>
    @endsection