<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointement;

class AppointmentController extends Controller
{
    public function index($id){
        
        $doctor = User::where('role', 'doctor')->findorfail($id);
        return view('front.appoitments.index',compact('doctor'));
    }

    public function book(Request $request , User $user){

       


        $request->validate(

          [
              "name" => ['required','string',"min:5","max:25"],
              "email" => ['required','email'],
              "phone" => ['required','numeric']
             
          ]  
        );


        $appointement= new Appointement();

        $appointement->name=$request->name;
        $appointement->email=$request->email;
        $appointement->phone=$request->phone;
        $appointement->doctor_id= $user->id;
        $appointement->patient_id= auth()->user()->id;
         

        $appointement->save();
        
        return redirect()->back()->with('success','your appointement has been sent successfully');
    }
}
