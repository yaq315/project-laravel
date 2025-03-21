<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function showLogin()
    {
        return view('auth.login');
    }

    // معالجة تسجيل الدخول
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // توجيه المستخدم بناءً على الدور
            if ($user->role === 'admin') {
                return redirect()->route('dashboard'); // لوحة تحكم الأدمن
            } elseif ($user->role === 'super_admin') {
                return redirect()->route('superadmin'); // لوحة تحكم السوبر أدمن
            } else {
                return redirect()->route('users.profile'); // صفحة المستخدم
            }
        }

        // إذا فشل تسجيل الدخول
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // عرض صفحة التسجيل
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // معالجة التسجيل
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // إنشاء المستخدم مع الدور الافتراضي "user"
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // الدور الافتراضي
        ]);
    
        return redirect()->route('login')->with('success', 'Account created successfully!');
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home'); // العودة إلى الصفحة الرئيسية
    }
}