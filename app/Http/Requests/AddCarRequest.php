<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCarRequest extends FormRequest
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
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'mileage' => 'required|integer',
            'price' => 'required|integer',
            'body_type' => 'required|string',
            'fuel_type' => 'required|string',
            'power' => 'required|integer',
            'gear' => 'required|string',
            'number_of_doors' => 'required|integer',
            'description' => 'required|string',
            'user_car_id' => 'required|integer',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'make.required' => 'The make field is required.',
            'model.required' => 'The model field is required.',
            'year.required' => 'The year field is required.',
            'mileage.required' => 'The mileage field is required.',
            'price.required' => 'The price field is required.',
            'body_type.required' => 'The body type field is required.',
            'fuel_type.required' => 'The fuel type field is required.',
            'power.required' => 'The power field is required.',
            'gear.required' => 'The gear field is required.',
            'number_of_doors.required' => 'The number of doors field is required.',
            'description.required' => 'The description field is required.',
            'user_car_id.required' => 'The user id field is required.',
            'images.required' => 'At least one image is required.',
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'images.*.max' => 'The image may not be greater than 2MB in size.',
        ];
    }
}
