<?php

namespace App\Http\Requests\Admin\ServiceManagement\Category;

use App\Models\CategoryService;
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
		$tableName = (new CategoryService())->getTable();
		$id = request()->segment('4');
        return [
            'name' =>  [
                'required',
                'min:2',
                'max:255',
				Rule::unique($tableName)->ignore($id)
            ],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
		public function messages()
		{
			return [
                'name.unique' => 'Tên danh mục không được trùng',
				'name.required' => 'Tên danh mục không được để trống',
				'name.min' => 'Tên danh mục không được nhỏ hơn 2 ký tự',
				'name.max' => 'Tên danh mục không được lớn hơn 255 ký tự',
				'image.image' => 'Ảnh không đúng định dạng',
				'image.mimes' => 'Ảnh không đúng định dạng',
				'image.max' => 'Ảnh không được lớn hơn 2MB',
			];
		}
}
