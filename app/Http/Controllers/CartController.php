<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartRepository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository=$cartRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $count=Cart::where('user_id','=',Auth::id())->count();
//        $total=$this->cartRepository->total();

//        dd($user_id);
        $carts=Cart::with('food')->where('user_id',$user_id)->get();
//        dd($total);
        if($count==0)
        {
            return redirect()->route('redirect');

        }else
        {
            return view('user.carts',[
                'cart'=>$this->cartRepository,
                'count'=>$count
            ]);
        }
//        dd($carts);

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
        $quantity=$request->post('quantity');
        $food=Food::findOrFail($request->query('cart'));
//        dd($request);
//        $request->validate([
//            'quantity'=>['required','int','min:1'],
//            'user_id'=>['required','int','exists:users,id'],
//            'food_id'=>['required','int']
//        ]);


        $this->cartRepository->add($food,$quantity);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        $count=Cart::where('user_id','=',Auth::id())->count();

        return view('user.cart_edit',compact('cart','count'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $this->cartRepository->update($id,$request->post('quantity'));
        return redirect()->route('carts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        dd($id);
        $this->cartRepository->delete($id);
        return redirect()->route('carts.index');
    }

    public function empty(string $id)
    {
        $this->cartRepository->empty($id);
        return redirect()->route('redirect');
    }
}
