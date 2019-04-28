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
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-block">
          <a href="/add-advertise"><button type="button" class="btn btn-primary btn-lg" name="button" style="float:right;">Add Advertise</button></a>
         <a href="javascript:history.back()"><button type="button" class="btn btn-primary btn-lg" name="button" onclick="goBack()" style="float:left;">Go Back</button></a>

      </div>
    </div>
  </div>
</div>

<div class="row">
  @foreach($ads as $ad)
<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card" style="width:340px;">
        <img class="card-img-top" src="{{asset("images/advertises/$ad->advertise")}}">
        <div class="btn-group-justified text-center">
            @if($ad->status == 0)
            <a href="/add/advertise/{{$ad->id}}">
                <button type="button" name="button" class="btn btn-sm btn-info">On</button>
            </a>
            @else
            <a href="/cancel/advertise/{{$ad->id}}">
                <button type="button" name="button" class="btn btn-sm btn-dark">Off</button>
            </a>
            @endif
        </div>
    </div>
</div>
  @endforeach
</div>

@endsection
