<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'other_names' => $this->other_names,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'position' => $this->position,
            'email' => $this->email,
            'unique_id' => $this->unique_id,
            'status' => $this->status,
            'hospital_id' => $this->hospital_id,
            'contact' => $this->contact,
            'password' => $this->password,
        ];
    }
}
