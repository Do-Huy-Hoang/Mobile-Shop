@extends('Admin.layouts.admin')
@section('title')
    <title>Add | Setting</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Settings' , 'key' => 'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('setting.index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body">
                            <form class="add" method="post" action="{{route('setting.store'). '?type='.request()->type}}">
                                @csrf
                                <!-- Config key-->
                                <div class="form-group">
                                    <label for="config_key">* Config key</label>
                                    <input type="text" name="config_key" hidden="true">
                                    <input require="true" type="text" class="form-control  @error('config_key') is-invalid @enderror" id="config_key"
                                           name="config_key" placeholder="Enter Config key" value="{{old('config_key')}}">
                                </div>
                                 @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                                <!-- Config value-->
                                @if(request()->type === 'Text')
                                        <div class="form-group">
                                            <label for="config_value">* Config value</label>
                                            <input require="true" type="text" class="form-control @error('config_value') is-invalid @enderror" id="config_key"
                                                   name="config_value" placeholder="Enter Config value" value="{{old('config_value')}}">
                                        </div>
                                        @error('config_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    @elseif(request()->type === 'Textarea')
                                        <div class="form-group">
                                            <label for="config_value">* Config value</label>
                                            <textarea require="true" type="text" class="form-control @error('config_value') is-invalid @enderror"
                                                      id="config_key" name="config_value" rows="4">{{old('config_value')}}</textarea>
                                        </div>
                                        @error('config_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                @endif
                                    <button class="btn btn-success" onclick="return confirm('Are you sure update ?')">Create</button>
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


