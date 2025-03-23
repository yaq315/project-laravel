@extends('layouts.app')



@section('content')

<style>

    /* @keyframes rotateProfile {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    } */

    .profile-image {
        animation: rotateProfile 2s ease-in-out;
    }

    
    .profile-image:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

  
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

@include('layouts.navbar')

<div class="container" style="background-color: rgba(1, 2, 11, 0.7); padding: 20px; border-radius: 10px;">
    <h1 class="text-center animate__animated animate__fadeInDown" style="color: #cca772; font-size: 2.5rem; margin-bottom: 20px;">Profile</h1>
    <div class="card animate__animated animate__fadeInUp" style="background-color: #fff; border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="card-body">
            <div class="text-center">
                <!-- عرض صورة البروفايل -->
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="rounded-circle profile-image" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #cca772;">
            </div>
            <h3 class="text-center mt-3" style="color: rgba(1, 2, 11, 0.7); font-size: 2rem;">
                <i class="fas fa-user" style="margin-right: 10px;"></i>{{ $user->name }}
            </h3>
            <p class="text-center" style="color: rgba(1, 2, 11, 0.7); font-size: 1.2rem;">
                <i class="fas fa-envelope" style="margin-right: 10px;"></i>{{ $user->email }}
            </p>
            {{-- <p class="text-center" style="color: rgba(1, 2, 11, 0.7); font-size: 1.2rem;">
                <i class="fas fa-user-tag" style="margin-right: 10px;"></i>Role: {{ $user->role }}
            </p> --}}

            <!-- نموذج تحميل صورة جديدة -->
            <form action="{{ route('users.updateProfileImage', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group text-center">
                    <label for="profile_image" style="color: rgba(1, 2, 11, 0.7); font-size: 1.2rem;">
                        <i class="fas fa-camera" style="margin-right: 10px;"></i>Upload New Profile Image
                    </label>
                    <input type="file" class="form-control-file" id="profile_image" name="profile_image" style="margin: 10px auto; display: block;">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="background-color: #cca772; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 1rem;">
                        <i class="fas fa-upload" style="margin-right: 10px;"></i>Update Profile Image
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
