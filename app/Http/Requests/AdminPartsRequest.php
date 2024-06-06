<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class AdminPartsRequest extends FormRequest
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
                'make' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'section' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'price' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'images' => 'required|array|min:1',
                'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',

        ];
    }
    public function messages()
    {
        return [
            'make.required' => 'The make field is required.',
            'model.required' => 'The model field is required.',
            'section.required' => 'The section field is required.',
            'name.required' => 'The name field is required.',
            'price.required' => 'The price field is required.',
            'description.required' => 'The description field is required.',
            'images.required' => 'At least one image is required.',
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'images.*.max' => 'The image may not be greater than 2MB in size.',
        ];
    }
}
