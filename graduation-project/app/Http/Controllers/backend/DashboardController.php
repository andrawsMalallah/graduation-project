<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Department;
use App\Models\Lab;
use App\Models\Library;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $departments = Department::count();
        $labs = Lab::count();
        $teachers = Teacher::count();
        $books = Library::count();
        $posts = Blog::count();
        $users = User::count();

        return view('backend.index', compact('departments', 'labs', 'teachers', 'books', 'posts', 'users'));
    }
}
