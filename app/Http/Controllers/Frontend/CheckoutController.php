<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
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
        // Auth ID
        $userInfoFields['user_id'] = Auth::id();
        // Total Price
        $userInfoFields['total_price'] = $request->total_price;
        // store data in mysql
        $order = Order::create($userInfoFields);

        // get all cart values according to specific user
        $cartItems = Cart::where('user_id', Auth::id())->get();
        // loop through cartItems
        foreach ($cartItems as $item)
        {
            // create order items
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item['prod_id'],
                'qty' => $item['prod_qty'],
                'price' => $item->products->selling_price,
            ]);

            // after creating delete items from cart table for specfic user
            Cart::destroy($cartItems);

            // reduce product quantity
            $product = Product::where('id', $item['prod_id'])->first();
            $product['qty'] = $product['qty'] - $item['prod_qty'];
            $product->update();
        }

        // store upcoming user basic details in User table, later user comes to checkout not have to enter details again
        if (Auth::user()->address1 == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user['name'] = $request->input('fname');
            $user['lname'] = $request->input('lname');
            $user['phone'] = $request->input('phone');
            $user['address1'] = $request->input('address1');
            $user['address2'] = $request->input('address2');
            $user['city'] = $request->input('city');
            $user['state'] = $request->input('state');
            $user['country'] = $request->input('country');
            $user['pincode'] = $request->input('pincode');
            $user->update();
        }

        // redirect to landing page with success message
        return redirect('/')->with('status', 'Order placed successfully!');
    }
}
