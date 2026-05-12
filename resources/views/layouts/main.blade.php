<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'FitZone Gym') — Sistem Manajemen Gym</title>
    <meta name="description" content="@yield('meta_description', 'FitZone Gym - Sistem Manajemen Gym Modern')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

    @include('layouts.partials.navbar')

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="flash-success d-flex justify-content-between align-items-center">
            <span>{{ session('success') }}</span>
            <button type="button" onclick="this.parentElement.remove()" class="btn-close btn-close-sm ms-3"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="flash-error d-flex justify-content-between align-items-center">
            <span>{{ session('error') }}</span>
            <button type="button" onclick="this.parentElement.remove()" class="btn-close btn-close-sm ms-3"></button>
        </div>
    @endif

    @yield('content')

    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
