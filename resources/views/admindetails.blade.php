@extends('layout.main')
@section('main-content')
<form method="post" action="{{ url('/showusers') }}">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5" style=" width: 70%;margin-left: 322px;">

        <div class=" text-center">
            <h1>View Details</h1>
        </div>
         @if(Session::has('success'))
            <p class="alert  text-white" style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">{{ Session::get('success') }}</p>
        @endif
         @if(Session::has('info'))
            <p class="alert  text-white" style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">{{ Session::get('info') }}</p>
        @endif
        <table id="example" class="table table-striped  text-center" style="width:100% ;border:10px">
            <thead>
                <tr>
                    <!--<th>Id</th>-->
                    <th>Name</th>
                    <th>Location</th>
                    <th>Month</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              
                @foreach($details as $users)
                <tr>
                @php
                $file=$users->filename;
$filename=explode('.',$file);
            $date =$users->date;
            $month = explode('-', $date);
            $month_no = $month[0];
            $year = $month[1];
            $monthName = date("F", mktime(0, 0, 0, $month_no, 10));
            @endphp
                    <!--<td>{{$users->id}}</td>-->
                    <td>{{$filename[0]}}</td>
                    <td>{{App\Models\Location::where('locationid',$users->location)->get()->pluck('location')[0]}}</td>
                    <td>{{$monthName}} {{$year}}</td>
                      @php 
                      $userid = base64_encode($users->id);
                    @endphp
                    <?php  $loc=explode('public_html',$users->file_location);?>
                   
                    <td>
                    <a href="{{ url('/delete-detail',$users->id) }}" class='btn btn-danger'><i class="fa fa-trash text-white trashicon" ></i></a>
                   <a href='{{ route("download",$loc[1])}}' class='btn btn-primary'><i class="fa fa-download" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</form>
</main>
<style>
    .fa {
    display: inline-block;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
@endsection