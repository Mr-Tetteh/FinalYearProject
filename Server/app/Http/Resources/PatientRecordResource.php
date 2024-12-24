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
    {return [
        'patient_id' => $this->patient_id,
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
        'ward_number' => $this->ward_number,
        'weight' => $this->wieght,
        'lab' => $this->lab,
        'lab1' => $this->lab1,
        'lab1_results' => $this->lab1_results,
        'lab2' => $this->lab2,
        'lab2_results' => $this->lab2_results,
        'lab3' => $this->lab3,
        'lab3_results' => $this->lab3_results,
        'lab4' => $this->lab4,
        'lab4_results' => $this->lab4_results,
        'lab5' => $this->lab5,
        'lab5_results' => $this->lab5_results,
        'lab6' => $this->lab6,
        'lab6_results' => $this->lab6_results,
        'lab7' => $this->lab7,
        'lab7_results' => $this->lab7_results,
        'lab8' => $this->lab8,
        'lab8_results' => $this->lab8_results,
        'lab9' => $this->lab9,
        'lab9_results' => $this->lab9_results,
        'lab10' => $this->lab10,
        'lab10_results' => $this->lab10_results,
        'lab11' => $this->lab11,
        'lab11_results' => $this->lab11_results,
        'lab12' => $this->lab12,
        'lab12_results' => $this->lab12_results,
        'lab13' => $this->lab13,
        'lab13_results' => $this->lab13_results,
        'lab14' => $this->lab14,
        'lab14_results' => $this->lab14_results,
        'lab15' => $this->lab15,
        'lab15_results' => $this->lab15_results,
        'labs_is_paid' => $this->labs_is_paid,
        'drugs_is_paid' => $this->drugs_is_paid
    ];

    }
}
