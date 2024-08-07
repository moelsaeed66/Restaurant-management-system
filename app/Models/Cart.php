<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['quantity','user_id','food_id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

}
