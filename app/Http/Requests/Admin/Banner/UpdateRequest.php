<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize()
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
			'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
		];
	}
	public function messages()
	{
		return [
			'image.image' => 'Ảnh không đúng định dạng',
			'image.mimes' => 'Ảnh không đúng định dạng',
			'image.max' => 'Ảnh quá kích thước 2048kb',
		];
	}
}
