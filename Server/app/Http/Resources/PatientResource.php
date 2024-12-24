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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_name' => $this->other_names,
            'patient_number' => $this->patient_number,
            'age' => $this->age,
            'gender' => $this->gender,
            'hospital' => $this->hospital,
            'date_of_birth' => $this->date_of_birth,
            'contact' => $this->contact,
            'address' => $this->address,
            'email' => $this->email,
            'medical_history' => $this->medical_history,
            'allergies' => $this->allergies,
            'additional_notes' => $this->additional_notes,
        ];
    }
}
