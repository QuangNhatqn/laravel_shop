<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
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
            'title' => 'bail|required|unique:posts,title,'.$this->route()->parameter("id").',id,deleted_at,NULL',
            'slug' => 'unique:posts,slug,'.$this->route()->parameter("id").',id,deleted_at,NULL',
            'category_id' => 'required',
            'contents' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tiêu để bài viết',
            'name.unique' => 'Tên bài viết đã tồn tại',
            'slug.unique' => 'Url đã tồn tại',
            'category_id.required' => 'Bạn phải chọn danh mục bài viết',
            'contents.required' => 'Bạn phải nhập mô tả bài viết',
        ];
    }
}
