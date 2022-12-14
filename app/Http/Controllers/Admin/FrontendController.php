<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // show admin dashboard main page
    public function index(){
        return view('admin.index');
    }

    // show all customer
    public function users(){
        return view('admin.index');
    }


}
