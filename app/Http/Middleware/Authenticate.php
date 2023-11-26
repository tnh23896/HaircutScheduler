<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::check()) {
            // Người dùng chưa đăng nhập, bạn có thể chuyển hướng hoặc xử lý theo yêu cầu của bạn.
            return redirect()->route('home.index');
        }

        return $next($request);
    }
}
