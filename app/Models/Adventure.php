<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'type',
        'max_group_size',
        'start_date',
        'end_date',
        'duration',
    ];

    // العلاقة مع نموذج الحجز
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}