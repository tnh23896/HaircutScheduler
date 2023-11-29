<?php

namespace App\Http\Requests\Admin\Employee;

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
			"username" => "required|min:5|max:255",
			"avatar" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
			"phone" => "required",
			'email' => [
                'email',
				'required',
				Rule::unique('admins', 'email')->ignore($this->employee),
			],
			"password" => "required",
			"description" => "required",
		];
	}
	public function messages()
	{
		return [
			'username.required' => 'Tên không được để trống',
			'username.min' => 'Tên phải gồm 5 ký tự trở lên',
			'username.max' => 'Tên không vượt quá 255 kí tự',
			'avatar.image' => 'Ảnh không đúng định dạng',
			'avatar.mimes' => 'Ảnh không đúng định dạng',
			'avatar.max' => 'Ảnh quá kích thức 2048kb',
			'phone.required' => 'Số điện thoại không được để trống',
			'description.required' => 'Mô tả không được để trống',
			'email.unique' => 'Email đã sử dụng',
			'password.required' => 'Mật khẩu không được để trống',
			'email.email' => 'Email không đúng định dạng',
			'email.required' => 'Email không được để trống',
		];
	}
}
