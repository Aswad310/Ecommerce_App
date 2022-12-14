<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // show wishlist page
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->latest()->get();
        return view('frontend.wishlist')->with(['wishlist' => $wishlist]);
    }

    // add items to wishlist
    public function add(Request $request)
    {
        $prod_id = $request->input('product_id');

        // check user authentication
        if (Auth::check())
        {
            // check if product exists
            $prod_check = Product::where('id', $prod_id)->first();
            // if product already exists generates a json response
            if ($prod_check)
            {
                if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json([
                        'icon' => 'warning',
                        'status' => $prod_check->name .' already Wislisted'
                    ]);
                }
                // store data in wishlist table
                else
                {
                    $wishlist = new Wishlist();
                    $wishlist->prod_id = $prod_id;
                    $wishlist->user_id = Auth::id();
                    $wishlist->save();
                    return response()->json([
                        'icon' => 'success',
                        'status' => 'Product Wishlisted',
                    ]);
                }
            }
        }
        // if user not login show them a json response
        else
        {
            return response()->json([
                'icon' => 'error',
                'status' => 'Login to Continue'
            ]);
        }
    }

    // remove item from wishlist table
    public function deleteItem(Request $request)
    {
        if (Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $wishlist = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wishlist->delete();
                return response()->json([
                    'icon' => 'success',
                    'status' => 'Item Removed from Wishlist'
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

    // count wishlist
    public function wishlistCount()
    {
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json([
            'count' => $wishlistCount,
        ]);
    }
}
