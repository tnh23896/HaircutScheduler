<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Admin\Auth\LoginRequests;

class LoginController extends Controller

{


    public function showAdminLoginForm()
    {
        return view('admin.Auth.login');
    }

    public function adminLogin(LoginRequests $request)
    {
        

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            
            return redirect()->route('admin.dashboard')->with('success','Đăng nhập thành công');
        }
        return back()->withInput($request->only('email', 'remember'))->with('error','Đăng nhập không thành công');
    }


    public function logout()
    {
      
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Đăng xuất thành công');
    }
}
