<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // show checkout page
    public function index()
    {
        // get countries
        $getCountryList = Country::pluck('name','code')->all();
        // get all old cart items
        $oldCartItems = Cart::where('user_id', Auth::id())->get();
        // loop through all old cart items
        foreach ($oldCartItems as $item)
        {
            // if PRODUCT table 'quantity' not >= CART table 'product quantity' then
            if (!Product::where('id', $item['prod_id'])->where('qty', '>=', $item['prod_qty'])->exists())
            {
                // then delete that item from the cart
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item['prod_id'])->first();
                $removeItem->delete();
            }
        }
        // get present cart items
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout')->with([
            'cartItems' => $cartItems,
            'getCountryList' => $getCountryList,
        ]);
    }

    // place order
    public function placeOrder(CheckoutRequest $request)
    {
        // validate upcoming request
        $userInfoFields = $request->validated();
        // providing random traking no.
        $userInfoFields['tracking_no'] = $userInfoFields['fname'].rand(1111,9999);
        // store data in mysql
        $order = Order::create($userInfoFields);

        // get all cart values according to specific user
        $cartItems = Cart::where('user_id', Auth::id())->get();
        // loop through
        foreach ($cartItems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item['prod_id'],
                'qty' => $item['prod_qty'],
                'price' => $item->products->selling_price,
            ]);
        }
    }
}
