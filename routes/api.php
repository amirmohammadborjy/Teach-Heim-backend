<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [\App\Http\Controllers\UsersController::class,'store']);
Route::get('/user/getall', [\App\Http\Controllers\UsersController::class,'showall']);
Route::get('/user/{id}', [\App\Http\Controllers\UsersController::class,'show']);
Route::delete('/user/{id}', [\App\Http\Controllers\UsersController::class,'destroy']);
Route::put('/user/{id}', [\App\Http\Controllers\UsersController::class,'update']);


Route::post('/category', [\App\Http\Controllers\CategoryController::class,'store']);
Route::get('/category/getall', [\App\Http\Controllers\CategoryController::class,'index']);
Route::get('/category/{id}', [\App\Http\Controllers\CategoryController::class,'show']);
Route::delete('/category/{id}', [\App\Http\Controllers\CategoryController::class,'destroy']);
Route::put('/category/{id}', [\App\Http\Controllers\CategoryController::class,'update']);



Route::post('/brand', [\App\Http\Controllers\BrandController::class,'store']);
Route::get('/brand/getall', [\App\Http\Controllers\BrandController::class,'index']);
Route::get('/brand/{id}', [\App\Http\Controllers\BrandController::class,'show']);
Route::delete('/brand/{id}', [\App\Http\Controllers\BrandController::class,'destroy']);
Route::put('/brand/{id}', [\App\Http\Controllers\BrandController::class,'update']);


Route::post('/product', [\App\Http\Controllers\ProductController::class,'store']);
Route::get('/product/getall', [\App\Http\Controllers\ProductController::class,'showall']);
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class,'show']);
Route::delete('/product/{id}', [\App\Http\Controllers\ProductController::class,'destroy']);
Route::put('/product/{id}', [\App\Http\Controllers\ProductController::class,'update']);


Route::post('/order', [\App\Http\Controllers\OrderController::class,'store']);
Route::get('/order/getall', [\App\Http\Controllers\OrderController::class,'index']);
Route::get('/order/{id}', [\App\Http\Controllers\OrderController::class,'show']);
Route::delete('/order/{id}', [\App\Http\Controllers\OrderController::class,'destroy']);
Route::put('/order/{id}', [\App\Http\Controllers\OrderController::class,'update']);


Route::post('/payment', [\App\Http\Controllers\PaymentController::class,'store']);
Route::delete('/payment/{id}', [\App\Http\Controllers\PaymentController::class,'destroy']);
Route::put('/payment/{id}', [\App\Http\Controllers\PaymentController::class,'update']);


Route::post('/blog', [\App\Http\Controllers\BlogsController::class,'store']);
Route::get('/blog/getall', [\App\Http\Controllers\BlogsController::class,'index']);
Route::get('/blog/{id}', [\App\Http\Controllers\BlogsController::class,'show']);
Route::delete('/blog/{id}', [\App\Http\Controllers\BlogsController::class,'destroy']);
Route::put('/blog/{id}', [\App\Http\Controllers\BlogsController::class,'update']);

