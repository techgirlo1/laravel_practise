<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Auth;
class ContactController extends Controller
{
    public function contact(){
        
        return view('contact');
    }


    public function create(Request $request){
        
        $request->validate([
            'name'=>'required|min:6',
            'email'=>'required',
            'subject'=>'required|min:10',
            'message'=>'required|min:20',
           ]);

           $contact=new Contact();
           $contact->name=$request->name;
           $contact->email=$request->email;
           $contact->subject=$request->subject;
           $contact->message=$request->message;
           $contact->user_id=Auth::user()->id;
           $contact->save();
           return Redirect()->back()->with('success','Message sent Successfully,Our team will reach out to you.');
    }
}
