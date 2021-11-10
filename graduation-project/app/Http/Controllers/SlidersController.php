<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function index()
    {
        return view('backend.sliders.index');
    }
}
