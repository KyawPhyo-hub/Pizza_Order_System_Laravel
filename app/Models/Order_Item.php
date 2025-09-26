<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $table = 'order__items';

    protected $fillable = [
        'order_id',
        'menu_id',
        'category_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

}
