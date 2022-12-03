<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // user Landing page
    public function index()
    {
        $popularCategories = Category::orderBy('created_at', 'desc')->where('popular', 1)->take(15)->get();
        $trendingProducts = Product::orderBy('created_at', 'desc')->where('trending', 1)->take(10)->get();
        return view('frontend.index')->with([
            'popularCategories' => $popularCategories,
            'trendingProducts' => $trendingProducts,
            ]);
    }

    // user category page
    public function category()
    {
        $allCategories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('frontend.category')->with(['allCategories' => $allCategories]);
    }

    // product detail page
    public function productView($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists())
        {
            if (Product::where('slug', $prod_slug)->exists())
            {
                $product = Product::where('slug', $prod_slug)->first();
                return view('frontend.product.view')->with(['product' => $product]);
            }
            else
            {
                return redirect('/')->with('status', 'The link was broken');
            }
        }
        else
        {
            return redirect('/')->with('status', 'No such category found');
        }
    }

    // view products by category
    public function viewProductsByCategory($slug)
    {
        if (Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::orderBy('created_at', 'desc')->where('category_id', $category->id)->where('status', '1')->get();
            return view('frontend.product.index')->with([
                'category' => $category,
                'products' => $products,
            ]);
        }
        else
        {
            return redirect('/')->with('success', 'Category does not exits');
        }
    }
}
