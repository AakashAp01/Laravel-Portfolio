@extends('admin.partials.layout')

@section('title', 'AakashAP | Contact-Me')

@section('content')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <livewire:AdminContactMeTable/>

        </div>
    </div>
    <!-- Table End -->

@endsection

