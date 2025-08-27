<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'patient_id',
        'patient_record_id',
        'lab_name',
        'lab_report',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }

    public function patientRecord()
    {
        return $this->belongsTo(PatientRecord::class, 'patient_record_id');
    }
}
