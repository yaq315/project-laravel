<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

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
}