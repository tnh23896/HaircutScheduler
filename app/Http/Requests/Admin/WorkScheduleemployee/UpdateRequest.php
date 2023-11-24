<?php

namespace App\Http\Requests\Admin\WorkScheduleEmployee;

use Carbon\Carbon;
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
    public function rules()
    {
        $editTimeLimit = Carbon::now()->subHours(24);

        return [
            'times' => 'array',  // Đảm bảo times là một mảng
            'times.*' => 'exists:times,id',  // Đảm bảo mỗi time trong mảng tồn tại trong bảng times
            'edit_time_limit' => [
                function ($attribute, $value, $fail) use ($editTimeLimit) {
                    // Kiểm tra xem đã hết thời gian sửa lịch chưa
                    if ($editTimeLimit > now()) {
                        $fail('Đã hết thời gian sửa lịch.');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'times.array' => 'Thời gian phải là một mảng.',
            'times.*.exists' => 'Một hoặc nhiều thời gian đã chọn không hợp lệ.',
        ];
    }
}
