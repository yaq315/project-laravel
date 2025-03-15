@extends('layouts.contain-contact')

@section('title', 'Contact Message Details')

@section('content')
<div class="container">
    <h1 class="mb-4">Contact Message Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $contact->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="card-text"><strong>Subject:</strong> {{ $contact->subject }}</p>
            <p class="card-text"><strong>Message:</strong> {{ $contact->message }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $contact->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('contact.index') }}" class="btn btn-secondary">Back to Messages</a>
    </div>
</div>
@endsection