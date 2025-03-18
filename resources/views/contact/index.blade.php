@extends('layouts.contain-contact')

@section('title', 'Contact Messages')

@section('content1')
<div class="container">
    <h1 class="mb-4">Contact Messages</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>
                    <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection