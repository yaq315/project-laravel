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
            SuperAdminSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
            ReviewSeeder::class,
            BookingRemindersSeeder::class,
            NotificationsTableSeeder::class,

        ]);
    }
}