@extends('admin.partials.layout')

@section('title', 'AakashAP | Edit-Project')

@section('content')

<!-- content Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="mb-4 text-danger">Edit Project</h3>

                <!-- Form Start -->
                <form method="POST" action="{{ route('admin.update-project', $project->id) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Input -->
                    <div class="mb-3">
                        <label for="projectTitle" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="projectTitle" placeholder="Enter project title" value="{{ old('title', $project->title) }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Link Input -->
                    <div class="mb-3">
                        <label for="Link" class="form-label">Link</label>
                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="Link" placeholder="Enter project link" value="{{ old('link', $project->link) }}">
                        @error('link')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Type Select -->
                    <div class="mb-3">
                        <label for="projectType" class="form-label">Type</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror" id="projectType" required>
                            <option selected disabled>Select project type</option>
                            <option value="javascript" {{ (old('type', $project->type) == 'javascript') ? 'selected' : '' }}>JavaScript</option>
                            <option value="php" {{ (old('type', $project->type) == 'php') ? 'selected' : '' }}>PHP</option>
                            <option value="laravel" {{ (old('type', $project->type) == 'laravel') ? 'selected' : '' }}>Laravel</option>
                            <option value="codeigniter" {{ (old('type', $project->type) == 'codeigniter') ? 'selected' : '' }}>CodeIgniter</option>
                        </select>
                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Description Textarea -->
                    <div class="mb-3">
                        <label for="projectDescription" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="content" rows="3" placeholder="Enter project description" required>{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Images Input -->
                    <div class="mb-3">
                        <label for="projectImages" class="form-label">Images</label>
                        <input type="file" name="images[]" class="form-control bg-dark mb-2 @error('images.*') is-invalid @enderror" id="projectImages" accept="image/*" multiple onchange="previewImages(event, 'imagePreviewContainer')">
                        <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            @foreach ($project->images as $image)
                                <div class="image-preview">
                                    <img src="{{ Storage::url($image) }}" alt="Project Image" style="width: 100px; height: 100px; border-radius: 5px; margin-right: 10px;">
                                </div>
                            @endforeach
                        </div>
                        @error('images.*')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Save Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.projects') }}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

