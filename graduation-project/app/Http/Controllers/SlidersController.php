<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'DESC')->get();

        return view('backend.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $imgName = $request->file('image')->getClientOriginalName();
        $imgName = time().'.'.$imgName;

        $request->file('image')->move(public_path('images/carousel'), $imgName);

        Slider::create([
            'image' => 'images/carousel/'.$imgName,
        ]);
        return back()->with('message', 'Image uploaded successfully');
    }

    function show(Slider $slider)
    {
        return view('backend.sliders.show', compact('slider'));
    }

    function delete(Slider $slider) {
        unlink(public_path($slider->image));

        $slider->delete();
        return back()->with('message', 'Image deleted successfully');
    }
}
