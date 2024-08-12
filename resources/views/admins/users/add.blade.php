@extends('admins.layouts.layout')

@section('title', 'Thêm thành viên')

@section('navmini')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin.user')}}">Người dùng</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thêm mới</li>
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
                        <h6 class="text-white text-capitalize ps-3">Thêm thành viên</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        
                        <form action="/admin/user/add" method="post" class="mx-4" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row ">
                                <div class="col-7">
                                    <div class="my-2">
                                        <label for="fullName" class="form-label text-dark">Họ và tên <span class="text-danger">*</span></label>
                                        <input type="text" name="fullName" id="fullName" class="form-control" value="{{ old('fullName') }}">
                                        @error('fullName')
                                            <em class="invalid-feedback">{{ $message }}</em>
                                        @enderror
                                    </div>
                                    <div class="my-2">
                                        <label class="form-label text-dark" for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                        @error('email')
                                            <em class="invalid-feedback">{{ $message }}</em>
                                        @enderror
                                    </div>
                                    <div class="my-2">
                                        <label for="image" class="form-label text-dark">Thêm hình ảnh</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                        @error('image')
                                            <em class="invalid-feedback">{{ $message }}</em>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="my-2">
                                        <label for="roles" class="form-label text-dark">Vai trò<span class="text-danger">*</span></label>
                                        <select class="form-select" name="roles" id="roles">
                                            <option selected disabled>--- Chọn vai trò ---</option>
                                            <option value="admin" {{ old('roles') == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                                            <option value="editor" {{ old('roles') == 'editor' ? 'selected' : '' }}>Kiểm duyệt viên</option>
                                            <option value="author" {{ old('roles') == 'author' ? 'selected' : '' }}>Tác giả</option>
                                            <option value="user" {{ old('roles') == 'user' ? 'selected' : '' }}>Người dùng</option>
                                        </select>
                                        @error('roles')
                                            <em class="invalid-feedback">{{ $message }}</em>
                                        @enderror
                                    </div>
                                    <div class="my-2">
                                        <label class="form-label text-dark" for="password">Mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control">
                                        @error('password')
                                            <em class="invalid-feedback">{{ $message }}</em>
                                        @enderror
                                    </div>
                                    <div class="my-2">
                                        <label class="form-label text-dark" for="userName">Tên người dùng </label>
                                        <input type="text" name="userName" id="userName" class="form-control" value="{{ old('userName') }}">
                                        @error('userName')
                                            <em class="invalid-feedback">{{ $message }}</em>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 w-100 text-center">
                                <button type="submit" class="btn btn-success w-50">Lưu người dùng</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
