<?php

namespace App\Http\Requests\Admin\ScheduleManagement;

use App\Rules\ValidPromotionCode;
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
            'name' => 'required',
            'admin_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
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
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'day.required' => 'Bạn chưa chọn ngày hẹn cắt tóc',
            'time.required' => 'Bạn chưa chọn thời gian hẹn',
            'servicesId.required' => 'Bạn chưa chọn dịch vụ',
            'status.required' => 'Trạng thái không được để trống',
            'status.in' => 'Trạng thái không đúng ',
        ];
    }
}
