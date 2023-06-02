<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register',[\App\Http\Controllers\api\Auth\UserController::class,'register']);
Route::post('login',[\App\Http\Controllers\api\Auth\UserController::class,"login"]);


Route::group(['prefix'=>"colleague",'middleware'=>['auth:api','access.colleague']],function (){
    Route::resource("/",\App\Http\Controllers\api\ColleagueController::class);
});

Route::group(['prefix'=>"customer",'middleware'=>['auth:api','access.customer']],function (){
    Route::resource("/",\App\Http\Controllers\api\CustomerController::class);
});
