<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionType;
use Illuminate\Http\Request;

class Subcriptiontype extends Controller
{

    public function index()
    {
      $data =   SubscriptionType::all();

      return \App\Http\Resources\SubcriptionType::collection($data);

    }
}
