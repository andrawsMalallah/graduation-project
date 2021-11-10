<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.blog');
    }

    // dashboard
    public function blogIndex()
    {
        return view('backend.blog.index');
    }
}
