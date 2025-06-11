<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id' => $this->id,
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
            'payment_url' => $this->payment_url,
            'hospital_id' => $this->hospital_id,
        ];
    }
}
