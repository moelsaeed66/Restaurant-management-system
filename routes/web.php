<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('orders', OrderController::class);
Route::resource('reservations',ReservationController::class);
Route::resource('chefs', ChefController::class);
Route::resource('carts', CartController::class);
Route::get('/search',[OrderController::class,'search'])->name('search');
Route::get('carts/delete/{cart}',[CartController::class,'delete'])->name('carts.delete');

Route::get('carts/empty/{cart}',[CartController::class,'empty'])->name('carts.empty');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
Route::resource('/foods', FoodController::class);

//Admin
Route::get('/users',[AdminController::class,'index'])->name('users.index');
Route::delete('/users/{user}',[AdminController::class,'deleteUser'])->name('users.delete');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

