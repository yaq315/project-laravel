@extends('layouts.app')

@section('content')
<style>
    .profile-image {
        transition: transform 0.3s ease;
    }
    .profile-image:hover {
        transform: scale(1.1);
    }
</style>



<div class="container" style="background-color: rgba(1, 2, 11, 0.7); padding: 20px; border-radius: 10px;">
    <h1 class="text-center" style="color: #cca772;">Profile</h1>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <!-- عرض صورة البروفايل -->
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="rounded-circle profile-image" style="width: 150px; height: 150px;">
            </div>
            <h3 class="text-center mt-3">{{ $user->name }}</h3>
            <p class="text-center">{{ $user->email }}</p>

            <!-- نموذج تحميل صورة جديدة -->
            <form action="{{ route('profile.updateImage', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group text-center">
                    <label for="profile_image" style="color: #cca772; font-size: 1.2rem;">
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

            <!-- عرض تاريخ الحجوزات -->
            <h4 class="mt-4" style="color: #cca772;">Booking History</h4>
            <ul class="list-group">
                @foreach ($user->bookings as $booking)
                    <li class="list-group-item">
                        {{ $booking->adventure->name }} - {{ $booking->start_date }} to {{ $booking->end_date }} - {{ $booking->status }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection