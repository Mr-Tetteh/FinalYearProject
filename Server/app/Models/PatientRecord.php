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
        'patient_id', 'user_id', 'history', 'diagnosis',
        'examination_findings', 'treatment','temperature', 'pulse_rate','respiratory_rate', 'blood_pressure', 'weight', 'blood_and_sugar_rate', 'admitted',
        'ward_number', 'labs', 'additional_notes',
        'lab1', 'lab1_results', 'lab2', 'lab2_results', 'lab3', 'lab3_results',
        'lab4', 'lab4_results', 'lab5', 'lab5_results', 'lab6', 'lab6_results',
        'lab7', 'lab7_results', 'lab8', 'lab8_results', 'lab9', 'lab9_results',
        'lab10', 'lab10_results', 'hospital'];


    public function Sluggable()
    {
        return [
            'hospital' => [
                'source' => Auth::user()->hospital
            ]
        ];

    }

    protected static function booted()
    {
        static::creating(function ($patient) {
            $patient->hospital = Auth::user()->hospital;
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient(){
        return $this->hasMany(PatientRecord::class);
    }


}
