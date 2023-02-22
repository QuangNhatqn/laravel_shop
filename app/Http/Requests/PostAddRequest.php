<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddRequest extends FormRequest
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
            'title' => 'bail|required|unique:posts,title,NULL,id,deleted_at,NULL',
            'slug' => 'unique:posts,slug,NULL,id,deleted_at,NULL',
            'feature_image_path' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg',
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
            'feature_image_path.required' => 'Bạn phải thêm ảnh bài viết',
            'feature_image_path.image' => 'Tệp tải lên phải là hình ảnh',
            'feature_image_path.mimes:jpg,png,jpeg,gif,svg' => 'Tệp tải lên là 1 trong các dạng jpg,png,jpeg,gif,svg',
            'category_id.required' => 'Bạn phải chọn danh mục bài viết',
            'contents.required' => 'Bạn phải nhập mô tả bài viết',
        ];
    }
}
