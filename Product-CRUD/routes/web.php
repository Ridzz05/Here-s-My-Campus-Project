<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/suppliers', [SupplierController::class, 'index'])->name('supplier.index');

Route::resource('/produk', ProductController::class);

