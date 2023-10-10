<?php

namespace App\Http\Requests\Admin\ServiceManagement\Category;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required | regex:/^[\pL\pM\s]+$/u | min:2 | max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
