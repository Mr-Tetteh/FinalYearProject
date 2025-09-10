<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\HospitalRequestController;
use App\Http\Controllers\LabsController;
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
Route::post('users', [UserController::class, 'register']);
Route::get('subscription_types', [\App\Http\Controllers\Subcriptiontype::class, 'index']);
Route::post('paystack/initialize', [PaymentsControllers::class, 'initialize']);
Route::post('create/request', [HospitalRequestController::class, 'store']);
Route::get('request_hospitals', [HospitalController::class, 'all_request_hospitals']);
Route::get('hospitals_under/{id}', [HospitalController::class, 'review']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('logout', [UserController::class, 'logout']);
//    Route::get('all_users', [UserController::class, 'user']);
    Route::get('view_all_users', [UserController::class, 'all_users']);
    Route::get('all_staff/{id}', [UserController::class, 'all_staff']);
    Route::get('count_all_users', [UserController::class, 'count_all_users']);
    Route::get('count_all_hospital_users/{id}', [UserController::class, 'count_all_hospital_users']);
    Route::get('get_details/{user}', [UserController::class, 'show']);
    Route::patch('activate_user/{user}', [UserController::class, 'activate_user']);
    Route::patch('add_staff_hospital/{user}', [UserController::class, 'add_staff_hospital']);
    Route::delete('delete_user/{id}', [UserController::class, 'destroy']);
    Route::get('deleted_users', [UserController::class, 'deleted_users']);
    Route::post('restore_user', [UserController::class, 'restore_user']);
    Route::get('getUserHospital/{id}', [UserController::class, 'getUserHospital']);
    Route::delete('removeStaff/{hospital_id}/{id}', [UserController::class, 'removeStaff']);

    Route::post('add_patient', [PatientsController::class, 'store']);
    Route::get('all_patient', [PatientsController::class, 'index']);
    Route::get('hospital_patients/{id}', [PatientsController::class, 'hospitals_patients']);
    Route::get('count_hospital_patient', [PatientsController::class, 'hospitals_patients_count']);
    Route::get('count_all_patient', [PatientsController::class, 'count_all_patient']);
    Route::get('edit_patient/{patients}', [PatientsController::class, 'edit']);
    Route::patch('activate_patient/{patients}', [PatientsController::class, 'update']);

    Route::post('patient_rec/{id}', [PatientRecordController::class, 'store']);
    Route::get('patient_record/{patient_record}', [PatientRecordController::class, 'display_record']);
    Route::get('patient_record_edit/{patient_record}', [PatientRecordController::class, 'edit']);
    Route::patch('patient_record_update/{patient_record}', [PatientRecordController::class, 'update']);
    Route::get('today_patient_count', [PatientRecordController::class, 'now_patient']);
    Route::get('patient_card/{patient_card}', [PatientRecordController::class, 'patient_card']);

    Route::post('lab/post/{id}/{patient}', [LabsController::class, 'create']);
    Route::get('lab/reports/{patient}/{record_id}', [LabsController::class, 'get_labs']);
    Route::get('/lab/reports/file/{filename}', [LabsController::class, 'showLabReport']);

    Route::get('/get_drugs/{hospitalId}', [Pharmacy::class, 'index']);
    Route::get('get_drugs_edit/{drug}', [Pharmacy::class, 'show']);
    Route::patch('drug_edit/{pharmacy}', [Pharmacy::class, 'update']);
    Route::post('post_drug', [Pharmacy::class, 'store']);
    Route::post('/update-quantities', [Pharmacy::class, 'updateQuantities']);

    Route::get('registered_hospital', [HospitalController::class, 'show']);
    Route::get('count_hospitals', [HospitalController::class, 'hospital_count']);
//    Route::post('check_status/{id}', [HospitalController::class, 'check_status']);
    Route::delete('delete_hospital/{hospital}', [HospitalController::class, 'destroy']);
    Route::get('edit_hospital/{hospital}', [HospitalController::class, 'edit']);
    Route::patch('update_hospital/{hospital}', [HospitalController::class, 'update']);

    Route::get('users_request_hospitals/{id}', [HospitalRequestController::class, 'index']);
    Route::get('request_view/{hospitalRequest}', [HospitalRequestController::class, 'show']);
    Route::patch('request_update/{id}', [HospitalRequestController::class, 'update']);
    Route::delete('delete/{id}', [HospitalRequestController::class, 'delete']);

    Route::get('fetchLab/{id}', [\App\Http\Controllers\LabManagement::class, 'fetchLabManagement']);
    Route::get('edit/{id}', [\App\Http\Controllers\LabManagement::class, 'show']);
    Route::post('lab/create', [\App\Http\Controllers\LabManagement::class, 'create']);
    Route::delete('lab/{id}', [\App\Http\Controllers\LabManagement::class, 'delete']);
    Route::put('update/{id}', [\App\Http\Controllers\LabManagement::class, 'update']);

    Route::get('fetchService/{id}', [\App\Http\Controllers\ServiceManagement::class, 'index']);
    Route::get('editService/{id}', [\App\Http\Controllers\ServiceManagement::class, 'show']);
    Route::post('service/create', [\App\Http\Controllers\ServiceManagement::class, 'create']);
    Route::put('updateService/{id}', [\App\Http\Controllers\ServiceManagement::class, 'update']);
    Route::delete('deleteService/{id}', [\App\Http\Controllers\ServiceManagement::class, 'delete']);


});
