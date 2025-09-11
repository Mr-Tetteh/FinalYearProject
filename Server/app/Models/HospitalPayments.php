<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalPayments extends Model
{
    protected $fillable = ['reasonForPayment', 'selectedLabIds', 'labNames', 'totalLabAmount', 'selectedDrugsIds', 'drugNames', 'totalDrugAmount', 'consultationAmount', 'hospital_id'];
}
