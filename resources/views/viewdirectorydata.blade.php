 @extends('user-layout.Main')
 @section('main-content')
 <head>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.css" />
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.css" />
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
 </head>
 <div class="container text-center" style=" margin-left: 5px;">
     <a href="{{url('/')}}"><img src="{{URL::asset('public/front-end/assets/img/RNR_round_clr-flat.png')}}" alt="" class="img-fluid" style="max-width: 8%;height: auto;margin-left: -31px;"></a>
     <h3 style="    float: left;
    margin-top: 46px;
    margin-left: 24px;
">View Directory</h3>
 </div>

 <div style="margin: 20px;">
     <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

             <table id="table-loc" class="table-striped table-bordered text-center display dataTable cell-border " style="width:100%">
                 <thead>
                     <tr>
                         <th>Location Id</th>
                         <th>Manager</th>
                         <th>Phone</th>
                         <th>Fax</th>
                         <th>Location</th>
                         <th>Regional</th>
                         <th>Email</th>
                         <th>Director</th>
                         <th>Mgr Mobile</th>
                     </tr>
                 </thead>

                 @foreach($datas as $data)
                 <tr>
                     <td>{{$data->locationid}}</td>
                     <td>{{$data->manager}}</td>
                     <td>{{$data->phone}}</td>
                     <td>{{$data->fax}}</td>
                     <td>{{$data->location}}</td>
                     <td>{{$data->regional}}</td>
                     <td>{{$data->email}}</td>
                     <td>{{$data->director}}</td>
                     <td>{{$data->mobile}}</td>
                     @php
                     $dataid = base64_encode($data->id);
                     @endphp
                 </tr>
                 @endforeach
             </table>

         </div>

         @endsection