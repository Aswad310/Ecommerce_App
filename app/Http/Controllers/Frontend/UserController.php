<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // show user order history
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('frontend.orders.index')->with(['orders' => $orders]);
    }

    // specific order on view button
    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view')->with(['orders' => $orders]);
    }
}
