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
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'user_id' => $this->user_id,
            'nurse_notes' => $this->nurse_notes,
            'doctor_notes' => $this->doctor_notes,
            'pharmacists_notes' => $this->pharmacists_notes,
            'lab_tech_notes' => $this->lab_tech_notes,
            //            'hospital' => $this->hospital,
            'created_at' => $this->created_at ? $this->created_at->format('jS M Y h:i A') : null,

        ];
    }
}
