@extends('web.partials.layout')

@section('title', 'AakashAP | View-Blog')

@section('content')
<div class="container col-md-8 col-sm-12 mt-5">
    <!-- Latest Blog Section -->
    <x-web-search />
    <div id="latestBlog" class="skill-card">
        @if ($latestBlog)
            <div class="content-section rounded shadow-sm p-4">
                <div>
                    <!-- Blog Thumbnail -->
                    <div class="blog-thumbnail mb-4">
                        <img src="{{ $latestBlog->thumbnail }}" class="img-fluid rounded" alt="Thumbnail for {{ $latestBlog->title }}">
                    </div>

                    <!-- Title and Like Section -->
                    <div class="blog-title-like d-flex justify-content-between align-items-center mb-3">
                        <h3 class="text">{{ $latestBlog->title }}</h3>
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
            </div>
        @else
            <p class="text-center">Sorry, no blog found.</p>
        @endif
    </div>
    <x-blog-list/>
</div>
@endsection
