<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertise;

class AdvertiseController extends Controller
{
      public function add(){
        return view('pages.Advertises.AddAdvertise');
      }

      public function store(Request $request){
        $request->validate([
          'advertise'=>'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max-width=280,max-height=200',
        ]);
        $imageName = time().'.'.request()->advertise->getClientOriginalExtension();
        $request->advertise->move(public_path('/images/advertises'), $imageName);

        $a=new Advertise();
        $a->advertise=$imageName;
        $a->save();

        return back()->with('success','Successfully Saved Advertise');
      }

      public function change_status_1($id){
        $j=Advertise::findOrFail($id);
        $j->status=1;
        $j->save();
        return back()->with('success','Successfully Add Advertise');
      }

      public function change_status_0($id){
        $j=Advertise::findOrFail($id);
        $j->status=0;
        $j->save();
        return back()->with('success','Successfully Cancel Advertise');
      }

      public function delete($id){
        $ad=Advertise::find($id);
        $ad->delete();

        return back()->with('success','Successfully Saved Advertise');
      }

      public function show(){
        $ads=Advertise::all();
        return view('pages.Advertises.AdvertiseList')->with(['ads'=>$ads]);
      }
}
