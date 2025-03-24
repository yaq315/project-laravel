<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmation extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail']; // يمكنك إضافة 'database' إذا أردت تخزين الإشعارات في قاعدة البيانات
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Booking Confirmation')
                    ->line('Your booking has been confirmed.')
                    ->line('Booking Details:')
                    ->line('Start Date: ' . $this->booking->start_date)
                    ->line('End Date: ' . $this->booking->end_date)
                    ->action('View Booking', url('/bookings/' . $this->booking->id))
                    ->line('Thank you for using our service!');
    }

    public function toArray($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'message' => 'Your booking has been confirmed'
        ];
    }
}