<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
public function run()
{
    User::create([
        'name' => 'Super Admin',
        'email' => 'superadmin@rumquest.com',
        'password' => Hash::make('password'), // كلمة المرور الافتراضية
        'role' => 'super_admin',
    ]);

    echo "Super Admin created successfully!\n";
}
}
