<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pharmacy extends Model
{
    Protected $fillable = ['name', 'price', 'category', 'quantity', 'use', 'additional_notes'];




    public function sluggable(): array
    {
        return [
            'patient_hospital' =>[
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
}
