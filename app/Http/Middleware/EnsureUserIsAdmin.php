<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */  public function handle(Request $request, Closure $next): Response
    {
        // التحقق من أن المستخدم مسجل باستخدام Guard 'admin'
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // إذا لم يكن المستخدم مسجلاً، يتم توجيهه إلى صفحة تسجيل الدخول مع رسالة خطأ
        return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
    }
}
