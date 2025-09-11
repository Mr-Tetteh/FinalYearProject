<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalPaymentsResource extends JsonResource
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
          'selectedLabIds' => $this->selectedLabIds,
            'labNames' => $this->labNames,
            'totalLabAmount' => $this->totalLabAmount,
            'selectedDrugsIds' => $this->selectedDrugsIds,
            'drugNames' => $this->drugNames,
            'totalDrugAmount' => $this->totalDrugAmount,
            'consultationAmount' => $this->consultationAmount,
            'reasonForPayment' => $this->reasonForPayment,
            'hospital_id' => $this->hospital_id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
