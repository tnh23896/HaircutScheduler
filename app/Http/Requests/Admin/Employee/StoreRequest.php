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
            'username.required' => 'Tên không được để trống',
			'email.required' => 'Email không được để trống',
			'password.required' => 'Mật khẩu không được để trống',
            'email.required' => 'Email không được để trống',
			'email.email' => 'Email không đúng định dạng',
            'email.unique' =>'Email đã được sử dụng',
            'avatar.required' =>'Ảnh không được để trống',
			'avatar.image' => 'Ảnh không đúng định dạng',
			'avatar.mimes' => 'Ảnh không đúng định dạng',
			'avatar.max' => 'Ảnh quá kích thức 2048kb',
			'phone.required' => 'Số điện thoại không được để trống',
			'description.required' => 'Mô tả không được để trống',
		];
	}
}
