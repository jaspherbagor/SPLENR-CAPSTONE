@extends('layouts.admin.main')
@section('content')
<div class="container-fluid mt-5 px-4">
    <div class="row justify-content-center px-2">
        <h2 class="fw-bolder mb-4 text-center">ALL JOBS</h2>
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="card mb-4 px-0">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Your Jobs
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <caption>This table contains all the information of the job listing</caption>
                    <thead>
                        <tr>
                            <th id="title">Title</th>
                            <th id="created_on">Created on</th>
                            <th id="edit">Edit</th>
                            <th id="delete">Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th id="title">Title</th>
                            <th id="created_on">Created on</th>
                            <th id="edit">Edit</th>
                            <th id="delete">Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{\Carbon\Carbon::parse($job->created_at )->format('F j, Y')}}</td>
                            <td>
                                <a href="{{ route('job.edit', [$job->id]) }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $job->id }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        {{-- Modal --}}
                        <div class="modal fade" id="exampleModal{{ $job->id }}"
                        tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
                            <form action="{{ route('job.delete', [$job->id]) }}" method="POST">@csrf
                                @method('DELETE')
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-semibold text-danger" id="exampleModalLongTitle">
                                                Delete Confirmation
                                            </h5>
                                            <button type="button" class="close p-0 bg-transparent"
                                            data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="bi bi-x-lg"></i>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this job?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                No
                                            </button>
                                            <button type="submit" class="btn btn-danger">
                                                Yes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
