<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PaymentsControllers;
use App\Http\Controllers\Pharmacy;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('hospital', [HospitalController::class, 'store']);
Route::get('hospitals', [HospitalController::class, 'index']);
Route::get('payments/hospital/{hospitalId}', [PaymentsControllers::class, 'getByHospital']);
Route::post('rest_password', [UserController::class, 'forgotPassword']);
Route::post('password_reset', [UserController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('logout', [UserController::class, 'logout']);
//    Route::get('all_users', [UserController::class, 'user']);
    Route::post('users', [UserController::class, 'register']);
    Route::get('view_all_users', [UserController::class, 'all_users']);
    Route::get('all_staff', [UserController::class, 'all_staff']);
    Route::get('count_all_users', [UserController::class, 'count_all_users']);
    Route::get('count_all_hospital_users', [UserController::class, 'count_all_hospital_users']);
    Route::get('get_details/{user}', [UserController::class, 'show']);
    Route::patch('update_role/{user}', [UserController::class, 'update_role']);
    Route::delete('delete_user/{id}', [UserController::class, 'destroy']);
    Route::get('deleted_users', [UserController::class, 'deleted_users']);
    Route::post('restore_user', [UserController::class, 'restore_user']);

    Route::post('add_patient', [PatientsController::class, 'store']);
    Route::get('all_patient', [PatientsController::class, 'index']);
    Route::get('hospital_patients', [PatientsController::class, 'hospitals_patients']);
    Route::get('count_hospital_patient', [PatientsController::class, 'hospitals_patients_count']);
    Route::get('count_all_patient', [PatientsController::class, 'count_all_patient']);
    Route::get('edit_patient/{patients}', [PatientsController::class, 'edit']);
    Route::patch('activate_patient/{patients}', [PatientsController::class, 'update']);

    Route::post('patient_rec', [PatientRecordController::class, 'store']);
    Route::get('patient_record/{patient_record}', [PatientRecordController::class, 'create']);
    Route::get('patient_record_edit/{patient_record}', [PatientRecordController::class, 'edit']);
    Route::patch('patient_record_update/{patient_record}', [PatientRecordController::class, 'update']);
    Route::get('today_patient_count', [PatientRecordController::class, 'now_patient']);
    Route::get('patient_card/{patient_card}', [PatientRecordController::class, 'patient_card']);

    Route::get('get_drugs', [Pharmacy::class, 'index']);
    Route::get('get_drugs_edit/{drug}', [Pharmacy::class, 'show']);
    Route::patch('drug_edit/{pharmacy}', [Pharmacy::class, 'update']);
    Route::post('post_drug', [Pharmacy::class, 'store']);
    Route::post('/update-quantities', [Pharmacy::class, 'updateQuantities']);

    Route::get('registered_hospital', [HospitalController::class, 'show']);
    Route::get('count_hospitals', [HospitalController::class, 'hospital_count']);
    Route::delete('delete_hospital/{hospital}', [HospitalController::class, 'destroy']);
    Route::get('edit_hospital/{hospital}', [HospitalController::class, 'edit']);
    Route::patch('update_hospital/{hospital}', [HospitalController::class, 'update']);

});
