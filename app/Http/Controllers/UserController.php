<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   public function fetch(){
      // $users=User::all();
    return view('admin.index');
   }


   public function create(){
      
    return view('admin.body.change_pass');
   }


   public function update(Request $request){
      $request->validate([
          'current_password'=>'required',
          'password'=>'required|confirmed', 
           
      ]);
       
      $hashed=Auth::user()->password;
      if(Hash::check($request->current_password,$hashed)){
         $user= User::find(Auth::id());
         $user->password=Hash::make($request->password);
         $user->save();
         Auth::logout();

         return Redirect()->route('login')->with('success','password updated successfully');
      }else{
         return Redirect()->back()->with('error','Currrent password is Invalid');
      }
     
   }


   public function changeprofile(){
      if(Auth::user()){
         $user=User::find(Auth::user()->id);

         if($user){
            return view('admin.body.changeprofile',compact('user'));
         }
      }
      
     }
  
     

     public function updateprofile(Request $request){
      $profile_image=$request->file('pics');
      $img_name=hexdec(uniqid()). '.' .$profile_image->getClientOriginalExtension();
      $location='upload/profile/';
      $final_file=$location.$img_name;
      $profile_image->move($location,$img_name);

      $profile=User::find(Auth::user()->id);
      if($profile){
        $profile->name= $request->username;
        $profile->email= $request->email;
        $profile->profile_photo_path= $final_file;
      $profile->save();
      return Redirect()->back()->with('success','Profile updated Successfully');
     }else{
      return Redirect()->back()->with('error','profile not updated Invalid');
     }
   }
}
