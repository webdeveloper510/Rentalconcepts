<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('public/css/style.css') }}">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <img src="{{URL::asset('public/asset/assets/img/RNR_round_clr-flat.png')}}" class="img text-center">
                    <h3 class="pt-3 font-bold">Login</h3>
                </div>
                <div class="panel-body p-3">
              
                    <form action="{{ url('/forgetpassword') }}"  method="POST">
                        @csrf
                        <!-- <div class="form-group py-2">
                            <select name="dropdown" class=" input-field" style=" width: -webkit-fill-available;">
                                <option value="-1">Select Login As</option>
                                <option>Super Admin</option>
                                <option>Admin</option>
                                <option>Manager</option>
                                <option>Director</option>
                            </select>
                        </div> -->
                        <div class="form-group py-2">
                            <div class="input-field"><input type="email" placeholder="Username or Email" name="email"> </div>
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                       
                     
                        <button type="submit" class="btn btn-danger btn-block mt-3">
                            Send Link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>