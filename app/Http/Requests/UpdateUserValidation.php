<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserValidation extends FormRequest
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
            'fullname'    => 'sometimes|string|max:255',
            'email'       => 'sometimes|email|max:255' ,
            'password'    => 'sometimes|string|min:8',
            'phonenumber' => 'sometimes|string|max:12',
            'address'     => 'sometimes|string|max:255',
            'avatar_url'  => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ];
    }

}
