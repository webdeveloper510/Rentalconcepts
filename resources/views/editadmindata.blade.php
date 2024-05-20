<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}">
    <link rel="icon" type="image/png" href="{{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png') }}">
    <!--<script src="jquery-3.3.1.min.js"></script>-->
    <!-- <script src="jquery-ui.min.js"></script>-->
    <title>
        RentalConcepts
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ URL::asset('public/asset/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('public/asset/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::asset('public/asset/assets/css/material-dashboard.css?v=3.0.2')}}" rel="stylesheet" />

    <!-- create-user -->
    <!-- <link rel="stylesheet" href="{{URL::asset('public/css/app.css')}}"-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" # " target="_blank">
            <img src="{{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Admin Panel</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="/admin">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item submenu">
                <a class="nav-link text-white " href="/newuser">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Create User</span>
                </a>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="/viewusers">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">View Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item submenu">
                <a class="nav-link text-white " href="{{url('/addlocation')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-map-marker opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add Location</span>
                </a>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{url('/admin/viewlocations')}}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">View Locations</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  submenu">
                <a class="nav-link text-white " href="{{url('/content')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Add Data</span>
                </a>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{url('/admin/viewdata')}}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">View Data</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<div class="container mt-5">
    <div class="row mts-5">
        <div class="col-lg-7 mx-auto">
            <div class="container">

                <form action="{{ url('/update-admin-data/'.$user->id) }}" method="post" class="content-form" role="form">
                    @csrf
                    <div class=" text-center">
                        <h1 class="text-secondary mt-3">Data</h1>
                    </div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group date" id="datepicker">
                                        <input type="text" class="form-control" id="date" name="date" style="font-weight:300" />
                                        <span class="input-group-append">
                                            <span class="input-group-text  d-block" style=" width: 43px;
                                                height: 36px;
                                                background-color: #ebebeb!important;
                                                margin-top: 1px;
                                                border-radius: unset;">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>location</label>

                                    <select class="form-control" name="location" style="font-weight:300">
                                        @foreach($loc as $row)
                                        <option>{{$row->location}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ask My Accountant</label>
                                    <input type="text" name="accountant" class="form-control" autocomplete="off" value="{{$user->accountant}}">
                                    @error('accountant')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customers</label>
                                    <input id="customers" type="text" name="customers" class="form-control" placeholder="Enter customers" autocomplete="off" value="{{$user->customers}}">
                                    @error('customers')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deliveries</label>
                                    <input id="deliveries" type="text" name="deliveries" class="form-control" placeholder="Enter deliveries" autocomplete="off" value="{{$user->deliveries}}">
                                    @error('deliveries')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pickups</label>
                                    <input id="pickups" type="text" name="pickups" class="form-control" placeholder="Enter pickups" autocomplete="off" value="{{$user->pickups}}">
                                    @error('pickups')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payoffs</label>
                                    <input id="payoffs" type="text" name="payoffs" class="form-control" placeholder="Enter payoffs" autocomplete="off" value="{{$user->payoffs}}">
                                    @error('payoffs')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Skips</label>
                                    <input id="skips" type="text" name="skips" class="form-control" autocomplete="off" value="{{$user->skips}}">
                                    @error('skips')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>$Ideal/Cust</label>
                                    <input type="text" name="idealcust" class="form-control " autocomplete="off" value="{{$user->idealcust}}">
                                    @error('idealcust')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>$Ideal/Agre</label>
                                    <input type="text" name="idealagr" class="form-control" autocomplete="off" value="{{$user->idealagr}}">
                                    @error('idealagr')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Beg Ideal</label>
                                    <input type="text" name="bideal" class="form-control " autocomplete="off" value="{{$user->bideal}}">
                                    @error('bideal')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>End Ideal</label>
                                    <input type="text" name="eideal" class="form-control " autocomplete="off" value="{{$user->eideal}}">
                                    @error('eideal')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  text-center">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-secondary pt-2  btn-send" value="Update Data">
                            </div>
                        </div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('info') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: "yyyy-mm",
            startView: "months",
            minViewMode: "months"
        });
    });
</script>