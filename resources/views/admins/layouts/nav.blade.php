<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mt-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    @yield('navmini')
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <form class="input-group input-group-outline" method="get" >
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
                    <img src="/assets/admins/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
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
          <a href="#" class="nav-link text-body font-weight-bold px-0" id="dropdownAvatar" data-bs-toggle="dropdown" aria-expanded="false">
            <!--  -->
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