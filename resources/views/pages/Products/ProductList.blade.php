@extends('layouts.master')
@section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">All Products</li>
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
          <a href="/add-product"><button type="button" class="btn btn-primary btn-lg" name="button" style="float:right;">Add Product</button></a>
          <a href="javascript:history.back()"><button type="button" class="btn btn-primary btn-lg" name="button" onclick="goBack()" style="float:left;">Go Back</button></a>
      </div>
    </div>
  </div>
</div>

<div class="row">
  @foreach($products as $product)
  <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
      <div class="card">
        <a href="/product/{{$product->id}}">
          <img class="card-img-top" src="{{asset("images/$product->image1")}}">
          <div class="card-block">
            <h3>{{$product->header}}</h3> <strong></strong>
            <p><strong>Price:</strong>{{$product->price}}</p>
            @if($product->discount_price > 0)
            <p><strong>Discount Price:</strong>{{$product->discount_price}}</p>
            @endif
            <div class="card-size">
              <p><strong>Description:</strong>{{$product->description}}</p>
            </div>
          </div>
          <div class="btn-group-justified text-center">
            <a href="/edit/product/{{$product->id}}">
            <button type="button" name="button" class="btn btn-sm btn-success" style="margin-bottom:5px;">Edit</button>
            </a>
            <a href="/delete/product/{{$product->id}}">
            <button type="button" name="button" class="btn btn-sm btn-danger" style="margin-bottom:5px;">Delete</button>
            </a>
              @if($product->top == 0)
              <a href="/top/product/{{$product->id}}">
                  <button type="button" name="button" class="btn btn-sm btn-info" style="margin-bottom:5px;">Make Top</button>
              </a>
              @else
              <a href="/cancel/top-product/{{$product->id}}">
                  <button type="button" name="button" class="btn btn-sm btn-dark" style="margin-bottom:5px;">Cancel Top</button>
              </a>
              @endif
          </div>
      </div>
  </div>

  @endforeach
</div>

@endsection
