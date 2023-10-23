<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
//            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'

        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Email sản phẩm không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',


        ];
    }
}
