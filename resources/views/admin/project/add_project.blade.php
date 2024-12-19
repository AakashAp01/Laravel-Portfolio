@extends('admin.partials.layout')

@section('title', 'AakashAP | Add-Project')

@section('content')

<!-- content Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="mb-4 text-danger">Add Project</h3>

                <!-- Form Start -->
                <form method="POST" action="{{ route('admin.store-project') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Input -->
                    <div class="mb-3">
                        <label for="projectTitle" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="projectTitle" placeholder="Enter project title" value="{{ old('title') }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Link Input -->
                    <div class="mb-3">
                        <label for="Link" class="form-label">Link</label>
                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="Link" placeholder="Enter project link" value="{{ old('link') }}">
                        @error('link')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Type Select -->
                    <div class="mb-3">
                        <label for="projectType" class="form-label">Type</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror" id="projectType" required>
                            <option selected disabled>Select project type</option>
                            <option value="javascript" {{ old('type') == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                            <option value="php" {{ old('type') == 'php' ? 'selected' : '' }}>PHP</option>
                            <option value="laravel" {{ old('type') == 'laravel' ? 'selected' : '' }}>Laravel</option>
                            <option value="codeigniter" {{ old('type') == 'codeigniter' ? 'selected' : '' }}>CodeIgniter</option>
                        </select>
                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Description Textarea -->
                    <div class="mb-3">
                        <label for="projectDescription" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="content" rows="10" placeholder="Enter project description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Images Input -->
                    <div class="mb-3">
                        <label for="projectImages" class="form-label">Images</label>
                        <input type="file" name="images[]" class="form-control bg-dark mb-2 @error('images.*') is-invalid @enderror" id="projectImages" accept="image/*" multiple onchange="previewImages(event, 'imagePreviewContainer')">
                        <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
                        @error('images.*')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Save Button -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
