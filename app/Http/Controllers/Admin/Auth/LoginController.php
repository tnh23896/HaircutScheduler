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

        if (Auth::guard('admin')->attempt($credentials, $request->input('remember_token'))) {
            // Xác thực đăng nhập thành công
            $admin = Auth::guard('admin')->user();
            $remember_token = Str::random(60);
            $admin->remember_token = $remember_token;
            $admin->save();
            return redirect()->route('admin.dashboard')->with('success','Đăng nhập thành công');
        }
        return back()->withInput($request->only('email', 'remember_token'))->with('error','Đăng nhập không thành công');
    }


    public function logout()
    {
        $admin = Auth::guard('admin')->user();
        if ($admin) {
            $admin->update(['remember_token' => null]);
        }
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Đăng xuất thành công');
    }
}
