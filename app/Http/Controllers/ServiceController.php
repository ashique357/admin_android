<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Category;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller
{
    public function add_service(){
      return view('pages.Services.AddServices');
    }

    public function post_add_service(Request $request){
      $request->validate([
        'title' =>'required|string|max:20',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=128,height=128',
      ]);
      $imageName = time().'.'.request()->thumbnail->getClientOriginalExtension();
      $request->thumbnail->move(public_path('/images'), $imageName);

      $s= new Service();
      $s->title = $request->title;
      $s->thumbnail = $imageName;
      $s->user_id = '1';

      $s->save();

      return back()->with('success','Successfully Saved');
    }

    public function service_list(){
      $services=Service::orderBy('title')->paginate(5);
      return view('pages.Services.ServiceList')->with(['services' =>$services]);
    }

    public function edit_service($id){
      $get_service=Service::where('id','=',$id)->first();
      return view('pages.Services.EditServices')->with(['get_service'=>$get_service]);
    }

    public function update_service(Request $request,$id){
      $u=Service::findOrFail($id);

      $request->validate([
        'title' =>'required|string|max:20',
      ]);

      if (!($request->hasFile('thumbnail'))) {
        $imageName=$u->thumbnail;
      }

      if ($request->hasFile('thumbnail')) {
        $imageName = time().'.'.request()->thumbnail->getClientOriginalExtension();
        $request->thumbnail->move(public_path('/images'), $imageName);
      }

      $u->title = $request->title;
      $u->thumbnail=$imageName;
      $u->save();

      return back()->with('success','Successfully Updated');
    }

    public function delete($id){
      $d=Service::find($id);
      Category::where('service_id','=',$id)->delete();
      $d->delete();
      return back()->with('success','Successfully Deleted');
    }

    public function make_top($id){
        $j=Service::findOrFail($id);
        $j->top=1;
        $j->save();

        return back()->with('success','Successfully Make as Top Service');
    }

    public function cancel_top($id){
        $j=Service::findOrFail($id);
        $j->top=0;
        $j->save();

        return back()->with('success','Successfully Cancelled as Top Service');
    }

    public function make_new($id){
        $j=Service::findOrFail($id);
        $j->new=1;
        $j->save();

        return back()->with('success','Successfully Make as New Service');
    }

    public function cancel_new($id){
        $j=Service::findOrFail($id);
        $j->new=0;
        $j->save();

        return back()->with('success','Successfully Cancelled as New Service');
    }
}
