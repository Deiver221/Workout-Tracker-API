<?php

use App\Http\Controllers\api\ExerciseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

#Auth Routes
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
Route::post("profile", [AuthController::class, "profile"])->middleware('auth:sanctum');

#Exercises Routes
Route::get("exercises", [ExerciseController::class, 'index']);
Route::get("exercises/{exercise}", [ExerciseController::class, 'show']);
Route::post("exercises", [WorkoutController::class, 'store'])->middleware('auth:sanctum');