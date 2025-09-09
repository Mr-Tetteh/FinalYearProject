<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHospitalRegistration extends FormRequest
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
            'hospital_name' => 'required|string|max:255|unique:hospitals',
            'hospital_email' => 'required|email|unique:hospitals',
            'hospital_contact' => 'required|unique:hospitals|digits:10|regex:/^0[0-9]{9}$/',
            'hospital_address' => 'required|max:255',
            'hospital_location' => 'required|max:255',
            'hospital_consistency' => 'required|max:255',
            'hospital_city' => 'required|max:255',
        ];

    }
    public function messages()
    {
        return [
            'hospital_contact.regex' => 'Contact should begin with 0',
        ];
    }

}

