<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRegistrationRequest extends FormRequest
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
            'last_name' => 'required|string|max:255',
            'other_names' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'contact' => 'required|string|max:10',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'position' => 'required|string|in:Doctor,Nurse,Admin,Pharmacist,Receptionist,Lab Technician,Accountant,Manager',
            'password' => 'required|string|min:6',
        ];
    }
}
