<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HoroscopeController;

Route::group([
    'prefix' => 'auth',
    'controller' => AuthController::class
], function () { 
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('me', 'me');
});

Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/horoscope', [HoroscopeController::class, 'index']);

Route::post('/horoscope/edit', [HoroscopeController::class, 'update'])->middleware('auth');