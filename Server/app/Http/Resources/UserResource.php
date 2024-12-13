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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'role' => $this->role,
            'email' => $this->email,
            'hospital' => $this->hospital,
            'staff_id' => $this->staff_id,
            'phone' => $this->phone,
            'city' => $this->city,
            'password' => $this->password
        ];
    }
}
