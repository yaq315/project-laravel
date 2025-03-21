<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SuperAdminController extends Controller
{
       // عرض صفحة إدارة الأدوار
       public function manageRoles()
       {
           $users = User::where('role', '!=', 'super_admin')->get(); // استبعاد السوبر أدمن من القائمة
           return view('superadmin', compact('users'));
       }
   
       // تحديث دور المستخدم
       public function updateRole(Request $request, $id)
       {
           $user = User::findOrFail($id);
   
           // تحقق من أن المستخدم ليس سوبر أدمن
           if ($user->role !== 'super_admin') {
               $user->role = $request->role;
               $user->save();
               return redirect()->back()->with('success', 'User role updated successfully!');
           }
   
           return redirect()->back()->with('error', 'Cannot update super admin role.');
       }
}
