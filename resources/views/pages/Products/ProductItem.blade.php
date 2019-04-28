@extends('layouts.master')
@section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Services</li>
            <li class="breadcrumb-item active">{{$product->header}}</li>
        </ol>
    </div>
</div>

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
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <h3>{{$product->header}}</h3>
                  <div class="card-component col-lg-3">
                    <img src="{{asset("images/$product->image1")}}" alt="">
                  </div>

                  <div class="card-component col-lg-3">
                    <img src="{{asset("images/$product->image2")}}" alt="">
                  </div>
                  <div class="card-details">
                    <h4><strong>Price:</strong>{{$product->price}}</h4>
                    <h4><strong>Discount Price:</strong>{{$product->discount_price}}</h4>
                    <p>{{$product->description}}</p>
                  </div>
               </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
@endsection
