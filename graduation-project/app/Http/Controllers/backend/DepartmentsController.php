<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        return view('backend.departments.index');
    }
}
