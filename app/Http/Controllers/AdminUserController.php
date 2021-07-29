<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
   
    public function admin_user_login()
    {
        return view('admin/admin_user/login');
    }

    public function admin_user_auth(Request $request)
    {
       $email =  $request->post('email');
       $password = $request->password;
       
       $result = AdminUser::where(['email' => $email])->first();
       
       if($result)
       {
        if(Hash::check($request->post('password'),$result->password))
            {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                $request->session()->put('ADMIN_EMAIL',$result->email);
                $request->session()->put('ADMIN_USERNAME',$result->username);
                
                return redirect('admin/dashboard'); 
            }
            else
            {
                return redirect('admin/admin_user/login')->with('msg','Enter the correct password');  
            }
       }
       else
       {
       return redirect('admin/admin_user/login')->with('msg','Enter the correct password');  
       }
    }
    


    public function dashboard(Request $request)
    {
        return view('admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $adminUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $adminUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminUser $adminUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminUser $adminUser)
    {
        //
    }


    public function update_admin(Request $request)
    {
        $r = AdminUser::find(1);
        $r->password=Hash::make('12');
        $r->save();
    }

}
