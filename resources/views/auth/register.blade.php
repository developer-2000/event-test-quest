<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация нового пользователя</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .auth-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
            text-align: center;
        }
        .auth-card input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .auth-card button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .auth-card button:hover {
            background-color: #45a049;
        }
        .auth-card .links {
            margin-top: 12px;
        }
        .auth-card .links a {
            color: #007bff;
            text-decoration: none;
        }
        .auth-card .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="auth-card">
    <h2>Регистрация нового пользователя</h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">Имя:</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">Email:</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Пароль:</label><br>
            <input id="password" type="password" name="password" required>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">Подтверждение пароля:</label><br>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div class="links">
            <button type="submit">Зарегистрироваться</button>
        </div>
    </form>

    <div class="links">
        <a href="{{ route('login') }}">Уже зарегистрированы? Войти</a>
    </div>
</div>
</body>
</html>
