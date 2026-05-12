@extends('layouts.main')

@section('title', 'Daftar Akun')

@section('content')
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

                    <button type="submit" class="btn-primary-custom w-100 mb-4" id="btn-register-submit"
                            style="display:block; text-align:center;">
                        Daftar Sekarang
                    </button>
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
