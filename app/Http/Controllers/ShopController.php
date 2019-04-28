<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Shop;
use App\Product;

class ShopController extends Controller
{
  public function add_shop(){
    $services=Service::orderBy('title','ASC')->get();
    return view('pages.Shops.AddShops')->with(['services'=>$services]);
  }

  public function post_add_shop(Request $request){
    $request->validate([
      'name' =>'required|string|max:20',
      'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
      'service_id'=>'required',
      'description'=>'required|string'
    ]);

    $imageName1 = time().'.'.request()->image1->getClientOriginalExtension();
    $request->image1->move(public_path('/images'), $imageName1);

    $c= new Shop();
    $c->name =$request->name;
    $c->service_id =$request->service_id;
    $c->description =$request->description;
    $c->image1 =$imageName1;
    $c->rating=3;

    $c->save();

    return back()->with('success','Successfully Saved');
  }

  // public function shop_list(){
  //     $shops=Shop::orderBy('service_id','DESC')->get();
  //     return view('pages.Shops.ShopList')->with(['shops'=>$shops]);
  // }

  public function edit($id){
    $shop=Shop::findOrFail($id)->first();
    return view('pages.Shops.EditShop')->with(['shop'=>$shop]);
  }

  public function update(Request $request,$id){
    $u=Shop::where('id','=',$id)->first();
    $get_id=$u->service->id;
    $request->validate([
      'name' =>'required|string|max:20',
      'description' =>'required|string',
      'service_id'=>'required'
    ]);
    if ($request->hasFile('image1')) {
      $imageName1 = time().'.'.request()->image1->getClientOriginalExtension();
      $request->image1->move(public_path('/images'), $imageName1);
    }

      if (!($request->hasFile('image1'))){
        $imageName1=$u->image1;
      }

    $u->name=$request->name;
    $u->description=$request->description;
    $u->image1=$imageName1;
    $u->rating=3;

    $u->save();

    return back()->with('success','Successfully Updated');
  }

  public function delete($id){
    $d=Shop::find($id);
    Product::where('shop_id','=',$id)->delete();
    $d->delete();
    return back()->with('success','Successfully Deleted');
  }

  public function show_products($id){
    $products=Product::where('shop_id','=',$id)->get();
    return view('pages.Products.ProductList')->with(['products'=>$products]);
  }
}
