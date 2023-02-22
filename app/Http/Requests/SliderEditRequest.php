<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderEditRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders,name,'.$this->route()->parameter("id").',id,deleted_at,NULL',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên slider',
            'name.unique' => 'Tên slider bị trùng',
            'description.required' => 'Bạn phải nhập chi tiết slider',
        ];
    }
}
