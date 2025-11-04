<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:4|max:16'
        // ];

        // stronger Login password validation rules
        return [
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8', // minimum 8 characters
                'max:16', // maximum 16 characters
                'regex:/[a-z]/',      // at least one lowercase letter
                'regex:/[A-Z]/',      // at least one uppercase letter
                'regex:/[0-9]/',      // at least one digit
                'regex:/[@$!%*?&]/',  // at least one special character
            ],
        ];

    }
}
