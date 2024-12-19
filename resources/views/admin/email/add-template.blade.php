@extends('admin.partials.layout')

@section('title', 'AakashAP | Add-Template')

@section('content')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between">
                        <h3 class="text-primary">Add Email Template</h3>
                    </div>

                    <!-- Placeholder Reference Section -->
                    <div class="alert alert-info" role="alert">
                        <h5 class="text-primary">Available Placeholders:</h5>
                        <ul>
                            <li><code>[username]</code> - The recipient's name</li>
                            <li><code>[admin]</code> - Admin's name (from settings)</li>
                            <li><code>[site_logo]</code> - URL of the site logo</li>
                            <li><code>[site_favicon]</code> - URL of the site favicon</li>
                            <li><code>[linkedin]</code> - LinkedIn profile link</li>
                            <li><code>[facebook]</code> - Facebook page link</li>
                            <li><code>[instagram]</code> - Instagram profile link</li>
                            <li><code>[whatsapp]</code> - WhatsApp contact number</li>
                        </ul>
                        <p class="mb-0">You can use these placeholders in the email content, and they will be replaced dynamically.</p>
                    </div>

                    <!-- Form Start -->
                    <form id="createTemplateForm" method="post" action="{{ route('admin.store-template') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter template title" value="{{ old('title') }}">
                            @error('title')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Enter email subject" value="{{ old('subject') }}">
                            @error('subject')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" placeholder="Enter email content">{{ old('content') }}</textarea>
                            @error('content')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-dark">Reset</button>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection
