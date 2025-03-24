<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
    ];

    public function routeNotificationForMail()
{
    return $this->email;
}

    // العلاقة مع نموذج الحجز
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    
    
}