@extends('web.partials.layout')

@section('title', 'AakashAP | Contact-Me')

@section('content')
    <section class="contact-section">
        <div class="container">
            <h2 class="text-color-primary display-6">Contact Me</h2>
            <hr>
            <div data-aos="zoom-in-down">
                <livewire:WebContactMePage>
            </div>
        </div>
    </section>
@endsection
