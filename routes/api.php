<?php

use Illuminate\Support\Facades\Route;

Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('categories/flat', [\App\Http\Controllers\CategoryController::class, 'indexFlat']);

Route::get('category/{id}', [\App\Http\Controllers\CategoryController::class, 'show']);
Route::get('category/{id}/flat', [\App\Http\Controllers\CategoryController::class, 'showFlat']);

Route::post('category', [\App\Http\Controllers\CategoryController::class, 'create']);
Route::put('category/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
Route::delete('category/{id}', [\App\Http\Controllers\CategoryController::class, 'delete']);

Route::get('products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('product/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::post('product', [\App\Http\Controllers\ProductController::class, 'create']);
Route::put('product/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('product/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);

Route::put('product/{id}/categories', [\App\Http\Controllers\ProductController::class, 'updateCategories']);
