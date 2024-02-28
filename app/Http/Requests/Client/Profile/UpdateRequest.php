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
            'username'=>'required|max:255|min:5',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore(auth('web')->user()->id),
                'email'
            ],
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ];
    }
    public function messages(){
        return [
            'username.required' => 'Bạn chưa nhập họ và tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'username.max' => 'Không được nhập quá 255 ký tự',
            'avatar.image' => 'File không đúng định dạng',
            'username.min' => 'Tên phải gồm 5 ký tự trở lên',
        ];
    }
}

