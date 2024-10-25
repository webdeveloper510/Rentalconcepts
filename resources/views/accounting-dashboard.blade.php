@extends('layout.main')
@section('main-content')
<style>
    .custom-checkbox label {
        font-size: 24px;
    }

    .section-title {
        margin-top: 40px;
        padding-bottom: 9px
    }

    .section-title h3 {
        font-weight: 500;
        color: #980d1a;
    }
</style>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style=" width: 70%;
    margin-left: 322px;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-1" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder mb-0">Dashboard</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Type here...</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{url('/accounting/logout')}}" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>
    <!-- End Navbar -->
    <h2 class="text-center" style="font-size: calc(0.325rem + 3.9vw);font-family: 'Poppins';
    color: #761e1e;">Welcome to Accounting Panel</h2>
</main>
@endsection