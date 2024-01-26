@extends('layouts.app')

@section('content')
<div class="container py-5 px-4">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <img src="{{ Storage::url($listing->feature_image) }}"
                alt="feature_image" class="card-img-top w-100 h-100">
                <div class="card-body">
                    <a href="{{ route('company', [$listing->profile->id]) }}" class="text-decoration-none">
                        @if($listing->profile->profile_pic)
                        <img src="{{ Storage::url($listing->profile->profile_pic) }}" width="60" height="60"
                        alt="company profile image" class="rounded-circle">
                        @else
                        <img src="{{ asset('image/temporary-company-image.svg') }}" width="60" height="60"
                        alt="company profile image" class="rounded-circle">
                        @endif
                        <span class="fw-bold fs-5 my-auto text-black">{{ $listing->profile->name }}</span>
                    </a>
                    <h2 class="card-title fw-bold">{{ $listing->title }}</h2>

                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    <span class="badge bg-success">{{ $listing->job_type }}</span>
                    <p class="mt-3 fw-semibold">Salary:
                         <span class="fw-bold">
                            ₱{{ number_format($listing->salary,2) }}
                        </span>
                    </p>
                    <p class="fw-semibold">
                        Address:
                        <span class="fw-bold">
                             {{ $listing->address }}
                        </span>
                    </p>
                    <h4 class="mt-4 fw-bold">Description</h4>
                    <p class="card-text">{!! $listing->description !!}</p>
                    <h4 class="fw-bold">Roles and Responsibilities</h4>
                    <p class="card-text">
                        {!! $listing->roles !!}
                    </p>
                    <h4 class="mt-4 fw-bold">Requirements</h4>
                    <p class="card-text">{!! $listing->requirements !!}</p>
                    <p class="card-text mt-4 fw-semibold">
                        Application Closing Date:
                         <span class="fw-bold">
                            {{ $listing->formattedDate }}
                        </span>
                    </p>
                    @if(Auth::check())
                        @if(auth()->user()->resume)
                        <form action="{{ route('application.submit', [$listing->id]) }}" method="post">@csrf
                            <button type="submit" class="btn btn-success mt-3">EASY APPLY</button>
                        </form>
                        @elseif(auth()->user()->user_type === "employer")

                        @else
                        <button type="button" class="btn btn-dark btn-outline-white fw-semibold"
                         data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            APPLY
                        </button>
                        @endif
                    @else
                        <button class="btn btn-outline-dark btn-success">
                            <a href="{{ route('login') }}" class="fw-semibold text-decoration-none text-white">
                                LOGIN TO APPLY
                            </a>
                        </button>
                    @endif

                    {{-- Modal --}}
                    <div class="modal fade" id="staticBackdrop"
                     data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="{{ route('application.submit', [$listing->id]) }}" method="post">@csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload Resume</h1>
                                        <button type="button" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" id="uploadResumeFile">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" disabled class="btn btn-primary" id="btnApply">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script>
    // Get a reference to the file input element
    const uploadResume = document.querySelector('#uploadResumeFile');

    // Create a FilePond instance
    const pond = FilePond.create(uploadResume);

    pond.setOptions({
    server: {
        url: '/resume/upload',
        process: {
            method: 'POST',
            withCredentials: false,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            ondata: (formData) => {
                formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)

                return formData
            },
            onload: (response) =>{
                document.getElementById('btnApply').removeAttribute('disabled')
            },
            onerror: (response) => {
                console.log('Error while uploading...', response)
            }
        },
    },
});
</script>
@endsection
