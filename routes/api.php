<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SubCategoryController;
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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('content')->group(function () {
    Route::get('/', [ContentController::class, 'index']);
    Route::get('/show/{id}', [ContentController::class, 'show']);
    Route::post('/', [ContentController::class, 'store']);
    Route::put('/{id}', [ContentController::class, 'update']);
    Route::delete('/{id}', [ContentController::class, 'destroy']);
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});
Route::prefix('sub_category')->group(function () {
    Route::get('/', [SubCategoryController::class, 'index']);
    Route::post('/', [SubCategoryController::class, 'store']);
    Route::put('/{id}', [SubCategoryController::class, 'update']);
    Route::delete('/{id}', [SubCategoryController::class, 'destroy']);
});

Route::prefix('carousel')->group(function () {
    Route::get('/', [CarouselController::class, 'index']);
    Route::post('/', [CarouselController::class, 'store']);
    Route::put('/{id}', [CarouselController::class, 'update']);
    Route::delete('/{id}', [CarouselController::class, 'destroy']);
});