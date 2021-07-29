<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin/category/categories', compact('categories'));
        return view('admin/category/categories');
    }

    public function add_category()
    {
       return view('admin/category/add_category');
    }

    public function store_category(Request $request)
    {
        Category::create($request->all());
        return redirect('admin/category/categories')->with('msg', 'Category has been created successfuly');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit_category(Request $request)
    {
       return view('admin/category/edit_category')->with('category',Category::find($request->id));
    }

    public function update_category(Request $request)
    {
        Category::find($request->id)->update(['category_name' => $request->category_name]);
        return redirect('admin/category/categories')->with('msg', 'Category has been update');    
    }

    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->back()->with('msg', 'Category has been deleted successfuly');
    }

    public function activate_category(Request $request)
    {
        Category::find($request->id)->update(['category_status' => true]);
        return redirect('admin/category/categories')->with('msg', 'Category has been Acticated');
    }

    public function deactivate_category(Request $request)
    {
        Category::find($request->id)->update(['category_status' => false]);
        return redirect('admin/category/categories')->with('msg', 'Category has been Deacticated');
    }
}
