<?php

use App\Http\Controllers\HosptialController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::post('login', [User::class, 'login']);
Route::post('register_hospital', [HosptialController::class, 'store']);
Route::get('all_hospitals', [HosptialController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [User::class, 'logout']);
    Route::get('user', [User::class, 'user']);
    Route::post('add_patient', [PatientsController::class, 'store']);
    Route::get('all_patient', [PatientsController::class, 'index']);
    Route::post('register', [User::class, 'register']);
    Route::get('all_users', [User::class, 'all_users']);
    Route::get('all_staff', [User::class, 'all_staff']);
});



