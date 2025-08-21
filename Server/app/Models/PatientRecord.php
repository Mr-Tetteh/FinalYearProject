<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PatientRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'user_id',
        'temperature',
        'pulse_rate',
        'respiratory_rate',
        'blood_pressure',
        'weight',
        'spo2',
        'fbs',
        'rbs',
        'nurse_additional_notes',
        'history',
        'examination_findings',
        'diagnosis',
        'investigations',
        'treatment',
        'doctor_additional_notes',
        'medication_notes',
        'prescription_notes',
        'pharmacist_additional_notes',];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    //    public function Sluggable()
    //    {
    //        return [
    //            'hospital' => [
    //                'source' => Auth::user()->hospital
    //            ]
    //        ];
    //
    //    }

    //    protected static function booted()
    //    {
    //        static::creating(function ($patient) {
    //            $patient->hospital = Auth::user()->hospital;
    //        });
    //    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->hasMany(PatientRecord::class);
    }
}
