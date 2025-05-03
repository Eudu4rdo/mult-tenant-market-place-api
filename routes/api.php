<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarketController;

Route::get('/', function () {
    return response()->json([
        'message' => 'Hello World',
        'version' => app()->version(),
        'status' => 200,
    ]);
});

Route::group(['prefix' => 'auth'], function() {
        Route::post('login',     [AuthController::class, 'login'])->name('login');
        Route::post('register',  [AuthController::class, 'register'])->name('register');
        Route::get('logout',     [AuthController::class, 'logout']);
        Route::get('refresh',    [AuthController::class, 'refresh']);
        Route::get('me',         [AuthController::class, 'me']);
});

Route::group(['prefix' => 'market'], function() {
    Route::post('create', [MarketController::class, 'create']);
    Route::post('update', [MarketController::class, 'update']);
});