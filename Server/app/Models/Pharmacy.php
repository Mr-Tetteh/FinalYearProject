<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pharmacy extends Model
{
    protected $fillable = ['name', 'price', 'category', 'quantity', 'use', 'additional_notes'];

    public function sluggable(): array
    {
        return [
            'patient_hospital' => [
                'source' => Auth::user()->hospital_id,
            ],
        ];
    }

    protected static function booted()
    {
        static::creating(function ($patient): void {
            $patient->hospital = Auth::user()->hospital_id;
        });
    }
}
