@extends('web.partials.layout')

@section('title', 'AakashAP | Blogs')

@section('content')
    <div class="container mt-5">

        <div class="row mb-5">
            <!-- Sidebar Toggle Button for Mobile -->
            <button class="btn btn-outline-primary d-md-none mb-3" id="toggleSidebar">
                Menu
            </button>

            <!-- Left Sidebar -->
            <div class="rounded mt-4 col-md-3 bg-danger sidebar-container">
                <div class="sidebar">
                    <!-- Search Bar -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" id="categorySearch" class="form-control" placeholder="Search..." />
                        </div>
                    </div>

                    <!-- Collapsible Sidebar Menu -->
                    <ul class="category-list">
                        <li class="category-item"><a href="{{ route('web.blog') }}"
                                class="category-link {{ Request::is('blog') ? 'active' : '' }}">All</a></li>
                        @foreach ($categories as $category)
                            <li class="category-item">
                                <a href="{{ route('web.getBlogs', $category->id) }}"
                                    class="category-link {{ Request::is('get-blogs/' . $category->id) ? 'active' : '' }}">
                                    {{ $category->title ?? '--' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right Content Section -->
            @php
                $latestBlog = $blogs->sortByDesc('updated_at')->first();
            @endphp

            <!-- Right Content Section -->
            <div class="col-md-9">
                <x-web-search />

                <div id="latestBlog">
                    @if ($latestBlog)
                        <div class="content-section p-4 skill-card">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail mb-4">
                                <img src="{{ $latestBlog->thumbnail }}" class="img-fluid rounded"
                                    alt="Thumbnail for {{ $latestBlog->title }}">
                            </div>

                            <!-- Title and Like Section -->
                            <div class="blog-title-like d-flex justify-content-between align-items-center mb-3">
                                <h3 class="text blog-title">{{ $latestBlog->title }}</h3>
                                <!-- Blog Like Section -->
                                <div class="like-section d-flex align-items-center">
                                    @if (Auth::check())
                                        <!-- Authenticated User: Show Like Button -->
                                        <i class="bi {{ $latestBlog->liked ? 'bi-star-fill' : 'bi-star' }} like-btn"
                                            data-route="{{ route('web.likeBlog', $latestBlog->id) }}"
                                            data-id="{{ $latestBlog->id }}" style="cursor: pointer;"></i>
                                        <span id="likeCount-{{ $latestBlog->id }}" class="ml-2 like-count">
                                            {{ count($latestBlog->likes ?? []) }}
                                        </span>
                                    @else
                                        <!-- Unauthenticated User: Open Login Modal -->
                                        <a href="#" class="like-btn" data-bs-toggle="modal"
                                            data-bs-target="#loginAlertModal">
                                            <i class="bi bi-star like-btn" style="cursor: pointer;"></i>
                                        </a>
                                        <span id="likeCount-{{ $latestBlog->id }}" class="ml-2 like-count">
                                            {{ count($latestBlog->likes ?? []) }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                {!! $latestBlog->content !!}
                            </div>
                        </div>
                    @else
                        <!-- Show "No blog found" message -->
                        <div class="content-section rounded p-4 shadow-sm">
                            <h3 class="text-center">No blog found.</h3>
                        </div>
                    @endif
                </div>

                <!-- Other Blogs Section -->
                <hr>
                <x-blog-list />
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        //search sidebar
        $(document).ready(function() {
            // Sidebar Search Functionality
            $('#categorySearch').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('.category-item').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Sidebar Toggle for Mobile
            $('#toggleSidebar').on('click', function() {
                $('.sidebar-container').toggleClass('active');
            });
        });
    </script>
@endpush
