@extends('Admin.layouts.admin')
@section('title')
    <title>Edit | Slider</title>
@endsection
@section('Css')
    <!-- Summernote-->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins\Slider\Slider.css')}}">
@endsection
@section('Js')
    <!-- Summernote -->
    <script src="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('admins\Slider\Slider.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Sliders' , 'key' => 'edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('slider.index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left"
                                                                                    aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body">
                            <form class="add" method="post" action="{{route('slider.update', ['id'=>$editSlider->id])}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <!-- name -->
                                <div class="form-group">
                                    <label for="name">Slider name</label>
                                    <input type="text" id="name" hidden="true">
                                    <input require="true" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name"
                                           placeholder="Enter slider name"
                                           value="{{$editSlider->name}}">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <!-- description -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="card card-outline card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Content
                                                    </h3>
                                                </div><!-- /.card-header -->
                                                <div class="card-body">
                                                    <textarea id="summernote"
                                                              name="description">{{ $editSlider->description }}</textarea>
                                                </div>
                                            </div>
                                        </div><!-- /.col-->
                                    </div>
                                </div>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <!-- image -->
                                <div class="form-group">
                                    <label for="image_path">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input " id="image_path"
                                                   name="image_path">
                                            <label class="custom-file-label" for="image_path">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 container_image_path">
                                        <div class="row">
                                            <img class="image_path" src="{{ $editSlider->image_path }}">
                                        </div>
                                    </div>
                                </div>
                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-success">Update</button>
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



