<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Topping extends Model
{
    protected $fillable = [
        'cart_id',
        'user_id',
        'topping_id',
        'name',
        'price',
    ];
}
