<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'booking_id',
        'phone',
        'guests',
        'booking_date',
        'booking_time',
        'special_request',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
