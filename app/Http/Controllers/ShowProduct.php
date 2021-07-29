<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowProduct extends Controller
{
    public function show_product()
    {
        $products = DB::table('products')->get();
        $shirt = DB::table('products')->where(['name'=>'shirt'])->get();
        return view('index',compact('products','shirt'));
    }
  
    public function show_single_product(Request $request)
    {
        $single_product = DB::table('products')->where('id','=',$request->id)->get();
       
        $related_product = DB::table('products')->where('name','like','%'.$request->name.'%')->get();
       
        $cat_id = $request->category_id;
        $id = $request->id;
        return view('single_product',compact('single_product','related_product','cat_id','id'));
    }
    public function show_men_product(Request $request)
    {
        $products = DB::table('products')->where('category_id','=',1)->get();
      
        return view('single_product',compact('products'));
    }
     public function search(Request $request)
    {
        return DB::table('products')
        ->where('name', 'LIKE', '%{$request->searchTerm}%') 
        ->get();

    }
}
