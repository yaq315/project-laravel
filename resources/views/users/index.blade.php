@extends('layouts.app')

@section('content')
<div class="container" style="background-color: rgba(1, 2, 11, 0.7); padding: 20px; border-radius: 10px;">
    <!-- عنوان الصفحة -->
    <h1 class="my-4" style="color: #cca772;">Users Management</h1>

    <!-- زر إنشاء مستخدم جديد -->
    <div class="mb-4">
        <a href="{{ route('users.create') }}" class="btn" style="background-color: #cca772; color: #fff;">
            <i class="fas fa-plus"></i> Create New User
        </a>
    </div>

    <!-- جدول المستخدمين -->
    <div class="card shadow-sm" style="background-color: rgba(1, 2, 11, 0.7); border: none;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" style="color: #fff;">
                    <thead>
                        <tr>
                            <th style="color: #cca772;">Name</th>
                            <th style="color: #cca772;">Email</th>
                            <th style="color: #cca772;">Role</th>
                            <th style="color: #cca772;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge" style="background-color: {{ $user->role === 'admin' ? '#28a745' : '#17a2b8' }};">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td>
                                <!-- زر التعديل -->
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm" style="background-color: #cca772; color: #fff;">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <!-- زر الحذف -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="background-color: #dc3545; color: #fff;" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- إضافة Custom CSS -->
<style>
    body {
        background-color: rgba(1, 2, 11, 0.7);
        color: #fff;
    }

    .card {
        border-radius: 10px;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .badge {
        font-size: 0.9em;
        padding: 0.5em 0.75em;
    }

    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .btn-primary, .btn-warning, .btn-danger {
        border: none;
    }

    .btn-primary {
        background-color: #cca772;
        color: #fff;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #fff;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }
</style>
@endsection