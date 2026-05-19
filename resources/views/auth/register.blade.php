@extends('layouts.main')

@section('title', 'Daftar Akun')

@section('content')
{!! NoCaptcha::renderJs() !!}
<div class="auth-wrap">
    <div class="container px-3">
        <div class="d-flex justify-content-center">
            <div class="auth-card">
                <div class="mb-5">
                    <div style="font-size:1.3rem; font-weight:800; letter-spacing:-0.5px; margin-bottom:8px;">
                        FitZone<span style="color:#dc2626;">.</span>
                    </div>
                    <h4>Buat akun baru</h4>
                    <p class="auth-sub">Isi data berikut untuk mendaftar sebagai member</p>
                </div>

                @if($errors->any())
                <div class="flash-error mb-4" style="border-radius:6px;">
                    <ul class="mb-0 ps-3" style="font-size:0.875rem;">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('register') }}" id="register-form">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name"
                               value="{{ old('name') }}"
                               placeholder="Nama lengkap Anda"
                               required autofocus autocomplete="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="nama@email.com"
                               required autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password"
                               placeholder="Min. 8 karakter"
                               required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password"
                               class="form-control"
                               id="password_confirmation" name="password_confirmation"
                               placeholder="Ulangi password"
                               required autocomplete="new-password">
                    </div>

                    <div class="mb-4">
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger" style="font-size: 0.875rem;">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn-primary-custom w-100 mb-3" id="btn-register-submit"
                            style="display:block; text-align:center;">
                        Daftar Sekarang
                    </button>

                    <a href="{{ route('google.login') }}" class="btn-secondary-custom w-100 mb-4" style="display:block; text-align:center; text-decoration:none; background-color: #fff; border: 1px solid #d1d5db; color: #374151;">
                        <svg style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Daftar dengan Google
                    </a>
                </form>

                <p class="text-center" style="font-size:0.875rem; color:#6b6b6b;">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" style="color:#dc2626; text-decoration:none; font-weight:600;" id="link-to-login">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
