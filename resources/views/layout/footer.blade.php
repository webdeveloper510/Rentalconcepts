<script src="{{ URL::asset('public/asset/assets/js/core/popper.min.js') }}"></script>
<script src="{{ URL::asset('public/asset/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('public/asset/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('public/asset/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('public/asset/assets/js/plugins/chartjs.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function handleClick(id){
        var location_id = $(this).attr('value');
        var User_id = jQuery('#selectuser').val();
        var url = "{{url('/admin/permission')}}";
        var token = '{{ csrf_token() }}';
        var checked = $('#' + id).is(':checked');
        if(checked == true){
            allowed  = 1;
        }
        else{
            allowed = 0;
        }
        $.ajax({
                url: url,
                data: {
                    location_id: id,
                    User_id: User_id,
                    _token: token,
                    allowed: allowed
                },
                type: 'POST',
                success: function(data) {
                    //   console.log(data);
                }
            });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function() {
        $(".datepickerr").datepicker({
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });
    });
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ URL::asset('public/asset/assets/js/material-dashboard.min.js?v=3.0.2') }}"></script>
<!-- table-view -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- end-table -->
<script src="{{ URL::asset('public/js/table.js') }}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<!-- create page -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function() {
   var id= $(".grphval").val();
   var attribute=id.split(',');
//    console.log(attribute);
  for(var i=0; i<attribute.length; i++)
  {   
    $('input[value=' + attribute[i] + ']').attr("checked","checked");
  }
  });
</script>
<!-- permission -->
<script>
    $('#selectuser').on('change', function() {
        $('.defaultloc').empty();
        $("#checked_fields").load(location.href + " #checked_fields");
        var selectVal = $("#selectuser option:selected").val();
        var User_id = jQuery('#selectuser').val();
        var url = "{{ url('/checked/permission/') }}";
        var token = '{{ csrf_token() }}';
        ///hit ajax to get all the location Id where allow = 1
        $.ajax({
            url: url,
            data: {
                User_id: User_id,
                _token: token,
            },
            type: 'POST',
            success: function(data) {
                // console.log(data);
                var datas = $.parseJSON(data);
                console.log(datas);
                if (datas.length == 0) {
                    // console.log("0");
                    // $('#checked_fields').find('input[type="checkbox"]').each(function() {
                        $('input[name="checked_permiss"]').each(function() {
                        $(this).removeAttr("checked", "checked");
                    })
                }
                jQuery.each(datas, function(index, value) {
                    // console.log(index, value);
                    var location_Id = value.locationid;
                    var count = 0;
                    // $('#checked_fields').find('input[name="checked_permiss"]').each(function() {
                        $('input[name="checked_permiss"]').each(function() {
                        count += 1
                        var allLocationIds = $(this).val();
                        if (location_Id == allLocationIds) {
                            // alert('done');
                            setTimeout(function() {
                                $('input[value=' +
                                    allLocationIds + ']').each(
                                    function() {
                                        $(this).attr("checked",
                                            "checked");
                                    });
                            }, 500);
                        } else {
                            $('input[value=' +
                                allLocationIds + ']').each(function() {
                                // $(this).attr("checked", "checked");
                                $(this).removeAttr("checked",
                                    "checked");
                            });
                        }
                    });
                });
                if (datas.length > 0) {
                    setTimeout(function() {
                        for (var i = 0; i < datas.length; i++) {
                            var locationIds = datas[i].location;
                            // console.log(datas[i].location);
                            $('.defaultloc').append('<option class="form-control" value="' + datas[i].locationid + '">' + locationIds + '</option>');
                        }
                    }, 100);
                }
                $('.defaultloc').on('change', function() {
                    var default_loc = $('.defaultloc').val();
                    var locurl = "{{url('/user/default_loc/') }}";
                    var token = '{{ csrf_token() }}';
                    $.ajax({
                        url: locurl,
                        data: {
                            locid: default_loc,
                            _token: token,
                            usr_id: User_id,
                        },
                        type: 'POST',
                        success: function(data) {
                                // console.log(data);
                        }
                    });
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
    $('#tabl').DataTable({
        "bLengthChange": false,
        "bPaginate": true,
        scrollX: true,
        info: false,
        "searching": false
    });
    $('#tblProfit').DataTable();
});
</script>
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