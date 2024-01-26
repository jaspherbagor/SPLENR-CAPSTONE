@extends('layouts.admin.main')

@section('content')

<div class="container-fluid mt-3 justify-content-center px-4">
    <div class="justify-content-center">
        <div class="col-md-12 my-4">
            <h2 class="fw-bolder mb-3 text-center">UPDATE A JOB</h2>
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form action="{{ route('job.update', [$listing->id]) }}" method="POST" enctype="multipart/form-data">@csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="feature_image">Feature Image</label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control">
                    @if($listing->feature_image)
                    <img src="{{ Storage::url($listing->feature_image) }}"
                     class="mt-3 job_edit_feature_image w-25" alt="profile image">
                    @endif
                    @if($errors->has('feature_image'))
                        <div class="text-danger fw-semibold">{{ $errors->first('feature_image') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $listing->title }}">
                    @if($errors->has('title'))
                        <div class="text-danger fw-semibold">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control summernote">
                        {{ $listing->description }}
                    </textarea>
                    @if($errors->has('description'))
                        <div class="text-danger fw-semibold">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="roles">Roles and Responsibility</label>
                    <textarea type="text" name="roles" id="roles" class="form-control summernote">
                        {{ $listing->roles }}
                    </textarea>
                    @if($errors->has('roles'))
                        <div class="text-danger fw-semibold">{{ $errors->first('roles') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="requirements">Requirements</label>
                    <textarea type="text" name="requirements" id="requirements"
                    class="form-control summernote">
                        {{ $listing->requirements }}
                    </textarea>
                    @if($errors->has('requirements'))
                        <div class="text-danger fw-semibold">{{ $errors->first('requirements') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="job_type" class="mb-2">Job Types</label>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="job_type" id="Fulltime" value="Fulltime" {{ $listing->job_type === 'Fulltime' ? 'checked' : '' }}>
                        <label for="Fulltime" class="form-check-label">Fulltime</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="job_type" id="Parttime" value="Parttime"
                        {{ $listing->job_type === 'Parttime' ? 'checked' : '' }}>
                        <label for="Parttime" class="form-check-label">Parttime</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio"
                         name="job_type" id="Casual" value="Casual"
                          {{ $listing->job_type === 'Casual' ? 'checked' : '' }}>
                        <label for="Casual" class="form-check-label">Casual</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio"
                         name="job_type" id="Contract" value="Contract" {{ $listing->job_type === 'Contract' ? 'checked' : '' }}>
                        <label for="Contract" class="form-check-label">Contract</label>
                    </div>
                    @if($errors->has('job_type'))
                        <div class="text-danger fw-semibold">{{ $errors->first('job_type') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $listing->address }}">
                    @if($errors->has('address'))
                        <div class="text-danger fw-semibold">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="salary">Salary</label>
                    <input type="text" name="salary" id="salary" class="form-control" value="{{ $listing->salary }}">
                    @if($errors->has('salary'))
                        <div class="text-danger fw-semibold">{{ $errors->first('salary') }}</div>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="date">Application Closing Date</label>
                    <input type="text" name="date" id="datepicker"
                     class="form-control" value="{{ $listing->application_close_date }}">
                    @if($errors->has('date'))
                        <div class="text-danger fw-semibold">{{ $errors->first('date') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Update a Job</button>
                
            </form>
        </div>
    </div>
</div>
<style>
    .note-insert {
        display:none !important
    }
    .job_edit_feature_image {
        border: 2px solid black
    }
</style>
@endsection
