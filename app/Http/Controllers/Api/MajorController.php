<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()  {
        $majors=Major::get();
        return response()->json([$majors]);
          }

    public function show($id) {
        $major=Major::findorfail(id:$id);
        return response()->json(['data'=>$major]);

        
    }   
    public function doctors($id) {
        $doctors=User::where('role','doctor')->where('major_id',$id)->get();
        return response()->json(['data'=>$doctors]);

        
    }   
}
