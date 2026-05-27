<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\WorkoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

# Auth Routes
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
Route::post("profile", [AuthController::class, "profile"])->middleware('auth:sanctum');

# Exercises Routes
Route::get("exercises", [ExerciseController::class, 'index']);
Route::get("exercises/{exercise}", [ExerciseController::class, 'show']);

# Workout Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get("workouts", [WorkoutController::class, 'index']);
    Route::get("workouts/{workout}", [WorkoutController::class, 'show']);
    Route::post("workout", [WorkoutController::class, 'store']);
});
