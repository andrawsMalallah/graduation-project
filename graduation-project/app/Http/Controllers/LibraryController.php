<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index($department_name)
    {
        $department = Department::where('name', $department_name)->first();
        $books = Library::where('department_id', $department->id)->orderBy('name', 'ASC')->get();
        return view('frontend.department.library', compact('books', 'department'));
    }

    // Dashboard
    public function libraryIndex()
    {
        $departments = Department::where('type', 'scientific')->orderBy('name', 'ASC')->get(['name', 'id']);
        $books = Library::with('department')->get();

        return view('backend.library.index', compact('departments', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'stage' => 'required',
            'link' => 'required|url',
            'image' => 'required|image|max:2048',
        ], [
            'image.image' => 'The image must be a file of type: jpeg, png, bmp, gif, or svg.',
        ]);

        $imgName = $request->file('image')->getClientOriginalName();
        $imgName = time() . '.' . $imgName;

        $request->file('image')->move(public_path('images/library'), $imgName);

        Library::create([
            'name' => $request->name,
            'department_id' => $request->department,
            'stage' => $request->stage,
            'link' => $request->link,
            'image' => 'images/library/' . $imgName,
        ]);

        return back()->with('message', 'Book added successfully');
    }


    public function edit(Library $library)
    {
        $departments = Department::where('type', 'scientific')->orderBy('name', 'ASC')->get(['name', 'id']);

        return view('backend.library.edit', compact('library', 'departments'));
    }

    public function update(Request $request, Library $library)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'stage' => 'required',
            'link' => 'required',
            'image' => 'image|max:2048',
        ], [
            'image.image' => 'The image must be a file of type: jpeg, png, bmp, gif, or svg.',
        ]);

        $library->name = $request->name;
        $library->department_id = $request->department;
        $library->stage = $request->stage;
        $library->link = $request->link;

        if ($request->file('image')) {
            unlink(public_path($library->image));

            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() . '.' . $imgName;

            $request->file('image')->move(public_path('images/library'), $imgName);

            $library->image = 'images/library/' . $imgName;
        }

        $library->save();

        return back()->with('message', 'Book updated successfully');
    }


    public function imageView(Library $library)
    {
        $image = $library->image;

        return view('backend.imageView', compact('image'));
    }

    public function delete(Library $library)
    {
        unlink(public_path($library->image));

        $library->delete();

        return back()->with('message', 'Book deleted successfully');
    }
}
