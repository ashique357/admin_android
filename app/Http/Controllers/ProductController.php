<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Product;

class ProductController extends Controller
{
  public function add_product(){
    $shops=Shop::orderBy('name','ASC')->get();
    return view('pages.Products.AddProducts')->with(['shops'=>$shops]);
  }

  public function post_add_product(Request $request){
    $request->validate([
      'header' =>'required|string|max:20',
      'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
      'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
      'shop_id'=>'required',
      'price'=>'required|numeric',
      'description'=>'required|string'
    ]);

    $imageName1 = time().'.'.request()->image1->getClientOriginalExtension();
    $request->image1->move(public_path('/images'), $imageName1);

    $imageName2 = time().'.'.request()->image2->getClientOriginalExtension();
    $request->image2->move(public_path('/images'), $imageName2);

    $p= new Product();
    $p->header =$request->header;
    $p->shop_id =$request->shop_id;
    $p->price =$request->price;
    $p->discount_price =$request->discount_price;
    $p->description =$request->description;
    $p->image1 =$imageName1;
    $p->image2 =$imageName2;

    $p->save();

    return back()->with('success','Successfully Saved');
  }

  public function product_list(){
      $products=Product::orderBy('shop_id','DESC')->get();
      return view('pages.Products.ProductList')->with(['products'=>$products]);
  }

  public function edit($id){
    $product=Product::findOrFail($id)->first();
    return view('pages.Products.EditProduct')->with(['product'=>$product]);
  }

  public function update(Request $request,$id){
    $up=Product::where('id','=',$id)->first();
    $get_id=$up->shop->id;
    $request->validate([
      'header' =>'required|string|max:20',
      'shop_id'=>'required',
      'price'=>'required|numeric',
      'description'=>'required|string'
    ]);
    if ($request->hasFile('image1')) {
      $imageName1 = time().'.'.request()->image1->getClientOriginalExtension();
      $request->image1->move(public_path('/images'), $imageName1);
    }
    if ($request->hasFile('image2')) {
      $imageName2 = time().'.'.request()->image2->getClientOriginalExtension();
      $request->image2->move(public_path('/images'), $imageName2);
    }
      if (!($request->hasFile('image1'))){
        $imageName1=$up->image1;
      }
        if (!($request->hasFile('image2'))){
          $imageName2=$up->image2;
        }

    $up->header=$request->header;
    $up->description=$request->description;
    $up->price=$request->price;
    $up->discount_price=$request->discount_price;
    $up->image1=$imageName1;
    $up->image2=$imageName2;

    $up->save();

    return back()->with('success','Successfully Updated');
  }

  public function delete($id){
    $d=Product::find($id);
    $d->delete();
    return back()->with('success','Successfully Deleted');
  }

  public function product_show($id){
    $product=Product::findOrFail($id)->first();
    return view('pages.Products.Product')->with(['product'=>$product]);
  }

}
