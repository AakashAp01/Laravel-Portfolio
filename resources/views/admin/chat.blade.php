@extends('admin.partials.layout')

@section('title', 'AakashAP | Chat')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('web/img/user.png') }}" alt="Profile" class="img-fluid rounded-circle me-3" style="width: 50px; height: 50px;">
                        <div class="me-auto"> <!-- Use me-auto to push the button to the right -->
                            <h6 class="mb-0">{{ $user->name }}</h6>
                            <small class="text-muted">{{ $user->email }}</small>
                        </div>

                        <!-- Back Button -->
                        <div>
                            <a href="javascript:history.back();">
                                <h6><i class="fa fa-arrow-left"></i> Back </h6>
                            </a>
                        </div>
                    </div>


                    <!-- Chat Page Start -->
                    <livewire:admin-chat-page :receiverId="$user->id">
                    <!-- Chat Page End -->
                </div>
            </div>
        </div>
    </div>
@endsection

