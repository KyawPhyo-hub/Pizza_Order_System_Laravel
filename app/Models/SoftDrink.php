<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftDrink extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'size',
        'status',
        'category_id',
    ];
}
