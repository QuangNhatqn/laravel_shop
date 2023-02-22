<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'bail|required|unique:roles,name,'.$this->route()->parameter("id").',id',
            'display_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên role',
            'name.unique' => 'Tên role bị trùng',
            'display_name.required' => 'Bạn phải nhập mô tả role',
        ];
    }
}
