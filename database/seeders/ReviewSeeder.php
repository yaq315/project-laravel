<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Booking;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // جلب جميع الحجوزات
        $bookings = Booking::all();

        // التأكد من وجود حجوزات في قاعدة البيانات
        if ($bookings->isEmpty()) {
            echo "No bookings found. Please seed the bookings first.";
            return;
        }

        // إنشاء 10 تقييمات عشوائية لكل حجز
        foreach ($bookings as $booking) {
            // تحديد عدد التقييمات
            $numberOfReviews = rand(1, 3);  // عدد التقييمات العشوائية لكل حجز
            
            for ($i = 0; $i < $numberOfReviews; $i++) {
                Review::create([
                    'booking_id' => $booking->id,
                    'user_id' => User::inRandomOrder()->first()->id, // اختيار مستخدم عشوائي
                    'rating' => rand(1, 5), 
                    'review' => 'This is a sample review for booking #' . $booking->id, 
                ]);
            }
        }
    }
}
