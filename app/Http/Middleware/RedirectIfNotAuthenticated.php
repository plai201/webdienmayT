<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Người dùng chưa đăng nhập, chuyển hướng hoặc xử lý theo yêu cầu của bạn
            return redirect('/trang-chu'); // Chuyển hướng đến trang chủ hoặc trang đăng nhập
        }

        return $next($request);
    }
}
