    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="{{route('admin.dashboard')}}" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">&lt;/AakashAp&gt;</h3>
                {{-- <img src="{{ isset($settings['site_logo']) && $settings['site_logo'] ? asset('storage/' . $settings['site_logo']) : asset('web/img/logo1.png') }}"
                    onerror="this.onerror=null; this.src='{{ asset('web/img/logo1.png') }}';" alt="AakashAP"
                    height="40"> --}}
            </a>
            <div class="navbar-nav w-100">
                <a href="{{route('admin.dashboard')}}" class="nav-item nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('admin.blog') }}" class="nav-item nav-link {{ Request::is('admin/blog') ? 'active' : '' }}"> <i class="fa fa-blog me-2"></i>Blog </a>
                <a href="{{ route('admin.users') }}" class="nav-item nav-link {{ Request::is('admin/users') ? 'active' : '' }}"><i class="fa fa-users me-2"></i>Users</a>
                <a href="{{ route('admin.contacts') }}" class="nav-item nav-link {{ Request::is('admin/contacts') ? 'active' : '' }}"><i class="fa fa-handshake  me-2"></i>Contact Me</a>
                <a href="{{ route('admin.projects') }}" class="nav-item nav-link {{ Request::is('admin/projects') ? 'active' : '' }}"><i class="fa fa-folder-open me-2"></i>Projects</a>
                <a href="{{ route('admin.email-template') }}" class="nav-item nav-link {{ Request::is('admin/email-templates') ? 'active' : '' }}"><i class="fa fa-envelope me-2"></i>Manage Emails </a>
                <a href="{{ route('admin.setting') }}" class="nav-item nav-link {{ Request::is('admin/setting') ? 'active' : '' }}"><i class="fa fa-cog me-2"></i>Settings</a>
                <a href="{{ route('admin.website') }}" class="nav-item nav-link {{ Request::is('admin/website') ? 'active' : '' }}" target="_blank" ><i class="fa fa-desktop me-2"></i>Website</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->
