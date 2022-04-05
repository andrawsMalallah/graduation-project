<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lab;
use Illuminate\Http\Request;

class LabsController extends Controller
{
    public function index()
    {
        $labs = Lab::with('department')->orderBy('name', 'ASC')->get();
        $departments = Department::where('type', 'scientific')->orderBy('name', 'ASC')->get(['id', 'name']);

        return view('backend.labs.index', compact('labs', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048',
        ], [
            'image.image' => 'The image must be a file of type: jpeg, png, bmp, gif, or svg.',
        ]);

        $lab = new Lab;

        $lab->name = $request->name;
        $lab->department_id = $request->department;
        $lab->description = $request->description;
        
        if ($request->file('image')) {
            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() . '.' . $imgName;
            
            $request->file('image')->move(public_path('images/labs'), $imgName);
            
            $lab->image = 'images/labs/'.$imgName;
        }

        $lab->save();

        return back()->with('message', 'Lab added successfully');
    }

    public function edit(Lab $lab)
    {
        $departments = Department::where('type', 'scientific')->orderBy('name', 'ASC')->get(['id', 'name']);
        return view('backend.labs.edit', compact('lab', 'departments'));
    }

    public function update(Request $request, Lab $lab)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048',
        ], [
            'image.image' => 'The image must be a file of type: jpeg, png, bmp, gif, or svg.',
        ]);

        $lab->name = $request->name;
        $lab->department_id = $request->department;
        $lab->description = $request->description;
        
        if ($request->file('image')) {
            if ($lab->image) {
                unlink(public_path($lab->image));
            }
            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() . '.' . $imgName;
            
            $request->file('image')->move(public_path('images/labs'), $imgName);
            $lab->image = 'images/labs/'.$imgName;
        }

        $lab->save();

        return back()->with('message', 'Lab updated successfully');
    }

    public function delete(Lab $lab)
    {
        if ($lab->image) {
            unlink(public_path($lab->image));
        }

        $lab->delete();

        return back()->with('message', 'Lab deleted successfully');
    }

    public function imageView(Lab $lab)
    {
        $image = $lab->image;

        return view('backend.imageView', compact('image'));
    }

    public function show(Lab $lab)
    {
        return view('frontend.department.lab', compact('lab'));
    }
}
