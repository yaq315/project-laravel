<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
    ];

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