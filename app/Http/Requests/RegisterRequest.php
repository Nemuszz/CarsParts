<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:20',
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
        ];

    }
    public function messages(): array{
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'confirm_password.required' => 'Confirm Password is required',
            'confirm_password.same' => 'Confirm Password does not match',
        ];
    }
}
