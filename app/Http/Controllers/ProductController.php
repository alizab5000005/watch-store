<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin/product/products')->with('products',Product::all());
    }

    public function add_product()
    {
        $categories = DB::table('categories')->where(['category_status' => 1])->get();  
      
        return view('admin/product/add_product',compact('categories'));
    }

    public function store_product(Request $request)
    {
        $i = Product::create($request->all());

        if($request->hasFile('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Product::where('id',$i->id)->update(['image'=>$filename]);

        }
        return redirect('admin/product/products')->with('msg','Product Added');
    }


    public function show(Product $product)
    {
        //
    }

 
    public function edit_product(Request $request)
    {
        $selected_category = Product::join('categories', 'categories.id' ,'=', 'products.category_id')->get();
        $categories = DB::table('categories')->where(['category_status' => 1])->get(); 
        return view('admin/product/edit_product', compact('selected_category','categories'))->with('product',Product::find($request->id));
    }

    public function update_product(Request $request, Product $product)
    {
        if($request->hasFile('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Product::where('id',$i->id)->update(['image'=>$filename]);

        }
        Product::find($request->id)->update(['name'=>$request->name,'category_id'=>$request->category_id,
        'brand'=>$request->brand,'model'=>$request->model,'short_desc'=>$request->short_desc,
        'keywords'=>$request->keywords,'technical_specification'=>$request->technical_specification,
        'warranty'=>$request->warranty]);
        return redirect('admin/product/products')->with('msg', 'Producted Updated');
    }

    
    public function delete(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->back()->with('msg', 'product has been deleted successfuly');
    }

    public function activate_product(Request $request)
    {
        Product::find($request->id)->update(['status' => true]);
        return redirect('admin/product/products')->with('msg', 'product has been Acticated');
    }

    public function deactivate_product(Request $request)
    {
        Product::find($request->id)->update(['status' => false]);
        return redirect('admin/product/products')->with('msg', 'product has been Deacticated');
    }
     public function search(Request $request)
    {

        $products = Product::where('name','like','%'.$request->searchTerm.'%')->get();
        return redirect()->back()->with(compact('products'));

    }
}
