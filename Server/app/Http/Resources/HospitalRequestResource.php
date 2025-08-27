<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalRequestResource extends JsonResource
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
            'email' => $this->email,
            'unique_id' => $this->unique_id,
            'contact' => $this->contact,
            'hospital' => $this->hospital,
            'status' => $this->status,
            'reason_for_rejection' => $this->reason_for_rejection,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
