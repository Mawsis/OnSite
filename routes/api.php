<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\isAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::get('/', [AuthController::class, 'me'])->middleware("auth:sanctum")->middleware("isAdmin");
Route::middleware("auth:sanctum")->group(function(){
    Route::post("/tasks", [TaskController::class, "store"])->middleware("isAdmin");
    Route::get("/tasks", [TaskController::class,"index"]);
    Route::get("/tasks/{id}",[TaskController::class,"show"]);
    Route::post("/projects", [TaskController::class, "store"])->middleware("isAdmin");
    Route::get("/projects", [TaskController::class,"index"]);
    Route::get("/projects/{id}",[TaskController::class,"show"]);
});

