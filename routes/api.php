<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('image', [ImageController::class, 'store']);
    Route::get('image', [ImageController::class, 'index']);
    Route::post('image/delete', [ImageController::class, 'destroy']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


