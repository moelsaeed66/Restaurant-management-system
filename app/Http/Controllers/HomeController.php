<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function redirect()
    {
        $chefs=Chef::all();
        $users=User::all();
        $foods=Food::all();
        $count=Cart::where('user_id','=',Auth::id())->count();

        $user=Auth::user()->user_type;
        if($user=='1')
        {
            return view('admin.index');
        }else
        {
            return view('user.index',compact('chefs','foods','count'));
        }
    }
}
