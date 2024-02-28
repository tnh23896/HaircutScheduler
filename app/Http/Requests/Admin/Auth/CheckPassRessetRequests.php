<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CheckPassRessetRequests extends FormRequest
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
    public function rules()
    {
        return [
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.string' => 'Mật khẩu phải là một chuỗi',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
        ];
    }
    protected function failedValidation($validator)
    {
        // Add Toastr notification for each validation error
        foreach ($validator->errors()->all() as $error) {
            toastr()->error($error);
        }

        parent::failedValidation($validator);
    }
}
