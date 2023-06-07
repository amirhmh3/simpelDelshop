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

Route::get('/', [\App\Http\Controllers\api\PostController::class,"getAll"])->middleware("auth:web");
Route::get('/permission', [\App\Http\Controllers\PermissionController::class,"index"])->middleware("auth:web");
Route::post('/permission/role', [\App\Http\Controllers\RoleController::class,"store"])->middleware("auth:web");
Route::post('/permission', [\App\Http\Controllers\PermissionController::class,"store"])->middleware("auth:web");
Route::post('/file', [\App\Http\Controllers\api\FileController::class,"create"])->middleware("auth:web");
Route::post('/store', [\App\Http\Controllers\api\FileController::class,"storeWeb"])->middleware("auth:web");

Route::get("/dashboard",function (){
    return view('layouts.front');
});

Auth::routes();

Route::group(['prefix'=>"customer",'middleware'=>['auth:web']],function (){
    Route::get('/',[\App\Http\Controllers\api\CustomerController::class,"getAll"]);
    Route::get('/wallet',[\App\Http\Controllers\api\CustomerController::class,"getAllWalletWeb"])->middleware('access.customer');
});

Route::group(['prefix'=>"colleague",'middleware'=>['auth:web']],function (){
    Route::get('/',[\App\Http\Controllers\api\ColleagueController::class,"getAll"]);
});




