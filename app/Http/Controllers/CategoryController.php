<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
     }






    public function insertcat(){
        $cat=Category::all();
        $cat=Category::paginate(3);
        $trash=Category::onlyTrashed()->paginate(2);
        return view('admin.category.category',compact('cat','trash'));
    }

    public function store(Request $request){
           $request->validate([
            'product'=>'required',
           ]);

           $cat=new Category();
           $cat->product_category=$request->product;
           $cat->user_id=Auth::user()->id;
           $cat->save();
           return Redirect()->back()->with('success','Category added succesfully');
    }


    public function edit($id){
        $edit=Category::find($id);
        return view ('admin.category.edit',compact('edit'));
    }

    public function editMe(Request $request,$id){
        $edit=Category::find($id)->update([
            'product_category'=>$request->product,
            'user_id'=>Auth::user()->id,
        ]);

        return Redirect()->route('insert')->with('success','categroy updated successfully');
        
    }


    public function deleteme($id){
        $delete=Category::find($id)->delete();
        return Redirect()->back()->with('success','categroy soft deleted successfully');
    }

    public function Restore($id){
        $delete=Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','categroy Restored successfully');
    }


    public function pdelete($id){
        $delete=Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','categroy permanently deleted');
    }

}
