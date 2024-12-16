<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'full_name' => $this->full_name,
            'age' => $this->age,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'contact' => $this->contact,
            'address' => $this->address,
            'email' => $this->email,
            'medical_history' => $this->medical_history,
            'allergies' => $this->allergies,
            'additional_notes' => $this->additional_notes
        ];
    }
}
