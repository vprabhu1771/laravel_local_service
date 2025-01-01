<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



use App\Http\Controllers\api\v2\CategoryController;

Route::get('/categories', [CategoryController::class, 'index']);


use App\Http\Controllers\api\v2\AuthController;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::get('/user', [AuthController::class, 'getUser']);

    Route::post('/upload-profile-pic', [AuthController::class, 'upload']);

    Route::get('/logout', [AuthController::class, 'logout']);

});


use App\Http\Controllers\api\v2\AppointmentController;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/submit-appointment', [AppointmentController::class, 'store']);

});

use App\Http\Controllers\api\v2\NotificationController;

Route::get('/notifications', [NotificationController::class, 'index']);