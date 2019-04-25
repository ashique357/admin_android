@extends('layouts.master')
@section('body_component')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Services</li>
            <li class="breadcrumb-item active">All Services</li>
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
  @foreach($services as $service)
  <div class="col-lg-4">
      <div class="card">
          <div class="card-body">
              <div class="card-two">
                  <header>
                      <div class="avatar">
                          <img src="{{asset("images/$service->thumbnail")}}" alt="">
                      </div>
                  </header>
                  <h3>{{$service->title}}</h3>
                  <div class=".btn-group text-align-center">

                    <a href="/edit/service/{{$service->id}}">
                    <button type="button" name="button" class="btn btn-primary btn-success">Edit</button>
                    </a>

                    <a href="/delete/service/{{$service->id}}" class="delete">
                    <button type="button" name="button" class="btn btn-primary btn-danger">Delete</button>
                    </a>

                    <a href="/new/service/{{$service->id}}">
                    <button type="button" name="button" class="btn btn-primary btn-success">Mark as New Service</button>
                    </a>

                    <a href="/cancel/new-service/{{$service->id}}">
                    <button type="button" name="button" class="btn btn-primary">Cancel New Service</button>
                    </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endforeach
</div>

@endsection
