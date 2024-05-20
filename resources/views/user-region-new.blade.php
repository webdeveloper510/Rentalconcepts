@extends('user-layout.Main')
@section('main-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<div class="container text-center">
    <a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;margin-left: -31px;"></a>
    <h3 style="float: left;margin-top: 46px;margin-left: 24px;">Region-Data</h3>
    <div class='row mt-5'>
        <div class="col-md-12">
            <table id="region-table" class="display">
                <thead>
                    <tr>
                        <th>Region Name</th>
                        <th>Regional Manager</th>
                        <th>Customer</th>
                        <th>Deliveries</th>
                        <th>Total Income</th>
                        <th>Past Due Account Charge Off %</th>
                        <th>Net Income</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $region_names[0] }}</td>
                        <td>...</td>
                        <td>
                            @if($sum == 0) -
                            @else{{number_format($sum)}}
                            @endif
                        </td>
                        <td>
                            @if($dsum == 0)
                            -
                            @else{{number_format($dsum)}}
                            @endif
                        </td>
                        <td>
                            @if($revsum == 0)
                            -
                            @else{{number_format($revsum)}}
                            @endif
                        </td>
                        <td>
                            @if($revsum == 0)
                            -
                            @else{{number_format(($pastd/$revsum)*100)}}%
                            @endif
                        </td>
                        <td>
                            @if($netin == 0)
                            -
                            @else{{number_format($netin)}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $region_names[1] }}</td>
                        <td>...</td>
                        <td>
                            
                        </td>
                        <td>
                           
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#region-table').DataTable();
    });
</script>
@endsection