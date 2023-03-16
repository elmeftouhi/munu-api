<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserQrController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


// Private Routes
Route::group(['middleware'  =>  'auth:sanctum'], function(){
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/qrs', UserQrController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});

