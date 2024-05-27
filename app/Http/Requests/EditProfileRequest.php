<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
    public function rules($id): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'country' => 'string|max:255|nullable',
            'city' => 'string|max:255|nullable',
            'address' => 'string|max:255|nullable',
            'phone' => 'integer|nullable',
            'postcode' => 'integer|nullable',
        ];

    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'phone.integer' => 'Phone number must be integer',
            'postcode.integer' => 'Postcode must be integer',

        ];
    }
}
