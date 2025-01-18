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
            'first_name' => $this->user?->first_name,
            'last_name' => $this->user?->last_name,
            'other_name' => $this->user?->other_name,
            'history' => $this->history,
            'examination_findings' => $this->examination_findings,
            'diagnosis' => $this->diagnosis,
            'treatment' => $this->treatment,
            'temperature' => $this->temperature,
            'pulse_rate' => $this->pulse_rate,
            'respiratory_rate' => $this->respiratory_rate,
            'blood_pressure' => $this->blood_pressure,
            'blood_and_sugar_rate' => $this->blood_and_sugar_rate,
            'additional_notes' => $this->additional_notes,
            'admitted' => $this->admitted,
            'ward_number' => $this->ward_number,
            'weight' => $this->weight, // Fixed typo
            'labs' => $this->labs,
            'lab1' => $this->lab1,
            'lab1_results' => $this->lab1_results ? url('storage/' . $this->lab1_results) : null,
            'lab2' => $this->lab2,
            'lab2_results' => $this->lab2_results ? url('storage/' . $this->lab2_results) : null,
            'lab3' => $this->lab3,
            'lab3_results' => $this->lab3_results ? url('storage/' . $this->lab3_results) : null,
            'lab4' => $this->lab4,
            'lab4_results' => $this->lab4_results ? url('storage/' . $this->lab4_results) : null,
            'lab5' => $this->lab5,
            'lab5_results' => $this->lab5_results ? url('storage/' . $this->lab5_results) : null,
            'lab6' => $this->lab6,
            'lab6_results' => $this->lab6_results ? url('storage/' . $this->lab6_results) : null,
            'lab7' => $this->lab7,
            'lab7_results' => $this->lab7_results ? url('storage/' . $this->lab7_results) : null,
            'lab8' => $this->lab8,
            'lab8_results' => $this->lab8_results ? url('storage/' . $this->lab8_results) : null,
            'lab9' => $this->lab9,
            'lab9_results' => $this->lab9_results ? url('storage/' . $this->lab9_results) : null,
            'hospital' => $this->hospital,
            'created_at' => $this->created_at->format('jS M Y h:i A'),
        ];
    }

}
