<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ModuleController;
use App\Http\Controllers\API\UserModuleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckModuleActive;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


// Route::get('/modules/{id}/activate', [ModuleController::class, 'show']);
// Route::get('/modules/{id}/desactivate', [ModuleController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/modules', [ModuleController::class, 'show']);
        Route::post('/modules/{id}/activate', [UserModuleController::class, 'activate']);
        Route::post('/modules/{id}/desactivate', [UserModuleController::class, 'desactivate']);

        // Route::get('/profile', function () {
        //     // ...
        // })->withoutMiddleware([EnsureTokenIsValid::class]);
    });



