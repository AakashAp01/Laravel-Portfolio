<div id="welcome-message" class="d-none text-center">
    Hey Greeting ! &nbsp;
    -"<span id="random-quote"></span>"
</div>
<nav class="navbar navbar-expand-lg shadow-sm py-3">
    <div class="container">
        <!-- Logo-like design for AP -->
        <a class="navbar-brand text-color-primary fs-3" href="{{route('web.index')}}">
            &lt;AakashAp&gt;
        </a>
        {{-- <a class="navbar-brand" href="{{ route('web.index') }}">
            <img src="{{ isset($settings['site_logo']) && $settings['site_logo'] ? asset('storage/' . $settings['site_logo']) : asset('web/img/logo.png') }}"
                alt="AakashAP Logo" style="height: 40px;"
                onerror="this.onerror=null; this.src='{{ asset('web/img/logo.png') }}';">

        </a> --}}

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-x-diamond-fill"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- Dark/Light Mode Toggle -->

                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('/') ? 'active' : '' }}"
                        href="{{ route('web.index') }}">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('about-me') ? 'active' : '' }}" href="#aboutme">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('skills') ? 'active' : '' }}" href="#skills">Skills</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('projects') ? 'active' : '' }}"
                        href="{{ route('web.projects') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('blog') ? 'active' : '' }}"
                        href="{{ route('web.blog') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('contact-me') ? 'active' : '' }}"
                        href="{{ route('web.contactMe') }}">Contact Me</a>
                </li>

                <li>
                    @if (Auth::check())
                        <a href="{{ route('web.logout') }}" class=" nav-link px-3">
                            Logout
                        </a>
                    @else
                        <a class="nav-link px-3 {{ Request::is('register') ? 'active' : '' }}"
                            href="{{ route('web.register-page') }}">
                            LogIn
                        </a>
                    @endif
                </li>
            </ul>
            <button id="theme-toggle" class=" float-end btn text-color-primary ms-3">
                <i class="bi bi-sun-fill"></i>
            </button>
        </div>
    </div>
</nav>
