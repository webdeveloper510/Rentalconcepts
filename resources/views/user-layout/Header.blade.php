<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RentalConcept</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
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
    <!-- Favicons -->
    <link href="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" rel="icon">
    <link href="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Template Main CSS File -->
    <link href="{{URL::asset('public/front-end/assets/css/style.css')}}" rel="stylesheet">
</head>
<script src="{{ URL::asset('public/asset/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<style>
    li.submenu ul {
        z-index: 55555;
    }

    li.nav-item a {
        color: #fff;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.15em;
        display: inline-block;
        padding: 15px 20px;
        position: relative;
    }

    li.nav-item a:after {
        background: none repeat scroll 0 0 transparent;
        bottom: 0;
        content: "";
        display: block;
        height: 2px;
        left: 50%;
        position: absolute;
        background: #fff;
        transition: width 0.3s ease 0s, left 0.3s ease 0s;
        width: 0;
    }

    li.nav-item a:hover:after {
        width: 100%;
        left: 0;
    }

    .drop-down {
        display: none !important;
    }

    .submenu:hover ul.drop-down {
        display: block !important;
    }

    ul.drop-down {
        position: absolute;
        background: #8f2f2f;
    }

    ul li.man {
        display: none;
    }

    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 7px;
        padding-left: 7px;
        font-size: 13px;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #444444;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    /* responsive */



    @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }

        .topnav a.icon {
            float: right;
            display: block;
            background: #8f2f2f;
        }
    }


    @media screen and (max-width: 767px) {
        nav.navbar.navbar-expand-lg {
            display: none;
        }

        li.nav-item.submenu {
            list-style: none;
        }

        form {
            width: 100%;
            margin: 10px auto;
            display: flex;
            justify-content: center;
            float: unset !important;

        }

        .text-center {
            text-align: center !important;
            margin-top: 10px;
            padding-top: 10px;
            padding-bottom: 31px;
        }

        img.img-fluid {
            max-width: 24% !important;
            margin: auto;
        }
    }

    @media screen and (max-width: 768px) {}

    @media screen and (min-width: 768px) and (max-width: 2600px) {
        div#myTopnav {
            display: none;
        }


    }
</style>

<body style="background-color:#f0f2f5" id="loaded">
    <div class="topnav" id="myTopnav" style="background-color:#8f2f2f;">
        <a href="#home" class="active">Home</a>
        <a href="{{url('/user/sales-training')}}" class="nav-link " style=" color: azure;">Profit/Loss</a>
        <a href="{{url('/view-directory')}}" class="nav-link " style=" color: azure;">View-Directory</a>
        <a href="{{url('/video-upload')}}" class="nav-link " style=" color: azure;">Sales Training</a>
        <a href="{{url('user/ratio')}}" class="nav-link " style=" color: azure;">Ratios</a>
        <a href="{{url('user/trends')}}" class="nav-link " style=" color: azure;">Trends</a>
        <a href="#about">About</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
        <a href="{{url('user/view-currentdata')}}" class="nav-link " style=" color: azure;">Customer</a>
        <a href="{{url('users/company')}}" class="nav-link " style=" color: azure;">Company</a>
        <a href="{{url('user/view-details')}}" class="nav-link " style=" color: azure;">Details</a>
        <a href="{{url('user/view-expectations')}}" class="nav-link " style=" color: azure;">Expectations</a>
    </div>
    <nav class="navbar navbar-expand-lg" style="background-color:#8f2f2f;     height: 67px;">
        <div class="container-fluid">
            <ul class="navbar-nav" id="myTopnav">
                @php
                $loginid = base64_encode(Session::get('userloginid'));
                @endphp
                @if(Session::get('userrole')=='Sales Employee')
                <li class="nav-item"> <a href="{{url('/user/sales-training')}}" class="nav-link " style=" color: azure;">Sales Training</a></li>
                <li class="nav-item"> <a href="{{url('/view-directory')}}" class="nav-link " style=" color: azure;">View-Directory</a></li>
                @elseif(Session::get('userrole') == 'Sales Manager')
                <li class="nav-item" style="display: flex;padding:15px;"><a href="{{url('/')}}" class="nav-link" style=" color: azure;"><b>Home</b></a> </li>
                <li class="nav-item"><a href="{{url('/video-upload')}}" class="nav-link " style=" color: azure;">Sales Training</a></li>
                @elseif(Session::get('userrole') =='Director')
                <li class="nav-item" style="display: flex;">
                    <a href="{{url('/')}}" class="nav-link" style=" color: azure;"><b>Home</b></a>
                </li>
                <li class="nav-item"> <a href="{{url('/user/profit-loss-statements')}}" class="nav-link " style=" color: azure;">Profit/Loss</a></li>
                <li class="nav-item"> <a href="{{url('user/ratio')}}" class="nav-link " style=" color: azure;">Ratios</a></li>
                <li class="nav-item"> <a href="{{url('user/trends')}}" class="nav-link " style=" color: azure;">Trends</a></li>
                <li class="nav-item submenu">
                    <a class="nav-link " style=" color: azure;">YTD</a>
                    <ul class="drop-down">
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{url('user/ytdcompare')}}">
                                <span class="nav-link-text ms-1B ">YTD ANALYSIS</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{url('user/ytddate')}}">
                                <span class="nav-link-text ms-1B ">YTDATE</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link " style=" color: azure;">Stats</a>
                    <ul class="drop-down">
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{url('user/view-stats')}}">
                                <span class="nav-link-text ms-1B ">STATS</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{route('statscustomer')}}">
                                <span class="nav-link-text ms-1B ">CUSTOMER</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{route('statsincome')}}">
                                <span class="nav-link-text ms-1B ">INCOME</span>
                            </a>

                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{route('statsgrowth')}}">
                                <span class="nav-link-text ms-1B ">Growth</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{route('statscogs')}}">
                                <span class="nav-link-text ms-1B ">COGS</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="{{route('statgross')}}">
                                <span class="nav-link-text ms-1B ">Gross Profit</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{route('statexp')}}">
                                <span class="nav-link-text ms-1B ">Expenses</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link text-white " href="{{route('statnet')}}">
                                <span class="nav-link-text ms-1B ">Net Income</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item"> <a href="{{url('user/view-currentdata')}}" class="nav-link " style=" color: azure;">Customer</a></li>
                <li class="nav-item"> <a href="{{url('users/company')}}" class="nav-link " style=" color: azure;">Company</a></li>
                <li class="nav-item"> <a href="{{url('user/view-details')}}" class="nav-link " style=" color: azure;">Details</a></li>
                <li class="nav-item"> <a href="{{url('user/view-expectations')}}" class="nav-link " style=" color: azure;">Expectations</a></li>
                <li class="nav-item"> <a href="{{url('user/regions')}}" class="nav-link " style=" color: azure;">Areas</a></li>
                <li class="nav-item"> <a href="{{url('/view-directory')}}" class="nav-link " style=" color: azure;">View-Directory</a></li>
                @elseif(Session::get('userrole') == 'Manager')
                <li class="nav-item" style="display: flex;"> <a href="{{url('/')}}" class="nav-link" style=" color: azure;"><b>Home</b></a></li>
                <li class="nav-item man"> <a href="{{ url('/highlights') }}" class="nav-link " style=" color: azure;">Highlights</a></li>
                <li class="nav-item man"> <a href="{{url('/user/profit-loss-statements')}}" class="nav-link " style=" color: azure;">Profit-Loss</a></li>
                <li class="nav-item man"> <a href="{{url('user/ratio')}}" class="nav-link " style=" color: azure;">Ratios</a></li>
                <li class="nav-item man"> <a href="{{url('user/trends')}}" class="nav-link " style=" color: azure;">Trends</a></li>
                <li class="nav-item man"> <a href="{{url('user/view-details')}}" class="nav-link " style=" color: azure;">Details</a></li>

                <!-- <li class="nav-item"> <a href="#" class="nav-link" style="color: azure;">Stats</a></li> -->

                <li class="nav-item man"> <a href="{{url('user/view-expectations')}}" class="nav-link " style=" color: azure;">Expectations</a></li>
                <li class="nav-item man"> <a href="{{url('user/regions')}}" class="nav-link " style=" color: azure;">Areas</a></li>
                <li class="nav-item man"> <a href="{{url('user/region-new')}}" class="nav-link" style=" color: azure;">Region</a></li>
                <li class="nav-item man"> <a href="{{url('/view-directory')}}" class="nav-link " style=" color: azure;">View-Directory</a></li>
                <li class="nav-item man"> <a href="{{url('user/presentation')}}" class="nav-link " style=" color: azure;">Company</a></li>
                <li class="nav-item man"> <a href="{{url('user/bonus')}}" class="nav-link " style=" color: azure;">Bonus</a></li>
                @endif
                <li class="nav-item"><a style="color: azure" href="{{url('/changepswrd/'.$loginid)}}" class="nav-link">Change Password</a></li>
                <li class="nav-item"><a href="{{url('/userlogout')}}" class="nav-link active">Logout<i class="fa fa-sign-in text-white" style="font-size:18px" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </nav>
</body>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>