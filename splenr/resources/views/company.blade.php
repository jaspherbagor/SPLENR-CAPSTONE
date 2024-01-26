@extends('layouts.app')

@section('content')

<div class="container px-md-4 px-sm-4 px-3 py-5">
  <div class="row justify-content-center mt-5">
    <div class="col">
      <div class="company-hero-section w-100">
      </div>
    </div>
  </div>
  
  <div class="mt-5">
    <div class="container text-md-start text-sm-start text-center">
      @if($company->profile_pic)
      <img src="{{ Storage::url($company->profile_pic) }}"
      width="100" height="100" class="rounded-circle" alt="Company Logo" class="img-fluid">
      @else
      <img src="{{ asset('image/temporary-company-image.svg') }}"
      width="100" height="100" class="rounded-circle" alt="Company Logo" class="img-fluid">
      @endif
      <h3 class="fw-bolder fs-2 text-md-start text-sm-start text-center mb-0 pb-0">{{ $company->name }}</h3>
      <h5 class="fw-semibold text-md-start text-sm-start text-center text-secondary">
        {{ $company->company_address }}
      </h5>
    </div>
  </div>
  
  @if($company->about)
  <div class="container-fluid mt-5 text-start">
    <h4 class="fw-bolder">ABOUT</h4>
    {!! $company->about !!}
  </div>
  @endif


  <h3 class="fw-bolder mt-5 mb-3 text-center">JOB POSTS</h3>
  
  <div class="row mt-5 align-items-center justify-content-center px-2">
    @foreach($company->jobs as $job)
    <div class="col-md-6">
      <div class="card mb-3 company-listing-card">
          <div class="card-body">
              <h5 class="card-title fw-bold text-uppercase">{{ $job->title }}</h5>
              <p class="card-text py-0 my-0">Location: <span class="fw-bold">{{ $job->address }}</span></p>
              <p class="card-text py-0 my-0">
                Salary:
                <span class="fw-bold">
                  ₱{{ number_format($job->salary, 2) }} per month
                </span>
              </p>
              <p class="card-text py-0 my-0">
                Application Deadline:
                <span class="fw-bold">
                  {{ \Carbon\Carbon::parse($job->application_close_date)->format('F j, Y') }}
                </span>
              </p>
              <a href="{{ route('job.show', [$job->slug]) }}" class="btn btn-warning btn-outline-dark fw-semibold mt-3">
                VIEW
              </a>
          </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@include('layouts.footer')
@endsection
