<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "username" => "required",
            "avatar" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "phone" => "required",
            "email" => "required|email|unique:admins,email",
            "password" => "required",
            "description" => "required",
        ];
    }
}
