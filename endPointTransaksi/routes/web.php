<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers', [\App\Http\Controllers\customers::class, 'index']);
Route::get('/customers/{id}', [\App\Http\Controllers\customers::class, 'show']);
Route::post('/customers', [\App\Http\Controllers\customers::class, 'store']);
Route::put('/customers/{id}', [\App\Http\Controllers\customers::class, 'update']);
Route::delete('/customers/{id}', [\App\Http\Controllers\customers::class, 'destroy']);

Route::get('/sales_areas', [\App\Http\Controllers\sales_areas::class, 'index']);
Route::get('/sales_areas/{id}', [\App\Http\Controllers\sales_areas      ::class, 'show']);
Route::post('/sales_areas', [\App\Http\Controllers\sales_areas::class, 'store']);
Route::put('/sales_areas/{id}', [\App\Http\Controllers\sales_areas::class, 'update']);
Route::delete('/sales_areas/{id}', [\App\Http\Controllers\sales_areas::class, 'destroy']);

Route::get('/sales_orders', [\App\Http\Controllers\sales_orders::class, 'index'])->name('sales_orders.index');
Route::get('/sales_orders/{id}', [\App\Http\Controllers\sales_orders::class, 'show']);
Route::post('/sales_orders', [\App\Http\Controllers\sales_orders::class, 'store']);
Route::put('/sales_orders/{id}', [\App\Http\Controllers\sales_orders::class, 'update']);
Route::delete('/sales_orders/{id}', [\App\Http\Controllers\sales_orders::class, 'destroy']);

Route::get('/sales_targets', [\App\Http\Controllers\sales_targets::class, 'index']);
Route::get('/sales_targets/{id}', [\App\Http\Controllers\sales_targets::class, 'show']);
Route::post('/sales_targets', [\App\Http\Controllers\sales_targets::class, 'store']);
Route::put('/sales_targets/{id}', [\App\Http\Controllers\sales_targets::class, 'update']);
Route::delete('/sales_targets/{id}', [\App\Http\Controllers\sales_targets::class, 'destroy']);

