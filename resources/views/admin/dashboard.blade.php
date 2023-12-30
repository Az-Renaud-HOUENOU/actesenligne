<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ActesEnLigne | Tableau de bord . Admin</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('admin/img/svg/logo.svg')}}" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('admin//css/style.min.css')}}">
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
    @include('admin.partials.sidebar')
  <div class="main-wrapper">
    <!-- ! Main nav -->
    @include('admin.partials.header')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      @yield('content')
    </main>
    <!-- ! Footer -->
    @include('admin.partials.footer')
  </div>
</div>
<!-- Chart library -->
<script src="{{asset('admin/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('admin/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('admin/js/script.js')}}"></script>
</body>

</html>