<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable=[
        'price','title','description','image'
    ];
    public function carts()
    {
        return $this->belongsToMany(Cart::class,
        'cart_id',
    'food_id',
        'id',
            'id');
    }
}
