<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CartModelRepository implements CartRepository
{
    protected $items;
    public function __construct()
    {
        $this->items=collect([]);
    }

    public function add(Food $food, $quantity = 1)
    {
        $item=Cart::where('food_id','=',$food->id)->first();
//        dd($item);
        if(!$item)
        {
            $cart=Cart::create([
                'user_id'=>Auth::id(),
                'food_id'=>$food->id,
                'quantity'=>$quantity
            ]);
            return $cart;
        }
        return $item->increment('quantity',$quantity);
    }

    public function delete(string $id)
    {
//        dd($id);
        Cart::where('food_id',$id)->delete();
    }

    public function update($id, $quantity)
    {
        Cart::where('id','=',$id)
            ->update([
                'quantity'=>$quantity
            ]);
    }

    public function empty($id)
    {
        Cart::query()->delete();
    }

    public function get(): Collection
    {
        if(!$this->items->count())
        {
            $this->items=Cart::with('food')->get();
        }
        return $this->items;
    }

    public function total(): float
    {
        return $this->get()->sum(function ($item){
            return $item->Quantity * $item->food->price;
        });
    }

}


