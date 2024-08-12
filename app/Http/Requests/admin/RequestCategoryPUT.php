<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestCategoryPUT extends FormRequest
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
        $id = $this->route('categoryID');
        return [
            'categoryName' => ['required','string','max:255',Rule::unique('categories','categoryName')->ignore($id,'categoryID')],
        ];
    }

    public function messages()
    {
        return [
            'categoryName.required' => 'Vui lòng nhập tên chuyên mục',
            'categoryName.unique' => 'Chuyên mục đã tồn tại',
            'categoryName.max' => 'Tên chuyên mục không vượt quá 255 kí tự  ',
        ];
    }
}
