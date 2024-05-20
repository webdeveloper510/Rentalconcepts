<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" {{url('/admin/dashboard')}} " target="_blank">
      <img src="{{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">Admin Panel</span>
    </a>

  </div>

  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{url('/admin/dashboard')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item submenu list">
        <a class="nav-link text-white menu" href="{{url('admin/newuser')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-user-plus"></i>
          </div>
          <span class="nav-link-text ms-1">Create User</span>
        </a>
        <ul>
          <li class="nav-item list">
            <a class="nav-link text-white menu" href="{{url('admin/viewusers')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <span class="nav-link-text ms-1">View Users</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item submenu list">
        <a class="nav-link text-white menu" href="{{url('admin/addlocation')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-map-marker opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Add Location</span>
        </a>
        <ul>
          <li class="nav-item list">
            <a class="nav-link text-white menu" href="{{url('/admin/viewlocations')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-map-marker opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">View Locations</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  submenu list">
        <a class="nav-link text-white menu" href="{{url('admin/content')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-plus opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Add Data</span>
        </a>
        <ul>
          <li class="nav-item list">
            <a class="nav-link text-white menu" href="{{url('/admin/viewdata')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-database" aria-hidden="true"></i>
              </div>
              <span class="nav-link-text ms-1">View Data</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item submenu list">
        <a class="nav-link text-white menu " href="{{url('admin/directory')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-folder" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Add Directory</span>
        </a>
        <ul>
          <li class="nav-item list">
            <a class="nav-link text-white menu " href="{{url('/admin/viewdirectory')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-folder" aria-hidden="true"></i>
              </div>
              <span class="nav-link-text ms-1">View Directory</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{url('admin/permission')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user-secret"></i>
          </div>
          <span class="nav-link-text ms-1">Permissions</span>
        </a>
      </li>
      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{url('/admin/time-card')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Time-Card</span>
        </a>
      </li>
      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{url('/admin/visitors')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="	fas fa-user-circle" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Visitor's log</span>
        </a>
      </li>
      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{url('admin/expectations')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user-secret"></i>
          </div>
          <span class="nav-link-text ms-1">Expectations</span>
        </a>
      </li>
      <li class="nav-item  list">
        <a class="nav-link text-white menu" href="{{url('admin/regions')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-globe"></i>
          </div>
          <span class="nav-link-text ms-1">Area</span>
        </a>
      </li>
      <li class="nav-item submenu list">
        <a class="nav-link text-white menu " href="{{url('admin/details')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Details</span>
        </a>
        <ul>
          <li class="nav-item list">
            <a class="nav-link text-white menu " href="{{url('/admin/admindetail')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-folder" aria-hidden="true"></i>
              </div>
              <span class="nav-link-text ms-1">View Details</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{url('admin/printout_packets')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-print"></i>
          </div>
          <span class="nav-link-text ms-1">Profit / Loss</span>
        </a>
      </li>
      <li class="nav-item submenu list">
        <a class="nav-link text-white menu" href="{{url('admin/access')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user-secret"></i>
          </div>
          <span class="nav-link-text ms-1">User Access</span>
        </a>
        <ul>
        </ul>
      </li>
      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{ url('admin/company-access') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-building" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Company Access</span>
        </a>
      </li>
      <!-- Highlight Tab -->
      <!-- <li class="nav-item list">
        <a class="nav-link text-white menu" href="#">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa fa-highlighter"></i>
          </div>
          <span class="nav-link-text ms-1">Highlights</span>
        </a>
      </li> -->
      <!-- / Highlight Tab -->


      <li class="nav-item list">
        <a class="nav-link text-white menu" href="{{url('/logout')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user-secret"></i>
          </div>
          <span class="nav-link-text ms-1">Logout</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var lis = document.querySelectorAll('.list a');

  for (i = 0; i <= lis.length; i++) {
    if (lis[i].href == window.location.href) {
      lis[i].classList.add('active');
    }
  }
</script>

<style>
  .navbar-vertical.navbar-expand-xs .navbar-collapse {
    height: calc(100vh - 142px);
  }
</style>