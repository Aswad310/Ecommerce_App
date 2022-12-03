<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // show all categories
    public function index(){
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.index')->with(['categories' => $categories]);
    }

    // show create category form
    public function create(){
        return view('admin.category.create');
    }

    // store category data in mysql
    public function store(StoreCategoryRequest $request){
        // validate upcoming request
        $categoryFields = $request->validated();
        // check image
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $categoryFields['image'] = $filename;
        }
        // store data in mysql
        Category::create($categoryFields);
        // redirect with success message
        return redirect('/categories')->with('success', 'Category Added Successfully');
    }

    // edit category data
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit')->with(['category' => $category]);
    }

    // update category data in mysql
    public function update(StoreCategoryRequest $request, Category $id){
        // check upcoming request
        $categoryFields = $request->validated();
        // update status
        $categoryFields['status'] = $request->status == true ? '1':'0';
        // update popular
        $categoryFields['popular'] = $request->popular == true ? '1':'0';
        // check image
        if ($request->hasFile('image')){
            // stores the old image file path
            $path = 'assets/uploads/category/'.$id->image;
            // if image exists delete that image
            if (File::exists($path)){
                File::delete($path);
            }
            // store the new image again in the given path
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $categoryFields['image'] = $filename;
        }
        // update data in mysql
        $id->update($categoryFields);
        // redirect with success message
        return redirect('/categories')->with('success', 'Category Updated Successfully');
    }

    // delete category data in mysql
    public function destroy(Category $id)
    {
        // check if image present then delete it from dir
        if ($id->image){
            $path = 'assets/uploads/category/'.$id->image;
            if (File::exists($path)){
                File::delete($path);
            }
        }
        // delete data in mysql
        $id->delete();
        // redirect with success message
        return redirect('/categories')->with('success', 'Category Deleted Successfully');
    }
}
