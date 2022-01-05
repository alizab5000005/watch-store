<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowOrder extends Controller
{
    public function show_order()
    {
    	$orders = DB::table('orders')->get();
    	return view('admin/order/orders', compact('orders'));
    }

   

    public function show_customers()
    {
    	$customers = DB::table('customers')->get();
    	return view('admin/customer/customers', compact('customers'));
    }

    public function deactivate_customer(Request $request)
    {
    	$customers = DB::table('customers')->where(['id'=>$request->id])->update(['status'=>false]);
    	return redirect()->back()->with('msg','customer has been deactivated');
    }

    public function activate_customer(Request $request)
    {
    	$customers = DB::table('customers')->where(['id'=>$request->id])->update(['status'=>true]);
    	return redirect()->back()->with('msg','customer has been activated');
    }

    public function delete_customer(Request $request)
    {
    	DB::table('customers')->delete(['id'=>$request->id]);
    	return redirect()->back()->with('msg','customer has been deleted');
    }
    public function show_order_to_user()
    {
        $c_orders = DB::table('orders')->where(['customer_name'=>session('CUSTOMER_USERNAME')])->get();
        return view('customers_orders',compact('c_orders'));
    }
}
