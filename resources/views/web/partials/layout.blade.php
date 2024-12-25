<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'AakashAp')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" href="{{ Storage::url($settings['site_favicon']) }}"
        onerror="this.onerror=null; this.src='{{ asset('web/img/favicon.png') }}';" type="image/x-icon">
    {!! $settings['google_font_links'] !!}
    <style>
        :root {
            --theme-color: {{ $settings['theme_color'] ?? 'rgb(189, 12, 12)' }};
        }

        #spinner {
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        #spinner.hide {
            opacity: 0;
            visibility: hidden;
        }

        .ring {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 1px solid var(--theme-color);
            border-radius: 50%;
            pointer-events: none;
            z-index: 3;
            transition: transform 0.2s ease-out;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('web/style.css') }}">
    <link rel="stylesheet" href="{{ asset('common/common.css') }}">
</head>

<body style="font-family: {{ $settings['font_style'] ?? '' }};">
    <div class="ring"></div>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed bg translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border" style="width: 3rem; height: 3rem; color:var(--theme-color)" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include('web.partials.header')
    @yield('content')
    @include('web.partials.footer')
    <!-- Floating Chat Button -->
    @if (Auth::check())
        @if (!Request::is('chat'))
            <a href="{{ route('web.chat') }}" class="chat-button">
                <i class="bi bi-chat-dots"></i>
            </a>
        @endif
    @else
        <a href="#" class="chat-button" data-bs-toggle="modal" data-bs-target="#loginAlertModal">
            <i class="bi bi-chat-dots"></i>
        </a>
    @endif
    <!-- Login alert Modal -->
    <div class="modal fade" id="loginAlertModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog loginAlertModal">
            <div class="modal-content bg">
                <div class="modal-body">
                    <p class="text">It seems like you need to login. Please join us! ❤️</p>
                    <!-- Login Button -->
                    <a href="{{ route('web.register-page') }}" class="btn btn-sm btn-outline-primary">Login or
                        Register</a>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- script links -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- animation on scroll links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- toast alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('web/script.js') }}"></script>
    <script src="{{ asset('common/common.js') }}"></script>
    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const spinner = document.getElementById("spinner");
            if (spinner) {
                spinner.classList.add("d-none");
            }
        });

        @if (session('success'))
            showToast('Success!', 'success', '{{ session('success') }}');
        @endif

        @if (session('error'))
            showToast('Error!', 'error', '{{ session('error') }}');
        @endif

        $(document).ready(function() {
            $('pre').each(function() {
                $(this).css('position', 'relative');
                $(this).prepend('<button class="copy-btn btn-primary">Copy</button>');
            });

            $('.copy-btn').css({
                position: 'absolute',
                top: '0px',
                right: '0px',
                cursor: 'pointer',
            });

            $(document).on('click', '.copy-btn', function() {
                const codeText = $(this).siblings('code').text();
                const tempTextarea = $('<textarea>');
                $('body').append(tempTextarea);
                tempTextarea.val(codeText).select();
                document.execCommand('copy');
                tempTextarea.remove();
                $(this).text('Copied!');
                setTimeout(() => $(this).text('Copy'), 2000);
            });
        });

        $(document).on('click', '.like-btn', function() {
            const $button = $(this);
            const blogId = $button.data('id');
            const url = $button.data('route');

            // Add animation class
            $button.addClass('clicked');

            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    if (response.success) {
                        // Update the like count
                        $(`#likeCount-${blogId}`).text(response.blog.likes);

                        // Toggle icon and color based on the like state
                        if (response.blog.liked) {
                            $button
                                .removeClass('bi-star')
                                .addClass('bi-star-fill')
                                .css('color', '#ffc107');
                        } else {
                            $button
                                .removeClass('bi-star-fill')
                                .addClass('bi-star')
                                .css('color', '#6c757d');
                        }
                    }

                    // Remove animation class after 500ms
                    setTimeout(() => {
                        $button.removeClass('clicked');
                    }, 500);
                },
                error: function(xhr, status, error) {
                    console.error("Error liking the blog:", error);
                    // Remove animation class immediately on error
                    $button.removeClass('clicked');
                }
            });
        });
    </script>
</body>

</html>
