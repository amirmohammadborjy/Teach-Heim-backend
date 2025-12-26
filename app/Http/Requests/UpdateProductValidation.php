<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductValidation extends FormRequest
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

            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|max:255',
            'description' => 'sometimes|max:255',
            'imageURL' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'category_id' => 'sometimes|max:255',
            'brand_id' => 'sometimes|max:255',
            'color' => 'sometimes|max:255',
            'discount' => 'sometimes|max:255',
            'rate' => 'sometimes|max:255'
        ];
    }
}
