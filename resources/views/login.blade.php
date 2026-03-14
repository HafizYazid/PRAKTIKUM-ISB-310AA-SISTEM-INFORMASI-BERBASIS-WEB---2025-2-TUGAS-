@if (session('error'))
    <div class="alert alert-danger small p-2">
        {{ session('error') }}
    </div>
@endif

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FitZone Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .login-container { 
            height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            background: #f8f9fa; }

        .login-card { 
            width: 100%; 
            max-width: 400px; 
            border-radius: 15px; 
        }
    </style>
</head>
<body class="login-container">
    <div class="card login-card shadow-lg border-0">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary"><i class="bi bi-lightning-charge"></i> FitZone</h3>
                <p class="text-muted small">Silakan login admin/123</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                 @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold small">Username</label>
                    <input type="text" name="username" class="form-control" 
                           placeholder="admin" value="{{ old('username') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="******" required>
                </div>
                
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small text-muted" for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
                    Masuk Sekarang
                </button>
            </form>
        </div>
    </div>
</body>
</html>