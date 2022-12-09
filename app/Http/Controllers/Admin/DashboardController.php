<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index')->with(['users' => $users]);
    }

    public function view($id)
    {
        $user = User::find($id);
        return view('admin.users.view')->with(['user' => $user]);
    }
}
