<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('name', 'ASC')->get(['id', 'name']);
        $teachers = Teacher::with(['department'])->orderBy('name', 'ASC')->get();
        return view('backend.teachers.index', compact('departments', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'description' => 'required',
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
        $departments = Department::get(['id', 'name']);
        return view('backend.teachers.edit', compact('teacher', 'departments'));
    }

    public function update(Request $request ,Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'description' => 'required',
        ]);

        $teacher->name = $request->name;
        $teacher->department_id = $request->department;
        $teacher->description = $request->description;

        if ($request->file('image')) {
            unlink(public_path($teacher->image));
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
}
