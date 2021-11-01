@extends('Home.profile')
@section('profile_content')
    <div class="profile_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>Profile</h1>
                    </div>
                    <hr>
                    <form method="post" action="{{ route('profile.update', ['id' => $customers->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="NameLogin" class="col-sm-2 col-form-label">* Name Login</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="inputEmail3" name="name_login"
                                       value="{{$user->name}}">
                            </div>
                        </div>
                        @error('name_login')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="email" class="col-sm-2 col-form-label">* Email</label>
                            <div class="input-group mb-3">
                                <div class="col-md-11">
                                    <input type="text" class="form-control" name="email" aria-describedby="basic-addon2"
                                           value="{{substr($user->email, 0,2)}}@for($i= 1; $i <= strlen(substr($user->email, 2,-2)); $i++)*@endfor{{substr($user->email, -10)}}"
                                           disabled>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('email')}}"><button class="btn btn-outline-secondary" type="button">Edit</button></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="NameCustomer" class="col-md-4 col-form-label">* Name customer</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name_customer" placeholder="Name customer"
                                       id="inputEmail3" value="{{$customers->name}}">
                            </div>
                        </div>
                        @error('name_customer')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="phone" class="col-md-4 col-form-label">* Phone</label>
                            <div class="input-group">
                                <div class="col-md-11">
                                    <input type="text" class="form-control" placeholder="Phone number" name="phone"
                                           value="{{substr($customers->phone, 0,-8)}}@for($i= 1; $i <= strlen(substr($customers->phone, 2,-2)); $i++)*@endfor{{substr($customers->phone, -2)}}"
                                           aria-describedby="basic-addon2" disabled>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('phone')}}" ><button class="btn btn-outline-secondary" type="button">Edit</button></a>
                                </div>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <label for="Gender" class="col-md-4 col-form-label">* Gender</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input radio_check" type="radio" name="gender"
                                           id="gridRadios1" value="female"
                                           @if($customers->gender == 'female'): checked @endif >
                                    <label class="form-check-label" for="gridRadios1">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="gender" id="gridRadios2"
                                           value="male"
                                           @if($customers->gender == 'male'): checked @endif>
                                    <label class="form-check-label" for="gridRadios2">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="gender" id="gridRadios3"
                                           value="is_different"
                                           @if($customers->gender == 'is_different'): checked @endif>
                                    <label class="form-check-label" for="gridRadios3">
                                        Is different
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="birthday" class="col-md-4 col-form-label">* Birthday:</label>
                            <div class="col-md-12">
                            <input type="date" class="form-control" name="birthday" id="birthday"
                                   value="{{$customers->birthday}}">
                            </div>
                        </div>
                        @error('birthday')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Address" class="col-md-4 col-form-label">* Address</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control" name="address" value="{{$customers->address}}"
                                   placeholder="Enter address">
                            </div>
                        </div>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
