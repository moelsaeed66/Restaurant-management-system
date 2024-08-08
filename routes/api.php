<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Foodcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
 Route::apiResource('/foods', Foodcontroller::class);



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
