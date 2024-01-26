@extends('layouts.admin.main')

@section('content')
    <div class="container px-4 mt-5">
        <h2 class="fw-bolder text-center mb-5">SUBSCRIBE TO A PLAN</h2>
        <div class="row">
            @if (Session::has('message'))
                <div class="alert alert-warning">{{ Session::get('message') }}</div>
            @endif
            <div class="col-lg-4 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                <div class="card mb-5 weekly-subscription" style="width: 25rem;">
                    <div class="card-body py-3 text-center">
                        <h5 class="fw-semibold">Weekly Plan</h5>
                        <h2 class="fw-bolder card-title">₱500.00</h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">&#x2713; Immediate job postings for quick exposure.</li>
                        <li class="list-group-item">&#x2713; Affordable short-term hiring options.</li>
                        <li class="list-group-item">&#x2713; Increased engagement for faster recruitment.</li>
                        <li class="list-group-item">&#x2713; Flexibility to update postings regularly.</li>
                        <li class="list-group-item">&#x2713; Suitable for urgent and quick hiring needs.</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ route('pay.weekly') }}" class="card-link">
                            <button class="btn select-plan-btn fw-semibold w-100">SELECT PLAN</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                <div class="card mb-5 monthly-subscription" style="width: 25rem;">
                    <div class="card-body py-3 text-center">
                        <h5 class="fw-semibold">Monthly Plan</h5>
                        <h2 class="fw-bolder card-title">₱1,500.00</h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">&#x2713; Cost-efficient extended job visibility.</li>
                        <li class="list-group-item">&#x2713; Consistent presence for attracting candidates.</li>
                        <li class="list-group-item">&#x2713; Unlimited job postings for 1 month.</li>
                        <li class="list-group-item">&#x2713; Company branding opportunities.</li>
                        <li class="list-group-item">&#x2713; Flexibility in scheduling job postings.</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ route('pay.monthly') }}" class="card-link">
                            <button class="btn select-plan-btn fw-semibold w-100">SELECT PLAN</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                <div class="card mb-5 yearly-subscription" style="width: 25rem;">
                    <div class="card-body py-3 text-center">
                        <h5 class="fw-semibold">Yearly Plan</h5>
                        <h2 class="fw-bolder card-title">₱10,000.00</h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">&#x2713; Cost-effective long-term recruitment solution.</li>
                        <li class="list-group-item">&#x2713; Extensive and prolonged brand exposure.</li>
                        <li class="list-group-item">&#x2713; Premium recruitment tools and features included.</li>
                        <li class="list-group-item">&#x2713; Unlimited job postings throughout the year.</li>
                        <li class="list-group-item">&#x2713; Priority customer support available.</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ route('pay.yearly') }}" class="card-link">
                            <button class="btn select-plan-btn fw-semibold w-100">SELECT PLAN</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
