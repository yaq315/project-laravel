<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingReminder;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'adventure_id',
        'start_date',
        'end_date',
        'group_size',
        'status',
        'reminder_preference' ,
    ];

    const REMINDER_1_HOUR = 1;
    const REMINDER_24_HOURS = 24;
    const REMINDER_3_DAYS = 72;

    // العلاقة مع نموذج المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع نموذج المغامرة
    public function adventure()
    {
        return $this->belongsTo(Adventure::class);
    }

    public function reviews()
{
    return $this->hasMany(Review::class);
}

public function payment()
{
    return $this->hasOne(payment::class);
}

public function reminders()
{
    return $this->hasMany(BookingReminder::class);
}

}