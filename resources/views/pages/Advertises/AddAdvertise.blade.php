@extends('layouts.master') @section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Advertise</li>
            <li class="breadcrumb-item active">Add Advertise</li>
        </ol>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block col-lg-12">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif

<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-block">
          <a href="javascript:history.back()"><button type="button" class="btn btn-primary btn-lg" name="button" onclick="goBack()" style="float:left;">Go Back</button></a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="/add-advertise" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Add Advertise</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="file" class="form-control{{ $errors->has('advertise') ? ' is-invalid' : '' }}" name="advertise" value="{{ old('advertise') }}" required autofocus> @if ($errors->has('advertise'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('advertise') }}</strong>
                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
