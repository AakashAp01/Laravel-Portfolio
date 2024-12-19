<section class="skills-section" data-aos="fade-up">
    <div class="container">
        <h2 class="display-6 text-color-primary mb-3">Technologies I Know</h2>
        <hr>
        <div class="row" id="skillsContainer">
            <!-- Skill Card Template -->
            @php
                $skills = [
                    ['name' => 'HTML5/CSS3', 'icon' => 'fab fa-html5', 'color' => '#e34c26', 'percent' => 90],
                    ['name' => 'JavaScript', 'icon' => 'fab fa-js-square', 'color' => '#f7df1e', 'percent' => 60],
                    ['name' => 'Bootstrap', 'icon' => 'fab fa-bootstrap', 'color' => '#563d7c', 'percent' => 65],
                    ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'color' => '#f05340', 'percent' => 70],
                    ['name' => 'CodeIgniter', 'icon' => 'fa-brands fa-free-code-camp', 'color' => '#d84d3f', 'percent' => 65],
                    ['name' => 'PHP', 'icon' => 'fab fa-php', 'color' => '#8993be', 'percent' => 67],
                    ['name' => 'AJAX', 'icon' => 'fa-brands fa-ajax', 'color' => '#0076ff', 'percent' => 80],
                    ['name' => 'JQuery', 'icon' => 'fa fa-jquery', 'color' => '#0769ad', 'percent' => 75],
                    ['name' => 'MySQL', 'icon' => 'fa-solid fa-database', 'color' => '#00758f', 'percent' => 70],
                ];
            @endphp

            @foreach ($skills as $skill)
                <div class="col-md-3 col-sm-6 mb-4 skill-card-container">
                    <div class="card border-1 border-secondary skill-card text-center">
                        <div class="card-body">
                            <i class="{{ $skill['icon'] }}" style="color: {{ $skill['color'] }}; font-size: 30px;"></i>
                            <h5 class="mt-3 mb-2">#{{ $skill['name'] }}</h5>
                            <small class="">{{ $skill['percent'] }}% proficient</small>
                            <div class="progress mt-2" style="height: 5px;">
                                <div class="progress-bar" style="width: {{ $skill['percent'] }}%; background-color: {{ $skill['color'] }};"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Include SortableJS CDN -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
    const el = document.getElementById('skillsContainer');
    const sortable = new Sortable(el, {
        handle: '.skill-card',
        animation: 150,
        draggable: '.skill-card-container',
        onEnd(evt) {

        }
    });
</script>
