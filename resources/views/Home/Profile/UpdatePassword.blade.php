@extends('Home.profile')
@section('profile_content')
    <div class="profile_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>Update Password</h1>
                    </div>
                    <hr>
                    <form method="POST" action="{{route('password_update', ['id'=>$user->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="NameLogin" class="col-md-3 col-form-label">* Old password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control @if($error == true) is-invalid @endif @error('password') is-invalid @enderror"
                                        name="password" placeholder="Enter password">
                            </div>
                        </div>
                        @error('password')
                        <div class="col-md-12 col-error">
                            <div class="alert alert-danger col-error-2" role="alert">{{ $message }}</div>
                        </div>
                        @enderror
                        @if($error == true)
                            <div class="col-md-12 col-error">
                                <div class="alert alert-danger col-error-2" role="alert">Wrong password</div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="NameLogin" class="col-md-3 col-form-label">* New password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control @error('password_new') is-invalid @enderror"
                                       name="password_new" placeholder="Enter password">
                            </div>
                        </div>
                        @error('password_new')
                        <div class="col-md-12 col-error">
                            <div class="alert alert-danger col-error-2" role="alert">{{ $message }}</div>
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="NameLogin" class="col-md-3 col-form-label">* Confirm password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control @if($password_check == true) is-invalid @endif "
                                       name="password_confirm" placeholder="Enter password">
                            </div>

                            @if($password_check == true)
                                <div class="col-md-12 col-error">
                                    <div class="alert alert-danger col-error-2" role="alert">Passwords are not the same</div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" name="confirm" value="1" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
