<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminMajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $majors = Major::paginate(10);

        return view('Admin.pages.Majors.index', compact('majors'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pages.Majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Major $major)

    {


        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);



        $major->name = request()->name;



        $image_name = request()->image->getclientoriginalname();
        $image_name = time() . rand(1, 10000) . '_' . $image_name;
        request()->image->move(public_path('uploads/majors/'), $image_name);
        $major->image = $image_name;


        $major->save();

        return redirect()->back()->with('success', 'Major created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $major = Major::findorfail($id);
        return view('Admin.pages.Majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $major = Major::findorfail($id);


        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $major->name = request()->name;

        if ($request->hasFile('image')) {
            if ($major->image) {
                Storage::disk('public')->delete($major->image);
            }


            $image_name = request()->image->getclientoriginalname();
            $image_name = time() . rand(1, 10000) . '_' . $image_name;
            request()->image->move(public_path('uploads/majors/'), $image_name);
            $major->image = $image_name;
        }

        $major->save();

        return redirect()->back()->with('success', 'Major updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $major = Major::findorfail($id);
        Storage::disk('public')->delete($major->image);

        $major->delete();
        return redirect()->back()->with('success', 'Major deleted successfully.');
    }
}
