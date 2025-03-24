<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\BookingReminder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BookingRemindersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Clear existing data if any
            BookingReminder::truncate();

            // Get only confirmed bookings with dates converted to Carbon
            $confirmedBookings = Booking::where('status', 'confirmed')
                ->get()
                ->map(function ($booking) {
                    // Convert string dates to Carbon instances
                    $booking->start_date = Carbon::parse($booking->start_date);
                    $booking->end_date = Carbon::parse($booking->end_date);
                    return $booking;
                });

            if ($confirmedBookings->isEmpty()) {
                $this->command->info('No confirmed bookings found. Skipping reminders creation.');
                return;
            }

            foreach ($confirmedBookings as $booking) {
                try {
                    // Ensure reminder_preference has a value
                    $reminderPreference = $booking->reminder_preference ?? 24;

                    // Main reminder based on user preference
                    $this->createReminder(
                        $booking,
                        $booking->start_date->copy()->subHours($reminderPreference),
                        true // Already sent
                    );

                    // 50% chance for additional 1-hour reminder
                    if (rand(0, 1)) {
                        $this->createReminder(
                            $booking,
                            $booking->start_date->copy()->subHour(),
                            false // Not sent yet
                        );
                    }

                    // 30% chance for SMS reminder 3 hours before
                    if (rand(0, 100) < 30) {
                        $this->createReminder(
                            $booking,
                            $booking->start_date->copy()->subHours(3),
                            (bool)rand(0, 1), // Random sent status
                            'sms'
                        );
                    }
                } catch (\Exception $e) {
                    Log::error("Failed creating reminders for booking {$booking->id}: " . $e->getMessage());
                    continue;
                }
            }

            $this->command->info('Successfully created ' . BookingReminder::count() . ' booking reminders!');
            
        } catch (\Exception $e) {
            $this->command->error('Error in BookingRemindersSeeder: ' . $e->getMessage());
            Log::critical('BookingRemindersSeeder failed: ' . $e->getMessage());
        }
    }

    /**
     * Create a new reminder
     */
    protected function createReminder(Booking $booking, Carbon $reminderTime, bool $isSent, string $type = 'email'): void
    {
        try {
            BookingReminder::create([
                'booking_id' => $booking->id,
                'reminder_time' => $reminderTime,
                'sent_at' => $isSent ? now() : null,
                'type' => $type,
                'created_at' => now()->subDays(rand(0, 7)),
            ]);
        } catch (\Exception $e) {
            throw new \Exception("Failed to create reminder for booking {$booking->id}: " . $e->getMessage());
        }
    }
}