<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth')->group(function() {
    Route::get('products', [ProductController::class, 'index'])->name('product.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('products', [ProductController::class, 'store'])->name('product.store');
});

Route::get('/products/{product}', function () {
    list($response, $status) = \App\Http\Facades\ProductServiceClient::FindOne(new \Google\Protobuf\GPBEmpty())->wait();
    if ($status->code !== \Grpc\STATUS_OK) {
        dd($status);
    }

    return $response->getName();
});
