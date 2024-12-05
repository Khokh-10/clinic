<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

   
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

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


   

            $credentials = $request->only('email', 'password');
          


        if (Auth::attempt($credentials)) {
            

            $user = User::where('email', $credentials['email'])->first();
            Auth::login($user);
            if ($user->role === 'admin') { 
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home'); 
            }
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
