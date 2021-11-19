<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'DESC')->get();

        return view('frontend.blog', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'description' => 'required'
        ]);


        $imgName = $request->file('image')->getClientOriginalName();
        $imgName = time().'.'.$imgName;

        $request->file('image')->move(public_path('images/blog'), $imgName);

        Blog::create([
            'user_id' => $request->user_id,
            'image' => 'images/blog/' . $imgName,
            'description' => $request->description
        ]);
        return back();
    }

    // dashboard
    public function blogIndex()
    {
        $posts = Blog::orderBy('created_at', 'DESC')->get();

        return view('backend.blog.index', compact('posts'));
    }

    public function approve(Blog $blog)
    {
        $blog->approved = true;
        $blog->save();

        return back()->with('message', 'Post approves successfully');
    }

    public function show(Blog $blog)
    {
        return view('backend.blog.show', compact('blog'));
    }

    public function delete(Blog $blog)
    {
        unlink(public_path($blog->image));

        $blog->delete();

        return back()->with('message', 'Post deleted successfully');
    }
}
