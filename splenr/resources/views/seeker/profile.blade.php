@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 d-flex align-items-center justify-content-center">
        <div class="mt-5 container-fluid">
            <div class="container px-md-5">
                <div class="container px-md-5">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                </div>
            </div>
            <h2 class="fw-bolder mt-4 mb-4 text-center">UPDATE YOUR PROFILE</h2>

            <div class="container px-md-5">
                <form action="{{ route('user.update.profile') }}"
                method="post" enctype="multipart/form-data" class="px-md-5">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="profile_pic">Profile Image</label>
                        <input type="file" id="profile_pic" name="profile_pic" class="form-control">
                        @if ($errors->has('profile_pic'))
                            <p class="text-danger">{{ $errors->first('profile_pic') }}</p>
                        @endif
                        @if (auth()->user()->profile_pic)
                            <img src="{{ Storage::url(auth()->user()->profile_pic) }}" width="150" class="mt-3"
                                alt="profile image">
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ auth()->user()->name }}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>

            <h2 class="fw-bolder mt-5 mb-4 text-center">CHANGE YOUR PASSWORD</h2>
            <div class="container px-md-5">
                <form action="{{ route('user.changepassword') }}" method="post" class="px-md-5">@csrf
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
            <h2 class="fw-bolder mt-5 mb-4 text-center">UPDATE YOUR RESUME</h2>
            <div class="container px-md-5">
                <form action="{{ route('upload.resume') }}" method="post" enctype="multipart/form-data" class="px-md-5">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="resume">Upload a Resume </label>
                        <input type="file" name="resume" class="form-control" id="resume">
                        @if ($errors->has('resume'))
                            <span class="text-danger">{{ $errors->first('resume') }}</span>
                        @endif
                    </div>
                    @if (auth()->user()->resume)
                        <a href="{{ Storage::url(auth()->user()->resume) }}"
                            class="btn btn-dark btn-outline-info fw-semibold my-2 me-2" target="_blank">
                            View Resume
                        </a>
                    @endif
                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
            </div>
        </div>

    </div>
    @include('layouts.footer')

    {{-- <style>
    input[type='password'], input[type=text], input[type=file] {
        border: 2px solid black
    }
</style> --}}
@endsection
