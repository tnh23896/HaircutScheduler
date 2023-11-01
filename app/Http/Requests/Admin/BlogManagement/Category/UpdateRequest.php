<?php

namespace App\Http\Requests\Admin\BlogManagement\Category;

use Illuminate\Foundation\Http\FormRequest;

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
			//
			'title' => 'required | min:2 | max:255'
		];
	}	public function messages()
	{
		return [
			'title.required' => 'Tiêu đề không được để trống',
		];
	}
}
