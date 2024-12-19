@extends('admin.partials.layout')

@section('title', 'AakashAP | Users')

@section('content')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <livewire:AdminUsersTable/>

        </div>
    </div>
    <!-- Table End -->

@endsection
