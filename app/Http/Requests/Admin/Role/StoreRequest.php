<?php

namespace App\Http\Requests\Admin\Role;

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
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required|in:admin,user', // 'admin' or 'user
            'permissions' => 'required',
        ];
    }
		public function messages()
		{
			return [
				'name.required' => 'Tên quyền không được để trống',
				'name.unique' => 'Tên quyền đã tồn tại',
				'guard_name.required' => 'Chức vụ không được để trống',
				'guard_name.in' => 'Chức vụ không đúng',
				'permissions.required' => 'Quyền không được để trống',
			];
		}
}
