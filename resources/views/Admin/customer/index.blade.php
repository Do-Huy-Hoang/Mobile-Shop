@extends('Admin.layouts.admin')

@section('title')
    <title>Product</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Product', 'key' => ''])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- SidebarSearch Form -->
                        <div class="col-md-5">
                            <!-- SidebarSearch Form -->
                            <form method="GET" action="{{route('customer.index')}}">
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
                    </div>
                    <div class=" col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col"class="col-md-2">Name</th>
                                <th scope="col" class="col-md-6">Address</th>
                                <th scope="col" class="col-md-1">Phone</th>
                                <th scope="col" class="col-md-1">Gender</th>
                                <th scope="col"class="col-md-2">Birthday</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->gender}}</td>
                                    <td>{{$item->birthday}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
    @include('sweetalert::alert')
    <!-- /.content -->
    </div>
@endsection


