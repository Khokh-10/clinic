<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;



class MajorController extends Controller
{
    
    public function index()
    {
        return view('front.majors.index');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Major::create([
            'title' => $request->title,
        ]);

        return redirect()->route('majors.index')->with('success', 'Major added successfully!');
    }
}

