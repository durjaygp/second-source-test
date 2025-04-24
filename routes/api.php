<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Posts Route
Route::get('/posts', [PostController::class, 'index']);
Route::post('/post/create', [PostController::class, 'store']);
Route::get('/post/{id}', [PostController::class, 'show']);

// Register Routes
Route::post('/register', [AuthController::class, 'register']);

// Task Routes
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/task/{id}', [TaskController::class, 'update']);
Route::get('/task/pending', [TaskController::class, 'pending']);

