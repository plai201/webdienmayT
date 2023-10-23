<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanHangRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'TenNhanHang' => 'bail|required|unique:nhan_hang',

        ];
    }
    public function messages(): array
    {
        return [
            'TenNhanHang.required' => 'Tên nhãn hàng không được để trống',
            'TenNhanHang.unique' => 'Tên không được phép trùng',

        ];
    }
}
