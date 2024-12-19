<section data-aos="fade-up" class="projects-section mt-5 mb-3">
    <div class="container">
        <h2 class="display-6 text-color-primary mb-4">Projects</h2>
        <hr>

        <!-- Projects Grid -->
        <div class="row g-4 mt-3">
            @foreach ($projects as $project)
            <div class="col-md-6 col-lg-6 ">
                    <a href="{{route('web.projects')}}" class="text-decoration-none">
                    <div class="card skill-card bg-transparent border-1 border-secondary">
                        <div class="row g-0">
                            <!-- Image Section -->
                            <div class="col-12">
                                <img src="{{ Storage::url($project->images[0] ?? 'default.jpg') }}"
                                     class="d-block w-100 img-fluid"
                                     alt="{{ $project->title ?? '' }} Image"
                                     style="object-fit: cover; height: 350px;">
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="card-body">
                            <h5 class="card-title text-color-primary">{{ $project->title ?? 'Untitled Project' }}</h5>
                            <p class="text-muted"><?php echo $project->description ?? 'No description available.'?></p>
                        </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
