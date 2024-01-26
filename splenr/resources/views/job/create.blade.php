@extends('layouts.admin.main')

@section('content')

<div class="container-fluid mt-3 justify-content-center px-4">
    <div class="justify-content-center">
        <div class="col-md-12 my-4">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <h2 class="fw-bolder mb-3 text-center">POST A JOB</h2>
            <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="form-group mb-4">
                    <label for="feature_image">Feature Image</label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control">
                    @if($errors->has('feature_image'))
                        <div class="text-danger fw-semibold">{{ $errors->first('feature_image') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    @if($errors->has('title'))
                        <div class="text-danger fw-semibold">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="summernote" class="form-control summernote"></textarea>
                    @if($errors->has('description'))
                        <div class="text-danger fw-semibold">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="roles">Roles and Responsibility</label>
                    <textarea type="text" name="roles" id="summernote" class="form-control summernote"></textarea>
                    @if($errors->has('roles'))
                        <div class="text-danger fw-semibold">{{ $errors->first('roles') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="requirements">Requirements</label>
                    <textarea type="text" name="requirements" id="summernote"
                    class="form-control summernote"></textarea>
                    @if($errors->has('requirements'))
                        <div class="text-danger fw-semibold">{{ $errors->first('requirements') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="job_type" class="mb-2">Job Types</label>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="job_type" id="Fulltime" value="Fulltime">
                        <label for="Fulltime" class="form-check-label">Fulltime</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="job_type" id="Parttime" value="Parttime">
                        <label for="Parttime" class="form-check-label">Parttime</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="job_type" id="Casual" value="Casual">
                        <label for="Casual" class="form-check-label">Casual</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="job_type" id="Contract" value="Contract">
                        <label for="Contract" class="form-check-label">Contract</label>
                    </div>
                    @if($errors->has('job_type'))
                        <div class="text-danger fw-semibold">{{ $errors->first('job_type') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                    @if($errors->has('address'))
                        <div class="text-danger fw-semibold">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="salary">Salary</label>
                    <input type="text" name="salary" id="salary" class="form-control">
                    @if($errors->has('salary'))
                        <div class="text-danger fw-semibold">{{ $errors->first('salary') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="date">Application Closing Date</label>
                    <input type="text" name="date" id="datepicker" class="form-control">
                    @if($errors->has('date'))
                        <div class="text-danger fw-semibold">{{ $errors->first('date') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Post a Job</button>
                
            </form>
        </div>
    </div>
</div>
<style>
    .note-insert {
        display:none !important
    }
</style>

@endsection
