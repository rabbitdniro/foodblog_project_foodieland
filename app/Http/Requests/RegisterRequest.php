<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        // return [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'mobile' => 'required|regex:/^\+?[0-9]{8,15}$/|unique:users,mobile',
        //     'password' => 'required|string|min:6|confirmed',
        // ];
        
        // stronger Register password validation rules
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|regex:/^\+?[0-9]{8,15}$/|unique:users,mobile',
            'password' => [
                'required',
                'string',
                'min:8', // minimum 8 characters
                'confirmed', // must match password_confirmation
                'regex:/[a-z]/',      // at least one lowercase letter
                'regex:/[A-Z]/',      // at least one uppercase letter
                'regex:/[0-9]/',      // at least one digit
                'regex:/[@$!%*?&]/',  // at least one special character
            ],
        ];

    }
}
