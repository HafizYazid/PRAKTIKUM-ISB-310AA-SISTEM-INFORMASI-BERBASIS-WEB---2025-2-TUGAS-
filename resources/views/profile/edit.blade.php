@extends('layouts.main')

@section('title', 'Edit Profil')

@section('content')
<div class="page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">

                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil Saya</li>
                    </ol>
                </nav>

                @if(session('status') === 'profile-updated')
                <div class="flash-success mb-4">
                    Profil berhasil diperbarui.
                </div>
                @endif

                {{-- Profile Header --}}
                <div class="card mb-4">
                    <div class="card-body p-4 d-flex align-items-center gap-4">
                        @if($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}"
                                 alt="{{ $user->name }}"
                                 class="rounded-circle flex-shrink-0"
                                 style="width:72px; height:72px; object-fit:cover; border:2px solid #e5e7eb;">
                        @else
                            <div class="avatar-circle flex-shrink-0" style="width:72px; height:72px; font-size:1.5rem;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <div style="font-weight:700; font-size:1rem; color:#111;">{{ $user->name }}</div>
                            <div class="text-muted mb-2" style="font-size:0.8rem;">{{ $user->email }}</div>
                            @if($user->isAdmin())
                                <span class="badge-admin">Administrator</span>
                            @else
                                <span class="badge-user">Member</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Edit Form --}}
                <div class="card mb-4">
                    <div class="card-header py-3 px-4">
                        <div style="font-size:1rem; font-weight:700;">Update Informasi Profil</div>
                        <div class="text-muted" style="font-size:0.8rem; font-weight:400; margin-top:2px;">Perbarui nama, email, dan foto profil Anda</div>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="form-profile">
                            @csrf
                            @method('PATCH')

                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name"
                                           value="{{ old('name', $user->name) }}"
                                           required autocomplete="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email"
                                           value="{{ old('email', $user->email) }}"
                                           required autocomplete="username">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="profile_image" class="form-label">
                                        Foto Profil
                                        <span class="text-muted" style="font-weight:400; font-size:0.8rem;">(Opsional, max 2MB)</span>
                                    </label>
                                    @if($user->profile_image)
                                    <div class="mb-3">
                                        <div class="text-muted mb-1" style="font-size:0.775rem;">Foto saat ini:</div>
                                        <img src="{{ asset('storage/' . $user->profile_image) }}"
                                             alt="{{ $user->name }}"
                                             class="rounded-circle"
                                             style="width:64px; height:64px; object-fit:cover; border:2px solid #e5e7eb;"
                                             id="current-profile-img">
                                    </div>
                                    @endif
                                    <input type="file"
                                           class="form-control @error('profile_image') is-invalid @enderror"
                                           id="profile_image" name="profile_image"
                                           accept="image/jpg,image/jpeg,image/png,image/webp"
                                           onchange="previewProfileImage(this)">
                                    <div class="form-text" style="font-size:0.775rem;">Format: JPG, JPEG, PNG, WEBP</div>
                                    @error('profile_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="profile-preview" class="mt-3 d-none">
                                        <div class="text-muted mb-1" style="font-size:0.775rem;">Preview:</div>
                                        <img id="preview-profile-img" src="" alt="Preview"
                                             class="rounded-circle"
                                             style="width:64px; height:64px; object-fit:cover; border:2px dashed #9ca3af;">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-4 pt-2 border-top">
                                <button type="submit" class="btn-primary-custom" id="btn-save-profile">
                                    Simpan Perubahan
                                </button>
                                <a href="{{ route('dashboard') }}"
                                   class="btn-secondary-custom"
                                   style="display:inline-block; text-decoration:none;"
                                   id="btn-cancel-profile">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Ubah Password --}}
                <div class="card">
                    <div class="card-header py-3 px-4">
                        <div style="font-size:1rem; font-weight:700;">Ubah Password</div>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('password.update') }}" id="form-password">
                            @csrf
                            @method('PUT')
                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <input type="password"
                                           class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                           id="current_password" name="current_password" autocomplete="current-password">
                                    @error('current_password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password"
                                           class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                           id="password" name="password" autocomplete="new-password">
                                    @error('password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password"
                                           class="form-control"
                                           id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn-secondary-custom" id="btn-update-password">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewProfileImage(input) {
    const preview = document.getElementById('profile-preview');
    const img = document.getElementById('preview-profile-img');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { img.src = e.target.result; preview.classList.remove('d-none'); };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('d-none');
    }
}
</script>
@endpush
