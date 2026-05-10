<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    }

    public function destroy(\App\Models\User $user)
    {
        $user->delete();
        return back()->with('status', 'Usuario eliminado correctamente.');
    }
}
