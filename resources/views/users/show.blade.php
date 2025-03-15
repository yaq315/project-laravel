@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">User Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Role:</strong> {{ $user->role }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $user->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
    </div>
</div>
@endsection