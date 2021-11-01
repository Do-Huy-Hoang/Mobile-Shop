@extends('Admin.layouts.admin')

@section('title')
    <title>Slider</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('admins\Slider\Slider.css')}}">
@endsection
@section('Js')
    <script src="{{asset('vendor\sweetalert2\sweetalert2.js')}}"></script>
    <script src="{{asset('admins\Slider\Slider.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Sliders', 'key' => ''])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('slider-add')
                            <p><a href="{{ route('slider.create') }}" class="btn btn-success" role="button">Add</a></p>
                        @endcan
                    </div>
                    <div class=" col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="col-md-1">STT</th>
                                <th scope="col" class="col-md-1">Name</th>
                                <th scope="col" class="col-md-5">Description</th>
                                <th scope="col" class="col-md-5">Image</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($sliders as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <img class="image_path" src="{{$item->image_path}}">
                                    </td>
                                    <td>
                                        @can('slider-edit')
                                            <a href="{{route('slider.edit',['id'=>$item->id])}}"
                                               class="btn btn-success" role="button"><i class="far fa-edit fa-2x"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('slider-delete')
                                        <a href="{{route('slider.delete', ['id' => $item->id])}}"
                                           class="btn btn-danger" id="SliderDelete" role="button" onclick="return confirm('Are you sure deleted this category?')"><i class="far fa-trash-alt fa-2x"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links()}}
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <!-- /.content -->
    </div>
@endsection


