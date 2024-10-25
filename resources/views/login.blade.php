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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head> 



<body style="height:92vh">
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <img src="{{URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}" class="img text-center">
                        <h3 class="pt-3 font-bold">Admin Login</h3>
                    </div>
                    <div class="panel-body p-3">
                        @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                        @endif
                        <form action="{{ url('admin') }}" method="POST">
                            @csrf
                            <div class="form-group py-2">
                                <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" placeholder="Enter your Email" name="name"> </div>
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field"> <span class="fas fa-lock px-2"></span> <input type="password" id="password" placeholder="Enter your Password" name="password"> <button type="button" id="slash_btn" class="btn bg-white text-muted"> <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> </button> </div>
                                @error('password')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inline"> <a href="{{ url('/admin/forgetemail') }}" id="forgot" class="font-weight-bold">Forgot password?</a> </div>
                            <button type="submit" class="btn btn-danger btn-block mt-3">
                                Login
                            </button>
                        </form>
                        <script>
                            $("#slash_btn").on('click', '.toggle-password', function() {
                                $(this).toggleClass("fa-eye fa-eye-slash");
                                var input = $("#password");
                                if (input.attr("type") === "password") {
                                    input.attr("type", "text");
                                } else {
                                    input.attr("type", "password");
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>