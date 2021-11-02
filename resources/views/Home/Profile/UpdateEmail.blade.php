@extends('Home.profile')
@section('profile_content')
    <div class="profile_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>Update Email</h1>
                    </div>
                    <hr>
                    @if($confirm == false)
                    <form method="POST" action="{{route('email_confirm')}}">
                        @csrf
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="email" aria-describedby="basic-addon2"
                                       value="{{substr($user->email, 0,2)}}@for($i= 1; $i <= strlen(substr($user->email, 2,-2)); $i++)*@endfor{{substr($user->email, -10)}}"
                                       disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="NameLogin" class="col-md-3 col-form-label">Confirm password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control @if($error == true) is-invalid @endif" id="inputEmail3" name="password" placeholder="Enter password">
                            </div>

                        @if($error == true)
                                <div class="col-md-12 col-error">
                                    <div class="alert alert-danger col-error-2" role="alert">Wrong password</div>
                                </div>
                        @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" name="confirm" value="1" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </form>
                    @endif
                    @if($confirm == true)
                        <form method="POST" action="{{route('email_update', ['id'=>$user->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="email" aria-describedby="basic-addon2"
                                           value="{{$user->email}}"
                                           disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NameLogin" class="col-sm-2 col-form-label">New Email</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="inputEmail3" name="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Email</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
