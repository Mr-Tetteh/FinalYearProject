<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    Protected $fillable = ['name', 'price', 'category', 'use', 'additional_note'];
}
