<div id="blogList" class="mt-4">
    <!-- Latest Blogs in Card Format -->
    <div class="row">
        @foreach ($latestBlogs as $blog)
            <div class="col-md-4 mb-3">
                <div class="card skill-card border-secondary">
                    <!-- Blog Thumbnail -->
                    <img src="{{ $blog->thumbnail }}" class="img-fluid" alt="{{ $blog->title }}"
                        style="height: 200px; object-fit: cover;">

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Blog Title -->
                        <h5 class="card-title">{{ $blog->title }}</h5>

                        <!-- Blog Content -->
                        <p class="card-text text-truncate" style="max-height: 50px;">
                            {!! Str::limit(strip_tags($blog->content), 100) !!}
                        </p>

                        <!-- Metadata Row -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <!-- Created At -->
                            <small>
                                <i class="fa fa-clock"></i> {{ $blog->created_at->format('d M Y') }}
                            </small>

                            <!-- Liked By -->
                            <small>
                                <i class="fa fa-star text-warning"></i> {{ count($blog->likes ?? []) }}
                            </small>
                        </div>

                        <!-- Read More Button -->
                        <a href="{{ route('web.viewBlog', Crypt::encrypt($blog->id))}}"
                            class="btn btn-sm float-end btn-primary mt-3">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Older Blogs as Links -->
    <div id="blogLinks" class="mt-4">
        <ul class="list-unstyled">
            @foreach ($olderBlogs as $blog)
                <li class="blog-link-item">
                    <a href="{{ route('web.viewBlog', Crypt::encrypt($blog->id)) }}"
                        class="text-decoration-none d-flex justify-content-between align-items-center">
                        <span class="blog-title"><i class="bi bi-chevron-compact-right"></i> {{ $blog->title }}</span>
                        <small class="blog-date text">{{ $blog->updated_at->format('d M Y') }}</small>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<style>
    #blogLinks .blog-link-item a {
        padding: 5px;
        transition: background-color 0.3s ease;
    }

    #blogLinks .blog-link-item a:hover {
        background-color: #36363635;
    }

    #blogLinks .blog-link-item .blog-title {
        font-size: 1.1rem;
        color: var(--theme-color);
    }
</style>
