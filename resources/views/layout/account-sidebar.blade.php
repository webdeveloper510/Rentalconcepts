<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" {{url('/accounting/dashboard')}} " target="_blank">
            <img src="{{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Accounting Panel</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item list">
                <a class="nav-link text-white menu" href="{{url('/accounting/dashboard')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
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
                    <li class="nav-item list">
                        <a class="nav-link text-white menu " href="{{url('/accounting/it-help')}}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </div>
                            <span class="nav-link-text ms-1">IT Help</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item list">
                <a class="nav-link text-white menu" href="{{url('/accounting/logout')}}">
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