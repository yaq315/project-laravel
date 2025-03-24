<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Booking;
use Carbon\Carbon;

class NotificationsTableSeeder extends Seeder
{
    public function run()
    {
        // مسح البيانات القديمة إذا وجدت
        DB::table('notifications')->truncate();

        // الحصول على المستخدمين والحجوزات
        $users = User::all();
        $bookings = Booking::where('status', 'confirmed')->get();

        if ($users->isEmpty() || $bookings->isEmpty()) {
            $this->command->info('No users or confirmed bookings found!');
            return;
        }

        $notifications = [];

        foreach ($users as $user) {
            foreach ($bookings as $booking) {
                // إنشاء إشعارات متنوعة
                $notifications[] = [
                    'id' => \Illuminate\Support\Str::uuid()->toString(),
                    'type' => 'App\Notifications\BookingConfirmation',
                    'notifiable_type' => 'App\Models\User',
                    'notifiable_id' => $user->id,
                    'data' => json_encode([
                        'booking_id' => $booking->id,
                        'message' => 'Your booking #' . $booking->id . ' has been confirmed',
                        'start_date' => $booking->start_date,
                        'end_date' => $booking->end_date,
                        'action_url' => url('/bookings/' . $booking->id)
                    ]),
                    'read_at' => rand(0, 1) ? Carbon::now() : null,
                    'created_at' => Carbon::now()->subDays(rand(0, 30)),
                    'updated_at' => Carbon::now(),
                ];

                // 30% فرصة لإضافة إشعار آخر
                if (rand(0, 100) < 30) {
                    $notifications[] = [
                        'id' => \Illuminate\Support\Str::uuid()->toString(),
                        'type' => 'App\Notifications\BookingReminder',
                        'notifiable_type' => 'App\Models\User',
                        'notifiable_id' => $user->id,
                        'data' => json_encode([
                            'booking_id' => $booking->id,
                            'message' => 'Reminder: Your booking starts soon',
                            'date' => $booking->start_date,
                            'action_url' => url('/bookings/' . $booking->id)
                        ]),
                        'read_at' => null,
                        'created_at' => Carbon::now()->subDays(rand(0, 7)),
                        'updated_at' => Carbon::now(),
                    ];
                }
            }
        }

        // إدراج الإشعارات دفعة واحدة
        DB::table('notifications')->insert($notifications);

        $this->command->info('Successfully created ' . count($notifications) . ' notification records!');
    }
}