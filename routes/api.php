<?php

use App\Http\Controllers\products\WavestoreProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('wavestore-product')->group(function () {
    Route::get('/', [WavestoreProductController::class, 'productIndex']);
});
