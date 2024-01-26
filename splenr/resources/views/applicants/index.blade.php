@extends('layouts.admin.main')

@section('content')
<div class="container-fluid mt-5 px-4">
    <h2 class="fw-bolder mb-4 text-center">APPLICANTS</h2>
    <div class="row justify-content-center px-2">
        <div class="card mb-4 px-0">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Your Jobs
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <caption>This table is listing all the applicants of the job listings.</caption>
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
                            <td>{{ $listing->created_at->format('Y-m-d') }}</td>
                            <td>{{ $listing->users_count }}</td>
                            <td>
                                <a href="{{ route('job.show', [$listing->slug]) }}" class="text-secondary">
                                    View
                                </a>
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
@endsection
