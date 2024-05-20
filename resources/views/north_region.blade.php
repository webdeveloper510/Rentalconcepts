@extends('layout.main')
@section('main-content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style=" width: 70%;
    margin-left: 322px;">
    <input type="hidden" id="nregion" value="{{$selectedregion->north_loc}}">
    <input type="hidden" id="sregion" value="{{$selectedregion->south_loc}}">
    <div class="form-group py-2 mt-3 container-box">
        <form method="post" actio="{{url('admin/regions')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <h4 class="  mt-5 mb-4">North Region</h4>
                    @foreach($location as $loc)
                    <div class="form-check ">
                        <label class="form-check-label" style="font-weight:600">
                            <input class="form-check-input checkbox_value" type="checkbox" name="north_region[]" value="{{$loc->locationid}}">
                            {{$loc->location}}
                        </label>
                    </div>
                    @endforeach
                    @error('north_region')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <h4 class="mt-5 mb-4">South Region</h4>
                    @foreach($location as $loc)
                    <div class="form-check">
                        <label class="form-check-label" style="font-weight:600">
                            <input class="form-check-input checkbox_value" type="checkbox" name="south_region[]" value="{{$loc->locationid}}">
                            {{$loc->location}}
                        </label>
                    </div>
                    @endforeach
                    @error('south_region')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-danger" style="    margin-left: 429px;
    width: 22%;">
        </form>

    </div>

</main>

<script>
    // $("input:checkbox").on('click', function() {
    //     var $box = $(this);
    //     if ($box.is(":checked")) {
    //         var group = "input:checkbox[name='" + $box.attr("name") + "']";
    //         $(group).prop("checked", false);
    //         $box.prop("checked", true);
    //     } else {
    //         $box.prop("checked", false);
    //     }
    // });
</script>
<style>
    .form-check {
        display: -webkit-inline-box !important;
        min-height: 1.5rem;
        width: 38%;
        padding-left: 1.5em;
        margin-bottom: .125rem;
    }

    h4 {
        margin-left: 122px !important;
    }

    .container-box {
        /* border-radius: 11px;
    box-shadow: 0 0 24px rgb(8 7 16 / 60%);  */
        width: 100%;
        margin-left: 27px;
        height: 97%;
        max-height: 700px;
        margin-bottom: 10px;
    }

    .main-content {
        padding-top: 20px !important;
    }

    /* label.form-check-label {
    width: 100%;
} */

    @media only screen and (min-width: 320px) and (max-width: 767px) {

        .g-sidenav-show:not(.rtl) .sidenav {
            width: 100%;
            transform: revert;
        }

        .form-check {
            display: -webkit-inline-box !important;
            min-height: 1.5rem;
            width: 47%;
            padding-left: 1.5em;
            margin-bottom: 0.125rem;
        }

        .container-box {
            width: 100% !important;
            margin-left: 0px !important;
            height: 97%;
            max-height: 700px;
            margin-bottom: 10px;
        }

        main.main-content.position-relative.max-height-vh-100.h-100.border-radius-lg.ps.ps--active-x.ps--active-y {
            margin-left: 0px !important;
            width: 100% !important;
        }

        .g-sidenav-show:not(.rtl) .sidenav {
            width: 100%;
            transform: revert;
        }


    }




    @media only screen and (min-width: 768px) and (max-width:992px) {


        .form-check {
            display: -webkit-inline-box !important;
            min-height: 1.5rem;
            width: unset;
            padding-left: 1.5em;
            margin-bottom: 0.125rem;
        }

        h4 {
            margin-left: 41px !important;
        }


        .mb-4 {
            font-size: 21px;
            text-align: center;
            display: flex;
        }

        sidenav-show:not(.rtl) .sidenav {
            transform: revert;
        }

        .container-box {
            margin-left: 0px;

        }

    }

    @media only screen and (min-width: 1024px) and (max-width:1100px) {
        .form-check {
            display: -webkit-inline-box !important;
            min-height: 1.5rem;
            width: 58%;
            padding-left: 1.5em;
            margin-bottom: 0.125rem;
        }

        h4 {
            margin-left: 29px !important;
        }


    }

    @media (max-width: 1199.98px) {
        .g-sidenav-show:not(.rtl) .sidenav {
            /* transform: translateX(-17.125rem); */
            transform: revert;
        }
    }
</style>
<script>
    $(document).ready(function() {
        var nval = $('#nregion').val().split(',');
        var sval = $('#sregion').val().split(',');
        jQuery.each(nval, function(index, value) {
            $("input[name= 'north_region[]']").each(function() {
                var checkval = $(this).val();
                if (checkval == value) {
                    $(this).attr("checked", "checked");
                } 
            });
            jQuery.each(sval, function(index, value) {
                $("input[name= 'south_region[]']").each(function() {
                    var checkvalu = $(this).val();
                    if (checkvalu == value) {
                        $(this).attr("checked", "checked");
                    }
                });

            });
        });
    });
</script>






@endsection