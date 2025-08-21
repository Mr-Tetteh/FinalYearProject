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
            'temperature' => $this->temperature,
            'pulse_rate' => $this->pulse_rate,
            'respiratory_rate' => $this->respiratory_rate,
            'blood_pressure' => $this->blood_pressure,
            'weight' => $this->weight,
            'spo2' => $this->spo2,
            'fbs' => $this->fbs,
            'rbs' => $this->rbs,
            'treatment'=> $this->treatment,
            'nurse_additional_notes' => $this->nurse_additional_notes,
            'history' => $this->history, 'doctor_notes',
            'diagnosis' => $this->diagnosis,
            'investigations' => $this->investigations,
            'doctor_additional_notes' => $this->doctor_additional_notes,
            'medication_notes' => $this->medication_notes,
            'prescription_notes' => $this->prescription_notes,
            'pharmacist_additional_notes' => $this->pharmacist_additional_notes,
            'created_at' => $this->created_at ? $this->created_at->format('jS M Y h:i A') : null,

        ];
    }
}
