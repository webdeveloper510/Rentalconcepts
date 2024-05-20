@extends('layout.main')
@section('main-content')
<div class="container mt-5">
    <div class="row mts-5">
        <div class="col-lg-7 mx-auto">
            <div class="container">
                <form method="POST" action="{{url('admin/details')}}" method="post" id="myForm" enctype="multipart/form-data" class="add-location-form" role="form" style="height: 381px; top:50%">
                    @if(session()->has('message'))
                    <div class="alert alert-success text-white" style="font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @csrf
                    <div class=" text-center">
                        <h1 class="text-secondary mt-2">Details</h1>
                    </div>
                    <div class="controls">
                                <div class="form-group">
                                    <label>Select Location</label>
                                    <select class="form-control" id="location" name="location">
                                        <option class="form-control" selected disabled>Choose Location</option>
                                        @foreach($location as $loca)
                                        <option class="form-control" value="{{$loca->locationid}}" {{ ( $loca->locationid == @$loc) ?'selected':''}}>{{$loca->location}} </option>
                                        @endforeach
                                    </select>
                                    @error('location')
                                    <div style="color:red; font-size: smaller;    margin-left: 5px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label>Upload File:</label>
                                    <input type="file" name="file" class="form-control" >
                                    @error('file')
                                    <div style="color:red;  font-size: smaller;   margin-left: 5px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label>Select Month</label>
                                    <div class="input-group date datepickerr ">
                                        <input type="text" class="form-control" id="date" name="date" placeholder="Select Date" value="" />
                                        <span class="input-group-append">
                                            <span class="input-group-text  d-block" style="width: 45px;height: 38px;margin-right: -2px;">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                    @error('date')
                                    <div style="color:red;  font-size: smaller;   margin-left: 52px;">{{ $message }}</div>
                                    @enderror
                                </div>
                        <div class="row mt-2  text-center">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-danger btn-send " value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    $('#location').change(function() {
        var locval = $('#location').val();
        var url = "{{ url('/admin/getloc') }}";
        var token = '{{ csrf_token() }}';
        $.ajax({
            url: url,
            data: {
                location_id: locval,
                _token: token,
            },
            type: 'POST',
            success: function(data) {
                // alert('hy');
                console.log(data);
            }
        });
    });
</script> -->
@endsection