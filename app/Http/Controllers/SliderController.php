<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{
    public function insertslide(){
        $slider=Slider::all();
        return view('admin.slider.index',compact('slider'));
    }


    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
         $request->validate([
            'title'=> 'required | min:6',
            'desc'=> 'required ',
            'image'=> 'required |max:2048 ',
         ]);

         $slider_img=$request->file('image');
         foreach($slider_img as $sliders);
         $slider_name=hexdec(uniqid()). "." . $sliders->getClientOriginalExtension();
         $location='upload/slider/';
         $final_file=$location.$slider_name;
         $sliders->move($location,$slider_name);


         $slide=new Slider();
         $slide->title=$request->title;
         $slide->description=$request->desc;
         $slide->image=$final_file;
         $slide->save();
         return Redirect()->route('insert')->with('success','Slider Added Sucessfully');
    }

    public function edit($id){
        $edit=Slider::find($id);
      return view('admin.slider.edit',compact('edit'));
    }



    public function editslider(Request $request,$id){

        $slider_img=$request->file('image');
        if($slider_img){
         foreach($slider_img as $sliders);
         $slider_name=hexdec(uniqid()). "." . $sliders->getClientOriginalExtension();
         $location='upload/slider/';
         $final_file=$location.$slider_name;
         $sliders->move($location,$slider_name);

         $slider=Slider::find($id)->update([
          'title'=>$request->title,
          'description'=>$request->desc,
          'image'=>$final_file,
          
         ]);
         return Redirect()->route('insert')->with('success','Slider Updated Sucessfully');
        }else{
            $slider=Slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->desc,
                
                
               ]);
               return Redirect()->route('insert')->with('success','Slider Updated Sucessfully');
        }
         
    }


    public function deleteslider($id){
        $edit=Slider::find($id)->forceDelete();
        return Redirect()->route('insert')->with('success','Slider Deleted Sucessfully');
    }
}
