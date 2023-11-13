<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RessetPasswordRequests extends FormRequest
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
            'password' => 'required|string|min:8|confirmed',

        ];
    }
    public function messages()
	{
		return [
			'password.required' => 'Mật khẩu không được để trống',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
            'password.string' => 'Mật khẩu phải là chuỗi kí tự',
		];
	}
}
