<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Trang chủ')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/users/img/favicon.ico">

    <link rel="stylesheet" href="/assets/users/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/users/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/users/css/ticker-style.css">
    <link rel="stylesheet" href="/assets/users/css/flaticon.css">
    <link rel="stylesheet" href="/assets/users/css/slicknav.css">
    <link rel="stylesheet" href="/assets/users/css/animate.min.css">
    <link rel="stylesheet" href="/assets/users/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/users/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/users/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/users/css/slick.css">
    <link rel="stylesheet" href="/assets/users/css/nice-select.css">
    <link rel="stylesheet" href="/assets/users/css/style.css">
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('users.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('users.layouts.footer')
    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="/assets/users/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/assets/users/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/assets/users/js/popper.min.js"></script>
    <script src="/assets/users/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/assets/users/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/assets/users/js/owl.carousel.min.js"></script>
    <script src="/assets/users/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="/assets/users/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="/assets/users/js/wow.min.js"></script>
    <script src="/assets/users/js/animated.headline.js"></script>
    <script src="/assets/users/js/jquery.magnific-popup.js"></script>

    <!-- Breaking New Pluging -->
    <script src=".//assets/users/js/jquery.ticker.js"></script>
    <script src=".//assets/users/js/site.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="/assets/users/js/jquery.scrollUp.min.js"></script>
    <script src="/assets/users/js/jquery.nice-select.min.js"></script>
    <script src="/assets/users/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="/assets/users/js/contact.js"></script>
    <script src="/assets/users/js/jquery.form.js"></script>
    <script src="/assets/users/js/jquery.validate.min.js"></script>
    <script src="/assets/users/js/mail-script.js"></script>
    <script src="/assets/users/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="/assets/users/js/plugins.js"></script>
    <script src="/assets/users/js/main.js"></script>

</body>

</html>