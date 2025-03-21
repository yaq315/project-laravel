<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق من أن المستخدم مسجل وأن لديه دور 'super_admin'
        if (Auth::check() && Auth::user()->role === 'super_admin') {
            return $next($request);
        }

        // إذا لم يكن المستخدم مسجلاً أو ليس لديه الدور المطلوب، يتم توجيهه إلى الصفحة الرئيسية مع رسالة خطأ
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}