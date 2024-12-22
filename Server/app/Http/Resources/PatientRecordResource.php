<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'patient_id' => $this->patient_id,
            'user_id' => $this->user_id,
            'symptoms' => $this->symptoms,
            'diagnosis' => $this->diagnosis,
            'treatment' => $this->treatment,
            'temperature' => $this->temperature,
            'pulse_rate' => $this->pulse_rate,
            'sugar_rate' => $this->sugar_rate,
            'surgery' => $this->surgery,
            'surgery_date' => $this->surgery_date,
            'surgery_reason' => $this->surgery_reason,
            'additional_notes' => $this->additional_notes,
            'admitted' => $this->admitted,
            'ward_number' => $this->ward_number
        ];
    }
}
