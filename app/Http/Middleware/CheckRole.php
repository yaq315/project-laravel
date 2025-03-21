<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // التحقق من الدور
        if ($user->role === $role) {
            return $next($request);
        }

        // إذا لم يكن لديه الصلاحية
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}