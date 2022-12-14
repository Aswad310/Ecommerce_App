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
        $popularCategories = Category::latest()->where('popular', 1)->take(15)->get();
        $trendingProducts = Product::latest()->where('trending', 1)->take(10)->get();
        $categories = Category::latest()->where('status', 1)->get();
        $products = Product::latest()->where('qty', '>=', '1')->get();
        return view('frontend.index')->with([
            'popularCategories' => $popularCategories,
            'trendingProducts' => $trendingProducts,
            'categories' => $categories,
            'products' => $products,
            ]);
    }

    // user category page
    public function category()
    {
        $allCategories = Category::latest()->where('status', 1)->get();
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

    // search function
    public function productListAjax()
    {
        // get product names according to active status
        $products = Product::select('name')->where('status', '1')->get();
        // intialize empty data array
        $data = [];
        // get item one by one and store them in data[]
        foreach ($products as $item)
        {
            $data[] = $item['name'];
        }
        // return data
        return $data;
    }

    // search product
    public function searchProduct(Request $request)
    {
        // take the product name from upcoming request
        $searched_product = $request->product_name;
        // if searched_product is not empty
        if ($searched_product != "")
        {
            // query to find name in database using wildcards
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            // if find that name return the page
            if ($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            // no page found
            else
            {
                return redirect()->back()->with("status", "No products matched your search");
            }
        }
        // else redirect to back page
        else
        {
            return redirect()->back();
        }
    }
}
