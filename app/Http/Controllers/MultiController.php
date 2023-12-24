<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multi;
class MultiController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
     }




    public function insert(){
        $pic=Multi::latest()->paginate(6);
        return view('admin.multi.index',compact('pic'));
    }


    public function create(Request $request){
        $request->validate([
            'image'=>'required|max:2048',
        ]);

        $brand_img=$request->file("image");

        foreach($brand_img as $images){
        $img_name=hexdec(uniqid());
        $img_gen=$img_name. "." .$images->getClientOriginalExtension();
        $location='upload/multi/';
        $final_file=('upload/multi/'.$img_gen);
        $images->move('upload/multi/',$img_gen);







        



        $multi1=new Multi();
        $multi1->image=$final_file;
        $multi1->save();
    }
        return Redirect()->back()->with('success','Images Uploaded Succesfully');
    
    }

    
}
