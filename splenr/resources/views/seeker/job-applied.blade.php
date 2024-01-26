@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-5">
    <div class="mt-5 px-1 align-items-center">
        <h2 class="fw-bolder mb-5 mt-3 text-center">APPLIED JOBS</h2>
        @if(count(auth()->user()->listings) > 0)
            @foreach ($users as $user)
            <div class="row">
                @foreach($user->listings as $listing )
                <div class="col-md-6">
                    <div class="card mb-3 applied-card">
                        <div class="card-body">
                            <div class="text-end py-0 my-0">
                                <small class="badge {{ $listing->pivot->application_status }} text-uppercase">
                                    {{ $listing->pivot->application_status }}
                                </small>
                            </div>
                            <h5 class="card-title fw-bold pt-0 mt-0 text-uppercase text-white">{{ $listing->title }}</h5>
                            <p class="card-text fw-semibold text-white">
                                Applied:
                                <span class="fw-bolder text-success text-uppercase">
                                    {{ $listing->pivot->created_at->format('F j, Y') }}
                                </span>
                            </p>
                            <a href="{{ route('job.show', [$listing->slug]) }}" class="btn btn-warning btn-outline-dark fw-semibold">VIEW</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        @else
        <p class="text-center fw-bolder">No jobs applied yet.</p>
        @endif
    </div>
</div>

@include('layouts.footer')

@endsection
