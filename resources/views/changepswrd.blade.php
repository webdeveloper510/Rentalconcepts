<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}">
    <link rel="icon" type="image/png" href="{{ URL::asset('public/asset/assets/img/RNR_round_clr-flat.png') }}">
    <title>
        RentalConcepts
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('public/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
   
</head>

<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <a href="{{url('/')}}"><img src="{{URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}" class="img text-center"></a>
                    <h3 class="pt-3 font-bold">Change Password</h3>
                </div>
                <div class="panel-body p-3">
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>



                    @endif
                    @php
                    $loginid = base64_encode(Session::get('userloginid'));
                    @endphp
                    <form action="{{ url('/changepswrd/'. $loginid) }}" method="POST">


                        @csrf
                        <div class="form-group py-2">
                            <div class="input-field"><input type="password" class="first-name" placeholder="Enter old password" name="oldpassword"><button type="button"  class="btn bg-white text-muted slash_btn"> <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> </button></div>
                            @error('oldpassword')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group py-1 pb-2">
                            <div class="input-field"> <input type="password" class="sec-name" placeholder="Enter new password" name="newpassword"><button type="button"  class="btn bg-white text-muted slash_btn1"> <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> </button></div>
                            @error('newpassword')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field"> <input type="password" class="third-name" placeholder="Enter password confirmation" name="password_confirmation"><button type="button"  class="btn bg-white text-muted slash_btn2"> <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> </button> </div>
                            @error('password_confirmation')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-danger btn-block mt-3">
                            Update
                        </button>
                        <a href="{{url('/')}}"><button type="button" class="btn btn-secondary btn-block mt-3" style="border-radius: 15px;">
                            Back to Home
                        </button></a>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        @if(session()->has('info'))
                        <div class="alert alert-success">
                            {{ session()->get('info') }}
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".slash_btn").on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(".first-name");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $(".slash_btn1").on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(".sec-name");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $(".slash_btn2").on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(".third-name");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>