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
    public function rules()
    {
        return [
            'current_password' => 'required',
            'new_password' => 'required|min:6|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu cũ',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải chứa ít nhất 6 ký tự',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu cũ',
            'new_password_confirmation.required' => 'Vui lòng nhập lại mật khẩu mới',
            'new_password_confirmation.same' => 'Mật khẩu nhập lại không khớp',
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
