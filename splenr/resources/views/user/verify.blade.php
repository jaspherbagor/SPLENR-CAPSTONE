@extends('layouts.app')

@section('content')
<div class="container px-4 py-5 mt-5">
    <div class="d-flex align-items-center justify-content-center mt-5">
        <div class="container col-md-9">
        @if(Session::has('success'))
        <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
        @endif
        <div class="card p-0">
            <div class="card-header fw-semibold">Verify Account</div>
            <div class="card-body">
                <p>Your account is not verified. Please verify your account first.
                    <a href="{{ route('resend.email') }}">Resend verification email.</a>
                </p>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
