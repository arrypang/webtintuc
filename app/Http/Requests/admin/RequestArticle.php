<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'categoryID' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ];

        if($this->isMethod('post'))
        {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,webp' ;
        }else if($this->isMethod('put') || $this->isMethod('patch'))
        {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,webp' ;
        }

        return $rules ;
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.max' => 'Tiêu đề đề quá dài, kí tự cho phép tối đa 500 kí tự',
            'content.required' => 'Không để trống nội dung',
            'categoryID.required' => 'Vui lòng chọn danh mục',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'image.mimes' => 'Chỉ nhận hình ảnh có đuôi:jpeg,png,jpg,webp',
        ];
    }
}
