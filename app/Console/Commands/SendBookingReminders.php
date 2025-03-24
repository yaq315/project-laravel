<?php

namespace App\Console\Commands;

use App\Models\Booking;

use App\Notifications\BookingReminder;
use Illuminate\Console\Command;

class SendBookingReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send booking reminders to users';

    public function handle()
    {
        $bookings = Booking::where('status', 'confirmed')
            ->with(['user', 'adventure'])
            ->get();

        foreach ($bookings as $booking) {
            $reminderTime = $booking->start_date->subHours($booking->reminder_preference);
            
            if (now() >= $reminderTime && !$booking->reminders()->where('sent_at', '<=', $reminderTime)->exists()) {
                $booking->user->notify(new BookingReminder($booking));
                
                $booking->reminders()->create([
                    'reminder_time' => $reminderTime,
                    'sent_at' => now(),
                    'type' => 'email'
                ]);
            }
        }

        $this->info('Booking reminders sent successfully!');
    }
}