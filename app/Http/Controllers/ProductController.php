<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{
    public function index()
    {

        return view('admin/product/products')->with('products',Product::all());
    }

    public function add_product()
    {
        $categories = DB::table('categories')->where(['category_status' => 1])->get();  
        $brands = DB::table('brands')->get();
        return view('admin/product/add_product',compact('categories','brands'));
    }

    public function store_product(ProductRequest $request)
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
        $brands = DB::table('brands')->get();
        $selected_category = DB::table('categories')
->join('products','products.category_id','=','categories.id')->select('categories.id','categories.category_name')->where(['products.id'=>$request->id])->get();

        $selected_brand = DB::table('brands')->join('products','products.brand','=','brands.id')->select('brands.id','brands.brand_name')->where(['products.id'=>$request->id])->get();
$i = 0;
       foreach ($selected_category as $k) {
           $i = $k->id;
       }
       

        $categories = DB::table('categories')->where(['category_status' => 1])->get(); 
        return view('admin/product/edit_product', compact('selected_category','selected_brand','brands','categories'))->with('product',Product::find($request->id));
    }

    public function update_product(ProductEditRequest $request, Product $product)
    {
        if($request->hasFile('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Product::where('id',$request->id)->update(['image'=>$filename]);

        }
        Product::find($request->id)->update(['name'=>$request->name,'brand'=>$request->brand,'category_id'=>$request->category_id,
        'price'=>$request->price,'qty'=>$request->qty,'model'=>$request->model,'short_desc'=>$request->short_desc,'desc'=>$request->desc]);
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
