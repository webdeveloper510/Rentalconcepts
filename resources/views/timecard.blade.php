@extends('layout.main')
@section('main-content')

<div class="container mt-5">
    <div class="row mts-5">
        <div class="col-lg-7 mx-auto">
            <div class="container">
                <form method="POST" action="{{url('/admin/time-card')}}" enctype="multipart/form-data" class="add-location-form" role="form" style="height: 383px; top:50%">
                    @if(session()->has('message'))
                    <div class="alert alert-success text-white" style="
    font-size: smaller;    background-image: linear-gradient(195deg, #dc3545 0%, rgb(190 55 55));
">
                        {{session()->get('message') }}
                    </div>
                    @endif
                    @csrf
                    <div class=" text-center">
                        <h1 class="text-secondary mt-3">Add File</h1>
                    </div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="file" name="file" class="form-control" style="      margin-top: 42px;  margin-left: 78px;
    width: 72%;" />
                                    @error('file')
                                    <div style="    color: red;
    font-weight: 500;
    font-size: medium;
    margin-left: 78px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5  text-center">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-secondary pt-2 btn-send" name="action" value="Individual lines" style="
    width: 80%;    margin-left: 47px;
" />
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-secondary pt-2 btn-send" name="action" value="Daily Totals" style="
    width: 80%;    margin-right: 48px;
" />
                            </div>

                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection