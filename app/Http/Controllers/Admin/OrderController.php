<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // show all customer orders
    public function index()
    {
        $orders = Order::where('status', '0')->latest()->get();
        return view('admin.orders.index')->with(['orders' => $orders]);
    }

    // view customer order by id
    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view')->with(['orders' => $orders]);
    }

    // update order custom status , complete or pending
    public function updateOrder(Request $request, Order $id)
    {
        // validate the request
        $orderStatusField = $request->validate(['status' => 'required']);
        // take customer gmail from the upcoming request
        $customerGmail = $request->customer_gmail;
        // update the status field
        $id->update($orderStatusField);
        // send mail to customer on order completed
        if ($orderStatusField['status'] == 1){
            Mail::to($customerGmail)->send(new \App\Mail\OrderCompletedMail());
        }
        // redirect
        return redirect('/orders')->with('success', 'Order status updated successfully');
    }

    // completed order history
    public function orderHistory()
    {
        $orders = Order::where('status', '1')->latest()->get();
        return view('admin.orders.history')->with(['orders' => $orders]);
    }
}
