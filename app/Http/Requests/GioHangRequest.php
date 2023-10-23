<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GioHangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Ho' => 'bail|required|max:255|min:10',
            'Ten' => 'required',
            'SoDienThoai' => 'required',
            'ThanhPhoTinh' => 'required',
            'QuyenHuyen' => 'required',
            'PhuongXa' => 'required',
            'DiaChi' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'Ho.required' => 'Họ và tên không được để trống',
            'Ten.required' => 'Họ và tên không được để trống',
            'SoDienThoai.required' => 'Số điện thoại không được để trống',
            'ThanhPhoTinh.required' => 'Thành phố không được để trống',
            'QuyenHuyen.required' => 'Quận huyện không được để trống',
            'PhuongXa.required' => 'Phường xã không được để trống',
            'DiaChi.required' => 'Địa chỉ không được để trống',
        ];
    }
}
