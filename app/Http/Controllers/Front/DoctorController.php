<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DoctorController extends Controller
{
    public function index(){
        $doctors= User::where('role','doctor')->with('major')->paginate(20);

        return view('front.doctors.index',compact('doctors'));
    }
}
