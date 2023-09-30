<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'TenSanPham' => 'bail|required|unique:san_pham|max:255|min:10',
            'GiaGoc' => 'required',
            'GiaBan' => 'required',
            'MaDanhMuc' => 'required',
            'MaNhanHang' => 'required',
            'MoTaSanPham' => 'required',
            'GiaTri' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'TenSanPham.required' => 'Tên sản phẩm không được để trống',
            'TenSanPham.unique' => 'Tên không được phép trùng',
            'TenSanPham.max' => 'Tên sản phẩm không quá 255 kí tự',
            'TenSanPham.min' => 'Tên sản phẩm phải lớn hơn 10 kí tự',
            'GiaGoc.required' => 'Giá không được để trống',
            'GiaBan.required' => 'Giá bán không được để trống',
            'MaDanhMuc.required' => 'Danh mục không được để trống',
            'MaNhanHang.required' => 'Nhãn hàng không được để trống',
            'MoTaSanPham.required' => 'Mô tả không được để trống',
            'GiaTri.required' => 'Giá trị không được để trống',
        ];
    }
}
