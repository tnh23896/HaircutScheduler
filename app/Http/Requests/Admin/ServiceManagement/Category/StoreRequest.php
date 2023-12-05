<?php

namespace App\Http\Requests\Admin\ServiceManagement\Category;

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
            'name' => 'required | min:2 | max:255 | unique:category_services',
            'image' =>'required| image|mimes:jpeg,png,jpg,gif|max:2048',
            'can_choose' => 'required',
        ];
    }
		public function messages()
		{
			return [
                'name.unique' => 'Tên danh mục không được trùng',
				'name.required' => 'Tên danh mục không được để trống',
				'name.min' => 'Tên danh mục không được nhỏ hơn 2 ký tự',
				'name.max' => 'Tên danh mục không được lớn hơn 255 ký tự',
				'image.required' => 'Ảnh không được để trống',
				'image.image' => 'Ảnh không đúng định dạng',
				'image.mimes' => 'Ảnh không đúng định dạng',
				'image.max' => 'Ảnh không được lớn hơn 2MB',
                'can_choose.required' => 'Vui lòng chọn điều kiện cho danh mục',
			];
		}
}
