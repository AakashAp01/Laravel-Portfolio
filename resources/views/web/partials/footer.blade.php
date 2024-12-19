<footer class="py-4">
    <div class="container">
        <div class="row">
            <!-- Logo and About Section -->
            <div class="col-md-4 text-md-start mb-3 mb-md-0">
                <!-- Logo -->
                <a class="navbar-brand text-color-primary fs-3" href="{{route('web.index')}}">
                    &lt;/Ap&gt;
                </a>
                <!-- About Section -->
                <p class="mt-3">
                    Hi, I’m Aakash a forward-thinking developer focused on creating exceptional web experiences. Driven by curiosity, I embrace every challenge as an opportunity to grow.
                </p>
            </div>

            <!-- Navigation Links -->
            <div class="col-md-4">
                <h5 class="text-uppercase mb-3">Quick Links</h5>
                <ul class="list-unstyled quick-link">
                    <li>
                        <a href="{{ route('web.index') }}" class=" text-decoration-none quick-link">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('web.aboutMe') }}" class="text-decoration-none quick-link">About Me</a>
                    </li>
                    <li>
                        <a class="text-decoration-none quick-link" href="#skills">Skills</a>
                    </li>
                    <li>
                        <a href="{{ route('web.projects') }}" class="text-decoration-none quick-link">Projects</a>
                    </li>
                    <li>
                        <a href="{{ route('web.blog') }}" class=" text-decoration-none quick-link">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('web.contactMe') }}" class="text-decoration-none quick-link">Contact Me</a>
                    </li>
                </ul>
            </div>

            <!-- Social Links -->
            <div class="col-md-4 text-md-end text-center">
                <h5 class="text-uppercase mb-3">Follow Me</h5>
                <div class="social-icons d-flex justify-content-md-end justify-content-center">
                    <a href="{{$settings['linkedin'] ?? ''}}" target="_blank" class="mx-2">
                        <i class="bi bi-linkedin fs-4"></i>
                    </a>
                    <a href="{{$settings['github'] ?? ''}}" target="_blank" class="mx-2">
                        <i class="bi bi-github fs-4"></i>
                    </a>
                    <a href="{{$settings['instagram'] ?? ''}}" target="_blank" class="mx-2">
                        <i class="bi bi-instagram fs-4"></i>
                    </a>
                    <a href="https://wa.me/{{$settings['whatsapp'] ?? ''}}" target="_blank" class="mx-2">
                        <i class="bi bi-whatsapp fs-4"></i>
                    </a>
                    <a href="{{$settings['x'] ?? ''}}" target="_blank" class="mx-2">
                       <i class="bi bi-twitter-x"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Line -->
        <div class="text-center mt-4">
            <p class="mb-0">&copy; Powered by passion and ❤️ AakashAP, 2024.</p>
        </div>
    </div>
</footer>
