<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    protected $fillable = ['patient_id', 'user_id', 'symptoms', 'diagnosis', 'treatment', 'temperature', 'pulse_rate', 'sugar_rate', 'admitted', 'ward_number', 'surgery', 'surgery_date', 'surgery_reason', 'additional_notes'];



    public function patient(){
        return $this->hasMany(PatientRecord::class, 'patient_id');
    }

    public function user(){
        return $this->hasMany( Patients::class, 'user_id');
    }






}
