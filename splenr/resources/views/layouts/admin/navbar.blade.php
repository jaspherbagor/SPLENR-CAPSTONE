<nav class="sb-topnav navbar navbar-expand navbar-light bg-white">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/">
        <img src="{{ asset('image/SPLENR-LOGO.svg') }}" alt="logo">
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars fs-5"></i>
    </button>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto  me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw fs-5"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="p-0">
                    <form id="form-logout" action="{{ route('logout') }}" method="post" class="p-0 m-0">@csrf
                        <button type="submit" class="dropdown-item py-0" id="logout">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>


