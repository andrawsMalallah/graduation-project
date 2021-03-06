<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $departments = Department::where('type', 'scientific')->orderBy('name', 'ASC')->get(['id', 'name']);
        $teachers = Teacher::with(['department'])->orderBy('name', 'ASC')->get();
        return view('backend.teachers.index', compact('departments', 'teachers'));
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

        $teacher = new Teacher;

        $teacher->name = $request->name;
        $teacher->department_id = $request->department;
        $teacher->description = $request->description;

        if ($request->file('image')) {
            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() . '.' . $imgName;

            $request->file('image')->move(public_path('images/teachers'), $imgName);

            $teacher->image = 'images/teachers/' . $imgName;
        }

        $teacher->save();

        return back()->with('message', 'Teacher added successfully');
    }

    public function edit(Teacher $teacher)
    {
        $departments = Department::where('type', 'scientific')->get(['id', 'name']);
        return view('backend.teachers.edit', compact('teacher', 'departments'));
    }

    public function update(Request $request ,Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048',
        ], [
            'image.image' => 'The image must be a file of type: jpeg, png, bmp, gif, or svg.',
        ]);

        $teacher->name = $request->name;
        $teacher->department_id = $request->department;
        $teacher->description = $request->description;

        if ($request->file('image')) {
            if ($teacher->image) {
                unlink(public_path($teacher->image));
            }

            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time().'.'.$imgName;

            $request->file('image')->move(public_path('images/teachers'), $imgName);

            $teacher->image = 'images/teachers/'.$imgName;
        }

        $teacher->save();

        return back()->with('message', 'Teacher updated successfully');
    }

    public function delete(Teacher $teacher)
    {
        if ($teacher->image) {
            unlink(public_path($teacher->image));
        }

        $teacher->delete();

        return back()->with('message', 'Teacher deleted successfully');
    }

    // frontend
    public function show(Teacher $teacher)
    {
        return view('frontend.department.teacher', compact('teacher'));
    }
}
