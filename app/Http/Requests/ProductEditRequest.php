<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'bail|required|unique:products,name,'.$this->route()->parameter("id").',id,deleted_at,NULL|max:255|min:10',
            'price' => 'bail|required|numeric|min:500',
            'category_id' => 'required',
            'contents' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên sản phẩm',
            'name.unique' => 'Tên đã tồn tại',
            'name.min' => 'Tên sản phẩm phải nhiều hơn 10 kí tự',
            'name.max' => 'Tên sản phẩm phải ít hơn 255 kí tự',
            'price.required' => 'Bạn phải nhập giá',
            'price.numeric' => 'Bạn phải nhập giá',
            'price.min' => 'Giá thấp nhất là 500',
            'category_id.required' => 'Bạn phải chọn danh mục sản phẩm',
            'contents.required' => 'Bạn phải nhập mô tả sản phẩm',
        ];
    }
}
