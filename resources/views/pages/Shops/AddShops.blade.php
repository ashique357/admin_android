@extends('layouts.master')
@section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Shop</li>
            <li class="breadcrumb-item active">Add Shop</li>
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
                        <form class="form-valide" action="/add-shop" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="">Service Name</label>
                                <div class="input-group input-group-flat col-lg-6">
                                  <select class="form-control {{ $errors->has('service_id') ? ' is-invalid' : '' }}" id="services" name="service_id" required autofocus>
                                    <option>Please select</option>
                                    @foreach($services as $service)
                                      <option value="{{$service->id}}">{{$service->title}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="">Add Shop Name</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Add Image</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="file" class="form-control{{ $errors->has('image1') ? ' is-invalid' : '' }}" name="image1" value="{{ old('image1') }}" required autofocus>
                                    @if ($errors->has('image1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image1') }}</strong>
                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Write Description</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input type="text" name="description" value="" class="form-control">
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
