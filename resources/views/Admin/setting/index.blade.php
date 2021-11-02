@extends('Admin.layouts.admin')

@section('title')
    <title>Setting</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('admins\Setting\Setting.css')}}">
@endsection
@section('Js')
    <script src="{{asset('vendor\sweetalert2\sweetalert2.js')}}"></script>
    <script src="{{asset('admins\Setting\Setting.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Settings', 'key' => ''])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- add -->
                    <div class="col-md-12">
                        @can('settings-add')
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle add_setting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Add
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('setting.create'). '?type=Text'}}">Text</a>
                                    <a class="dropdown-item" href="{{route('setting.create'). '?type=Textarea'}}">Textarea</a>
                                </div>
                            </div>
                        @endcan
                    </div>

                    <div class=" col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="col-md-1">STT</th>
                                <th scope="col" class="col-md-3">Config Key</th>
                                <th scope="col" class="col-md-8">Config Value</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($setting as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->config_key}}</td>
                                    <td>{{$item->config_value}}</td>
                                    <td>
                                        @can('settings-edit')
                                            <a href="{{route('setting.edit',['id'=>$item->id]). '?type='.$item->type}}"
                                               class="btn btn-success" role="button"><i class="far fa-edit fa-2x"></i></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('settings-delete')
                                            <a href="{{route('setting.delete', ['id' => $item->id])}}"
                                               class="btn btn-danger" id="SettingDelete" role="button" onclick="return confirm('Are you sure delete this settings ?')"><i class="far fa-trash-alt fa-2x"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $setting->links()}}
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <!-- /.content -->
    </div>
@endsection


