<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // show all products
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index')->with(['products' => $products]);
    }

    // show create products from
    public function create()
    {
        // get all categories for the select html tag
        $categories = Category::all();
        return view('admin.products.create')->with(['categories' => $categories,]);
    }

    // store product data in mysql
    public function store(StoreProductRequest $request)
    {
        // check upcoming request
        $productFields = $request->validated();
        // check image
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $productFields['image'] = $filename;
        }
        // store data in mysql
        Product::create($productFields);
        // redirect with success message
        return redirect('/products')->with('success', 'Product Added Successfully');
    }

    // edit product data page
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit')->with(['product' => $product]);
    }

    // update product data in mysql
    public function update(StoreProductRequest $request, Product $id)
    {
        // check upcoming request
        $productFields = $request->validated();
        // update status
        $productFields['status'] = $request->status == true ? '1':'0';
        // update popular
        $productFields['trending'] = $request->trending == true ? '1':'0';
        // check image
        if ($request->hasFile('image')){
            // stores the old image file path
            $path = 'assets/uploads/product/'.$id->image;
            // if image exists delete that image
            if (File::exists($path)){
                File::delete($path);
            }
            // store the new image again in the given path
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $productFields['image'] = $filename;
        }
        // update data in mysql
        $id->update($productFields);
        // redirect with success message
        return redirect('/products')->with('success', 'Category Updated Successfully');
    }

    // delete category data in mysql
    public function destroy(Product $id)
    {
        // check if image present then delete it from dir
        if ($id->image){
            $path = 'assets/uploads/product/'.$id->image;
            if (File::exists($path)){
                File::delete($path);
            }
        }
        // delete data in mysql
        $id->delete();
        // redirect with success message
        return redirect('/products')->with('success', 'Product Deleted Successfully');
    }
}
