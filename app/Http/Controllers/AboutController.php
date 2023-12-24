<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function insertabout(){
        $about=About::all();
        return view('admin.about.index',compact('about'));
    }

    public function create(){
        return view('admin.about.create');
    }


    public function store(Request $request){
        $request->validate([
         'title'=>'required| min:6',
         's_desc'=>'required',
         'desc'=>'required',
        ]);
        $about= new About();
        $about->title=$request->title;
        $about->short_desc=$request->s_desc;
        $about->long_desc=$request->desc;
        $about->save();
        return Redirect()->route('insert_about')->with('success','About inserted sucessfully');
    }


    public function edit(Request $request, $id){
     $edit=About::find($id);
     return view('admin.about.edit',compact('edit'));
    
    }

    public function editabout(Request $request, $id){

        $request->validate([
            'title'=>'required| min:6',
            's_desc'=>'required',
            'desc'=>'required',
           ]);
        
        $about= About::find($id)->update([
           'title'=>$request->title,
           'short_desc'=>$request->s_desc,
           'long_desc'=>$request->desc,
        ]);
        
        
        
        
        return Redirect()->route('insert_about')->with('success','About Updated sucessfully');
    }

    public function deleteabout(Request $request, $id){
        $edit=About::find($id)->forceDelete();
        
        return Redirect()->route('insert_about')->with('success','About Deleted sucessfully');
       
       }
       
}
