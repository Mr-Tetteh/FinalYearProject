<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    protected $fillable = [
        'patient_id', 'symptoms', 'diagnosis',
        'treatment', 'temperature', 'pulse_rate', 'weight', 'sugar_rate', 'admitted',
        'ward_number', 'surgery', 'surgery_date', 'surgery_reason', 'labs', 'additional_notes',
        'lab1', 'lab1_results', 'lab2', 'lab2_results', 'lab3', 'lab3_results',
        'lab4', 'lab4_results', 'lab5', 'lab5_results', 'lab6', 'lab6_results',
        'lab7', 'lab7_results', 'lab8', 'lab8_results', 'lab9', 'lab9_results',
        'lab10', 'lab10_results', 'lab11', 'lab11_results', 'lab12', 'lab12_results',
        'lab13', 'lab13_results', 'lab14', 'lab14_results', 'lab15', 'lab15_results',
        'drugs_is_paid','labs_is_paid'
    ];



    public function patient(){
        return $this->hasMany(PatientRecord::class, 'patient_id');
    }








}
