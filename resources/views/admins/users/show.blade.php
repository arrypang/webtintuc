@extends('admins.layouts.layout')

@section('title', 'Danh sách thành viên')

@section('navmini')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thành viên</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Danh sách thành viên</h6>
                        <a href="{{route('admin.user.add')}}" class="text-white me-3"><i class="material-icons fs-5 me-1">personadd</i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người dùng</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vai trò</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên người dùng</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày tạo</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if(isset($user->image))
                                                <img src="/uploads/users/{{$user->image}}" class="avatar avatar-sm me-3 border-radius-lg" alt="Hình ảnh {{$user->fullName}}">
                                                @else
                                                <img src="/uploads/users/users_default.png" class="avatar avatar-sm me-3 border-radius-lg" alt="Hình ảnh {{$user->fullName}}">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$user->fullName}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$user->roles}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @isset($user->userName)
                                        <p class="text-xs font-weight-bold mb-0">@<em>{{$user->userName}}</em></p>
                                        @endisset
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$user->created_at}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if(!(auth()->user()->userID == $user->userID))
                                        <a href="/admin/user/update/{{$user->userID}}" class="text-success font-weight-bold text-xs m-0" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="material-icons fs-6 ">draw</i>
                                        </a>
                                        <a href="#" class="text-danger font-weight-bold text-xs m-0"
                                            onclick="event.preventDefault(); if (confirm('Bạn muốn xóa thành viên: {{$user->fullName}}?')) { document.getElementById('delete_form{{$user->userID}}').submit(); }">
                                            <i class="material-icons fs-6">delete</i>
                                        </a>
                                        <form action="/admin/user/delete/{{$user->userID}}" method="post" id="delete_form{{$user->userID}}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @else
                                        <a href="#" class="text-secondary font-weight-bold text-xs">
                                            Thông tin cá nhân
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection