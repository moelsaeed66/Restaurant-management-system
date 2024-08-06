<?php

namespace App\Http\Controllers;

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
        $users=User::all();
        $user=Auth::user()->user_type;
        if($user=='1')
        {
            return view('admin.index');
        }else
        {
            return view('user.index');
        }
    }
}
