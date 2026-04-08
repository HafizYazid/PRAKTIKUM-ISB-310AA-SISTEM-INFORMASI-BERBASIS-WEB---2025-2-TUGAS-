<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-shell">
        <div class="login-card">
            <h1>Create account</h1>
            <form id="register-form" method="POST" action="#">
                @csrf
                <label for="username">Username</label>
                <input id="username" name="username" type="text" autocomplete="username" required>

                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="new-password" required>

                <label for="password_confirmation">Confirm password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>

                <button type="submit">Register</button>
            </form>
            <p class="help-text">Use a strong password and keep your username safe.</p>
        </div>
    </div>

    <script src="{{ route('login.js') }}"></script>
</body>
</html>
