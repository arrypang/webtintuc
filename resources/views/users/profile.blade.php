@extends('users.layouts.layouts')

@section('breadcrumb')
<a href="{{route('home')}}" class="breadcrumb-item f1-s-3 cl9">Trang chủ</a>
<span class="breadcrumb-item f1-s-3 cl9">Thông tin cá nhân</span>
@endsection

@section('content')
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        Thông tin cá nhân
    </h2>
</div>

<div class="py-5"> <!-- Adjust the padding as needed -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            <h1 class="my-2 text-center" style="font-size: 20px;color: #0098d1;">Thay đổi thông tin</h1>
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="fullName">Họ và tên</label>
                                <input type="text" class="form-control" id="fullName" aria-describedby="fullName" name="fullName" value="{{old('fullName',$user->fullName)}}">
                                @error('fullName')
                                <div class="valid-feedback text-danger">
                                    <em>{{$message }}</em>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="{{old('email',$user->email)}}">
                                @error('email')
                                <div class="valid-feedback text-danger">
                                    <em>{{$message}}</em>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="userName">Tên người dùng</label>
                                <input type="text" class="form-control" id="userName" aria-describedby="userName" value="{{old('userName',$user->userName)}}" name="userName">
                                @error('userName')
                                <div class="valid-feedback text-danger">
                                    <em>{{$message}}</em>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh đại diện</label>
                                <input type="file" class="form-control" id="image" aria-describedby="image" name="up_image">
                                @error('up_image')
                                <div class="valid-feedback text-danger">
                                    <em>{{$message}}</em>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                @if($user->image)
                                <label>Ảnh đại diện hiện tại</label>
                                <img src="/uploads/users/{{$user->image}}" alt="" class="rounded-circle" width="75" height="75">
                                @endif
                            </div>

                            <button class="btn btn-primary float-right" type="submit">
                                Lưu thay đổi
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-2 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="post">
                            <h1 class="my-2 text-center" style="font-size: 20px;color: #0098d1;">Đổi mật khẩu</h1>
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="current_password">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" >
                                @error('current_password')
                                <div class="valid-feedback text-danger">
                                    <em>{{$message }}</em>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="password" aria-describedby="password" name="password" autocomplete="new-password">
                                @error('password')
                                <div class="valid-feedback text-danger">
                                    <em>{{$message}}</em>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" id="password_confirmation" aria-describedby="password_confirmation" autocomplete="new-password" name="password_confirmation">
                                @error('password_confirmation')
                                <div class="valid-feedback text-danger">
                                    <em>{{$message}}</em>
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary float-right" type="submit">
                                Đổi mật khẩu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection