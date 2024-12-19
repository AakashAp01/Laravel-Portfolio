<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AakashAP | 404</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon"
        href="{{ isset($settings['site_favicon']) && $settings['site_favicon'] ? asset('storage/' . $settings['site_favicon']) : asset('web/img/favicon.png') }}"
        onerror="this.onerror=null; this.src='{{ asset('web/img/favicon.png') }}';" type="image/x-icon">
    <!-- Icon Font Stylesheet -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
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

    <!-- 404 Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 text-center p-4">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1 fw-bold">404</h1>
                <h1 class="mb-4">Page Not Found</h1>
                <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website!
                    Maybe go to our home page or try to use a search?</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('web.index')}}">Go Back To Home</a>
            </div>
        </div>
    </div>
    <!-- 404 End -->

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
