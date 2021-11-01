@extends('Admin.layouts.admin')

@section('title')
    <title>Category Trash</title>
@endsection
@section('Js')
    <script src="{{asset('admins\Category\Category.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Category', 'key' => 'trash'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <a href="{{route('category.index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-md-5">
                        <!-- SidebarSearch Form -->
                        <form method="GET" action="{{route('category-trash')}}">
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
                                <th scope="col" class="col-md-1">#</th>
                                <th scope="col"class="col-md-11">Name</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @can('category-delete')
                                            <a href="{{ route('category_untrash', ['id'=>$item->id]) }}"
                                               class="btn btn-success" role="button" onclick="return confirm('Are you sure restore this category?')"><i class="fas fa-undo fa-2x"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('category-delete')
                                            <a href="{{route('category_permanently_deleted', ['id' => $item->id])}}"
                                               class="btn btn-danger" id="categoryDelete" role="button" onclick="return confirm('Are you sure deleted permanently this category?')"><i class="far fa-trash-alt fa-2x"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $category->links()}}
                    </div>
                </div>
            </div>
        </div>
    @include('sweetalert::alert')
    <!-- /.content -->
    </div>
@endsection


