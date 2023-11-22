<?php

namespace App\Http\Requests\Admin\TimeManagenent\Time;

use Illuminate\Validation\Rule;
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
        $eventId = $this->route('id');
        return [
            'time' => [
                'required',
                'date_format:H:i',
                Rule::unique('times', 'time')->ignore($eventId),
            ],
            'shift_id'=>'required'
        ];
    }
    public function messages(){
        return [
            'time.required' => 'Bạn chưa nhập thời gian',
            'time.unique' => 'Thời gian đã tồn tại',
            'shift_id.required' => 'Bạn chưa chọn ca',

        ];
    }
}
