<?php

namespace App\Repositories;

use App\Models\Food;
use Illuminate\Support\Collection;

interface CartRepository
{
    public function get():Collection;
    public function add(Food $food,$quantity=1);
    public function update($id,$quantity);
    public function delete(string $id);
    public function empty(string $id);

    public function total():float;

}
