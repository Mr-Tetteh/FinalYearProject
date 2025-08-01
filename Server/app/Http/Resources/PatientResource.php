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
            'other_name' => $this->other_name,
            'patient_number' => $this->patient_number,
            'status' => $this->status,
            'gender' => $this->gender,
            'hospital' => $this->hospital,
            'date_of_birth' => $this->date_of_birth,
            'contact' => $this->contact,
            'residential_address' => $this->residential_address,
            'email' => $this->email,
            'medical_history' => $this->medical_history,
            'allergies' => $this->allergies,
            'additional_notes' => $this->additional_notes,
            'activated_at' => $this->activated_at,
            'guardian1' => [
                'first_name' => $this->guardian1_first_name,
                'last_name' => $this->guardian1_last_name,
                'other_names' => $this->guardian1_other_names,
                'relation' => $this->guardian1_relation,
                'residential_address' => $this->guardian1_residential_address,
                'contact' => $this->guardian1_contact,
            ],
            'guardian2' => [
                'first_name' => $this->guardian2_first_name,
                'last_name' => $this->guardian2_last_name,
                'other_names' => $this->guardian2_other_names,
                'relation' => $this->guardian2_relation,
                'residential_address' => $this->guardian2_residential_address,
                'contact' => $this->guardian2_contact,
            ],
        ];
    }
}
