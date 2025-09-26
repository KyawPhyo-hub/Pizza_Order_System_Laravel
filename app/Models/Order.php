<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'status',
        'payment_status',
        'delivery_type',
        'delivery_address',
        'phone_number',
    ];

}
