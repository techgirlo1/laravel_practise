<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
class PortfolioController extends Controller
{
    public function insert(){
        $pic=Portfolio::all();
        
        return view('admin.portfolio.index',compact('pic'));
    }


    public function create(Request $request){
       $request->validate([
         'image'=>'required',
         
       ]);
       $port_image=$request->file('image');
       foreach($port_image as $images){
       $img_name=hexdec(uniqid()). "." .$images->getClientOriginalExtension();
       $location='upload/portfolio/';
       $final_file=$location.$img_name;
       $images->move($location,$img_name);

       $img= new Portfolio();
       $img->image=$final_file;
       $img->save();
    }
       return Redirect()->back()->with('success','Portfoilo Inserted Successfully');
    }

   
}
