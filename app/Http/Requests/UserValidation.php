<?php

namespace App\Http\Requests;

use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'phonenumber' => 'required|string|max:12',
            'address' => 'required|string|max:255',
            'avatarURl'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
        ];
    }
}
