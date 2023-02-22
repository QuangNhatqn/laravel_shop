<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders,name,NULL,id,deleted_at,NULL',
            'description' => 'required',
            'image_path' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên slider',
            'name.unique' => 'Tên slider đã tồn tại',
            'description.required' => 'Bạn phải nhập chi tiết slider',
            'image_path.required' => 'Bạn phải thêm ảnh slider',
            'image_path.image' => 'Tệp tải lên phải là hình ảnh',
            'image_path.mimes:jpg,png,jpeg,gif,svg' => 'Tệp tải lên là 1 trong các dạng jpg,png,jpeg,gif,svg',
        ];
    }
}
