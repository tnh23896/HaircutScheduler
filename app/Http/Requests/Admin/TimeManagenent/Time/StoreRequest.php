<?php

namespace App\Http\Requests\Admin\TimeManagenent\Time;

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
            'time'=>'required|unique:times'
        ];
    }
    public function messages(){
        return [
            'time.required' => 'Bạn chưa nhập thời gian',
            'time.unique' => 'Thời gian đã tồn tại'
        ];
    }
}
