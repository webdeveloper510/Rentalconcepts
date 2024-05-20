@extends('layout.main')
@section('main-content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="    width: 70%;
    margin-left: 322px;">

    @if(Session::has('success'))
    <div class="alert alert-success mt-3 text-white" id="flash">
        {{ Session::get('success') }}
        <span class="close closediv" style=" float: right;font-size: xx-large;margin-top: -14px;cursor: pointer;">&times;</span>
        <button class="btn btn-info click" style="float:right; margin-top:-6px; margin-right: 20px;" data-toggle="modal" data-target="#myModal">Click here!</button>
    </div>
    @endif
    @if(Session::has('danger'))
    <div class="alert alert-success mt-3 text-white" id="flash">
        {{ Session::get('danger') }}
        <!-- <span class="close closediv" style=" float: right;font-size: xx-large;margin-top: -14px;cursor: pointer;">&times;</span> -->
    </div>
    @endif
    <div class="container-fluid" style=" margin-top: 49px; ">
    <form method="post" action="{{url('/admin/printout_packets')}}">
        @csrf
        <div class="row">
            <div class="col-6 mt-5">
                <label> Select Date</label>
                <div class="input-group date datepickerr" style="width: 50%;">
                    <input type="text" class="form-control" id="datee" name="date" value="" />
                    <span class="input-group-append">
                        <span class="input-group-text  d-block" style=" width: 45px;height: 38px;margin-right:-2px;">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
            @error('date')
            <div style="color:red; font-weight: 500;">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="container mt-3">
                <legend class="text-center">Select Location</legend>
                <div>
                    <ul class="checkbox">
                        @foreach($location as $loc)
                        <li><input type="checkbox" value="{{$loc->locationid}}" name='location'>
                            <label class="font-weight-bold">{{$loc->location}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @error('location')
            <div style="color:red; font-weight: 500;">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mt-5">
            <input type="submit" class="btn btn-primary" value="Submit" style=" width: 25%; margin-left: 408px;" id="sbmt">
        </div>
    </form>
    </div>
 
</main>



<style>

    ul.checkbox {
        margin: 0;
        padding: 0;
        margin-left: 20px;
        list-style: none;
    }

    ul.checkbox li input {
        margin-right: .25em;
    }

    ul.checkbox li {
        border: 1px transparent solid;
        float: left;
        min-width: 195px;
    }

    .header {
        text-align: center;
        font-size: 25px;
        text-decoration: underline;
        color: #FFAA00;
    }
</style>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <a href="{{url('/admin/downloadpdf',@$fileName)}}" class="btn btn-danger modlclos" style="margin-left: 116px; width: 117px;">Download PDF</a>
                <a href="{{url('/admin/downloadexcel',@$xlsfileName)}}" class="btn btn-success modlclos" style=" width: 117px;">Download Excel</a> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.min.js" integrity="sha512-Bkf3qaV86NxX+7MyZnLPWNt0ZI7/OloMlRo8z8KPIEUXssbVwB1E0bWVeCvYHjnSPwh4uuqDryUnRdcUw6FoTg==" crossorigin="anonymous"></script>
<script>
    $("input:checkbox").on('click', function() {
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
    $('.closediv').click(function() {
        $('#flash').hide();
    });
    $('.modlclos').click(function() {
        $('.close').trigger('click');
    });
    
</script>
@endsection