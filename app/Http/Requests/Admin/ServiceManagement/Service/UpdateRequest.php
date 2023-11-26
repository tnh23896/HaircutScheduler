<?php

namespace App\Http\Requests\Admin\ServiceManagement\Service;

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
			'name' => 'required|min:2|max:255',
			'price' => 'required|numeric|min:0',
			'description' => 'required|string|max:255',
			'category_services_id' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
		];
	}
	public function messages()
	{
		return [
			'name.required' => 'Tên dịch vụ không được để trống',
			'name.min' => 'Tên dịch vụ phải có ít nhất 2 ký tự',
			'name.max' => 'Tên dịch vụ phải có tối đa 255 ký tự',
			'price.required' => 'Giá dịch vụ không được để trống',
			'price.numeric' => 'Giá dịch vụ phải là số',
			'price.min' => 'Giá dịch vụ phải lớn hơn 0',
			'description.required' => 'Mô tả dịch vụ không được để trống',
			'description.string' => 'Mô tả dịch vụ phải là chuỗi',
			'description.max' => 'Mô tả dịch vụ phải có tối đa 255 ký tự',
			'category_services_id.required' => 'Danh mục dịch vụ không được để trống',
			'image.required' => 'Ảnh dịch vụ không được để trống',
			'image.image' => 'Ảnh Không đúng định dạng',
			'image.mimes' => 'Ảnh dịch vụ phải có định dạng jpeg, png, jpg, gif',
			'image.max' => 'Ảnh dịch vụ có kích thước tối đa 2048kb',
		];
	}
}
