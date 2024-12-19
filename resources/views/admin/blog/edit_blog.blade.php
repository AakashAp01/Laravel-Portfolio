@extends('admin.partials.layout')

@section('title', 'AakashAP | Edit-Blog')

@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between">
                        <h3 class="text-primary">Edit Blog</h3>
                    </div>
                    <!-- Make sure the form action uses the correct route and includes the blog ID -->
                    <form id="createBlogForm" method="post" action="{{ route('admin.updateBlog', $blog->id) }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter blog title" value="{{ old('title', $blog->title) }}">
                            @error('title')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <!-- Category Selection -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror bg-dark" id="category" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <!-- Content Field -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" placeholder="Enter blog content">{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">

                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control bg-dark @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" onchange="previewImages(event,'thumbnailPreview')">
                            @error('thumbnail')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror

                             <!-- Preview Box -->
                             <div id="thumbnailPreview" class="mt-2">
                                <img src="{{ isset($blog->thumbnail) ? $blog->thumbnail : 'https://via.placeholder.com/100' }}"
                                    alt="Image Preview"
                                    style="display: block; width: auto; height: 100px; object-fit: cover; border: 1px dashed #ccc; border-radius: 4px;">
                             </div>
                        </div>

                        <!-- Submit and Reset Buttons -->
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-dark">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
