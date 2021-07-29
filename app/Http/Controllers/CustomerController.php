<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customer_login()
    {
        return view('login');
    }
    
    public function customer_auth(Request $request)
    {
       $email =  $request->post('email');
       $password = $request->post('password');
       
       $verify_email = "";
       $verify_pass = "";
       $res = "";

       $result = Customer::where('email',$email)->value('email');
       $results = Customer::where('password',$password)->value('password');
       //return $result.$results;
       
       
      
       if($result && $results){
        $res = Customer::where(['email'=>$result,'status'=>1])->get();
        foreach ($res as $r) {
        $request->session()->put('CUSTOMER_LOGIN',true);
        $request->session()->put('CUSTOMER_ID',$r->id);
        $request->session()->put('CUSTOMER_EMAIL',$r->email);
        $request->session()->put('CUSTOMER_NAME',$r->full_name);
        $request->session()->put('CUSTOMER_USERNAME',$r->username);

        $items =DB::table('carts')->where(['customer_id'=>session('CUSTOMER_ID')])->get();
        $i = count($items);
        session(['k' => $i]);
        }
       
        return redirect()->back(); 
       }
       
       else{
           return redirect('customer_login')->with('msg', 'Please Enter Correct Email and Password');
       }
    
      
    }

   
    public function customer_reg(Request $request)
    {
        return view('reg');
    }

    public function customer_store(Request $request)
    {
        $get_id = Customer::create($request->all());
       
        $res = Customer::where(['id'=>$get_id->id])->get();
         foreach ($res as $r) {
        $request->session()->put('CUSTOMER_LOGIN',true);
        $request->session()->put('CUSTOMER_ID',$r->id);
        $request->session()->put('CUSTOMER_EMAIL',$r->email);
        $request->session()->put('CUSTOMER_NAME',$r->full_name);
        $request->session()->put('CUSTOMER_USERNAME',$r->username);

        $items =DB::table('carts')->where(['customer_id'=>session('CUSTOMER_ID')])->get();
        $i = count($items);
        session(['k' => $i]);
        }
        return redirect('/')->with('msg','Account Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
