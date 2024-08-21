<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/admins/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/admins/img/favicon.png">
    <title>
        Đăng nhập
    </title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="/assets/admins/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/admins/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="/assets/admins/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class=" shadow-primary border-radius-lg py-3 pe-1" style="background-color: #0098d1;">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 pb-5 ">Đăng nhập</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" class="text-start" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email">
                                        @error('email')
                                        <div class="valid-feedback text-danger">
                                            <em>{{$message}}</em>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn text-white  w-100 my-4 mb-2" style="background-color: #0098d1;">Đăng nhập</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Bạn chưa có tài khoản, hãy
                                        <a href="{{route('register')}}" class=" font-weight-bold" style="color: #0098d1;">Đăng kí</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>