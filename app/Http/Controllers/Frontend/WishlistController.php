<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->latest()->get();
        return view('frontend.wishlist')->with(['wishlist' => $wishlist]);
    }

    public function add(Request $request)
    {
        $prod_id = $request->input('product_id');

        if (Auth::check())
        {
            // check if product exists
            $prod_check = Product::where('id', $prod_id)->first();

            if ($prod_check)
            {
                if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json([
                        'icon' => 'warning',
                        'status' => $prod_check->name .' already Wislisted'
                    ]);
                }
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
        else
        {
            return response()->json([
                'icon' => 'error',
                'status' => 'Login to Continue'
            ]);
        }
    }

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
