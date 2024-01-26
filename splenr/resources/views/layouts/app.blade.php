<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>splenr</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.svg') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
  crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/company.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/employer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/seeker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <link rel="stylesheet" href="{{ asset('css/unauthorized.css') }}">
  <link rel="stylesheet" href="{{ asset('css/job-applied.css') }}">
  <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg px-3 position-fixed container-fluid" data-bs-theme="light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img src="{{ asset('image/SPLENR-LOGO.svg') }}" class="logo" alt="SPLENR Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item me-4">
              <a class="nav-link active fw-semibold text-black fs-6" aria-current="page" href="/">
                <i class="bi bi-house-door fs-5"></i> HOME</a>
            </li>

            @if(Auth::check())
            <li class="nav-item me-4 dropdown text-decoration-none">
              <a class="btn dropdown-toggle p-0 text-decoration-none" href="#"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth()->user()->profile_pic)
                <img src="{{ Storage::url(auth()->user()->profile_pic) }}"
                width="40" height="40" class="rounded-circle" alt="profile_pic">
                @else
                <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o="
                width="40" height="40" class="rounded-circle" alt="profile_pic">
                @endif
              </a>
            
              <ul class="dropdown-menu text-decoration-none  p-0">
                @if(auth()->user()->user_type === 'seeker')
                <li class="nav-item my-0 py-0 ps-2">
                  <a class="nav-link active fw-semibold text-black fs-6"
                    aria-current="page" href="{{ route('seeker.profile') }}">
                    <i class="bi bi-person fs-5"></i> PROFILE
                  </a>
                </li>
                <li class="nav-item my-0 py-0 ps-2">
                  <a class="nav-link fw-semibold text-black fs-6" href="{{ route('job.applied') }}">
                    <i class="bi bi-card-list fs-5"></i>
                      JOB APPLIED
                  </a>
                </li>
                <li class="nav-item my-0 py-0 ps-2">
                  <a class="nav-link fw-semibold text-danger fs-6"  id="logoutbtn" href="#">
                    <i class="bi bi-box-arrow-left fs-5"></i> LOGOUT
                  </a>
                </li>
                @else
                <li class="nav-item my-0 py-0 ps-2">
                  <a class="nav-link fw-semibold text-black fs-6" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer fs-5"></i> DASHBOARD
                  </a>
                </li>
                <li class="nav-item my-0 py-0 ps-2">
                  <a class="nav-link fw-semibold text-danger fs-6"  id="logoutbtn" href="#">
                    <i class="bi bi-box-arrow-left fs-5"></i> LOGOUT
                  </a>
                </li>
                @endif
              </ul>
            </li>
          @endif
            
            <li class="nav-item me-4">
              <a class="nav-link fw-semibold text-black fs-6" href="{{ route('listing.index') }}">
                <i class="bi bi-briefcase fs-5"></i> JOBS
              </a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link fw-semibold text-black fs-6" href="/FAQs">
                <i class="bi bi-patch-question fs-5"></i> FAQs
              </a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link fw-semibold text-black fs-6" href="{{ route('contact') }}">
                <i class="bi bi-telephone fs-5"></i> CONTACT
              </a>
            </li>
            @if(!Auth::check())
            <li class="nav-item me-4">
              <a class="nav-link fw-semibold text-black fs-6" href="{{ route('create.seeker') }}">
                <i class="bi bi-person fs-5"></i> JOB SEEKER
              </a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link fw-semibold text-black fs-6" href="{{ route('create.employer') }}">
                <i class="bi bi-building fs-5"></i> EMPLOYER
              </a>
            </li>
            @endif
          </ul>

          @if(!Auth::check())
          <div class="me-3">
            <a href="{{ route('login') }}">
              <button class="btn fw-semibold text-black login-btn fs-6">LOGIN</button>
            </a>
          </div>
          @endif
          <form id="logout-form" action="{{ route('logout') }}" method="post" >@csrf</form>
        </div>
      </div>
  </nav>

  @yield('content')
    
</body>
</html>
