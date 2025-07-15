<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Patients extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'patients';

    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'patient_number',
        'gender',
        'hospital',
        'status',
        'date_of_birth',
        'contact',
        'address',
        'email',
        'medical_history',
        'allergies',
        'additional_notes',
        'guardian1_first_name',
        'guardian1_last_name',
        'guardian1_other_names',
        'guardian1_relation',
        'guardian1_residence',
        'guardian1_contact',
        'guardian2_first_name',
        'guardian2_last_name',
        'guardian2_other_names',
        'guardian2_relation',
        'guardian2_residence',
        'guardian2_contact',
        'activated_at',
    ];

    public function sluggable(): array
    {
        return [
            'patient_number' => [
                'source' => 'patient_number',
            ],
            'patient_hospital' => [
                'source' => Auth::user()->hospital,
            ],
        ];
    }

    protected static function booted()
    {
        static::creating(function ($patient): void {
            $patient->patient_number = $patient->generateUniquePatientNumber();
            $patient->hospital = Auth::user()->hospital;
        });
    }

    public function generateUniquePatientNumber()
    {
        $length = 7;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $uniquePatientNumber = '';

        for ($i = 0; $i < $length; $i++) {
            $uniquePatientNumber .= $characters[random_int(0, strlen($characters) - 1)];
        }

        // Check if the generated patient number already exists in the database
        while (Patients::where('patient_number', $uniquePatientNumber)->exists()) {
            $uniquePatientNumber = '';
            for ($i = 0; $i < $length; $i++) {
                $uniquePatientNumber .= $characters[random_int(0, strlen($characters) - 1)];
            }
        }

        return $uniquePatientNumber;
    }
}
