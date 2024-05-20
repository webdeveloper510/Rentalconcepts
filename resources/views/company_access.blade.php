@extends('layout.main')
@section('main-content')

<style>
table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="margin-left: 280px;">
<h3 class="text-center mt-3">Company Access</h3>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <form class="my-auto" method="post" action="{{ url('admin/company-access-resp') }}">
                        @csrf
                        <table class="table table-bordered" style="    display: table;">
                            <thead>
                                <th><b>Directors</b></th>
                                @foreach($title as $t)
                                <th>{{$t}}</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @foreach($Directors as $director)
                                <?php  
      $company = App\Models\Company_access::where('director_id',$director->id)->first();
?>
                                    <tr>
    <td>{{ $director->firstname.' '.$director->lastname }}</td>
   
    @foreach($title as $key => $value)
        <td>
            <div class="form-check form-switch">
                <input type="radio" class="form-check-input collect-checkbox" name="directors_{{$director->id}}" value="{{$value}}" {{(isset($company) && $value == $company->company ) ? 'checked':''}}>
            </div>
        </td>
    @endforeach
    <td>
        <div class="form-check form-switch">
            <input type="radio" class="form-check-input collect-checkbox" name="directors_{{$director->id}}" value="" {{(empty($company) || empty($company->company)) ? 'checked':''}}>
            <label class="form-check-label">None</label>
        </div>
    </td>
</tr>


                                @endforeach
                            </tbody>
                        </table>
                        <input type="submit" value="Submit" class="btn btn-primary" style="float: right;">
                </form>
            </div>
           <div class="col-md-12">
                <form class="my-auto" method="post" action="{{ url('admin/manager-company-access') }}">
                    @csrf
                    <table class="table table-bordered" style="display: table;">
                        <thead>
                            <tr>
                                <th><b>Managers</b></th>
                                @foreach($title as $t)
                                    <th>{{$t}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Managers as $manager)
                                <tr>
                                    <?php 
                                $company_m = App\Models\Company_access::where('director_id',$manager->id)->first();
?>
                                    <td>{{ $manager->firstname.' '.$manager->lastname }}</td>
                                    @foreach($title as $t)
                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input collect-checkbox"
                                                    name="managers_{{$manager->id}}[]" value="{{$t}}"
                                                    {{ (isset($company_m) && in_array($t, explode(',', $company_m->company))) ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="submit" value="Submit" class="btn btn-primary" style="float: right;">
                </form>

            </div>
        </div>
    </div>
</main>
<style>
.form-check {
    min-height: 2.5rem;
}

.form-switch .form-check-input:checked {
    border-color: #429d20;
    background-color: #429d20;
}
</style>
@endsection