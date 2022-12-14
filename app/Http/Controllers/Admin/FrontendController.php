<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // show admin dashboard main page
    public function index(){
        return view('admin.index');
    }

    // show all customer
    public function users(){
        return view('admin.index');
    }

    // search function
    public function productListAjax()
    {
        $products = Product::select('name')->where('status', '1')->get();
        $data = [];

        foreach ($products as $item)
        {
            $data[] = $item['name'];
        }

        return $data;
    }

    // searchproduct
    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;

        if ($searched_product != "")
        {
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();

            if ($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with("status", "No products matched your search");
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
