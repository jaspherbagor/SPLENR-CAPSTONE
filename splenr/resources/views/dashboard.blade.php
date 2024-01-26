@extends('layouts.admin.main')

@section('content')

<div class="container-fluid px-0 py-5">
    <div class="container-fluid">

        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <div class="container-fluid">
            <h2 class="fw-bolder">DASHBOARD</h2>
            <p class="pt-2 my-0 pb-0">
                Hello, <span class="fw-semibold">{{ auth()->user()->name }}</span>!
            </p>
            @if(!auth()->user()->billing_ends)
                @if(Auth::check() && auth()->user()->user_type == 'employer')
                <p class="pb-4 my-0">Your trial
                    {{ now()->format('Y-m-d') > auth()->user()->user_trial ? ' was expired': 'will expire'  }}
                        on <span class="fw-bold">{{\Carbon\Carbon::parse(auth()->user()->user_trial )->format('F j, Y')}}</span>.
                </p>
                @endif
            @endif
            @if(Auth::check() && auth()->user()->billing_ends)
                <p class="mb-3">
                    Your membership
                    {{ now()->format('Y-m-d') > auth()->user()->billing_ends ?
                    ' was expired': ' will expire'  }} on
                    <span class="fw-semibold">
                        {{ \Carbon\Carbon::parse(auth()->user()->billing_ends)->format('F j, Y') }}
                    </span>
                </p>
            @endif
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <h1 class="fw-bolder fs-1">
                                {{ \App\Models\Listing::where('user_id', auth()->id())->count() }}
                            </h1>
                            <div class="icon text-end"><i class="bi bi-suitcase-lg fs-2"></i></div>
                            <h6 class="fw-medium">Total Jobs</h6>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link fw-semibold" href="{{ route('job.index') }}">
                                VIEW
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h1 class="fw-bolder">PROFILE</h1>
                            <div class="icon text-end"><i class="bi bi-person-circle fs-2"></i></div>
                            <h6 class="fw-medium">Account</h6>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link fw-semibold" href="{{ route('user.profile') }}">
                                VIEW
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h1 class="fw-bolder text-uppercase fs-1">
                                {{ App\Models\User::where('id', auth()->id())->first()->plan ? App\Models\User::where('id', auth()->id())->first()->plan : "N/A" }}
                            </h1>
                            <div class="icon text-end"><i class="bi bi-unlock fs-2"></i></div>
                            <h6>Plan</h6>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link fw-semibold" href="{{ route('subscribe') }}">
                                VIEW
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Job Applicants
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <caption>
                            This table contains the list of the job applicnts that the employer have posted.
                        </caption>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created on</th>
                                <th>Total Applicants</th>
                                <th>View Job</th>
                                <th>View Applicants</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($listings as $listing)
                            <tr>
                                <td>{{ $listing->title }}</td>
                                <td>{{\Carbon\Carbon::parse($listing->created_at )->format('F j, Y')}}</td>
                                <td>{{ $listing->users_count }}</td>
                                <td>
                                    <a href="{{ route('job.show', [$listing->slug]) }}" class="text-secondary">View</a>
                                </td>
                                <td>
                                    <a href="{{ route('applicants.show', $listing->slug) }}" class="text-success">
                                        View
                                    </a>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    

    </div>
    

</div>

@endsection
