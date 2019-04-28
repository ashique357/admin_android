<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Product;
use App\Shop;


class ShopController extends Controller
{
  public function index(){
    return Shop::all();
  }

  public function show(Shop $shop){
    return Shop::find($shop);
  }

  public function store(Request $request){
    $shop= Shop::create($request->all);
    return response()->json($shop, 201);
  }

  public function update(Request $request,Shop $shop){
    $shop = Shop::findOrFail($shop);
    $shop->update($request->all());

    return response()->json($shop, 200);
  }

  public function delete($shop){
    $d=Shop::find($shop);
    Product::where('shop_id','=',$shop)->delete();
    $d->delete();

    return response()->json(null, 204);
  }
}
