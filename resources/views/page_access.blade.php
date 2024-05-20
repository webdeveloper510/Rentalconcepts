@extends('layout.main')
@section('main-content')
<style>
    table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg "style=" width: 77%;
    margin-left: 280px;">
    <div class ="container mt-5">
    <table class ="table table-bordered" id = "menu_permission">
        <thead>
            <th>Managers</th>
           @foreach($title as $t)
            <th>{{$t}}</th>
            @endforeach
            <!-- <th>Bonus Calc</th> -->
        </thead>
        <tbody>        
        @foreach($users as $user)
        <form id = "permission_{{$user->id}}">
        <tr class ="checked_user">
            <td>{{$user->firstname.' '.$user->lastname}}</td>
            <?php
                for($i=0;$i < count($title);$i++){
                    foreach(@$checked as $k => $v){
                        $toggelJson = json_decode($v['options']);                        
                        $toggelJson = get_object_vars($toggelJson);
                        $idData = $v['user_id'];
                        $optionData = $toggelJson;
                        if($user->id ==  $idData) {
                            $checkedData = in_array($title[$i],$optionData) ? 'checked' : '';
                        }
                    }
                    echo'<td><div class="form-check form-switch">
                    <input type="checkbox" data-id="'.$user->id.'" name="menuoptions['. $i + 1 .']"  class="form-check-input collect-checkbox " value ="'.$title[$i].'"'.@$checkedData.'>
                    </div></td>';
                }           
                ?>
        </tr>
        </form>
        @endforeach
        </tbody>
    </table>
    </div>
</main>
<style>
    .form-check{
        min-height: 2.5rem;
    }
    .form-switch .form-check-input:checked {
    border-color: #429d20;
    background-color: #429d20;
}
</style>
<script>
$(document).ready(function(){
$('input[type=checkbox]').change(function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var form = $('#permission_'+id).serialize();
    var form = JSON.stringify(form);
    var form = JSON.parse(form);
    var url = "{{ url('/checked/users/') }}";
        var token = '{{ csrf_token() }}';
        $.ajax({
            url: url,
            data: {
                data: form,
                id:id,
                _token: token,
            },
            type: 'POST',
            success: function(data) {
            }
        });
    });
})
</script>
@endsection