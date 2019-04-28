<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Product;
use App\Shop;


class ProductController extends Controller
{
  public function index(){
    return Product::all();
  }

  public function show(Product $product){
    return Product::find($product);
  }

  public function store(Request $request){
    $product= Product::create($request->all);
    return response()->json($product, 201);
  }

  public function update(Request $request,Product $product){
    $product = Product::findOrFail($product);
    $product->update($request->all());

    return response()->json($product, 200);
  }

  public function delete(Shop $product){
    $d=Product::find($product);
    $d->delete();
    return response()->json(null, 204);
  }
}
