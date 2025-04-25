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
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'role' => $this->role,
            'email' => $this->email,
            'hospital' => $this->hospital,
            'staff_id' => $this->staff_id,
            'contact' => $this->contact,
            'city' => $this->city,
            'password' => $this->password
        ];
    }
}
