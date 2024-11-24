<?php

use App\Http\Controllers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [User::class, 'register']);
Route::post('login', [User::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {

});
