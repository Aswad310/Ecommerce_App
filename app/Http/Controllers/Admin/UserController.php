<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // show all the users to admin
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index')->with(['users' => $users]);
    }

    // give user detail according to specific id
    public function view($id)
    {
        $user = User::find($id);
        return view('admin.users.view')->with(['user' => $user]);
    }
}
