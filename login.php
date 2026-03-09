<?php
session_start();

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header("Location: index.php");
    exit;
}

$error = "";
$rememberedUser = isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if ($username === "admin" && $password === "12345") {
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['username'] = "Administrator";

        if ($remember) {
            setcookie("remember_user", $username, time() + (86400 * 30), "/");
        } else {
            if (isset($_COOKIE['remember_user'])) {
                setcookie("remember_user", "", time() - 3600, "/");
            }
        }
        
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

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
                <p class="text-muted small">Silakan login admin/12345</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger d-flex align-items-center small py-2 border-0" role="alert">
                    <i class="bi bi-exclamation-octagon-fill me-2"></i>
                    <div><?php echo $error; ?></div>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label fw-bold small">Username</label>
                    <input type="text" name="username" class="form-control" 
                           placeholder="admin" value="<?php echo $rememberedUser; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="******" required>
                </div>
                
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php echo $rememberedUser ? 'checked' : ''; ?>>
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