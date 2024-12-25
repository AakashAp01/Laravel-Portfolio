<div class="mb-3">
    <div class="input-group">
        <span class="input-group-text">
            <i class="bi bi-search"></i>
        </span>
        <input type="text" id="blogSearch" class="form-control" placeholder="Search blogs..." />
    </div>

    <!-- Search Suggestions -->
    <ul id="blogSuggestions" class="list-group mt-2 w-50" style="display: none;">
        <!-- Suggestions will be dynamically added here -->
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

            // Clear the suggestions list
            $('#blogSuggestions').empty();

            if (filteredBlogs.length > 0 && query.length > 0) {
                $('#blogSuggestions').show();

                // Append filtered blogs to the suggestions list
                filteredBlogs.forEach(function(blog) {
                    $('#blogSuggestions').append(`
                        <li class="list-group-item bg-primary">
                            <a href="{{ route('web.viewBlog', '') }}/${blog.id}" class="text-light text-decoration-none d-flex justify-content-between align-items-center">
                                <span class="blog-title">${blog.title}</span>
                                <i class="bi bi-arrow-right-circle text text-light"></i>
                            </a>
                        </li>
                    `);
                });
            } else if (query.length > 0) {
                // Show "Not Found" message if no blogs match the query
                $('#blogSuggestions').show().append(`
                     <li class="list-group-item  text-light bg-primary">
                        No blogs found.
                    </li>
                `);
            } else {
                $('#blogSuggestions').hide();
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
