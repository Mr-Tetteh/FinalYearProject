<?php

use App\Http\Controllers\HosptialController;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\Pharmacy;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::post('login', [User::class, 'login']);
Route::post('hospital', [HosptialController::class, 'store']);
Route::get('hospitals', [HosptialController::class, 'index']);
Route::post('rest_password', [User::class, 'forgotPassword']);
Route::post('password_reset', [User::class, 'resetPassword']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [User::class, 'logout']);
    Route::get('all_users', [User::class, 'user']);
    Route::post('users', [User::class, 'register']);
    Route::get('all_users', [User::class, 'all_users']);
    Route::get('all_staff', [User::class, 'all_staff']);
    Route::get('count_all_users', [User::class, 'count_all_users']);
    Route::get('count_all_hospital_users', [User::class, 'count_all_hospital_users']);

    Route::post('add_patient', [PatientsController::class, 'store']);
    Route::get('all_patient', [PatientsController::class, 'index']);
    Route::get('hospital_patients', [PatientsController::class, 'hospitals_patients']);
    Route::get('count_hospital_patient', [PatientsController::class, 'hospitals_patients_count']);
    Route::get('count_all_patient', [PatientsController::class, 'count_all_patient']);

    Route::post('patient_rec', [PatientRecordController::class, 'store']);
    Route::get('patient_record/{patient_record}', [PatientRecordController::class, 'create']);
    Route::get('patient_record_update/{patient_record}', [PatientRecordController::class, 'edit']);
    Route::get('today_patient_count', [PatientRecordController::class, 'now_patient']);
    Route::get('get_drugs', [Pharmacy::class, 'index']);
    Route::get('get_drugs_edit/{drug}', [Pharmacy::class, 'show']);
    Route::patch('drug_edit/{pharmacy}', [Pharmacy::class, 'update']);
    Route::post('post_drug', [Pharmacy::class, 'store']);
    Route::post('/update-quantities', [Pharmacy::class, 'updateQuantities']);


});



