<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hosptial extends Model
{
    /** @use HasFactory<\Database\Factories\HosptialFactory> */
    use HasFactory;

    protected $fillable = ['hospital_name', 'hospital_address',
        'hospital_contact', 'hospital_email', 'hospital_country',
        'hospital_city', 'user_name', 'user_phone_number', 'user_email', 'number_of_monthly_subscription'];
}
