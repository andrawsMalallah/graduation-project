<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('name', 'ASC')->get([ 'id', 'name', 'type']);
        return view('backend.departments.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'image' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        $imgName = $request->file('image')->getClientOriginalName();
        $imgName = time().'.'.$imgName;

        $request->file('image')->move(public_path('images/departments'), $imgName);

        $department = new Department;

        $department->name = $request->name;
        $department->type = $request->type;
        $department->image = 'images/departments/'.$imgName;
        $department->short_description = $request->short_description;
        $department->long_description = $request->long_description;

        if ($request->file('video')) {
            $vidName = $request->file('video')->getClientOriginalName();
            $vidName = time().'.'.$vidName;

            $request->file('video')->move(public_path('videos/departments'), $vidName);

            $department->video = 'videos/departments/'.$vidName;
        }

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
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        $department->name = $request->name;
        $department->type = $request->type;
        $department->short_description = $request->short_description;
        $department->long_description = $request->long_description;


        if ($request->file('image')) {
            unlink(public_path($department->image));

            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() .'.'.$imgName;

            $request->file('image')->move(public_path('images/departments'), $imgName);

            $department->image = 'images/departments/'.$imgName;
        }

        if ($request->file('video')) {
            if ($department->video) {
                unlink(public_path($department->video));
            }

            $vidName = $request->file('video')->getClientOriginalName();
            $vidName = time().'.'.$vidName;

            $request->file('video')->move(public_path('videos/departments'), $vidName);

            $department->video = 'videos/departments/'.$vidName;
        }

        $department->save();

        return back()->with('message', 'Department updated successfully');
    }

    public function delete(Department $department)
    {
        if ($department->video) {
            unlink(public_path($department->video));
        }

        unlink(public_path($department->image));

        $department->delete();

        return back()->with('message', 'Department deleted successfully');
    }

    public function imageView(Department $department) {
        $image = $department->image;

        return view('backend.imageView', compact('image'));
    }

    public function videoView(Department $department) {
        $video = $department->video;

        return view('backend.videoView', compact('video'));
    }

    public function videoDelete(Department $department) {
        unlink(public_path($department->video));

        $department->video = null;
        $department->save();

        return back()->with('message', 'Video deleted successfully');
    }

}
