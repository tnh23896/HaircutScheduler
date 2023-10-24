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
	public function messages()
	{
		return [
			'image.image' => 'Ảnh không đúng định dạng',
			'image.mimes' => 'Ảnh không đúng định dạng',
			'image.max' => 'Ảnh quá kích thước 2048kb',
			'category_blog_id.required' => 'Danh mục không được để trống',
			'title.required' => 'Tiêu đề không được để trống',
			'title.min' => 'Tiêu đề ít nhất 2 ký tự',
			'title.max' => 'Tiêu đề nhiều nhất 255 ký tự',
			'description.required' => 'Mô tả không được để trống',
			'description.string' => 'Mô tả phải là chuỗi',
			'description.max' => 'Mô tả nhiều nhất 255 ký tự',
		];
	}
}
