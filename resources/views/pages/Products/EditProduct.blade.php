@extends('layouts.master')
@section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ol>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
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
                        <form class="form-valide" action="/edit/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="">Shop Name</label>
                                <div class="input-group input-group-flat col-lg-6">
                                  <input type="text" name="shop_id" class="form-control" value="{{$product->shop->name}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="">Product Name</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="text" class="form-control{{ $errors->has('header') ? ' is-invalid' : '' }}" name="header" value="{{ $product->header }}" required autofocus>
                                    @if ($errors->has('header'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('header') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Image1</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="file" class="form-control" name="image1" value="{{ $product->image1 }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Image2</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input id="" type="file" class="form-control" name="image2" value="{{ $product->image2 }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Price</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input type="text" name="price" class="form-control" value="{{ $product->price }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Discount Price</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input type="text" name="discount_price" value="{{ $product->discount_price }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Write Description</label>
                                <div class="input-group input-group-flat col-lg-6">
                                    <input type="text" name="description" value="{{$product->description}}" class="form-control">
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
