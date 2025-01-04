<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Pharmacy extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'use' => $this->use,
            'quantity' => $this->quantity,
            'category' => $this->category,
            'additional_notes' => $this->additional_notes
        ];
    }
}
