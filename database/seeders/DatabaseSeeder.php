<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // تنفيذ Seeders بالترتيب
        $this->call([
            AdventuresTableSeeder::class,
            UsersTableSeeder::class,
            BookingSeeder::class,
        ]);
    }
}