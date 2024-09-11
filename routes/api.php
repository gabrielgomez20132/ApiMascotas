<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\StudentController;





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*//////AUTH ROUTES/////*/
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('/students', StudentController::class);

/*//////USUARIOS/////*/
Route::apiResource('/users', UserController::class)->middleware('auth:sanctum');