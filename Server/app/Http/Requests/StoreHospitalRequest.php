<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHospitalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'unique_id' => 'required|string|max:7|exists:users,unique_id',
            'hospital' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'unique_id.exists' => 'Sorry the unique ID is not associated with any account.',
            'unique_id.max' => 'The unique ID must be exactly 7 characters.',

        ];
    }
}
