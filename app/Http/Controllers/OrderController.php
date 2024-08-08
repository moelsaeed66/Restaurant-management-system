<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
//    protected $items;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::all();
//        dd($this->cartRepository->get());
        return view('admin.orders.index',[
            'orders'=>$orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);

        foreach ($request->food_name as $key=>$value)
        {
            Order::create([
                'food_name'=>$value,
                'price'=>$request->price[$key],
                'quantity'=>$request->quantity[$key],
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
            ]);
        }
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function search(Request $request)
    {
        $search=$request->search;
        $orders=Order::where('name','LIKE','%'.$search.'%')->orWhere('food_name','LIKE','%'.$search.'%')->get();
        return view('admin.orders.index',[
            'orders'=>$orders,
        ]);
    }

}
