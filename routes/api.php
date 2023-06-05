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
Route::post('customer/register-form',[\App\Http\Controllers\api\CustomerController::class,"store"])->middleware('auth:api');
Route::post('colleague/register-form',[\App\Http\Controllers\api\ColleagueController::class,"store"])->middleware('auth:api');


Route::group(['prefix'=>"colleague",'middleware'=>['auth:api','access.colleague']],function (){
    Route::resource("/",\App\Http\Controllers\api\ColleagueController::class);
});

Route::group(['prefix'=>"customer",'middleware'=>['auth:api']],function (){
    Route::get('/',[\App\Http\Controllers\api\CustomerController::class,"index"]);
    Route::get('/wallet',[\App\Http\Controllers\api\CustomerController::class,"getAllWallet"]);
    Route::resource("/",\App\Http\Controllers\api\CustomerController::class)->middleware('access.customer');
});

Route::group(['prefix'=>"file",'middleware'=>['auth:api']],function (){
    Route::put('/{id}',[\App\Http\Controllers\api\FileController::class,"update"]);
    Route::resource("/",\App\Http\Controllers\api\FileController::class);
});

Route::group(['prefix'=>"post",'middleware'=>['auth:api','access.colleague']],function (){
    Route::resource("/",\App\Http\Controllers\api\PostController::class);
});

Route::group(['prefix'=>"wallet",'middleware'=>['auth:api','access.colleague']],function (){
    Route::resource("/",\App\Http\Controllers\api\WalletController::class);
});
