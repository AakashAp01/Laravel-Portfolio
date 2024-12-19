@extends('admin.partials.layout')

@section('title', 'AakashAP | Projects')

@section('content')

<div class="container-fluid px-4">
    <div class="col-sm-12 col-xl-12 bg-secondary rounded">
        <div class="d-flex justify-content-between p-3 m-4">
            <h3 class="text-primary">Projects</h3>
            <a href="{{ route('admin.add-project') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Add Project
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-sm-12 col-xl-9">
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="card bg-secondary text-white mb-4">
                            <!-- Image Carousel -->
                            <div id="projectCarousel{{ $project->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if($project->images && count($project->images) > 0)
                                        @foreach($project->images as $index => $image)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ Storage::url($image) }}" class="d-block w-100 img-fluid"
                                                     alt="Project Image"
                                                     style="height: 200px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="https://via.placeholder.com/100" class="d-block w-100 img-fluid"
                                                 alt="Placeholder Image"
                                                 style="height: 200px; object-fit: cover;">
                                        </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel{{ $project->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel{{ $project->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                            <!-- Card Body with Accordion for Description -->
                            <div class="card-body">
                                <div class="mb-2">
                                    <span class="badge bg-primary">{{ ucfirst($project->type) }}</span>
                                </div>
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <div class="accordion accordion-flush" id="accordion{{ $project->id }}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $project->id }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $project->id }}" aria-expanded="false" aria-controls="collapse{{ $project->id }}">
                                                Description
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $project->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $project->id }}" data-bs-parent="#accordion{{ $project->id }}">
                                            <div class="accordion-body">
                                                {{ $project->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer d-flex justify-content-end gap-1">
                                <a href="{{ route('admin.edit-project', $project->id) }}" class="btn btn-outline-danger">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button onclick="showConfirmToast('Delete', 'warning', 'Are you sure you want to delete?', '{{ route('admin.delete-project', $project->id) }}');"
                                    class="btn btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
