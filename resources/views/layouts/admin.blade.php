<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - E-commerce</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="admin-navbar">
        <div class="admin-navbar-container">
            <div class="admin-navbar-left">
                <h1 class="admin-brand">Admin Panel</h1>
                <div class="admin-menu">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'nav-link-active' : 'nav-link-inactive' }}">
                        Products
                    </a>
                </div>
            </div>
            <div class="admin-navbar-right">
                <span class="admin-user-name">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="admin-logout-form">
                    @csrf
                    <button type="submit" class="btn-secondary">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="admin-main">
        @yield('content')
    </main>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>