@extends('layouts.index')
@section('title')
    <title>Mobile Shop</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('css\Profile.css')}}">
@endsection
@section('Js')
    <script src="{{asset('js\styles.js')}}"></script>
@endsection
@section('content')
    <div class="profile">
        <div class="container profile_user">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <!-- Sidebar -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column list-group" data-widget="treeview"
                            role="menu"
                            data-accordion="false">
                            <!-- profile -->
                            <li class="list-group-item active"><i class="nav-icon fa fa-user" aria-hidden="true"> My
                                    account</i></li>
                            <li class="list-group-item">
                                <a href="{{route('profile')}}" class="nav-link">
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>
                            <!-- change password -->
                            <li class="list-group-item">
                                <a href="{{route('password.index')}}" class="nav-link">
                                    <p>
                                        Change password
                                    </p>
                                </a>
                            </li>
                            <!-- My order -->
                            <li class="list-group-item">
                                <a href="{{route('my_order')}}" class="nav-link">
                                    <p>
                                        My Order
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <div class="col-md-9">
                    @yield('profile_content')
                </div>
            </div>
        </div>
    </div>
@endsection
