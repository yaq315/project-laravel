<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BookingReminder extends Notification implements ShouldQueue
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('تذكير بحجزك القادم - ' . $this->booking->adventure->name)
            ->line('تذكير بحجزك القادم:')
            ->line('المغامرة: ' . $this->booking->adventure->name)
            ->line('التاريخ: ' . $this->booking->start_date->format('Y-m-d'))
            ->line('عدد الأفراد: ' . $this->booking->group_size)
            ->action('عرض تفاصيل الحجز', url('/bookings/' . $this->booking->id))
            ->line('شكراً لاستخدامك خدمتنا!');
    }
}