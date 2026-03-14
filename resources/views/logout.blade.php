<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logging out...</title>
</head>
<body>
    <script>
        localStorage.removeItem('isLoggedIn');
        window.location.href = "{{ route('login') }}"; 
    </script>
</body>
</html>