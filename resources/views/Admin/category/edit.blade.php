@extends('Admin.layouts.admin')
@section('title')
    <title>Edit | Category</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Category' , 'key' => 'edit'])
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
                            <form class="add" method="post" action="{{ route('category.update', ['id'=> $category->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input type="text" name="id" hidden="true">
                                    <input require="true" type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_category">Category</label>
                                    <select class="form-control" name="id_parent" id="id_parent">
                                        <option>--- Select a category ---</option>
                                        {!! $htmlOptions !!}
                                    </select>
                                </div>
                                <button class="btn btn-success" onclick="return confirm('Are you sure update ?')">Save</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div>
@endsection


