    @extends('layout.main')
    @section('main-content')
    <link rel="stylesheet" href="{{URL::asset('public/css/app.css')}}">
    <!-- <div class="background">
       <div class="shape" style="left: -46px;
    top: -41px;"></div>
       <div class="shape"></div>
    </div> -->

    <form class="my-auto" method="post" action="{{ url('admin/store') }}" style="height:500px; top:52%;padding: 2px 30px;">
       @if(session()->has('message'))
       <div class="alert alert-success text-white " style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
          {{ session()->get('message') }}
       </div>
       @endif
       @csrf
       <h3 class="text-secondary text-center" style="  margin-top: revert;">Create User</h3>
       <div class="row">
          <div class="col-md-6">
             <label for="firstname">First Name</label>
             <input class="form-control" type="text" name="firstname" placeholder="First Name" id="firstname">
             @error('firstname')
             <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
             @enderror
          </div>
          <div class="col-md-6">
             <label for="lastname">Last Name</label>
             <input class="form-control" type="text" name="lastname" placeholder="Last Name" id="lastname">
             @error('lastname')
             <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
             @enderror
          </div>
       </div>
       <div class="row">
          <div class="col-md-6">
             <label for="email">Email</label>
             <input class="form-control" type="email" name="email" placeholder="Email" id="email">
             @error('email')
             <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
             @enderror
          </div>
          <div class="col-md-6">
             <label for="phone">Phone</label>
             <input class="form-control" type="text" name="phone" placeholder="Phone number" id="phone">
             @error('phone')
             <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
             @enderror
          </div>
       </div>
       <div class="row">
          <div class="col-md-6">
             <label for="Role">Role</label>
             <select class="form-control" name="role">
                <option class="form-control" selected disabled>Select role</option>
                <option value="Super admin" class="form-control">Super admin</option>
                <option value="Manager" class="form-control">Manager</option>
                <option value="Director" class="form-control">Director </option>
                <option value="Sales Manager" class="form-control">Sales Manager</option>
                <option value="Sales Employee" class="form-control">Sales Employee</option>
             </select>
             @error('role')
             <div style="color:red; font-weight: 100;font-size: small;">{{ $message }}</div>
             @enderror
          </div>
          <div class="col-md-6">

             <label for="password">Create Password</label>
             <div class="input-feild">
                <input class="form-control" type="password" name="password" placeholder="Enter Password" id="password"><button type="button" id="slash_btn" class="btn bg-white text-muted" style="    margin-top: -47px;
    width: 50px;
    margin-left: 206px;
;"> <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> </button>
             </div>
             @error('password')
             <div style="color:red; font-weight: 100;font-size: small;
    margin-top: -25px;
">{{ $message }}</div>
             @enderror
          </div>
       </div>
       <div class="row  text-center">
          <div class="col-md-12">
             <button class="btn btn-secondary btn-send " style="margin-top:25px;">Create</button>
          </div>
       </div>
    </form>

    @endsection