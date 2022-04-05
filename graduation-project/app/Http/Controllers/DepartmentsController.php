<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    // dashboard
    public function index()
    {
        $departments = Department::orderBy('name', 'ASC')->get(['id', 'name', 'type']);
        return view('backend.departments.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'image' => 'required|image|max:2048',
            'description' => 'required',
        ],[
            'image.image' => 'The image must be a file of type: jpeg, png, bmp, gif, or svg.',
        ]);

        $imgName = $request->file('image')->getClientOriginalName();
        $imgName = time() . '.' . $imgName;

        $request->file('image')->move(public_path('images/departments'), $imgName);

        $department = new Department;

        $department->name = $request->name;
        $department->type = $request->type;
        $department->image = 'images/departments/' . $imgName;
        $department->description = $request->description;
        $department->video = $request->video;

        $department->save();

        return back()->with('message', 'Department added successfully');
    }

    public function edit(Department $department)
    {
        return view('backend.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048',
        ], [
            'image.image' => 'The image must be a file of type: jpeg, png, bmp, gif, or svg.',
        ]);

        $department->name = $request->name;
        $department->type = $request->type;
        $department->description = $request->description;
        $department->video = $request->video;

        if ($request->file('image')) {
            unlink(public_path($department->image));

            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() . '.' . $imgName;

            $request->file('image')->move(public_path('images/departments'), $imgName);

            $department->image = 'images/departments/' . $imgName;
        }

        $department->save();

        return back()->with('message', 'Department updated successfully');
    }

    public function delete(Department $department)
    {
        unlink(public_path($department->image));

        $department->delete();

        return back()->with('message', 'Department deleted successfully');
    }

    public function imageView(Department $department)
    {
        $image = $department->image;

        return view('backend.imageView', compact('image'));
    }

    // frontend
    public function show(Department $department)
    {
        $department->load('teachers', 'labs');

        return view('frontend.department.index', compact('department'));
    }
}
