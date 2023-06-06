<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware("auth:web");

Auth::routes();

Route::group(['prefix'=>"customer",'middleware'=>['auth:web']],function (){
    Route::get('/',[\App\Http\Controllers\api\CustomerController::class,"getAll"]);
    Route::get('/wallet',[\App\Http\Controllers\api\CustomerController::class,"getAllWallet"]);
});

Route::group(['prefix'=>"colleague",'middleware'=>['auth:web']],function (){
    Route::get('/',[\App\Http\Controllers\api\ColleagueController::class,"getAll"]);
});
