<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('backend.users.index', compact('users'));
    }

    public function delete(User $user)
    {
        $user->delete();

        return back()->with('message', 'User deleted successfully');
    }
}
