<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
        return [
            'fullName' => ['required','string','max:255'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6'],
            'roles' => ['required'],
            'image' => 'nullable|image|mimes:jpeg,png,gif,svg',
            'userName' => 'nullable|string|max:255|unique:users,userName',
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Vui lòng nhập tên người dùng.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng, vui lòng chọn email khác.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự.',
            'roles.required' => 'Vui lòng chọn vai trò cho thành viên.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            // 'image.max' => 'Kích thước hình ảnh tối đa là 2MB.',
            'userName.unique' => 'Tên người dùng này đã được sử dụng, vui lòng chọn tên khác.',
        ];
    }
}
