<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientsRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'contact' => 'required',
            'residential_address' => 'residential_address',
            'guardian1_first_name' => 'required',
            'guardian1_relation' => 'required',
            'guardian1_residential_address' => 'required',
            'guardian1_contact' => 'required',
        ];
    }
}
