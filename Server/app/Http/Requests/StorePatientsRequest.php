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
            'first_name' => 'required',
            'last_name' => 'required',
            'other_name' => 'required',
            'age' => 'required | number',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'email' => 'required',
            'medical_history' => 'required',
            'allergies' => 'required',
            'additional_notes' => 'required',
            'guardian1_first_name' => 'required',
            'guardian1_last_name' => 'required',
            'guardian1_other_names' => 'required',
            'guardian1_relation' => 'required',
            'guardian1_residence' => 'required',
            'guardian1_contact' => 'required',
        ];
    }
}
