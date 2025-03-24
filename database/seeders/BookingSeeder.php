<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Adventure;
use App\Models\Booking;
use Carbon\Carbon;

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

        $reminderPreferences = [1, 6, 24, 72]; // خيارات التذكير بالساعات
        $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];
        
        foreach ($users as $user) {
            foreach ($adventures as $adventure) {
                // إنشاء تواريخ منطقية (تاريخ النهاية بعد البداية)
                $startDate = Carbon::now()
                    ->addDays(rand(1, 30))
                    ->startOfDay()
                    ->addHours(rand(8, 12)); // بين 8 صباحاً و12 ظهراً
                
                $endDate = (clone $startDate)
                    ->addDays(rand(1, 7))
                    ->startOfDay()
                    ->addHours(rand(14, 18)); // بين 2 ظهراً و6 مساءً

                // إنشاء الحجز مع تفضيل التذكير
                $booking = Booking::create([
                    'user_id' => $user->id,
                    'adventure_id' => $adventure->id,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'group_size' => rand(1, 10),
                    'status' => $statuses[array_rand($statuses)],
                    'reminder_preference' => $reminderPreferences[array_rand($reminderPreferences)],
                ]);

                // إنشاء تذكيرات للحجوزات المؤكدة فقط
                if ($booking->status === 'confirmed') {
                    $this->createReminders($booking);
                }
            }
        }
    }

    /**
     * إنشاء تذكيرات للحجز
     */
    protected function createReminders(Booking $booking): void
    {
        // التذكير حسب تفضيل المستخدم
        $booking->reminders()->create([
            'reminder_time' => $booking->start_date->subHours($booking->reminder_preference),
            'type' => 'email',
            'sent_at' => rand(0, 1) ? now() : null, // بعضها مرسل والبعض لم يرسل بعد
        ]);

        // تذكير إضافي قبل ساعة واحدة (50% من الحجوزات)
        if (rand(0, 1)) {
            $booking->reminders()->create([
                'reminder_time' => $booking->start_date->subHour(),
                'type' => 'email',
                'sent_at' => null,
            ]);
        }
    }
}