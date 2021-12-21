<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();

        return view('backend.users.index', compact('users'));
    }

    public function permission(User $user)
    {
        $user->blogger = !$user->blogger;
        $user->save();

        return back()->with('message', 'User updated successfully');
    }

    public function delete(User $user)
    {
        $user->delete();

        return back()->with('message', 'User deleted successfully');
    }
}
