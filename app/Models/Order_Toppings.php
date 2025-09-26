<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Topping;
use Illuminate\Database\Eloquent\Model;

class Order_Toppings extends Model
{
    protected $fillable = [
        'order_item_id',
        'topping_id',
        'name',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }
}
