<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LabsResource extends JsonResource
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
            'patient_record_id' => $this->patient_record_id,
            'lab_name' => $this->lab_name,
            'lab_report' => $this->lab_report
                ? asset('storage/' . $this->lab_report)
                : null,
        ];
    }
}
