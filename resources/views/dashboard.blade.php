@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-wrap">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">
            <div>
                <h1 style="font-size:1.6rem; font-weight:800; margin-bottom:4px;">Dashboard</h1>
                <p class="text-muted mb-0" style="font-size:0.875rem;">
                    Selamat datang kembali, <strong style="color:#111;">{{ auth()->user()->name }}</strong>
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('profile.edit') }}"
                   class="btn-secondary-custom"
                   style="display:inline-block; text-decoration:none; font-size:0.875rem;"
                   id="dashboard-profile-btn">
                    Edit Profil
                </a>
                @if(auth()->user()->isAdmin())
                <a href="{{ route('products.create') }}"
                   class="btn-primary-custom"
                   style="display:inline-block; text-decoration:none; font-size:0.875rem;"
                   id="dashboard-add-product-btn">
                    + Tambah Produk
                </a>
                @endif
            </div>
        </div>

        <div class="row g-4">
            {{-- Profile Card --}}
            <div class="col-12 col-md-4">
                <div class="card h-100">
                    <div class="card-body p-4 text-center">
                        {{-- Avatar --}}
                        @if(auth()->user()->profile_image)
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                                 alt="Foto Profil"
                                 class="rounded-circle mb-3"
                                 style="width:96px; height:96px; object-fit:cover; border:3px solid #e5e7eb;">
                        @else
                            <div class="avatar-circle mx-auto mb-3">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif

                        <h5 style="font-size:1rem; font-weight:700; margin-bottom:4px;">{{ auth()->user()->name }}</h5>
                        <p class="text-muted mb-3" style="font-size:0.8rem;">{{ auth()->user()->email }}</p>

                        @if(auth()->user()->isAdmin())
                            <span class="badge-admin">Administrator</span>
                        @else
                            <span class="badge-user">Member</span>
                        @endif

                        <div class="mt-4 pt-3 border-top">
                            <a href="{{ route('profile.edit') }}"
                               class="btn-secondary-custom w-100"
                               style="display:block; text-decoration:none; font-size:0.875rem;"
                               id="dashboard-edit-profile">
                                Edit Profil & Foto
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Panel --}}
            <div class="col-12 col-md-8">
                <div class="row g-3 h-100">
                    <div class="col-6">
                        <a href="{{ route('products.index') }}" class="text-decoration-none" id="dashboard-products-link">
                            <div class="card p-4 h-100" style="background:#111; border-color:#111; cursor:pointer; transition:opacity 0.15s;"
                                 onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                <div style="font-size:1.5rem; font-weight:800; color:#fff; line-height:1; margin-bottom:8px;">Produk</div>
                                <div style="font-size:0.8rem; color:#9ca3af;">
                                    @if(auth()->user()->isAdmin()) Kelola Produk @else Lihat Produk @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('profile.edit') }}" class="text-decoration-none" id="dashboard-profile-link">
                            <div class="card p-4 h-100" style="background:#dc2626; border-color:#dc2626; cursor:pointer; transition:opacity 0.15s;"
                                 onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                <div style="font-size:1.5rem; font-weight:800; color:#fff; line-height:1; margin-bottom:8px;">Profil</div>
                                <div style="font-size:0.8rem; color:rgba(255,255,255,0.7);">Informasi & Foto</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12">
                        <div class="card p-4" style="border-left:4px solid {{ auth()->user()->isAdmin() ? '#dc2626' : '#111' }};">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div style="font-weight:700; font-size:0.95rem; margin-bottom:4px;">
                                        {{ auth()->user()->isAdmin() ? 'Mode Administrator' : 'Mode Member' }}
                                    </div>
                                    <div class="text-muted" style="font-size:0.825rem;">
                                        @if(auth()->user()->isAdmin())
                                            Anda memiliki akses penuh untuk mengelola data produk (CRUD).
                                        @else
                                            Anda dapat melihat semua produk gym yang tersedia.
                                        @endif
                                    </div>
                                </div>
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('products.create') }}"
                                       class="btn-primary-custom ms-3"
                                       style="display:inline-block; text-decoration:none; font-size:0.8rem; white-space:nowrap;"
                                       id="dashboard-add-product-card">
                                        + Tambah
                                    </a>
                                @else
                                    <a href="{{ route('products.index') }}"
                                       class="btn-secondary-custom ms-3"
                                       style="display:inline-block; text-decoration:none; font-size:0.8rem; white-space:nowrap;"
                                       id="dashboard-view-products">
                                        Lihat Produk
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Informasi Akun --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3 px-4">Informasi Akun</div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-12 col-md-3">
                                <div class="info-row">
                                    <span class="info-label">Nama Lengkap</span>
                                    <span class="info-value">{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="info-row">
                                    <span class="info-label">Email</span>
                                    <span class="info-value">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="info-row">
                                    <span class="info-label">Role</span>
                                    <span class="info-value">
                                        @if(auth()->user()->isAdmin())
                                            <span class="badge-admin">Admin</span>
                                        @else
                                            <span class="badge-user">Member</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="info-row">
                                    <span class="info-label">Bergabung Sejak</span>
                                    <span class="info-value">{{ auth()->user()->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
