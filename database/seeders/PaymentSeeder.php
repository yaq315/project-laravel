<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\User;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // جلب جميع الحجوزات
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            Payment::create([
                'user_id' => $booking->user_id,
                'booking_id' => $booking->id,
                'amount' => rand(50, 500), // مبلغ عشوائي بين 50 و 500 دولار
                'status' => ['pending', 'paid'][rand(0, 1)], // تحديد الحالة عشوائيًا
            ]);
        }
    }
}
