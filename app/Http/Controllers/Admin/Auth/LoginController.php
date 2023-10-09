<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller

{
   

    public function showAdminLoginForm()
    {
        return view('admin.Auth.login');
    }

    public function adminLogin(Request $request)
    {
        
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt($request->only(['email','password']))){
            return to_route('admin.dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
