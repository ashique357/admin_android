<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Product;
use App\Shop;

class ServiceController extends Controller
{
  public function index(){
    return Service::all();
  }

  public function show(Service $service){
    return Service::find($service);
  }

  public function store(Request $request){
    $service= Service::create($request->all);
    return response()->json($service, 201);
  }

  public function update(Request $request,Service $service){
    $service = Service::findOrFail($service);
    $service->update($request->all());

    return response()->json($service, 200);
  }

  public function delete(Service $service){
    $d=Service::find($service);
    $shops=Shop::where('service_id','=',$service)->get();
    foreach ($shops as $shop) {
      $product=Product::where('shop_id','=',$shop->id)->delete();
      $shop->delete();
    }
    $d->delete();

    return response()->json(null, 204);
  }
}
