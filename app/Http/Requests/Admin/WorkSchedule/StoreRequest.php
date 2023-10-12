<?php

namespace App\Http\Requests\Admin\WorkSchedule;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'day' => [
                'required',
                'after:today',
                Rule::unique('work_schedules')->where(function ($query) {
                    return $query->where('admin_id', $this->admin_id)->where('day', $this->day)->whereNull('deleted_at');;
                })
            ],
            'times' => 'required',
        ];
    }
}