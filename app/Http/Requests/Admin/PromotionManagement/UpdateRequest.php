<?php

namespace App\Http\Requests\Admin\PromotionManagement;

use App\Models\Promotion;
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
        $tableName = (new Promotion())->getTable();
        $id = request()->segment('4');
        return [
            'promocode' => ['required',
                            Rule::unique($tableName)->ignore($id)],
            'discount' => ['required', 'numeric'],
            'expire_date' => ['required', 'date'],
            'description' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'promocode.required' => 'Mã khuyến mãi không được để trống',
            'promocode.unique' => 'Mã khuyến mãi đã tồn tại',
            'discount.required' => 'Giảm giá không được để trống',
            'discount.numeric' => 'Giảm giá phải là số',
            'expire_date.required' => 'Ngày hết hạn không được để trống',
            'expire_date.date' => 'Ngày hết hạn không đúng định dạng',
            'description.required' => 'Mô tả không được để trống',
        ];
    }
}
