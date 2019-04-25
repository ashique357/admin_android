@extends('layouts.master') @section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Services</li>
            <li class="breadcrumb-item active">Add Services</li>
        </ol>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block col-lg-12">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="/add-service" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="">Add Service Title</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus> @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Add Thumbnail</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="file" class="form-control{{ $errors->has('thumbnail') ? ' is-invalid' : '' }}" name="thumbnail" value="{{ old('thumbnail') }}" required autofocus> @if ($errors->has('thumbnail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
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
