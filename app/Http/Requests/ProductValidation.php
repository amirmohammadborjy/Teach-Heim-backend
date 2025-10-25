<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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
            //
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'max:255|mimes:jpeg,jpg,png',
            'category_id' => 'max:255',
            'brand_id' => 'max:255',
            'color' => 'required|max:255',
            'discount' => 'required|max:255',
            'rate' => 'required|max:255'
        ];
    }
}
