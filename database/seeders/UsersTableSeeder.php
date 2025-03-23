<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        User::create([
            'name' => 'sama',
            'email' => 'sama@gmail.com',
            'password' => bcrypt('12345678'), 
        ]);

        User::create([
            'name' => 'yaqoot',
            'email' => 'yaqoot@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'rama',
            'email' => 'rama@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
         'name' => 'omer',
         'email' => 'omer@gmail.com',
         'password' => bcrypt('12345678'),
     ]);
     User::create([
         'name' => 'ahmed',
         'email' => 'ahmed@gmail.com',
         'password' => bcrypt('12345678'),
     ]);
    }
}
