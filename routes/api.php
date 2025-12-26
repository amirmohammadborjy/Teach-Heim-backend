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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/login',[\App\Http\Controllers\UserController::class,'login']);
Route::middleware('auth:sanctum')->post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::post('/product', [\App\Http\Controllers\ProductController::class,'store']);



Route::prefix('user')->group(function () {
    Route::post('/', [\App\Http\Controllers\UserController::class,'store']);
    Route::get('/', [\App\Http\Controllers\UserController::class,'index']);
    Route::get('/{id}', [\App\Http\Controllers\UserController::class,'show']);
    Route::delete('/{id}', [\App\Http\Controllers\UserController::class,'destroy']);
    Route::put('/{id}', [\App\Http\Controllers\UserController::class,'update']);
});

Route::prefix('product')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class,'index']);
    Route::get('/{id}', [\App\Http\Controllers\ProductController::class,'show']);
    Route::delete('/{id}', [\App\Http\Controllers\ProductController::class,'destroy']);
    Route::put('/{id}', [\App\Http\Controllers\ProductController::class,'update']);
    Route::get('/offer', [\App\Http\Controllers\ProductController::class,'offer']);
    Route::get('/category/{type}', [\App\Http\Controllers\ProductController::class,'category']);
});

Route::get('/latestProducts', [\App\Http\Controllers\ProductController::class,'lastestProducts']);



Route::prefix('category')->group(function () {
    Route::post('/', [\App\Http\Controllers\CategoryController::class,'store']);
    Route::get('/', [\App\Http\Controllers\CategoryController::class,'index']);
    Route::get('/{id}', [\App\Http\Controllers\CategoryController::class,'show']);
    Route::delete('/{id}', [\App\Http\Controllers\CategoryController::class,'destroy']);
    Route::put('/{id}', [\App\Http\Controllers\CategoryController::class,'update']);
});


Route::prefix('blog')->group(function () {
    Route::post('/', [\App\Http\Controllers\BlogController::class,'store']);
    Route::get('/', [\App\Http\Controllers\BlogController::class,'index']);
    Route::get('/{id}', [\App\Http\Controllers\BlogController::class,'show']);
    Route::delete('/{id}', [\App\Http\Controllers\BlogController::class,'destroy']);
    Route::put('/{id}', [\App\Http\Controllers\BlogController::class,'update']);
});


Route::prefix('brand')->group(function () {
    Route::post('/', [\App\Http\Controllers\BrandController::class,'store']);
    Route::get('/', [\App\Http\Controllers\BrandController::class,'index']);
    Route::get('/{id}', [\App\Http\Controllers\BrandController::class,'show']);
    Route::delete('/{id}', [\App\Http\Controllers\BrandController::class,'destroy']);
    Route::put('/{id}', [\App\Http\Controllers\BrandController::class,'update']);
});


Route::prefix('brand')->group(function () {
    Route::post('/', [\App\Http\Controllers\BrandController::class,'store']);
    Route::get('/', [\App\Http\Controllers\BrandController::class,'index']);
    Route::get('/{id}', [\App\Http\Controllers\BrandController::class,'show']);
    Route::delete('/{id}', [\App\Http\Controllers\BrandController::class,'destroy']);
    Route::put('/{id}', [\App\Http\Controllers\BrandController::class,'update']);
});

Route::prefix('contactus')->group(function () {
    Route::get('/', [\App\Http\Controllers\ContactusController::class,'index']);
    Route::get('/{id}', [\App\Http\Controllers\ContactusController::class,'show']);
    Route::delete('/{id}', [\App\Http\Controllers\ContactusController::class,'destroy']);
    Route::post('/', [\App\Http\Controllers\ContactusController::class,'store']);

});
