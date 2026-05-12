@extends('layouts.main')

@section('title', '403 — Akses Ditolak')

@section('content')
<div style="background:#f5f5f5; min-height:85vh; display:flex; align-items:center; justify-content:center;">
    <div class="text-center px-4">
        <div style="font-size:6rem; font-weight:900; color:#e5e7eb; line-height:1; margin-bottom:16px;">403</div>
        <h2 style="font-size:1.4rem; font-weight:700; color:#111; margin-bottom:8px;">Akses Ditolak</h2>
        <p class="text-muted mb-4" style="font-size:0.9rem; max-width:360px; margin:0 auto 24px;">
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
            Halaman ini hanya dapat diakses oleh Admin.
        </p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('dashboard') }}" class="btn-primary-custom" style="display:inline-block; text-decoration:none;">
                Kembali ke Dashboard
            </a>
            <a href="{{ route('home') }}" class="btn-secondary-custom" style="display:inline-block; text-decoration:none;">
                Beranda
            </a>
        </div>
    </div>
</div>
@endsection
