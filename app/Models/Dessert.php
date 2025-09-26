<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'size',
        'status', // e.g., 'available', 'unavailable'
        'category_id',
    ];
}
