<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'valid_days',
        'description',
    ];

    /**
     * Get the hospitals that belong to the subscription type.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
