@extends('layouts.master')
@section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">Add Product</li>
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
                        <form class="form-valide" action="/add-product" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="">Shop Name</label>
                                <div class="input-group input-group-flat col-lg-6">
                                  <select class="form-control {{ $errors->has('shop_id') ? ' is-invalid' : '' }}" id="shops" name="shop_id" required autofocus>
                                    <option>Please select</option>
                                    @foreach($shops as $shop)
                                      <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="">Add Product Name</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="text" class="form-control{{ $errors->has('header') ? ' is-invalid' : '' }}" name="header" value="{{ old('header') }}" required autofocus>
                                    @if ($errors->has('header'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('header') }}</strong>
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
                                <label class="col-lg-4 col-form-label" for="val-username">Add Image</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="file" class="form-control{{ $errors->has('image2') ? ' is-invalid' : '' }}" name="image2" value="{{ old('image2') }}" required autofocus>
                                    @if ($errors->has('image2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image2') }}</strong>
                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Price</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Discount Price</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input type="text" name="discount_price" value="{{ old('discount_price') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Write Description</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
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
