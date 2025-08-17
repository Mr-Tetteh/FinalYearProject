<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalRequest extends Model
{
    protected $fillable = [
        'email',
        'unique_id',
        'contact',
        'hospital',
        'status',
        'reason_for_rejection'
    ];
}
