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
    /* margin: 0 0 15px; */
    /* border-left: 5px solid #525256; */
    /* padding-left: 15px; */
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
            <a href="{{url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
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
    color: #761e1e;">Welcome to Admin Panel</h2>
  <div class="container-fluid py-4 mt-5">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Today's Money</p>
              <h4 class="mb-0">$53k</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">+55% </span>than last week</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Today's Users</p>
              <h4 class="mb-0">2,300</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">+3% </span>than last month</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">New Clients</p>
              <h4 class="mb-0">3,462</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-secondary text-sm font-weight-bolder">-2%</span> than yesterday</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Sales</p>
              <h4 class="mb-0">$103,430</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">+5% </span>than yesterday</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="section services-section" id="services">
    <div class="container">
      <div class="row">
        <div class="section-title">
          <h3 class="text-center">HOME PAGE GRAPHS</h3>
          <hr>
        </div>
      </div>
      <input type="hidden" class="grphval" value="{{implode(',',$shwgraph)}}">
      <form action="{{url('admin/dashboard')}}" method="post">
        @csrf
        <div class="row">
          <!-- feaure box -->
          <div class="col-sm-6 col-lg-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="showgraph[]" value="gross" />
              <label for="gross">Gross Profit $</label>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="showgraph[]" value="revenue" />
              <label for="revenue">Revenue</label>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="showgraph[]" value="cogs" />
              <label for="cogs">COGS</label>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="showgraph[]" value="netinc" />
              <label for="netinc">Net Income</label>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="showgraph[]" value="custcount" />
              <label for="custcount">Customer Count</label>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="showgraph[]" value="pastaccdue" />
              <label for="pastaccdue">Past Due Accounts </label>
            </div>
          </div>
        </div>
        <input type="submit" value="submit" class="btn btn-primary" style="width: 21%;margin-left: 356px;margin-top: 15px;">
      </form>
    </div>
  </section>
</main>
@endsection