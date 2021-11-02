@extends('Admin.layouts.admin')

@section('title')
    <title>Product Trash</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('AdminLTE\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins\Product\Product.css')}}">
@endsection
@section('Js')
    <script src="{{asset('vendor\sweetalert2\sweetalert2.js')}}"></script>
    <script src="{{asset('admins\Product\Product.js')}}"></script>
    <script src="{{asset('AdminLTE\plugins\datatables-bs4\js\dataTables.bootstrap4.min.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Product', 'key' => 'Trash'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                            <p><a href="{{route('product.index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left" ria-hidden="true"></i> Back</a></p>
                    </div>
                    <div class="col-md-5 ">
                        <!-- SidebarSearch Form -->
                        <form method="GET" action="{{route('product.index')}}">
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
                                <th scope="col" class="col-md-1 col-sm-1">STT</th>
                                <th scope="col"class="col-md-2 col-sm-2">Name</th>
                                <th scope="col" class="col-md-2 col-sm-2">Price</th>
                                <th scope="col" class="col-md-5 col-sm-5">Image</th>
                                <th scope="col"class="col-md-2 col-sm-2">Category</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($products as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->price)}}</td>
                                    <td>
                                        <img src="{{ $item->feature_img_path }}" class="feature_img_path">
                                    </td>
                                    <td>{{ optional($item->category)->name }}</td>
                                    <td>
                                            <a href="{{ route('un_trash', ['id'=>$item->id]) }}"
                                               class="btn btn-success" role="button" onclick="return confirm('Are you sure restore this product ?')"><i class="fas fa-undo fa-2x"></i>
                                            </a>
                                    </td>
                                    <td>
                                            <a href="{{route('permanently_deleted', ['id' => $item->id])}}"
                                               class="btn btn-danger" role="button" onclick="return confirm('Are you sure deleted permanently this product ?')"><i class="far fa-trash-alt fa-2x"></i>
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-11 col-sm-11">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    <!-- /.content -->
        @include('sweetalert::alert')
    </div>
@endsection


