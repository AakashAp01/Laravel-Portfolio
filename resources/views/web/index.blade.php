@extends('web.partials.layout')

@section('title', 'AakashAP')

@section('content')


    {{-- <div class="floating-logos">
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" class="bg-logo" />
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" class="bg-logo" />
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" class="bg-logo" />
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" class="bg-logo" />
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" class="bg-logo" />
    </div> --}}
    <!-- Ribbon Elements -->

    <!-- Hero Section -->
    <section class="hero-section text-center d-flex align-items-center justify-content-center"
        style=" overflow: hidden;">
        <div class="ribbon ribbon-1"></div>
        {{-- <div class="ribbon ribbon-2"></div> --}}
        <div class="ribbon ribbon-3"></div>
        <div class="container text-center" data-aos="zoom-in-down">
            <h1 class="display-5">Hi, I'm <span class="text-color-primary" id="myname"></span></h1>
            <p class="lead">A Passionate Laravel, CodeIgniter, and PHP Developer.</p>
            <a href="{{ route('web.aboutMe') }}" class="button-52 mt-3 text-decoration-none">About Me</a>
        </div>
    </section>
    <div id="aboutme">
        <x-about-me />
    </div>


    <!-- Skills Section -->
    <div id="skills">
        <x-skills-component />
    </div>

    <x-projects-section />

    {{-- //blog section --}}
    <div class="container" data-aos="fade-up">
        <h2 class="display-6 text-color-primary mb-3">Blogs</h2>
        <hr>
        <x-blog-list />
    </div>

    {{-- //contact me section --}}
    <section class="contact-section container" data-aos="fade-up" id="contact-me">
        <h2 class="text-color-primary display-6">Contact Me</h2>
        <hr>
        <div class="m-5">
            <livewire:WebContactMePage>
        </div>
    </section>

@endsection
<style>
    #blogLinks {
        display: none;
    }
</style>
