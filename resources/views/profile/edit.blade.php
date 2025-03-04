@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Edit Profile</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Profile Edit Form -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- This converts the form method to PUT -->

                <!-- Profile Photo -->
                <div class="text-center mb-4">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="img-thumbnail rounded-circle" width="150" height="150">
                    @else
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 150px; height: 150px; margin: 0 auto;">
                            <span class="text-muted">No Photo</span>
                        </div>
                    @endif
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}" required>
                </div>

                <!-- Profile Photo Upload -->
                <div class="mb-3">
                    <label for="profile_photo" class="form-label">Change Profile Photo</label>
                    <input type="file" name="profile_photo" id="profile_photo" class="form-control">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection