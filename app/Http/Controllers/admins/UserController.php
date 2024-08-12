<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RequestUser;
use App\Http\Requests\admin\RequestUserPUT;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('admins.users.show', ['users' => $users]);
    }

    public function create()
    {
        return view('admins.users.add');
    }

    public function store(RequestUser $request)
    {

        $data = [
            'fullName' => $request->input('fullName'),
            'email' => $request->input('email'),
            'userName' => $request->input('userName'),
            'roles' => $request->input('roles'),
            'password' => bcrypt($request->input('password')),
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
        }

        User::create($data);

        return redirect()->route('admin.user')->with('success', 'Người dùng đã được thêm thành công!');
    }

    public function edit($userID)
    {
        $user = User::where('userID', $userID)->first();
        return view('admins.users.update', ['user' => $user]);
    }

    public function update(RequestUserPUT $request, $userID)
    {

        $user = User::where('userID', $userID)->firstOrFail();

        $user->fullName = $request->input('fullName');
        $user->email = $request->input('email');
        $user->userName = $request->input('userName');
        $user->roles = $request->input('roles');

        if ($request->hasFile('up_image')) {
            if ($user->image && file_exists(public_path('uploads/users/' . $user->image))) {
                unlink(public_path('uploads/users/' . $user->image));
            }
            

            $image = $request->file('up_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);

            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('admin.user')->with('success', 'Cập nhật thông tin người dùng thành công.');
    }


    public function delete($userID)
    {
        $user = User::where('userID', $userID)->first();
        unlink(public_path('uploads/users/' . $user->image));
        $user->delete();
        return redirect('/admin/user');
    }
}
