<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title', 'Trang chủ')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/assets/users/images/logo/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/assets/users/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/users/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/users/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/users/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="/assets/users/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/users/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/users/css/util.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/users/css/main.css">
</head>

<body>

	<div>
		@include('users.layouts.header')

		<div class="container">
			<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
				<div class="f2-s-1 p-r-30 m-tb-6">
					@yield('breadcrumb')
				</div>

				<form method="get" action="{{route('search')}}" class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
					<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Tìm kiếm bài viết">
					<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" type="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
				</form>
			</div>
		</div>

		@yield('content')

		@include('users.layouts.footer')
	</div>

	<script src="/assets/users/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/assets/users/vendor/animsition/js/animsition.min.js"></script>
	<script src="/assets/users/vendor/bootstrap/js/popper.js"></script>
	<script src="/assets/users/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/assets/users/js/main.js"></script>

</body>

</html>