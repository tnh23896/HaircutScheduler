<?php

namespace App\Http\Requests\Admin\Auth;

use Toastr;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequests extends FormRequest
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
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * Customize the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'    => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'email.email'       => 'Email không đúng định dạng',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     */
    protected function failedValidation($validator)
    {
        // Add Toastr notification for each validation error
        foreach ($validator->errors()->all() as $error) {
            toastr()->error($error);
        }

        parent::failedValidation($validator);
    }
}
