@extends('admin.partials.layout')

@section('title', 'AakashAP | Profile')

@section('content')

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Profile Box -->
        <div class="col-12 mx-auto">
            <div class="bg-secondary rounded h-100 p-4 text-center">
                @if($user->profile)
                    <img src="{{ Storage::url($user->profile) }}" alt="Profile Image" class="img-fluid mb-3" style="width: 150px; height: 150px;">
                @else
                    <img src="https://via.placeholder.com/150" alt="Profile Image" class="img-fluid mb-3" style="width: 150px; height: 150px;">
                @endif
                <h3 class="mb-1">{{ $user->name ?? '--' }}</h3>
                <h6 class="text-muted">-Admin</h6>
            </div>
        </div>

        <!-- Edit Profile and Change Password Forms -->
        <div class="col-12">
            <div class="row">
                <!-- Manage Profile Form -->
                <div class="col-12 col-lg-6 mb-4">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Manage Profile</h6>
                        <form method="POST" action="{{ route('admin.updateProfile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="userName" class="form-label">Username</label>
                                <input type="text" class="form-control @error('userName') is-invalid @enderror" id="userName" name="userName" value="{{ old('userName', $user->name) }}">
                                @error('userName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('userEmail') is-invalid @enderror" id="userEmail" name="userEmail" value="{{ old('userEmail', $user->email) }}">
                                @error('userEmail')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="profile" class="form-label">Profile Image</label>
                                <input class="form-control bg-dark @error('profileImage') is-invalid @enderror" onchange="previewImages(event, 'profilePreview')" type="file" id="profile" name="profileImage">
                                @error('profileImage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div id="profilePreview" class="d-flex flex-wrap">
                                @if($user->profile)
                                    <img src="{{ Storage::url($user->profile) }}" alt="Image Preview" class="img-thumbnail mb-2" style="width: 100px; height: 100px; object-fit: cover; border: 1px dashed #ccc; border-radius: 4px;">
                                @else
                                    <img src="https://via.placeholder.com/100" alt="Default Image" class="img-thumbnail mb-2" style="width: 100px; height: 100px; object-fit: cover; border: 1px dashed #ccc; border-radius: 4px;">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="col-12 col-lg-6 mb-4">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-3">Change Password</h6>
                        <form method="POST" action="{{ route('admin.changePassword') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" value="{{ old('newPassword') }}">
                                @error('newPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPassword_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control @error('newPassword_confirmation') is-invalid @enderror" id="newPassword_confirmation" name="newPassword_confirmation" value="{{ old('newPassword_confirmation') }}">
                                @error('newPassword_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
