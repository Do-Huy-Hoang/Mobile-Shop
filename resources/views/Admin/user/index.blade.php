@extends('Admin.layouts.admin')

@section('title')
    <title>User</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('admins\User\User.css')}}">
@endsection
@section('Js')
    <script src="{{asset('vendor\sweetalert2\sweetalert2.js')}}"></script>
    <script src="{{asset('admins\User\User.js')}}"></script>
    <script src="{{asset('admins\User\User.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'User', 'key' => ''])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <!-- SidebarSearch Form -->
                        <form method="GET" action="{{route('user.index')}}">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class=" col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="col-md-1">STT</th>
                                <th scope="col" class="col-md-2">Name</th>
                                <th scope="col" class="col-md-5">Email</th>
                                <th scope="col" class="col-md-4">Position</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($user as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @php
                                            foreach ($roleuser->where('user_id', $item->id) as $role_userItem){
                                                    foreach ($roles->where('id', $role_userItem->role_id) as $rolesItem){
                                                        echo '<div class="col-md-12">'.$rolesItem->name.'</div>';
                                                    }
                                                }
                                        @endphp
                                    </td>
                                    @if($item->id != auth()->id())
                                    <td>
                                        @can('user-edit')
                                            <a href="{{route('user.edit', ['id'=> $item->id])}}"
                                               class="btn btn-success" role="button"><i class="far fa-edit fa-2x"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('user-delete')
                                            <a href="{{route('user.delete', ['id'=>$item->id])}}"
                                               class="btn btn-danger" id="UserDelete" role="button" onclick="return confirm('Are you sure delete this product ?')"><i class="far fa-trash-alt fa-2x"></i></a>
                                        @endcan
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                         {{$user->links()}}
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <!-- /.content -->
    </div>
@endsection


