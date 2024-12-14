<?php

use App\Http\Controllers\HosptialController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::post('register', [User::class, 'register']);
Route::post('login', [User::class, 'login']);
Route::post('register_hospital',[HosptialController::class,'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [User::class, 'logout']);
    Route::get('user', [User::class, 'user']);
});
