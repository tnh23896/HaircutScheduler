<?php

namespace App\Http\Requests\Admin\BlogManagement\Blog;

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
			'title' => 'required|min:2|max:255',
			'description' => 'required|string|max:255',
			'category_blog_id' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		];
	}
}
