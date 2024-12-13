<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hospital_name' => $this->hospital_name,
            'hospital_address' => $this->hospital_address,
            'hospital_contact' => $this->hospital_contact,
            'hospital_email' => $this->hospital_email,
            'hospital_country' => $this->hospital_country,
            'hospital_city' => $this->hospital_city,
            'user_name' => $this->user_name,
            'user_phone_number' => $this->user_phone_number,
            'user_email' => $this->user_email,
            'number_of_monthly_subscription' => $this->number_of_monthly_subscription
        ];
    }
}
