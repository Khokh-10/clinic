<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\User;




class MajorController extends Controller
{

    public function index()
    {
        $majors = Major::orderBy('id', 'desc')->paginate(8);

        return view('front.majors.index', ['majors' => $majors]);
    }


    public function doctors(Major $major)
    {
        $doctors = User::where('role', 'doctor')->where('major_id',$major->id)
        ->with('major')->paginate(20);

        return view('front.doctors.index', compact('doctors'));
    }
}
