@extends('Admin.layouts.admin')
@section('title')
    <title>Add | Category</title>
@endsection
@section('Js')
    <script src="{{asset('admins\Category\Category.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            @include('Admin.pages.content-header', ['name' => 'Category' , 'key' => 'add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('category.index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body">
                            <form class="add" method="post" action="{{ route('category.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input type="text" name="id" hidden="true">
                                    <input require="true" type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="id_category">Category Parent</label>
                                    <select class="form-control" name="id_parent" id="id_parent">
                                        <option value="0">--- Select a category parent---</option>
                                        {!! $htmlOptions !!}
                                    </select>
                                </div>
                                <button class="btn btn-success" id="categorySave">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection


