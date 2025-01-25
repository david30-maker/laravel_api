<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get(uri: '/user', action: function (Request $request): mixed {
    return $request->user();
})->middleware(middleware: 'auth:sanctum');

Route::post(uri: '/register', action: [AuthController::class, 'register']);
