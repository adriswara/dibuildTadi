<?php

use App\Http\Controllers\CustomerController ;
use App\Http\Controllers\Sales_order_itemController;
use App\Http\Controllers\Sales_ordersController;
use Illuminate\Support\Facades\Route;

Route::post('/customers', [CustomerController ::class, 'store'])->name('api.customers.store');
Route::post('/sales_orders', [Sales_ordersController ::class, 'store'])->name('api.sales_orders.store');
Route::post('/sales_order_items', [Sales_order_itemController ::class, 'store'])->name('api.sales_order_items.store');


