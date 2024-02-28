<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticateAdmin 
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng có đăng nhập bằng guard "admin" không
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect('/admin/login'); // Chuyển hướng đến trang đăng nhập admin
    }
}
