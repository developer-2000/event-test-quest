<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в систему</title>
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
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .auth-card button:hover {
            background-color: #0056b3;
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
    <h2>Вход в систему</h2>

    <!-- Session Status -->
    @if (session('status'))
        <div style="color: green;">
            {{ session('status') }}
        </div>
    @endif

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

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">Email:</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Пароль:</label><br>
            <input id="password" type="password" name="password" required>
        </div>

        <!-- Remember Me -->
        <div>
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Запомнить меня</label>
        </div>

        <div class="links">
            <button type="submit">Войти</button>
        </div>
    </form>

</div>
</body>
</html>
