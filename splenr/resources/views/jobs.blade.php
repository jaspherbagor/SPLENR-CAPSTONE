@extends('layouts.app')

@section('content')

<section class="container-fluid px-4 py-5 job-listing-section">
    <div class="mt-5 py-2">
        <h2 class="fw-bolder text-center my-4 pb-5">JOB LISTINGS</h2>
        
        <div class="row mt-4">
            <div class="col-lg-3 col-md-3 col-sm-4 filter-column mb-4">
                <div class="filter-container container-fluid p-3">
                    <h4 class="fw-bold mb-4"><i class="bi bi-funnel fs-4"></i>FILTER JOBS</h4>

                    <h5 class="fw-semibold mt-3 mb-2 border-bottom"><i class="bi bi-cash-stack fs-5"></i> SALARY</h5>

                    <ul>
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['sort' => 'salary_high_to_low']) }}"
                            class="text-decoration-none text-black filter-item">
                                High to Low
                            </a>
                        </li>
    
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['sort' => 'salary_low_to_high']) }}"
                            class="text-decoration-none text-black filter-item">
                                Low to High
                            </a>
                        </li>
                    </ul>


                    <h5 class="fw-semibold mt-3 mb-2 border-bottom"><i class="bi bi-calendar fs-5"></i> DATE</h5>

                    <ul>
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['date' => 'latest']) }}"
                            class="text-decoration-none text-black filter-item">
                                Latest
                            </a>
                        </li>
    
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['date' => 'oldest']) }}"
                            class="text-decoration-none text-black filter-item">
                                Oldest
                            </a>
                        </li>
                    </ul>

                    
                    <h5 class="fw-semibold mt-3 mb-2 border-bottom">
                        <i class="bi bi-suitcase-lg fs-5"></i> JOB TYPE
                    </h5>
                    
                    <ul>
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['job_type' => 'Fulltime']) }}"
                            class="text-decoration-none text-black filter-item">
                                Fulltime
                            </a>
                        </li>
    
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['job_type' => 'Parttime']) }}"
                            class="text-decoration-none text-black filter-item">
                                Parttime
                            </a>
                        </li>
    
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['job_type' => 'Casual']) }}"
                            class="text-decoration-none text-black filter-item">
                                Casual
                            </a>
                        </li>
    
                        <li class="border-bottom">
                            <a href="{{ route('listing.index', ['job_type' => 'Contract']) }}"
                            class="text-decoration-none text-black filter-item">
                                Contract
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 job-listing-column">
                <div class="row align-items-center">
                    @foreach($jobs as $job)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card job-listing-card p-1 mb-4">
                            <div class="text-end">
                                <small class="badge {{ $job->job_type }}">{{ $job->job_type }}</small>
                            </div>
                            <div class="text-center mt-2 p-3">
                                @if($job->profile->profile_pic)
                                <img src="{{ Storage::url($job->profile->profile_pic) }}"
                                alt="logo" class="listing-company-logo rounded-circle">
                                @else
                                <img src="{{ asset('image/temporary-company-image.svg') }}"
                                alt="logo" class="listing-company-logo rounded-circle">
                                @endif
                                <br>
                                <p class="d-block fw-bold listing-title">{{ $job->title }}</p>
            
                                <p class="listing-company-name">{{ $job->profile->name }}</p>
                                <div class="d-flex flex-row align-items-center justify-content-center">
                                    <small class="ms-1 listing-address">{{ $job->address }}</small>
                                </div>
                                <p class="listing-salary mt-2 fw-semibold">₱{{ number_format($job->salary,2) }}</p>
                                <div class="text-center mt-3">
                                    <a href="{{ route('job.show', [$job->slug]) }}">
                                        @if(Auth::check() && auth()->user()->user_type === "employer")
                                        <button class="btn listing-apply-btn fw-semibold">
                                            VIEW JOB <i class="bi bi-zoom-in"></i>
                                        </button>
                                        @else
                                        <button class="btn listing-apply-btn fw-semibold">
                                            APPLY NOW <i class="bi bi-arrow-right"></i>
                                        </button>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

@endsection
