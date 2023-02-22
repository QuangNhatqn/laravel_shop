<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'bail|required|unique:menus,name,'.$this->route()->parameter("id").',id,deleted_at,NULL',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên menu',
            'name.unique' => 'Tên menu đã tồn tại',
        ];
    }
}
