<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    
    public function order(OrderRequest $request)
    {
        $pmode = $request->post('pay_mode');
        
        $phone = $request->post('customer_phone');
        $zip_code = $request->post('zip_code');
        $city = $request->post('city');
        $address = $request->post('address');
        $products = $request->post('products');
        $q = $request->post('q');
         $p_id = $request->post('p_id');
        $total_amount = $request->post('total_amount');

         $product ='';
         foreach ($products as $pro) {
             $product .= $pro.', ';
            
         }
         
       //echo $q;
        
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
        'Completed' => 0,
        
         ]);
        $a = DB::table('carts')->where(['customer_id'=>session('CUSTOMER_ID')])->count();
         $p = '';
         $i = '';
         $r = 0;
        
         foreach ($q as $pro) {
             $p .= $pro.', ';
            $r =  intval($p);
            // echo $pro;
         }
     

     
       echo $r;
          $p_i_d ='';
         foreach ($p_id as $pro) {
             $p_i_d = $pro;
           
         
        // echo '<br>'.$p_i_d;
             $qs = DB::table('products')->where(['id'=>$p_i_d])->get();
         for ($i=0; $i < $a; $i++) { 
               foreach ($qs as $q_) {
           //  echo $q->qty-$r ;
             DB::table('products')->where(['id'=>$p_i_d])->update(['qty'=>$q_->qty - $r]);
         }
         }
          
      
     }
        
     
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
