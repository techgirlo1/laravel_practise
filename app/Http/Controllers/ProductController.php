<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
     }


    public function insertproduct(){
        $product=Product::all();
        $product=Product::latest()->paginate(3);
        $trash=Product::onlyTrashed()->paginate(2);
        return view('admin.product.product',compact('product','trash'));
    }

    public function storeproduct(Request $request){
        $request->validate([
            'product'=>'required',
            'cat'=>'required',
        ]);
         $prod=new Product();
         $prod->product_name=$request->product;
         $prod->product_category=$request->cat;
         $prod->user_id=Auth::user()->id;
         $prod->save();
         return Redirect()->back()->with('success','Product added Succesfully');

    }


    public function editproduct($id){
        $prod=Product::find($id);
        return view('admin.product.edit',compact('prod'));
    }

    public function editMe(Request $request, $id){
        $cate= Product::find($id)->update([
        'product_name' => $request->product,
        'product_category' => $request->cat,
        'user_id'=>Auth::user()->id,
     
        ]);
        return Redirect()->route('product')->with("success","Product Updated Succesfully");
     }


     public function delete($id){
        $softdelete=Product::find($id)->delete();

        return Redirect()->back()->with('success','Product soft deleted Succesfully');
     }

     public function Restore($id){
        $restore=Product::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success','Product Restored Succesfully');
     }



     public function pdelete($id){
        $restore=Product::onlyTrashed()->find($id)->forcedelete();

        return Redirect()->back()->with('success','Product Deleted Succesfully');
     }
 
}
