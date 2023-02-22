<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'module_name' => 'required',
            'name' => 'bail|required|unique:permissions,name,'.$this->route()->parameter("id").',id',
            'display_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'module_name.required' => 'Bạn phải chọn mô-đun',
            'name.required' => 'Bạn phải nhập tên permission',
            'name.unique' => 'Tên permission đã tồn tại',
            'display_name.required' => 'Bạn phải nhập tên hiển thị',
        ];
    }
}
