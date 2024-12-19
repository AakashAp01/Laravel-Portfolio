<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ isset($settings['site_favicon']) && $settings['site_favicon'] ? asset('storage/' . $settings['site_favicon']) : asset('web/img/favicon.png') }}" onerror="this.onerror=null; this.src='{{ asset('web/img/logo1.png') }}';"  type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('common/common.css') }}">
    {!! $settings['google_font_links'] !!}
    @livewireStyles
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

<body style="font-family: {{$settings['font_style'] ?? ''}}"  >
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.partials.sidebar')  <!-- Including sidebar -->
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

            <!-- Navbar Start -->
            @include('admin.partials.header')  <!-- Including Navbar -->
            <!-- Navbar End -->

            @yield('content')

            @include('admin.partials.footer')
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @livewireScripts
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('admin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('admin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- ck editor -->
    {{-- <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script> --}}
    <!-- tiny editor -->
    <script src="https://cdn.tiny.cloud/1/{{$settings['tiny_editor_api'] ?? ''}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- light box -->
    <script src="https://cdn.jsdelivr.net/npm/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('common/common.js') }}"></script>
    @stack('scripts')
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

