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
            'id' => $this->id,
            'hospital_name' => $this->hospital_name,
            'hospital_address' => $this->hospital_address,
            'hospital_contact' => $this->hospital_contact,
            'hospital_location' => $this->hospital_location,
            'hospital_email' => $this->hospital_email,
            'status' => $this->status,
            'hospital_country' => $this->hospital_country,
            'hospital_city' => $this->hospital_city,
            'hospital_status' => $this->hospital_status,
            'number_of_monthly_subscription' => $this->number_of_monthly_subscription,
        ];
    }
}
