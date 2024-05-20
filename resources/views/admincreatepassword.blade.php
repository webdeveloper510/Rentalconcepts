<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('public/css/style.css'); }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white" style="margin-top:60px;">
                <div class="panel-heading" style="margin-top:30px;">
                    <h3 class="pt-3 font-bold">Create Password</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="{{ url('/admin/changepassword') }}" method="POST">
                        @csrf
                        <div class="form-group py-2">
                            <div class="input-field"><input type="password" placeholder="Enter Password" name="password" id="pass" > <button  type="button" class="btn bg-white text-muted" id ="slash_btn1" > <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> </button></div>
                            @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="email" value="{{ base64_decode($email) }}">
                        <div class="form-group py-1 pb-2">
                            <div class="input-field"><input type="password" placeholder="Confirm Password" name="confirm_password" id="password"> <button  type="button" class="btn bg-white text-muted" id ="slash_btn" > <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> </button> </div>
                            @error('confirm_password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger btn-block mt-3">
                            Submit
                        </button><br>
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
                            $("#slash_btn1").on('click', '.toggle-password', function() {
                                $(this).toggleClass("fa-eye fa-eye-slash");
                                var input = $("#pass");
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