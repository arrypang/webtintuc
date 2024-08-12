<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/admins/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/admins/img/favicon.png">
  <title>
    @yield('title','Home Admin')
  </title>
  @vite('resources/js/app.js');
  @include('admins.layouts.style')
</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('admins.layouts.aside')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('admins.layouts.nav')

    @if(session('success'))
    <div id="successMessage" class="alert alert-success position-fixed top-0 end-0 m-3" role="alert" style="z-index: 1050;">
      {{ session('success') }}
    </div>
    @endif

    @yield('content')
  </main>
  


  @yield('scripts')

  @include('admins.layouts.script')
</body>

</html>