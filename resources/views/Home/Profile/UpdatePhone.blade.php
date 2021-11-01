@extends('Home.profile')
@section('profile_content')
    <div class="profile_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>Update Phone</h1>
                    </div>
                    <hr>
                    @if($confirm == false)
                        <form method="POST" action="{{route('phone_confirm')}}">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                            <div class="form-group">
                                <label for="email" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="phone" aria-describedby="basic-addon2"
                                           value="{{substr($customers->phone, 0,-8)}}@for($i= 1; $i <= strlen(substr($customers->phone, 2,-2)); $i++)*@endfor{{substr($customers->phone, -2)}}"
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
                        <form method="POST" action="{{route('phone_update', ['id'=>$customers->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="email" aria-describedby="basic-addon2"
                                           value="{{$customers->phone}}"
                                           disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NameLogin" class="col-sm-2 col-form-label">New Phone</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"  name="phone" placeholder="Enter phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Phone</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
