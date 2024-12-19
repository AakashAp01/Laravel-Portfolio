@extends('web.partials.layout')

@section('title', 'AakashAP | Projects')

@section('content')
    <section class="projects-section mt-5 mb-3">
        <div class="container">
            <h2 class="display-6 text-color-primary">Projects I Have Done</h2>
            <hr>
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-12 " data-aos="fade-up">
                        <div class="card shadow-sm p-3 skill-card border-secondary">
                            <div class="row g-0 align-items-center">
                                <!-- Image Section -->
                                <div class="col-md-3">
                                    <img src="{{ Storage::url($project->images[0] ?? 'default.jpg') }}"
                                        alt="{{ $project->title ?? 'Project Image' }}"
                                        class="img-fluid rounded">
                                </div>

                                <!-- Content Section -->
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Title -->
                                            <h4 class="card-title text-color-primary mb-0">{{ $project->title ?? 'Untitled Project' }}</h4>

                                            <!-- Type Badge -->
                                            <span class="badge bg-primary">{{ ucfirst($project->type ?? 'No Type') }}</span>
                                        </div>
                                        <p class="card-text text-muted mt-3">
                                            <?php echo $project->description ?? 'No description available.' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
