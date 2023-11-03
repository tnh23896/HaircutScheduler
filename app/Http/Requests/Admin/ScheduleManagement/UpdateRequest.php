<?php

namespace App\Http\Requests\Admin\ScheduleManagement;

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
            'status' => 'required|in:pending,confirmed,waiting,success,canceled'
        ];
    }
		public function messages()
		{
			return [
				'status.required' => 'Trạng thái không được để trống',
				'status.in' => 'Trạng thái không đúng ',
			];
		}
}
