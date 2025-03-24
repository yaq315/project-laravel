<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'booking_id',
        'amount',
        'status',
        'payment_method',
        'transaction_id',
        'paid_at'
    ];

    // القيم المسموحة لحقل status
    const STATUS_PENDING_CASH = 'pending_cash';
    const STATUS_PAID = 'paid';
    const STATUS_PENDING = 'pending';
    const STATUS_FAILED = 'failed';
    
    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING_CASH,
            self::STATUS_PAID,
            self::STATUS_PENDING,
            self::STATUS_FAILED,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
