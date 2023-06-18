<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth')->group(function() {
    Route::get('products', [ProductController::class, 'index'])->name('product.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('products', [ProductController::class, 'store'])->name('product.store');
});
