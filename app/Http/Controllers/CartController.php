<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
  
    public function add_to_cart(Request $request)
    {

        Cart::create($request->all());
        $price = $request->price;
        $q = $request->qty;
        $r = $price*$q;
        
        Cart::where('p_id', $request->p_id)->update(['total_price' => $r]);

        $items =DB::table('carts')->where(['customer_id'=>session('CUSTOMER_ID')])->get();
        $i = count($items);
        session(['k' => $i]);
        return redirect()->back()->with('msg','Item added');
       
    }

   
    public function cart()
    {
    	$items =Cart::where(['customer_id'=>session('CUSTOMER_ID')])->get();
        return view('cart',compact('items'));
    }

   
    public function delete_item_from_cart(Request $request)
    {
        Cart::destroy($request->id);
        $items =DB::table('carts')->where(['customer_id'=>session('CUSTOMER_ID')])->get();
        $i = count($items);
        session(['k' => $i]);
    }
    public function proceed_to_checkout(Request $request)
    {
        return $request->qty;
        $products =  Cart::where(['customer_id'=>session('CUSTOMER_ID')])->get();

        return view('checkout', compact('products'));
    }
}
