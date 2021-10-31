@extends('Admin.layouts.admin')
@section('title')
    <title>Edit | User</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('AdminLTE\plugins\Select2\css\select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins\User\User.css')}}">
@endsection
@section('Js')
    <script src="{{asset('AdminLTE\plugins\Select2\js\select2.min.js')}}"></script>
    <script src="{{asset('admins\User\User.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'User' , 'key' => 'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('user.index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left"
                                                                                  aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body">
                            <form class="add" method="post" action="{{route('user.update', ['id'=> $userUpdate->id])}}" enctype="multipart/form-data">
                            @csrf
                                <!-- password -->
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="text" id="password" hidden="true">
                                    <input require="true" type="text" class="form-control "
                                           id="password" name="password"
                                           value="{{$userUpdate->password}}">
                                </div>

                                <!-- Select Roles -->
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select name="role_id[]" class="form-control select2_init" multiple>
                                        @foreach($role as $item)
                                            <option
                                                {{ $roleOfUser->contains('id', $item->id) ? 'selected':''}}
                                                value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <fieldset class="form-group">
                                    <legend class="col-form-label col-sm-2 pt-0">Is Admin</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input radio_check" type="radio" name="is_admin" id="gridRadios1" value="0"
                                                   @if($userUpdate->is_admin == '0'): checked @endif >
                                            <label class="form-check-label" for="gridRadios1">
                                               False
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="is_admin" id="gridRadios2" value="1"
                                                   @if($userUpdate->is_admin == '1'): checked @endif>
                                            <label class="form-check-label" for="gridRadios2">
                                                True
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn-success">Update</button>
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
@section('Js')
    <!-- bs-custom-file-input -->
    <script src="{{asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection


