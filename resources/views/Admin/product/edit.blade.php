@extends('Admin.layouts.admin')
@section('title')
    <title>Edit | Product</title>
@endsection

@section('Css')
    <!-- Summernote-->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins\Product\Product.css')}}">
@endsection
@section('Js')
    <!-- Summernote -->
    <script src="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('admins\Product\Product.js')}}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Product' , 'key' => 'edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left" ria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body add">
                            <form action="{{route('product.update', ['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- name -->
                                <div class="form-group">
                                    <label for="name">* Product name</label>
                                    <input type="text" name="id" hidden="true">
                                    <input require="true" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name product" value="{{ $product->name }}">
                                </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                <div class="form-group">
                                    <label for="price">* Price</label>
                                    <input require="true" type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter price product" value="{{ $product->price }}">
                                </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                <div class="form-group">
                                    <label for="category_id">* Category</label>
                                    <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id" id="category_id" value="{{ $product->category_id }}">
                                        <option>--- Select a category ---</option>
                                         {!! $htmlOptions !!}
                                    </select>
                                </div>

                                    <!-- image -->
                                <div class="form-group">
                                    <label for="feature_img_path">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="feature_img_path" name="feature_img_path">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 container_image_path">
                                        <div class="row">
                                            <img class="feature_img" src="{{ $product->feature_img_path }}">
                                        </div>
                                    </div>
                                </div>

                                    <!-- Detailed photo -->
                                <div class="form-group">
                                    <label for="img_path">Detailed photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img_path" name="img_path[]" multiple value="{{ $product->img_path }}">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 container_image_details">
                                        <div class="row ">
                                            @foreach($product->productImages as $item)
                                                    <div class="col-md-3">
                                                        <img class="img_path" src="{{$item->img_path}}">
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                    <!-- contents -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    * Content
                                                </h3>
                                            </div><!-- /.card-header -->
                                            <div class="card-body">
                                                <textarea id="summernote" name="contents">{{ $product->content }}</textarea>
                                            </div>
                                        </div>
                                    </div><!-- /.col-->
                                </div>
                                <button class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div>
@endsection
