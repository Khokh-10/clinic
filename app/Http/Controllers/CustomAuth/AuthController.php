<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {


        $data = $request->validate(

            [
                "name" => ['required', 'string', "min:5", "max:25"],
                "email" => ['required', 'email'],
                "password" => ['required', 'string', 'min:8', 'confirmed'],


            ]
        );


        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('home');
    }


    ////////////////////////////////

    public function login()
    {
        return view('Auth.login');
    }

    public function dologin(Request $request)
    {


        $data = $request->validate(

            [

                "email" => ['required', 'email'],
                "password" => ['required', 'string'],


            ]
        );


        if (Auth::attempt($data)) {

            $user = User::where('email', $data['email'])->first();
            Auth::login($user);
              return redirect()->route('home');
        }else {
            return redirect()->back()->with('error', "invaild email or password");
        }

 
}

      
    



    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
