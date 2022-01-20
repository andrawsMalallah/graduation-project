<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'DESC')->paginate(10);

        return view('frontend.blog.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);


        $imgName = $request->file('image')->getClientOriginalName();
        $imgName = time() . '.' . $imgName;

        $request->file('image')->move(public_path('images/blog'), $imgName);

        Blog::create([
            'title' => $request->title,
            'image' => 'images/blog/' . $imgName,
            'description' => $request->description
        ]);
        return back()->with('message', 'Post create successfully');
    }

    public function show(Blog $blog)
    {
        return view('frontend.blog.post', compact('blog'));
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

    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'description' => 'required',
            'title' => 'required',
        ]);

        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->file('image')) {
            unlink(public_path($blog->image));

            $imgName = $request->file('image')->getClientOriginalName();
            $imgName = time() . '.' . $imgName;

            $request->file('image')->move(public_path('images/blog'), $imgName);

            $blog->image = 'images/blog/' . $imgName;
        }

        $blog->save();

        return back()->with('message', 'Post updated successfully');
    }


    public function imageView(Blog $blog)
    {
        $image = $blog->image;

        return view('backend.imageView', compact('image'));
    }

    public function delete(Blog $blog)
    {
        unlink(public_path($blog->image));

        $blog->delete();

        return back()->with('message', 'Post deleted successfully');
    }
}
