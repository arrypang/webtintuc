<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title','Home Admin')
  </title>
  @vite('resources/js/app.js')
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="/assets/admins/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('admin')}}">
        <img src="/uploads/users/users_default.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-2 font-weight-bold text-white">
          @if(auth()->user()->roles == 'admin')
          Quản trị viên
          @elseif(auth()->user()->roles == 'author')
          Tác giả
          @elseif(auth()->user()->roles == 'editor')
          Kiểm duyệt viên
          @endif
        </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="/" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home</i>
            </div>
            <span class="nav-link-text ms-1">Xem trang web</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin') ? 'active bg-gradient-primary' : '' }}" href="/admin">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Bảng điều khiển</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản lí</h6>
        </li>
        @if((auth()->user()->roles == 'admin'))
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin/user*') ? 'active bg-gradient-primary' : '' }}" href="/admin/user">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group</i>
            </div>
            <span class="nav-link-text ms-1">Thành viên</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white {{ Request::is('admin/category*') ? 'active bg-gradient-primary' : '' }}" href="/admin/category">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
            </div>
            <span class="nav-link-text ms-1">Chuyên mục</span>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin/article*') ? 'active bg-gradient-primary' : '' }}" href="/admin/article">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">article</i>
            </div>
            <span class="nav-link-text ms-1">Bài viết</span>
          </a>
        </li>
        @if((auth()->user()->roles == 'admin') || (auth()->user()->roles == 'editor'))
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin/comment*') ? 'active bg-gradient-primary' : '' }}" href="/admin/comment">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">comment</i>
            </div>
            <span class="nav-link-text ms-1">Bình luận</span>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mt-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        @yield('navmini')
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <form class="input-group input-group-outline" method="get">
              <label class="form-label">Tìm kiếm.. </label>
              <input type="search" class="form-control">
            </form>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown d-flex align-items-center">
              <a href="#" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons opacity-10 pe-3">notifications</i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item d-flex align-items-center d-flex dropdown">
              <p class="text-xl text-secondary m-0 me-2">{{Auth::user()->fullName}}</p>
              <a href="#" class="nav-link text-body font-weight-bold px-0" id="dropdownAvatar" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::user()->image)
                <img src="/uploads/users/{{Auth::user()->image}}" class="avatar avatar-sm me-3 border-radius-lg" alt="Hình ảnh {{Auth::user()->image}}">
                @else
                <img src="/uploads/users/users_default.png" class="avatar avatar-sm me-3 border-radius-lg" alt="Hình ảnh {{Auth::user()->image}}">
                @endif
              </a>

              <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdownAvatar">
                <li class="text-center"><span class="text-danger border-radius-md">{{ Auth::user()->fullName }} </span></li>
                <li><a class="dropdown-item border-radius-md" href="">Thông tin cá nhân</a></li>
                <li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    @method('POST')
                  </form>
                  <a class="dropdown-item border-radius-md" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Đăng xuất
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @if(session('success'))
    <div id="successMessage" class="alert alert-success alert-dismissible text-white position-fixed top-0 end-0 m-3" role="alert" style="z-index: 1050;">
      {{ session('success') }}
    </div>
    @endif

    @if(session('danger'))
    <div id="successMessage" class="alert alert-danger alert-dismissible text-white position-fixed top-0 end-0 m-3" role="alert" style="z-index: 1050;">
      {{ session('danger') }}
    </div>
    @endif



    @yield('content')
  </main>


  @yield('scripts')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="/assets/admins/js/main.js"></script>
  <script src="/assets/admins/js/core/popper.min.js"></script>
  <script src="/assets/admins/js/core/bootstrap.min.js"></script>
  <script src="/assets/admins/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/admins/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/admins/js/material-dashboard.min.js?v=3.1.0"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
</body>

</html>