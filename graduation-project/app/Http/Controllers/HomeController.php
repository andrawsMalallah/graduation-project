<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Department;
use App\Models\Lab;
use App\Models\Library;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Blog::where('approved', 1)->orderBy('created_at', 'DESC')->limit(10)->get();
        $departments = Department::where('type', 'scientific')->get(['id', 'image', 'name']);
        $units = Department::where('type', 'management')->orderBy('name', 'ASC')->get(['id', 'name', 'description', 'image']);

        return view('frontend.welcome', compact('sliders', 'departments', 'units'));
    }

    /**
     * Show the application about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('frontend.about');
    }

    public function search(Request $request)
    {
        $request->validate(
            [
                'term' => 'required'
            ],
            [
                'term.required' => 'Please enter a search term.'
            ]
        );

        $term = $request->term;
        $departments = Department::where('name', 'like', '%' . $request->term . '%')->get(['id', 'name']);
        $labs = Lab::where('name', 'like', '%' . $request->term . '%')->get(['id', 'name']);
        $teachers = Teacher::where('name', 'like', '%' . $request->term . '%')->get(['id', 'name']);
        $books = Library::where('name', 'like', '%' . $request->term . '%')->get(['id', 'name', 'link']);
        $posts = Blog::where('title', 'like', '%' . $request->term . '%')->get();

        return view('frontend.searchResults', compact('term', 'departments', 'labs', 'teachers', 'books', 'posts'));
    }
}
