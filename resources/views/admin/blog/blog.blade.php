@extends('admin.partials.layout')

@section('title', 'AakashAP | Blog-Categories & Blog')

@section('content')

<!-- Tabs Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs fw-bold" id="blogTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="blogTab" data-bs-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="false">Blogs</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="categoriesTab" data-bs-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="true">Blog Categories</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-3" id="blogTabsContent">


                     <!-- Blog Tab -->
                     <div class="tab-pane fade show active" id="blog" role="tabpanel" aria-labelledby="blogTab">
                        <div class="d-flex justify-content-end mt-3 mb-3">
                            <a class="btn btn-primary" href="{{route('admin.addBlog')}}">
                                <i class="fa fa-plus me-2"></i>Add Blog
                            </a>
                        </div>
                        <!-- Add your Blog content here -->
                        <table class="table table-bordered">
                            <!-- Define the columns and rows for your blog -->
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Likes</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($blogs->isNotEmpty())
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration ?? '--' }}</th>
                                            <th scope="row">
                                                @if ($blog->thumbnail)
                                                    <a href="{{ $blog->thumbnail }}" target="_blank">

                                                        <img src="{{ $blog->thumbnail }}" alt="Thumbnail" style="width: 100px; height: auto;">
                                                    </a>
                                                @else
                                                    --
                                                @endif
                                            </th>

                                            <td>{{ $blog->title ?? '--' }}</td>
                                            <td>{{ $blog->category->title ?? '--' }}</td>
                                            <td>{{ count( $blog->likes ?? 0 ) }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input blog-status" type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked_{{ $blog->id }}"
                                                        data-template-id="{{ $blog->id }}"
                                                        @if ($blog->status == 'active') checked @endif>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.editBlog', $blog->id) }}"
                                                    class="btn btn-outline-primary m-2 btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <button type="button"
                                                    onclick="showConfirmToast('Delete', 'warning', 'Are you sure you want to delete?', '{{ route('admin.deleteBlog', $blog->id) }}');"
                                                    class="btn btn-outline-primary m-2 btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">-- No Blog Available --</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {!! $blogs->links() !!}
                    </div>


                    <!-- Blog Categories Tab -->
                    <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categoriesTab">
                        <div class="d-flex justify-content-end mt-3 mb-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                <i class="fa fa-plus me-2"></i>Add Categories
                            </button>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $cat)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration ?? '--' }}</th>
                                            <td>{{ $cat->title ?? '--' }}</td>
                                            <td>{{ $cat->description ?? '--' }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input cat-status" type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked_{{ $cat->id }}"
                                                        data-template-id="{{ $cat->id }}"
                                                        @if ($cat->status == 'active') checked @endif>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="button"
                                                    onclick="showConfirmToast('Delete', 'warning', 'Are you sure you want to delete?', '{{ route('admin.deleteBlogCat', $cat->id) }}');"
                                                    class="btn btn-outline-primary m-2 btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">-- No Blog-Categories Available --</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {!! $categories->links() !!}
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
<!-- Tabs End -->
<!-- Modal for Adding Blog Category -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Add Blog Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addCategoryForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('.cat-status').change(function() {
            var catId = $(this).data('template-id');
            var newStatus = $(this).is(':checked') ? 'active' : 'inactive';

            var formData = new FormData();
            formData.append('id', catId);
            formData.append('status', newStatus);
            formData.append('_token', '{{ csrf_token() }}');

            ajaxRequest('{{ route('admin.blogCatStatus') }}', formData)
                .then(response => {
                    if (response.success) {
                        showToast('Success', 'success', response.message);
                    } else {
                        showToast('Error', 'error', response.message || 'Something went wrong!');
                    }
                })
                .catch(error => {
                    showToast('Error', 'error', error.message || 'Something went wrong!');
                })
        });

        $('.blog-status').change(function() {
            var blogId = $(this).data('template-id');
            var newStatus = $(this).is(':checked') ? 'active' : 'inactive';

            var formData = new FormData();
            formData.append('id', blogId);
            formData.append('status', newStatus);
            formData.append('_token', '{{ csrf_token() }}');

            ajaxRequest('{{ route('admin.blogStatus') }}', formData)
                .then(response => {
                    if (response.success) {
                        showToast('Success', 'success', response.message);
                    } else {
                        showToast('Error', 'error', response.message || 'Something went wrong!');
                    }
                })
                .catch(error => {
                    showToast('Error', 'error', error.message || 'Something went wrong!');
                })
        });

        $('#addCategoryForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            ajaxRequest('{{ route('admin.addBlogCategory') }}', formData)
                .then(response => {
                    if (response.success) {
                        showToast('Success', 'success', response.message);
                        location.reload();
                    } else {
                        showToast('Error', 'error', response.message || 'Something went wrong!');
                    }
                })
                .catch(error => {
                    showToast('Error', 'error', error.message || 'Something went wrong!');
                })
        });
    });
</script>
@endpush
