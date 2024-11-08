<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }


    public function sendMessage(Request $request){


        $request->validate(

          [
              "name" => ['required','string',"min:5","max:25"],
              "email" => ['required','email'],
              "subject" => ['required','string',"min:5","max:25"],
              "message" => ['required','string',"min:10","max:250"]
          ]  
        );


        $message= new Message();

        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->message=$request->message;

        $message->save();
        
        return redirect('contact')->with('success','your message has been sent successfully');
    }


}
