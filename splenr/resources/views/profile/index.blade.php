@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid mt-5 px-4">
        <div class="row justify-content-center">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <h2 class="fw-bolder mb-4">UPDATE YOUR PROFILE</h2>

            <form action="{{ route('user.update.profile') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="col-md-10">
                    <div class="form-group mb-4">
                        <label for="logo">Logo</label>
                        <input type="file" id="logo" name="profile_pic" class="form-control">
                        @if (auth()->user()->profile_pic)
                            <img src="{{ Storage::url(auth()->user()->profile_pic) }}" width="150" class="mt-3"
                                alt="profile image">
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <label for="name">Company Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="name">Address</label>
                        <input type="text" id="address" name="company_address" class="form-control"
                            value="{{ auth()->user()->company_address }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="description">About Company</label>
                        <textarea type="text" name="about" id="description" class="form-control summernote">
                        {{ auth()->user()->about }}
                    </textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>

            <h2 class="fw-bolder mt-5 mb-4">CHANGE YOUR PASSWORD</h2>

            <form action="{{ route('user.changepassword') }}" method="post" class="w-100">@csrf
                <div class="form-group mb-4">
                    <label for="name">Current Password </label>
                    <input type="password" name="current_password" class="form-control">
                    @if ($errors->has('current_password'))
                        <span class="text-danger">{{ $errors->first('current_password') }}</span>
                    @endif

                </div>
                <div class="form-group mb-4">
                    <label for="name">New Password</label>
                    <input type="password" name="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="name">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
