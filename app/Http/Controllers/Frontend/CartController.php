<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // add product to cart
    public function addProduct(Request $request)
    {
        // take values from request
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        // check if user is logged in or not
        if (Auth::check())
        {
            // check if product exists
            $prod_check = Product::where('id', $product_id)->first();
            // if exists
            if ($prod_check)
            {
                // check product added to cart before or not
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json([
                        'icon' => 'warning',
                        'status' => $prod_check->name .' already added.'
                    ]);
                }
                // add product to cart if not added before
                else
                {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_id = $product_id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json([
                        'icon' => 'success',
                        'status' => $prod_check->name .' added to cart.'
                    ]);
                }
            }
        }
        else
        {
            return response()->json([
                'icon' => 'error',
                'status' => 'Login to Continue.'
            ]);
        }
    }

    // view cart
    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart')->with(['cartItems' => $cartItems]);
    }

    // update cart quantity
    public function updateCartQty(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        if (Auth::check())
        {
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $prod_qty;
                $cart->update();
                return response()->json([
                    'icon' => 'success',
                    'status' => 'Quantity Updated'
                ]);
            }
        }
    }

    // delete cart route
    public function deleteCartItem(Request $request){
        if (Auth::check()){
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json([
                    'icon' => 'success',
                    'status' => 'Product Deleted Successfully'
                ]);
            }

        }
        else
        {
            return response()->json([
                'icon' => 'error',
                'status' => 'Login to Continue.'
            ]);
        }
    }
}
