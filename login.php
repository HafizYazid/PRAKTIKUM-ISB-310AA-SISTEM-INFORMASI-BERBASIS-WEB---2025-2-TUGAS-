<?php
session_start();

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header("Location: index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "12345") {
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['username'] = $username;
        
        echo "<script>localStorage.setItem('isLoggedIn', 'true'); window.location.href='index.php';</script>";
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bubu Shoes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body h-screen flex items-center justify-center">

    <div class="login-card bg-white p-8 rounded-4 shadow-lg text-center" style="max-width: 400px; width: 100%;">
        <div class="mb-4">
            <img src="https://cdn.cdnstep.com/LSJXhjHGyP7SjpwhBlHm/cover.thumb256.webp" alt="Logo" class="h-20 w-20 mx-auto rounded-circle mb-3">
            <h4 class="fw-bold text-dark">Welcome to Bubu Shoes</h4>
            <p class="text-muted small">Login: admin | Pass: 12345</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger small p-2"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="" class="text-start">
            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Username</label>
                <input class="form-control" name="username" type="text" placeholder="Masukkan username" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-dark">Password</label>
                <input class="form-control" name="password" type="password" placeholder="******" required>
            </div>
            <button class="btn btn-dark w-100 fw-bold" type="submit">Login</button>
        </form>
    </div>

</body>
</html>