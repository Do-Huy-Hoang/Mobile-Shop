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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('AdminLTE\plugins\bootstrap\css\bootstrap.min.css')}}">
    <!-- footer -->
    <link rel="stylesheet" href="{{asset('css\footer.css')}}">
    <!-- header -->
    <link rel="stylesheet" href="{{asset('css\header.css')}}">
    <!-- styles -->
    <link rel="stylesheet" href="{{asset('css\styles.css')}}">

    @yield('Css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- header -->
        @include('Pages.header')
    <!-- /.header-->

    <!-- Content Wrapper. Contains pages content -->
    <div class="col-md-12">
         @yield('content')
    <!-- /.content-wrapper -->
    </div>
    <!-- Main Footer -->
    <div class="col-md-12">
         @include('Pages.footer')
    </div>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('AdminLTE\plugins\jquery-3.5.1\jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{asset('AdminLTE\plugins\jquery-3.5.1\jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE\plugins\bootstrap\js\bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!---- Js ------->
<script src="{{asset('resources\js/message2s.js')}}"></script>
@yield('Js')

</body>
</html>
