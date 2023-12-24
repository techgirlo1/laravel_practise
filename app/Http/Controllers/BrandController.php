<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }




    public function brand(){
        $brand=Brand::all();
        $brand=Brand::paginate(3);
        $trash=Brand::onlyTrashed()->paginate(2);
        return view('admin.brand.index',compact('brand','trash'));
    }

    public function create(Request $request){
            

        $request->validate([
            'brand'=>'required|min:4',
            'image'=>'required|mimes: jpg .jpeg ,png|max:2048'
        ]);

        $brand_img=$request->file("image");
        $img_name=hexdec(uniqid());
        $img_gen=$img_name. "." .$brand_img->getClientOriginalExtension();
        $location='upload/brand/';
        $final_file=('upload/brand/'.$img_gen);
        $brand_img->move('upload/brand/',$img_gen);
        


        $brand=new Brand();
        $brand->brand_name=$request->brand;
        $brand->brand_img=$final_file;
        $brand->save();
   
        return Redirect()->back()->with('success','Brand inserted sucessfully');
    }


    public function edit($id){
        $edit=Brand::find($id);
        return view('admin.brand.edit',compact('edit'));
    }



    public function editme(Request $request,$id){

        $brand_img=$request->file("image");
        if($brand_img){
            $img_name=hexdec(uniqid());
            $ext=strtolower($brand_img->getClientOriginalExtension());
            $img=$img_name. "." .$ext;
            $location='upload/brand/';
            $final_file=$location.$img;
            $brand_img->move($location,$img);
    
    
    
              $edit=Brand::find($id)->update([
                  'brand_name'=>$request->brand,
                  'brand_img'=>$final_file,
              ]);
    
              return Redirect()->route('brand_insert')->with('success','Brand Updated sucessfully');  
        }else{
            $edit=Brand::find($id)->update([
                'brand_name'=>$request->brand,
                
            ]);
  
            return Redirect()->route('brand_insert')->with('success','Brand Updated sucessfully');  
        }
        
    }


    public function delete($id){
        $delete=Brand::find($id)->delete();

        return Redirect()->back()->with('success','Brand soft deleted sucessfully');
    }


    public function Restore($id){
        $restore=Brand::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Brand restored sucessfully');
    }

    public function pdelete($id){
        $pdelete=Brand::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Brand Deleted permanently');
    }


    public function logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','User Logout');
    }


    


   
}
