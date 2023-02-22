<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'bail|required|unique:users,name,'.$this->route()->parameter("id").',id,deleted_at,NULL',
            'email' => 'bail|required|email|unique:users,email,'.$this->route()->parameter("id").',id,deleted_at,NULL',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập User Name',
            'name.unique' => 'User Name đã dược sử dụng',
            'email.required' => 'Bạn phải nhập email',
            'email.unique' => 'Email đã được sử dụng',
        ];
    }
}
