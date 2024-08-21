<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->userID,'userID')],
            'userName' => ['required', 'string', 'lowercase', 'max:255', Rule::unique(User::class)->ignore($this->user()->userID,'userID')],
            'up_image' => ['nullable', 'max:255', 'mimes:jpeg,png,gif,svg'],
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Không để trống trường họ tên',
            'fullName.max' => 'Tên quá dài, cho phép tối đa 255 kí tự',
            'email.required' => 'Không để trống trường email',
            'email.lowercase' => 'Vui lòng nhập chữ thường',
            'email.max' => 'Email quá dài, cho phép tối đa 255 kí tự',
            'email.unique' => 'Email đã tồn tại',
            'userName.required' => 'Không để trống trường tên người dùng',
            'userName.lowercase' => 'Vui lòng nhập chứ thường',
            'userName.max' => 'Tên người dùng tối đa 255 kí tự',
            'userName.unique' => 'Tên người dùng đã tồn tại',
        ];
    }
}
