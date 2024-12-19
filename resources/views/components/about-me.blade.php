 <!-- About Section -->
 <section data-aos="fade-up" class="about-section">
    <div class="container">
        <h2 class="display-5 text-color-primary">About Me</h2>
        <hr>
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="animated-border">
                    <img src="{{ isset($settings['site_about_profile']) ? asset('storage/' . $settings['site_about_profile']) : asset('web/img/profile.jpg') }}"
                        alt="Profile Image" class="rounded profile mb-4 mx-4 mt-4 mb-4" width="220"
                        onerror="this.onerror=null; this.src='{{ asset('web/img/profile.jpg') }}';">
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <?= $settings['about_content'] ?? '' ?>
                {{-- <h2 class="display-6 text-color-primary">I'm Aakash Prajapati,</h2> --}}
                {{-- <p class="lead">- A Laravel, CodeIgniter, and PHP Developer with a passion for creating dynamic and user-friendly web applications. I have experience in building scalable web solutions, managing databases, and implementing RESTful APIs. My expertise lies in designing and developing full-stack applications using modern web technologies.</p>
                <p class="lead">- With a strong foundation in Laravel, CodeIgniter, and PHP, I specialize in developing robust, secure, and performance-driven applications. My focus is on delivering clean and maintainable code while ensuring optimal user experience across different devices. I am skilled in integrating third-party services, managing server-side logic, and utilizing modern development practices like version control and agile methodologies to build scalable solutions that meet business objectives.</p> --}}
                <a href="{{ isset($settings['resume']) ? asset('storage/' . $settings['resume']) : asset('web/img/profile.jpg') }}"
                    target="_blank" class="btn btn-primary mt-4">Resume</a>
            </div>
        </div>
    </div>
</section>
<!-- Timeline Section -->
<section class="timeline-section py-5">
    <div class="container">
        <h2 class="display-6 text-color-primary">My Journey to Becoming a Web Developer</h2>
        <hr>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <h4 class="timeline-title">High School Completetion</h4>
                <p class="timeline-date">Year: 2017</p>
                <p class="timeline-description">Discovered my passion for computers and programming during high school
                    projects.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <h4 class="timeline-title">Degree in Computer Engeneering</h4>
                <p class="timeline-date">Year: 2020</p>
                <p class="timeline-description">Completed my degree, where I learned foundational programming
                    concepts and started experimenting with web development.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <h4 class="timeline-title">First Internship as a Web Developer</h4>
                <p class="timeline-date">Year: 2022</p>
                <p class="timeline-description">Gained hands-on experience in HTML, CSS, and PHP while working on
                    real-world projects.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <h4 class="timeline-title">Mastering Laravel and CodeIgniter</h4>
                <p class="timeline-date">Year: 2023</p>
                <p class="timeline-description">Dedicated myself to learning Laravel and CodeIgniter, building scalable
                    and robust applications for clients.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <h4 class="timeline-title">Becoming a Full-Stack Developer</h4>
                <p class="timeline-date">Year: 2024</p>
                <p class="timeline-description">Expanded my skill set to include frontend technologies like React and
                    Tailwind CSS, becoming a full-stack developer.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <h4 class="timeline-title">Present</h4>
                <p class="timeline-date">Year: 2024</p>
                <p class="timeline-description">Continuing to refine my skills and work on exciting projects in Laravel,
                    CodeIgniter, and modern web technologies.</p>
            </div>
        </div>
    </div>
</section>
