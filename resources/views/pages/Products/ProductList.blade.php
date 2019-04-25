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
  @foreach($products as $product)
  <div class="col-lg-4">
      <div class="card">
          <div class="card-body">
              <div class="card-two">
                  <header>
                      <div class="avatar">
                          <img src="{{asset("images/$product->image1")}}" alt="">
                          <img src="{{asset("images/$product->image2")}}" alt="">
                      </div>
                  </header>
                  <h3>{{$product->header}}</h3>
                  <p>{{$product->price}}</p>
                  <p>{{$product->discount_price}}</p>
                  <p>{{$product->description}}</p>
                  <div class="text-center">
                    <a href="/edit/product/{{$product->id}}">
                    <button type="button" name="button" class="btn btn-primary btn-success">Edit</button>
                    </a>
                    <a href="/delete/product/{{$product->id}}">
                    <button type="button" name="button" class="btn btn-primary btn-danger">Delete</button>
                    </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endforeach
</div>

@endsection