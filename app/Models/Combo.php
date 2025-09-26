<?php

namespace App\Models;

use App\Models\Pizza;
use App\Models\Dessert;
use App\Models\Category;
use App\Models\SoftDrink;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'pizza_id_1',
        'pizza_id_2',
        'soft_drink_id',
        'dessert_id',
        'price',
        'image',
        'status'
    ];

    public function pizza1() {
        return $this->belongsTo(Pizza::class, 'pizza_id_1');
    }

    public function pizza2() {
        return $this->belongsTo(Pizza::class, 'pizza_id_2');
    }

    public function softdrink() {
        return $this->belongsTo(SoftDrink::class, 'soft_drink_id');
    }

    public function dessert() {
        return $this->belongsTo(Dessert::class, 'dessert_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}


