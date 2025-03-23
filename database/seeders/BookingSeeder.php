<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Adventure;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // جلب جميع المستخدمين والمغامرات
        $users = User::all();
        $adventures = Adventure::all();

      
        foreach ($users as $user) {
            foreach ($adventures as $adventure) {
                Booking::create([
                    'user_id' => $user->id,
                    'adventure_id' => $adventure->id,
                    'start_date' => now()->addDays(rand(1, 30))->format('Y-m-d'),
                    'end_date' => now()->addDays(rand(31, 60))->format('Y-m-d'),
                    'group_size' => rand(1, 10),
                    'status' => ['pending', 'confirmed', 'rejected'][rand(0, 2)],
                ]);
            }
        }
    }
}