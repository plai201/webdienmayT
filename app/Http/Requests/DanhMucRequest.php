<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
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
            'TenDanhMuc' => 'bail|required|unique:danh_muc_san_pham',

        ];
    }
    public function messages(): array
    {
        return [
            'TenDanhMuc.required' => 'Tên danh mục không được để trống',
            'TenDanhMuc.unique' => 'Tên không được phép trùng',
        ];
    }
}
