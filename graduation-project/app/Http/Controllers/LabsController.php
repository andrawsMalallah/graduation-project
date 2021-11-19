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
        $departments = Department::orderBy('name', 'ASC')->get(['id', 'name']);

        return view('backend.labs.index', compact('labs', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $imgName = $request->file('image')->getClientOriginalName();
        $imgName = time() . '.' . $imgName;

        $request->file('image')->move(public_path('images/labs'), $imgName);

        $lab = new Lab;

        $lab->name = $request->name;
        $lab->department_id = $request->department;
        $lab->image = 'images/labs/'.$imgName;
        $lab->description = $request->description;

        if ($request->file('video')) {
            $vidName = $request->file('video')->getClientOriginalName();
            $vidName = time().'.'.$vidName;

            $request->file('video')->move(public_path('videos/labs'), $vidName);

            $lab->video = 'videos/labs/'.$vidName;
        }

        $lab->save();

        return back()->with('message', 'Lab added successfully');
    }

    public function edit(Lab $lab)
    {
        $departments = Department::orderBy('name', 'ASC')->get(['id', 'name']);
        return view('backend.labs.edit', compact('lab', 'departments'));
    }

    public function update(Request $request ,Lab $lab)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'description' => 'required',
        ]);

        $lab->name = $request->name;
        $lab->department_id = $request->department;
        $lab->description = $request->description;
        
        if ($request->file('image')) {
            unlink(public_path($lab->image));
            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() . '.' . $imgName;
            
            $request->file('image')->move(public_path('images/labs'), $imgName);
            $lab->image = 'images/labs/'.$imgName;
        }

        if ($request->file('video')) {
            if ($lab->video) {
                unlink(public_path($lab->video));
            }
            
            $vidName = $request->file('video')->getClientOriginalName();
            $vidName = time() . '.' . $vidName;

            $request->file('video')->move(public_path('videos/labs'), $vidName);

            $lab->video = 'videos/labs/'.$vidName;
        }

        $lab->save();

        return back()->with('message', 'Lab updated successfully');
    }

    public function delete(Lab $lab)
    {
        if ($lab->video) {
            unlink(public_path($lab->video));
        }

        unlink(public_path($lab->image));

        $lab->delete();

        return back()->with('message', 'Lab deleted successfully');
    }

    public function imageView(Lab $lab)
    {
        $image = $lab->image;

        return view('backend.imageView', compact('image'));
    }

    public function videoView(Lab $lab)
    {
        $video = $lab->video;

        return view('backend.videoView', compact('video'));
    }

    public function videoDelete(Lab $lab)
    {
        unlink(public_path($lab->video));

        $lab->video = null;
        $lab->save();

        return back()->with('message', 'Video deleted successfully');
    }
}
