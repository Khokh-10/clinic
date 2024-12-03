<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class AdminMajorController extends Controller
{
    
    
    public function create()
    {
    
        return view('Admin.Majors.add');
    }



    public function store(){

        request()->validate(
            [
                "name" => ['required','string',"min:5","max:25"],
                "image" =>['required','image']
            ]
            );

    
   

        $image_name=request()->image->getclientoriginalname();
        $image_name=time().rand(1,10000).'_'.$image_name;
        request()->image->move(public_path('uploads/majors/'),$image_name);

        Major::create([
            "name" => request()->name,
            "image" => $image_name,
        ]);
        
        return back()->with('success','data added successfully');

    }
}
