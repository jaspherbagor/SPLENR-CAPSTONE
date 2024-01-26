@extends('layouts.app')

@section('content')
<div class="vh-100 px-4 py-5 d-flex align-items-center justify-content-center unauthorized-page bg-dark">
    <div class="text-center p-3 unauthorized-content text-white">
        <img src="{{ asset('image/login-logo.svg') }}" alt="logo" class="img-fluid">
        <h1 class="fw-bolder display-1">401</h1>
        <h4 class="fw-bold">UNAUTHORIZED REQUEST</h4>
        <p>You do not have the necessary credentials to access this page.</p>
    </div>
</div>
@include('layouts.footer')
@endsection
