<?php

namespace App\Http\Requests\Admin\PromotionManagement;

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
            'promocode' => 'required|unique:promotions,promocode',
            'discount' => 'required|numeric',
            'expire_date' => 'required|date|after_or_equal:today',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'promocode.required' => 'Mã giảm giá không được để trống',
            'promocode.unique' => 'Mã giảm giá đã tồn tại',
            'discount.required' => 'Giảm giá không được để trống',
            'discount.numeric' => 'Giảm giá không đúng định dạng',
            'expire_date.required' => 'Ngày hết hạn không được để trống',
            'expire_date.date' => 'Ngày hết hạn không đúng định dạng',
            'expire_date.after_or_equal' => 'Ngày hết hạn phải lớn hơn ngày bắt đầu',
            'description.required' => 'Mô tả không được để trống',
        ];
    }
}
