<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function count()
    {
        $category = Category::count();
        $product = Product::count();
        $totalOrder = Order::count();
        $user = User::count();
        $pendingOrder = Order::where('status', '0')->count();
        $completeOrder = Order::where('status', '1')->count();
        $totalEarning = Order::sum('total_price');
        return view('admin.index')->with([
            "category" => $category,
            "product" => $product,
            "totalOrder" => $totalOrder,
            "user" => $user,
            "pendingOrder" => $pendingOrder,
            "completeOrder" => $completeOrder,
            "totalEarning" => $totalEarning,
        ]);
    }
}
