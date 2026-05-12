@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="auth-wrap">
    <div class="container px-3">
        <div class="d-flex justify-content-center">
            <div class="auth-card">
                <div class="mb-5">
                    <div style="font-size:1.3rem; font-weight:800; letter-spacing:-0.5px; margin-bottom:8px;">
                        FitZone<span style="color:#dc2626;">.</span>
                    </div>
                    <h4>Masuk ke akun</h4>
                    <p class="auth-sub">Gunakan email dan password Anda untuk masuk</p>
                </div>

                @if($errors->any())
                <div class="flash-error mb-4" style="border-radius:6px;">
                    {{ $errors->first() }}
                </div>
                @endif

                @if(session('status'))
                <div class="flash-success mb-4" style="border-radius:6px;">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="nama@email.com"
                               required autofocus autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label mb-0">Password</label>
                            @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               style="font-size:0.8rem; color:#dc2626; text-decoration:none;">
                                Lupa password?
                            </a>
                            @endif
                        </div>
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password"
                               placeholder="••••••••"
                               required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label" for="remember_me" style="font-size:0.875rem; color:#374151;">
                                Ingat Saya
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary-custom w-100 mb-4" id="btn-login-submit"
                            style="display:block; text-align:center;">
                        Masuk
                    </button>
                </form>

                <p class="text-center" style="font-size:0.875rem; color:#6b6b6b; margin-bottom:16px;">
                    Belum punya akun?
                    <a href="{{ route('register') }}" style="color:#dc2626; text-decoration:none; font-weight:600;" id="link-to-register">
                        Daftar di sini
                    </a>
                </p>

                <div class="demo-box">
                    <p><strong style="color:#374151; font-size:0.8rem;">Demo Login:</strong></p>
                    <p>Admin: <code>admin@fitzone.com</code> / <code>password</code></p>
                    <p>User: <code>user@fitzone.com</code> / <code>password</code></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
