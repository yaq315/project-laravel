<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | RumQuest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <style>
        /* General Styles */
        body {
            background: linear-gradient(rgba(1, 2, 11, 0.7), rgba(1, 2, 11, 0.7)), url('{{ asset("./img/home/img4.jpeg") }}');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 380px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h2 {
            color: #cca772;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: bold;
        }

        .input-container {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .input-container input {
            width: 75%;
            padding: 12px 45px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            color: #000;
            outline: none;
        }

        .input-container i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #cca772;
        }

        button {
            width: 100%;
            background: #cca772;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(204, 167, 114, 0.3);
        }

        button:hover {
            background: #b8905d;
            box-shadow: 0 4px 15px rgba(204, 167, 114, 0.5);
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .success {
            color: lightgreen;
            font-size: 14px;
            margin-bottom: 10px;
        }

        a {
            color: #cca772;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }

        .input-container select {
    width: 100%;
    padding: 12px 45px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    background: rgba(255, 255, 255, 0.9);
    color: #000;
    outline: none;
    appearance: none;
}

.input-container select:focus {
    border: 2px solid #cca772;
}

.select2-container .select2-selection--single {
    padding-left: 30px;
}

    </style>
</head>
<body>
  
    <div class="register-container">
        <h2>Register</h2>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="input-container">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>

            <div class="input-container">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-container">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-container">
                <i class="fas fa-lock"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="input-container">
                <select name="role" class="role-select" required>
                    <option value="user" data-icon="fas fa-user-shield">User</option>
                    <option value="admin" data-icon="fas fa-cogs">Admin</option>
                </select>
            </div>
            
            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>

</body>
</html>
