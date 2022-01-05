<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

class ShowProduct extends Controller
{
    public function show_product()
    {
        $products = DB::table('products')->where(['status'=>1])->limit(16)->get();
        $shirt = DB::table('products')->where(['status'=>1])->get();
        $brands = DB::table('brands')->get();

        return view('index',compact('products','shirt','brands'));
    }
  
    public function show_single_product(Request $request)
    {
        $single_product = DB::table('products')->where('id','=',$request->id)->get();
       $qty = DB::table('products')->where('id','=',$request->id)->get(['qty']);
       $related_product = DB::table('products')->where(['category_id'=>$request->category_id])->get();
       

        $cat_id = $request->category_id;
        $id = $request->id;
      
     
        return view('single_product',compact('single_product','related_product','cat_id','id','qty'));
    }
    public function show_men_product(Request $request)
    {
        $products = DB::table('products')->where('category_id','=',1)->get();
      
        return view('single_product',compact('products'));
    }
    public function specific_brand(Request $request)
    {
       // $products = DB::table('products')->where(['status'=>1])->get();
        $shirt = DB::table('products')->where(['status'=>1])->get();
        $brands = DB::table('brands')->get();
        $products = DB::table('products')->where(['status'=>1,'brand'=>$request->id])->get();
        return view('index',compact('products','shirt','brands','products'));
    }
    
}
