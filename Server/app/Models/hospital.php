<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hospital extends Model
{


    protected $fillable = ['hospital_name', 'hospital_address', 'hospital_location',
        'hospital_contact', 'hospital_email', 'hospital_consistency', 'status',
        'hospital_city', 'number_of_monthly_subscription'];
}
