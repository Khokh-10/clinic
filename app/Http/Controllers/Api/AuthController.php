<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return response()->json(['message' => 'User endpoint working']);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ['required', 'string', 'min:5', 'max:25'],
            "email" => ['required', 'email', 'unique:users,email'],
            "password" => ['required', 'string', 'min:8'],
        ]);

        $data['password'] = bcrypt($data['password']);
    
        $user = User::create($data);
        $token = $user->createToken('new')->plainTextToken;
    
       
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }


    public function login(Request $request)
    {


   

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
            $credentials = $request->only('email', 'password');
          


        if (Auth::attempt($credentials)) {
            
            

            $user = User::where('email', $credentials['email'])->first();
           


            $token = $user->createToken('login-token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }else{
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }
    
            
        }


        public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful'
        ], 200);
      
    }

 
}


    

