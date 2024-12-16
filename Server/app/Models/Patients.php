<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    /** @use HasFactory<\Database\Factories\PatientsFactory> */
    use HasFactory;
    protected $fillable = ['full_name', 'age', 'gender', 'date_of_birth', 'contact', 'address', 'email', 'medical_history', 'allergies', 'additional_notes'];
}
