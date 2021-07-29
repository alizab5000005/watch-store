<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminUserAuth
{
  
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
          
        }
        else
        {
             return redirect('admin/admin_user/login')->with('msg','Access Denied');
        }
        return $next($request);
    }
}
