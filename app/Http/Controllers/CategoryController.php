<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Category;

class CategoryController extends Controller
{
    public function add_category(){
      $services=Service::orderBy('title','ASC')->get();
      return view('pages.Categories.AddCategories')->with(['services'=>$services]);
    }

    public function post_add_category(Request $request){
      $request->validate([
        'header' =>'required|string|max:20',
        'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'service_id'=>'required',
        'price'=>'required|numeric',
        'discount_price'=>'required|sometimes',
        'description'=>'required|string'
      ]);

      $imageName1 = time().'.'.request()->image1->getClientOriginalExtension();
      $request->image1->move(public_path('/images'), $imageName1);

      $imageName2 = time().'.'.request()->image2->getClientOriginalExtension();
      $request->image2->move(public_path('/images'), $imageName2);

      $c= new Category();
      $c->header =$request->header;
      $c->service_id =$request->service_id;
      $c->price =$request->price;
      $c->discount_price =$request->discount_price;
      $c->description =$request->description;
      $c->image1 =$imageName1;
      $c->image2 =$imageName2;

      $c->save();

      return back()->with('success','Successfully Saved');
    }

    public function category_list(){
        $categories=Category::orderBy('service_id','DESC')->get();
        return view('pages.Categories.CategoryList')->with(['categories'=>$categories]);
    }

    public function edit($id){
      $category=Category::findOrFail($id)->first();
      return view('pages.Categories.edit')->with(['category'=>$category]);
    }

    public function update(Request $request,$id){
      $u=Category::where('id','=',$id)->first();
      $get_id=$u->service->id;
      $request->validate([
        'header' =>'required|string|max:20',
        'description' =>'required|string',
        'price' =>'required|numeric',
        'discount_price'=>'required|sometimes',
        'service_id'=>'required'
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
          $imageName1=$u->image1;
        }
          if (!($request->hasFile('image2'))){
            $imageName2=$u->image2;
          }

      $u->header=$request->header;
      $u->description=$request->description;
      $u->price=$request->price;
      $u->discount_price=$request->discount_price;
      $u->image1=$imageName1;
      $u->image2=$imageName2;

      $u->save();

      return back()->with('success','Successfully Updated');
    }

    public function delete($id){
      $d=Category::find($id);
      $d->delete();
      return back()->with('success','Successfully Deleted');
    }

    public function product_show($id){
      $category=Category::findOrFail($id)->first();
      return view('pages.Categories.Product')->with(['category'=>$category]);
    }
}
