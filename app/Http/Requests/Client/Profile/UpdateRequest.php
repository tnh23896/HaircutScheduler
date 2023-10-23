<?php

namespace App\Http\Requests\Client\Profile;

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
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
        ];
    }
    public function messages(){
        return [
            'username.required' => 'Bạn chưa nhập tên đăng nhập',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Không được nhập quá 255 ký tự',
            'username.max' => 'Không được nhập quá 255 ký tự',
        ];
    }
}

