<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="{{ route('admin.dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
        {{-- <h2 class="text-primary mb-0">AP</h2> --}}
        {{-- <img src="{{ Storage::url($settings['site_favicon']) && $settings['site_favicon'] ? Storage::url($settings['site_favicon']) : asset('web/img/favicon.png') }}"
            onerror="this.onerror=null; this.src='{{ asset('web/img/logo1.png') }}';" alt="AP" width="20"
            height="auto"> --}}
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Notificatin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">New user added</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Password changed</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="" src="{{ Storage::url(Auth::user()->profile ?? '') }}" alt=""
                    style="width: 40px; height: 40px;"
                    onerror="this.onerror=null; this.src='{{ asset('web/img/favicon.png') }}';">
                <span class="d-none d-lg-inline-flex">Aakash Ap</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('admin.profile') }}" class="dropdown-item">My Profile</a>
                <button
                    onclick="showConfirmToast('Logout','warning','Are you sure you want to proceed?','{{ route('admin.logout') }}')"
                    class="dropdown-item">Log Out</button>
            </div>
        </div>
    </div>
</nav>
