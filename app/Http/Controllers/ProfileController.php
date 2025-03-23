<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profilePage($id)
    {
        $user = User::with('bookings.adventure')->findOrFail($id);
        return view('users.profile', compact('user'));
    }

    public function updateImage(Request $request, $userId)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // الحد الأقصى 2MB
        ]);

        // جلب المستخدم
        $user = User::findOrFail($userId);

        // حذف الصورة القديمة إذا كانت موجودة
        if ($user->profile_image && Storage::exists('public/' . $user->profile_image)) {
            Storage::delete('public/' . $user->profile_image);
        }

        // حفظ الصورة الجديدة
        $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        $user->profile_image = $imagePath;
        $user->save();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Profile image updated successfully!');
    }
}