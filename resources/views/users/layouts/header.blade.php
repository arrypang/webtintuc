@php
use App\Models\Category;
$categories = Category::all();
@endphp
<header>
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<div class="topbar">
			<div class="content-topbar container h-100">
				<div class="right-topbar">
				</div>
				<div class="left-topbar">

					@if(Auth::check() && !(auth()->user()->roles == 'user'))
					<a href="/admin" class="left-topbar-item">Quản trị website</a>
					@endif
					@if(Auth::check())
					<a href="/profile" class="left-topbar-item">Thông tin cá nhân</a>
					<p class="left-topbar-item"> {{auth()->user()->fullName}}</p>
					<a href="" onclick="event.preventDefault(); document.getElementById('logout1').submit()"  class="left-topbar-item">Đăng xuất</a>
					<form action="{{route('logout')}}" method="post" id="logout1" hidden>
						@csrf
					</form>
					@else
					<a href="/register" class="left-topbar-item">Đăng Kí</a>
					<a href="/login" class="left-topbar-item">Đăng nhập</a>
					@endif

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="/"><img src="/assets/users/images/logo/logo.svg" alt="IMG-LOGO"></a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li class="left-topbar">
					@if(Auth::check() && !(auth()->user()->roles == 'user'))
					<a href="/admin" class="left-topbar-item">Quản trị website</a>
					@endif
					@if(Auth::check())
					<a href="/profile" class="left-topbar-item">Thông tin cá nhân</a>
					<p class="left-topbar-item"> {{auth()->user()->fullName}}</p>
					@else
					<a href="/register" class="left-topbar-item">Đăng Kí</a>
					<a href="/login" class="left-topbar-item">Đăng nhập</a>
					@endif
				</li>
			</ul>

			<ul class="main-menu-m">

				@foreach($categories as $category)
				<li>
					<a href="/{{$category->slug}}">{{$category->categoryName}}</a>
				</li>
				@endforeach
			</ul>
		</div>

		<!--  -->
		<div class="wrap-logo container">
			<div class="logo">
				<a href="/"><img src="/assets/users/images/logo/logo.svg" alt="LOGO"></a>
			</div>

		</div>

		<!--  -->
		<div class="wrap-main-nav">
			<div class="main-nav">
				<nav class="menu-desktop">
					<ul class="main-menu">
						<!-- main-menu-active -->
						<li class="mega-menu-item">
							<a href="{{route('home')}}">Trang chủ</a>
						</li>
						@foreach($categories as $category)
						<li class="mega-menu-item">
							<a href="/{{$category->slug}}">{{$category->categoryName}}</a>
						</li>
						@endforeach

					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>