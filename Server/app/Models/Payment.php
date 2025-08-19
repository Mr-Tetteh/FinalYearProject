<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'hospital_id',
        'subscription_type_id',
        'status',
        'start_date',
        'end_date',
        'reference',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);

    }

    public function subscriptionType()
    {
        return $this->belongsTo(SubscriptionType::class);
    }

}
