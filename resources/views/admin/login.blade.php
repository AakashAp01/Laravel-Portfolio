<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AakashAP | Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon"
        href="{{ isset($settings['site_favicon']) && $settings['site_favicon'] ? asset('storage/' . $settings['site_favicon']) : asset('web/img/favicon.png') }}"
        onerror="this.onerror=null; this.src='{{ asset('web/img/favicon.png') }}';" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    {!! $settings['google_font_links'] !!}
    <style>
        :root {
            --primary: {{ isset($settings['theme_color']) ? htmlspecialchars($settings['theme_color'], ENT_QUOTES, 'UTF-8') : 'rgb(189, 12, 12)' }};
            --theme-color: {{ isset($settings['theme_color']) ? htmlspecialchars($settings['theme_color'], ENT_QUOTES, 'UTF-8') : 'rgb(189, 12, 12)' }};
            --text-color: white;
            --bs-red: {{ isset($settings['theme_color']) ? htmlspecialchars($settings['theme_color'], ENT_QUOTES, 'UTF-8') : 'rgb(189, 12, 12)' }};
        }
        .text-primary {
            color: var(--theme-color) !important;
        }
        .bg-primary {
            background-color: var(--theme-color) !important;
        }
    </style>
</head>

<body style="font-family: {{$settings['font_style'] ?? ''}}" >
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Login Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3 class="text-primary">&lt;AakashAp/&gt;</h3>
                            {{-- <a href="{{ route('admin.dashboard') }}">
                                <img src="{{ isset($settings['site_logo']) && $settings['site_logo'] ? asset('storage/' . $settings['site_logo']) : asset('web/img/logo1.png') }}"
                                    alt="AakashAP" style="height: 40px;"
                                    onerror="this.onerror=null; this.src='{{ asset('web/img/logo.png') }}';">

                            </a> --}}
                        </div>
                        <form action="{{ url('admin/login') }}" method="POST">
                            @csrf <!-- CSRF protection -->

                            <!-- Email Input -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInput" name="email" placeholder="name@example.com"
                                    value="{{ old('email') }}">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- tiny editor -->
    <script src="https://cdn.tiny.cloud/1/{{$settings['tiny_editor_api'] ?? ''}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('common/common.js') }}"></script>

    <!-- SweetAlert Success/Error Notifications -->
    <script>
        @if (session('success'))
            showToast('Success!', 'success', '{{ session('success') }}');
        @endif

        @if (session('error'))
            showToast('Error!', 'error', '{{ session('error') }}');
        @endif
    </script>
</body>

</html>
