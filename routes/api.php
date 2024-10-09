<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return response()->json([
        'message' => 'Hello World',
        'version' => app()->version(),
        'status' => 200,
    ]);
});

Route::group(['prefix' => 'auth'], function() {
        Route::post('login',  [AuthController::class, 'login'])->name('login');
        Route::get('logout',  [AuthController::class, 'logout']);
        Route::get('refresh', [AuthController::class, 'refresh']);
        Route::get('me',      [AuthController::class, 'me']);
});
