<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestUserPUT extends FormRequest
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
        $userID = $this->route('userID');
        return [
            'fullName' => ['required','string','max:255'],
            'email' => ['required','email',Rule::unique('users','email')->ignore($userID,'userID')],
            'roles' => ['required'],
            'up_image' => 'nullable|image|mimes:jpeg,png,gif,svg',
            'userName' => ['nullable','string','max:255',Rule::unique('users','userName')->ignore($userID,'userID')],
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Vui lòng nhập tên người dùng.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng, vui lòng chọn email khác.',
            'roles.required' => 'Vui lòng chọn vai trò cho thành viên.',
            'up_image.image' => 'Tệp tải lên phải là hình ảnh.',
            'up_image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            // 'up_image.max' => 'Kích thước hình ảnh tối đa là 2MB.',
            'userName.unique' => 'Tên người dùng này đã được sử dụng, vui lòng chọn tên khác.',
        ];
    }
}
