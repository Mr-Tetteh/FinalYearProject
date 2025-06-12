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
        'patient_id', 'user_id', 'nurse_notes', 'doctor_notes', 'pharmacists_notes', 'lab_tech_notes'];

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
