<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;



class MajorController extends Controller
{
    
    public function index()
    {
        $majors = Major::orderBy('id', 'desc')->paginate(8);

        return view('front.majors.index',['majors'=>$majors]);
    }


}

