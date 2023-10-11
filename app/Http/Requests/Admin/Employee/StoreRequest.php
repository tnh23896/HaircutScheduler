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

    public function messages()
    {
        return [
            "username.required" => "Tên nhân viên Không được để trống",
            "avatar.required" => "Ảnh đại diện Không được để trống",
            "avatar.image" => "Không đúng định dạng",
            "avatar.mimes" => "Không đúng định dạng",
            "avatar.max" => "Không được vượt quá 2MB",
            "phone.required" => "Không được để trống",
            "email.required" => "Không được để trống",
            "email.email" => "Không đúng định dạng",
            "email.unique" => "Email đã tồn tại",
            "password.required" => "Không được để trống",
            "description.required" => "Không được để trống",
        ];
    }
}
