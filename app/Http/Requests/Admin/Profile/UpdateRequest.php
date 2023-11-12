<?php

namespace App\Http\Requests\Admin\Profile;

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
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
                Rule::unique('admins', 'phone')->ignore(auth()->guard('admin')->user()->id),
            ],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'username.required' => 'Bạn chưa nhập họ và tên',
            'username.max' => 'Không được nhập quá 255 ký tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'avatar.image' => 'Ảnh đại diện phải là 1 file ảnh',
            'avatar.mimes' => 'Ảnh đại diện phải có đuôi là jpeg, png, jpg, gif, svg',
            'avatar.max' => 'Ảnh đại diện phải có kích thước nhỏ hơn 2MB',
        ];
    }
}
