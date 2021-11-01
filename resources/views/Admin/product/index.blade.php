@extends('Admin.layouts.admin')

@section('title')
    <title>Product</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('AdminLTE\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins\Product\Product.css')}}">
@endsection
@section('Js')
    <script src="{{asset('admins\Product\Product.js')}}"></script>
    <script src="{{asset('AdminLTE\plugins\datatables-bs4\js\dataTables.bootstrap4.min.js')}}"></script>
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
                    <div class="col-md-7">
                        @can('product-add')
                            <p><a href="{{ route('product.create') }}" class="btn btn-success" role="button">Add</a></p>
                        @endcan
                    </div>
                    <div class="col-md-4 ">
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
                    <div class="col-md-1 garbage_can">
                        <a href="{{route('product-trash')}}" class="btn btn-dark"><i class="fas fa-trash fa-2x"></i></a>
                    </div>
                    <div class=" col-md-12">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="col-md-1 col-sm-1">#</th>
                                    <th scope="col"class="col-md-2 col-sm-2">Name</th>
                                    <th scope="col" class="col-md-2 col-sm-2">Price</th>
                                    <th scope="col" class="col-md-5 col-sm-5">Image</th>
                                    <th scope="col"class="col-md-2 col-sm-2">Category</th>
                                    @can('product-edit')
                                    <th scope="col"></th>
                                    @endcan
                                    @can('product-delete')
                                    <th scope="col"></th>
                                    @endcan
                                </tr>
                                </thead>
                            <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->price)}}</td>
                                    <td>
                                        <img src="{{ $item->feature_img_path }}" class="feature_img_path">
                                    </td>
                                    <td>{{ optional($item->category)->name }}</td>
                                    <td>
                                        @can('product-edit')
                                            <a href="{{ route('product.edit', ['id'=>$item->id]) }}"
                                               class="btn btn-success" role="button"><i class="far fa-edit fa-2x"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('product-delete')
                                            <a href="{{route('product.delete', ['id' => $item->id])}}"
                                               class="btn btn-danger" role="button" onclick="return confirm('Are you sure delete this product ?')"><i class="far fa-trash-alt fa-2x"></i></a>
                                        @endcan
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
        @include('sweetalert::alert')
        <!-- /.content -->
    </div>
@endsection


