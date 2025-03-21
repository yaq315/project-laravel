@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <!-- عرض صورة البروفايل -->
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <h3 class="text-center mt-3">{{ $user->name }}</h3>
            <p class="text-center">{{ $user->email }}</p>
            <p class="text-center">Role: {{ $user->role }}</p>

            <!-- نموذج تحميل صورة جديدة -->
            <form action="{{ route('users.updateProfileImage', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="profile_image">Upload New Profile Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Profile Image</button>
            </form>
        </div>
    </div>
</div>
@endsection