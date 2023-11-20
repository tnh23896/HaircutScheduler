<?php

namespace App\Http\Requests\Admin\ScheduleManagement;

use App\Rules\ValidPromotionCode;
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
            'name' => 'required',
            'admin_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^(0[0-9]{9})$/',
            'day' => 'required',
            'time' => 'required',
            'servicesId' => 'required',
            'promo_code' => [new ValidPromotionCode]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'admin_id.required' => 'Bạn chưa chọn nhân viên',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'day.required' => 'Bạn chưa chọn ngày hẹn cắt tóc',
            'time.required' => 'Bạn chưa chọn thời gian hẹn',
            'servicesId.required' => 'Bạn chưa chọn dịch vụ',
        ];

    }

}
