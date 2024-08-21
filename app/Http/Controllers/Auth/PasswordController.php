<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            ],
            [
                'current_password.required' => 'Vui lòng không để trống mật khẩu cũ',
                'current_password.current_password' => 'Mật khẩu cũ không đúng',
                'password.required' => 'Vui lòng nhập mật khẩu mới',
                'password.password' => 'Mật khẩu không trùng với mật khẩu cũ',
                'password.confirmed' => 'mật khẩu mới không trùng nhau',
            ]);


        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
