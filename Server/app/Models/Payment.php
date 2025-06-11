<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'hospital_id',
        'amount',
        'status',
        'payment_method',
        'payment_type',
        'payment_url',
        'reference',
        'response',
    ];
}
