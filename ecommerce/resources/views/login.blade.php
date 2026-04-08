<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-shell">
        <div class="login-card">
            <h1>Welcome Back</h1>

            @if ($errors->any())
                <div class="error-message">{{ $errors->first() }}</div>
            @endif

            <form id="login-form" method="POST" action="{{ route('login.post') }}">
                @csrf
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" required>

                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>

                <button type="submit">Sign in</button>
            </form>
            <p class="help-text">Enter your username and password to access the dashboard.</p>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
