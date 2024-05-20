 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="apple-touch-icon" sizes="76x76" href="{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}">
     <link rel="icon" type="image/png" href="{{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png') }}">
     <title>
         RentalConcepts
     </title>
     <!--     Fonts and icons     -->

     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
     <!-- Nucleo Icons -->
     <link href="{{URL::asset('public/asset/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
     <link href="{{ URL::asset('public/asset/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
     <!-- Font Awesome Icons -->
     <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
     <!-- Material Icons -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
     <!-- CSS Files -->
     <link id="pagestyle" href="{{ URL::asset('public/asset/assets/css/material-dashboard.css?v=3.0.2')}}" rel="stylesheet" />
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 </head>

 <body class="g-sidenav-show  bg-gray-200">
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
                     <a class="nav-link text-white active " href="{{url('/admin/dashboard')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">dashboard</i>
                         </div>
                         <span class="nav-link-text ms-1">Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-item submenu list">
                     <a class="nav-link text-white " href="{{url('admin/newuser')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">table_view</i>
                         </div>
                         <span class="nav-link-text ms-1">Create User</span>
                     </a>
                     <ul>
                         <li class="nav-item list">
                             <a class="nav-link text-white " href="{{url('admin/viewusers')}}">
                                 <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="fa fa-database" aria-hidden="true"></i>
                                 </div>
                                 <span class="nav-link-text ms-1">View Users</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item submenu list">
                     <a class="nav-link text-white " href="{{url('admin/addlocation')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fa fa-map-marker opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Add Location</span>
                     </a>
                     <ul>
                         <li class="nav-item list">
                             <a class="nav-link text-white " href="{{url('/admin/viewlocations')}}">
                                 <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="fa fa-map-marker opacity-10"></i>
                                 </div>
                                 <span class="nav-link-text ms-1">View Locations</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item  submenu list">
                     <a class="nav-link text-white " href="{{url('admin/content')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fas fa-plus opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Add Data</span>
                     </a>
                     <ul>
                         <li class="nav-item list">
                             <a class="nav-link text-white " href="{{url('/admin/viewdata')}}">
                                 <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="fa fa-database" aria-hidden="true"></i>
                                 </div>
                                 <span class="nav-link-text ms-1">View Data</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item submenu list">
                     <a class="nav-link text-white " href="{{url('admin/directory')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fa fa-folder" aria-hidden="true"></i>
                         </div>
                         <span class="nav-link-text ms-1">Add Directory</span>
                     </a>
                     <ul>
                         <li class="nav-item list">
                             <a class="nav-link text-white " href="{{url('/admin/viewdirectory')}}">
                                 <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="fa fa-folder" aria-hidden="true"></i>
                                 </div>
                                 <span class="nav-link-text ms-1">View Directory</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item list">
                     <a class="nav-link text-white " href="{{url('admin/permission')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fas fa-user-secret"></i>
                         </div>
                         <span class="nav-link-text ms-1">Permissions</span>
                     </a>
                 </li>
                 <li class="nav-item list">
                     <a class="nav-link text-white " href="{{url('/admin/time-card')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fa fa-credit-card" aria-hidden="true"></i>
                         </div>
                         <span class="nav-link-text ms-1">Time-Card</span>
                     </a>
                 </li>
                 <li class="nav-item list">
                     <a class="nav-link text-white " href="{{url('/admin/visitors')}}">
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
                 <li class="nav-item list">
                     <a class="nav-link text-white menu" href="{{url('admin/details')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fas fa-user-secret"></i>
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
                 <li class="nav-item  list">
                     <a class="nav-link text-white menu" href="{{url('admin/regions')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fa fa-globe"></i>
                         </div>
                         <span class="nav-link-text ms-1">Regions</span>
                     </a>
                 </li>
                 <li class="nav-item list">
                     <a class="nav-link text-white menu" href="{{url('admin/printout_packets')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fas fa-user-secret"></i>
                         </div>
                         <span class="nav-link-text ms-1">Print-out</span>
                     </a>
                 </li>
                 <li class="nav-item list">
                     <a class="nav-link text-white menu" href="{{url('admin/access')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fas fa-user-secret"></i>
                         </div>
                         <span class="nav-link-text ms-1">User Access</span>
                     </a>
                 </li>
                 <li class="nav-item list">
                     <a class="nav-link text-white bg-gradient-primary" href="{{url('/logout')}}">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="fa fa-user me-sm-1"></i>
                         </div>
                         <span class="nav-link-text ms-1">Sign Out</span>
                     </a>
                 </li>
             </ul>
         </div>
     </aside>
     <div class="container mt-5">
         <div class="row mts-5">
             <div class="main" style="width: 100%;
    display: flex;
">


                 <div class="container1" style="width: 30%;    margin-top: 138px;">

                     <form method="POST" action="{{url('/admin/revenuefile')}}" enctype="multipart/form-data" class="fileup-form" style="height: 403px;
                            margin-left: 388px;
                            border-radius: 10px;
                            box-shadow: 0 0 40px rgb(8 7 16 / 60%);
                            width: 141%;
                            margin-top: -31%;">
                         @if(session()->has('message'))
                         <div class="alert alert-danger text-white" style="
                            margin-left: 115px;
                             margin-top: 28px;
                            position: absolute;
                            font-size: smaller; background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));">
                             {{ session()->get('message') }}
                         </div>
                         @endif
                         @csrf
                         <div class="form-group">
                             <!-- <label style="font-weight:400; margin-left: 131px;"><b>Upload File</b></label> -->
                             <h1 class="text-center" style="padding-top: 101px;">Upload File</h1>
                             <input type="file" name="file" class="form-control" style=" width: 88%;margin-left: 33px;margin-top: 10%;">
                             @error('file')
                             <div style="color:red;    margin-left: 19px;">{{ $message }}</div>
                             @enderror
                         </div>
                         <input type="submit" class="btn btn-secondary pt-2 btn-send" value="Submit" style="margin-top:15px; width: unset;     margin-left: 218px;">
                 </div>
                 </form>
             </div>
         </div>
     </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
     <script>
         $(function() {
             $("#datepicker").datepicker({
                 format: "yyyy-mm",
                 startView: "months",
                 minViewMode: "months"
             });
         });
     </script>
     <script>
         var lis = document.querySelectorAll('.list a');
         for (i = 0; i <= lis.length; i++) {
             if (lis[i].href == window.location.href)
                 lis[i].classList.add('active');
         }
     </script>
 </body>