<!DOCTYPE html>
<!--
This is a starter template pages. Use this pages to start your new project from
scratch. This pages gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
    @yield('Css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('Admin.pages.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('Admin.pages.sidebar')

    <!-- Content Wrapper. Contains pages content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('Admin.pages.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!---- Js ------->
<script src="{{asset('resources\js/message2s.js')}}"></script>
@yield('Js')

</body>
</html>
