<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Major $major){

        $majors = Major::orderBy('id', 'desc')->paginate(8);
        $doctors = User::where('role', 'doctor')->with('major')->paginate();


        return view('front.home',compact('doctors','majors'));
    }
}
