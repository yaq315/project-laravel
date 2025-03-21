<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Roles | RumQuest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* General Styles */
        body {
            background: linear-gradient(rgba(1, 2, 11, 0.7), rgba(1, 2, 11, 0.7)), url('{{ asset("./img/home/img4.jpeg") }}');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #fff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .manage-roles-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 1000px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h1 {
            color: #cca772;
            margin-bottom: 25px;
            font-size: 32px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        th {
            background-color: rgba(1, 2, 11, 0.7);
            color: #cca772;
            font-weight: bold;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        select {
            padding: 8px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background-color: rgba(1, 2, 11, 0.7);
            color: #fff;
            outline: none;
        }

        select:focus {
            border-color: #cca772;
        }

        button {
            padding: 8px 15px;
            background-color: #cca772;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #b8905d;
        }

        .success {
            color: lightgreen;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .error {
            color: red;
            font-size: 16px;
            margin-bottom: 20px;
        }

        a {
            color: #cca772;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="manage-roles-container">
        <h1>Manage User Roles</h1>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Current Role</th>
                    <th>Change Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('superadmin.update_role', $user->id) }}" method="POST">
                                @csrf
                                <select name="role">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><a href="{{ route('dashboard') }}">Back to Dashboard</a></p>
    </div>
</body>
</html>