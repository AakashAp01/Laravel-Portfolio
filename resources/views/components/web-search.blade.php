<div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
            <i class="bi bi-search"></i>
        </span>
        <input type="text" id="blogSearch" class="form-control" placeholder="Search blogs..." />
    </div>

    <!-- Search Suggestions -->
    <ul id="blogSuggestions" class="list-group mt-2 w-50" style="display: none;">
        @foreach ($blogs as $blog)
            <li class="list-group-item bg-primary">
                <a href="{{ route('web.viewBlog', Crypt::encrypt($blog->id)) }}"
                    class="text text-decoration-none d-flex justify-content-between align-items-center">
                    <span class="blog-title">{{ $blog->title }}</span>
                    <i class="bi bi-arrow-right-circle text"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#blogSearch').on('input', function() {
            let query = $(this).val();
            let filteredBlogs = [];

            // Filter blogs based on the search query
            @foreach ($blogs as $blog)

                if ("{{ $blog->title }}".toLowerCase().includes(query.toLowerCase())) {
                    filteredBlogs.push({
                        id: "{{ Crypt::encrypt($blog->id) }}",
                        title: "{{ $blog->title }}"
                    });
                }
            @endforeach

            // If there are filtered blogs, show suggestions
            if (filteredBlogs.length > 0 && query.length > 2) {
                $('#blogSuggestions').empty().show();

                filteredBlogs.forEach(function(blog) {
                    $('#blogSuggestions').append(`
                        <li class="list-group-item bg-primary">
                              <a href="{{ route('web.viewBlog', '') }}/${blog.id}" class="text text-decoration-none d-flex justify-content-between align-items-center">
                                <span class="blog-title">${blog.title}</span>
                                <i class="bi bi-arrow-right-circle text"></i>
                            </a>
                        </li>
                    `);
                });
            } else {
                $('#blogSuggestions').empty().hide();
            }
        });

        // Hide suggestions when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('#blogSearch, #blogSuggestions').length) {
                $('#blogSuggestions').hide();
            }
        });
    });
</script>
@endpush
