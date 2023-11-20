<?php

namespace App\Http\Requests\Admin\WorkScheduleEmployee;

use App\Models\Time;
use App\Models\WorkSchedule;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'formType' => 'required|in:date,week',
            'week' => [
                'required_if:formType,week',
                function ($attribute, $value, $fail) {
                    $selectedWeekStart = Carbon::parse(request('week'))->startOfWeek()->format('Y-m-d');
                    $selectedWeekEnd = Carbon::parse(request('week'))->endOfWeek()->format('Y-m-d');
                    
                    // Kiểm tra xem có ngày nào đã được đăng ký trong tuần này hay không
                    $existingSchedule = WorkSchedule::where('admin_id', auth()->guard('admin')->id())
                        ->where('day', '>=', $selectedWeekStart)
                        ->where('day', '<=', $selectedWeekEnd)
                        ->exists();
    
                    if ($existingSchedule) {
                        $fail('Có ngày trong tuần đã được đăng ký trước đó.');
                    }
                },
            ],
            'date' => [
                'required_if:formType,date',
                'date',
                function ($attribute, $value, $fail) {
                    $selectedDateTime = Carbon::parse(request('date'));
    
                    if ($selectedDateTime->isSameDay(now())) {
                        $existingSchedule = WorkSchedule::where('admin_id', auth()->guard('admin')->id())
                            ->where('day', $selectedDateTime->format('Y-m-d'))
                            ->exists();
            
                        if ($existingSchedule) {
                            $fail('Ngày đã được đăng ký trước đó.');
                        }
                        if ($selectedDateTime->lt(now())) {
                            $fail('Ngày đăng ký phải lớn hơn hiện tại.');
                        }
                    } else {
                        $existingSchedule = WorkSchedule::where('admin_id', auth()->guard('admin')->id())
                            ->where('day', $selectedDateTime->format('Y-m-d'))
                            ->exists();
            
                        if ($existingSchedule) {
                            $fail('Ngày đã được đăng ký trước đó.');
                        }
                        // Kiểm tra xem thời gian đã chọn đã qua hay chưa
                        if ($selectedDateTime->lt(now())) {
                            $fail('Ngày đăng ký phải lớn hơn hiện tại.');
                        }
                    }
                },
            ],
            
            'timeSlots' => [
                'required',
                'array',
                'min:1',
            ],
            'timeSlots.*' => [
                'required',
                'exists:times,id',
            ],

        ];
    }
    
    public function messages()
    {
        return [
            'formType.required' => 'Vui lòng chọn loại form.',
            'formType.in' => 'Loại form không hợp lệ.',
            'week.required_if' => 'Vui lòng chọn tuần.',
            'week.unique' => 'Có ngày trong tuần đã được đăng ký trước đó.',
            'date.required_if' => 'Vui lòng chọn ngày.',
            'date.date' => 'Ngày không hợp lệ.',
            'date.after_or_equal' => 'Không thể chọn ngày ở quá khứ.',
            'timeSlots.required' => 'Vui lòng chọn ít nhất một khoảng thời gian.',
            'timeSlots.min' => 'Vui lòng chọn ít nhất một khoảng thời gian.',
            'timeSlots.*.required' => 'Vui lòng chọn một khoảng thời gian hợp lệ.',
            'timeSlots.*.exists' => 'Một hoặc nhiều khoảng thời gian đã chọn không hợp lệ.',
        ];
    }
}
