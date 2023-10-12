<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            "avatar" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "phone" => "required",
            'email' => [
                'required',
                Rule::unique('admins', 'email')->ignore($this->employee),
            ],
            "password" => "required",
            "description" => "required",
        ];
    }
}
