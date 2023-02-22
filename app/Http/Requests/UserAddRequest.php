<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:users,name,NULL,id,deleted_at,NULL',
            'email' => 'bail|required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'bail|required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập User Name',
            'name.unique' => 'User Name đã dược sử dụng',
            'email.required' => 'Bạn phải nhập email',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Bạn phải nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.max' => 'Mật khẩu tối đa 20 kí tự',
        ];
    }
}
