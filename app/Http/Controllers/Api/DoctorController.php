<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
 
    public function index() {
        $doctors=User::where('role','doctor')->with('major')->paginate();
        return response()->json(['data'=>$doctors]);
        
    }
}
