<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    
    public function order(Request $request)
    {
        $pmode = $request->post('pay_mode');
        
        $phone = $request->post('phone');
        $zip_code = $request->post('zip_code');
        $city = $request->post('city');
        $address = $request->post('address');
        $products = $request->post('products');
        $total_amount = $request->post('total_amount');

         $product ='';
         foreach ($products as $pro) {
             $product .= $pro.', ';
         }
        // return $product;
        DB::table('orders')->insert([
        'customer_name' => session("CUSTOMER_NAME"),
        'customer_email' => session("CUSTOMER_EMAIL"),
        'customer_phone' => $phone,
        'city' => $city,
        'zip_code' => $zip_code,
        'address' => $address,
        'products' => $product,
        'total_amount' => $total_amount,
        'pay_mode' => $pmode,
        
         ]);
        DB::table('carts')->where(['customer_id'=>session('CUSTOMER_ID')])->delete();

        $items =DB::table('carts')->where(['customer_id'=>session('CUSTOMER_ID')])->get();
        $i = count($items);
        session(['k' => $i]);
        return redirect('/')->with('msg', 'You Order has been placed successfully');
    }

     public function complete_order(Request $request)
    {
        $customers = DB::table('orders')->where(['id'=>$request->id])->update(['Completed'=>true]);
        return redirect()->back()->with('msg','Order has been Completed');
    }

    // public function incomplete_order(Request $request)
    // {
    //  $customers = DB::table('orders')->where(['id'=>$request->id])->update(['Completed'=>false]);
    //  return redirect()->back()->with('msg','customer has been deactivated');
    // }
    public function destroy(Order $order)
    {
        //
    }
}
