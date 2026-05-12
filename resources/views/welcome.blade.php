@extends('layouts.main')

@section('title', 'Beranda')
@section('meta_description', 'FitZone Gym - Sistem Manajemen Gym Modern terbaik.')

@section('content')

    {{-- Hero --}}
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-6">
                    <p class="mb-2" style="font-size:0.8rem; font-weight:700; color:#dc2626; text-transform:uppercase; letter-spacing:1px;">
                        Gym Terbaik di Itenas
                    </p>
                    <h1 class="mb-4" style="font-size:2.8rem; line-height:1.15; font-weight:800;">
                        Selamat Datang di<br>FitZone Gym
                    </h1>
                    <p class="mb-5" style="font-size:1rem; color:#4b5563; line-height:1.7; max-width:480px;">
                        Sistem manajemen gym modern untuk mencapai target kesehatan Anda.
                        Bergabunglah dengan ratusan member yang telah merasakan transformasi nyata.
                    </p>
                    <div class="d-flex gap-3 flex-wrap mb-5">
                        @guest
                            <a href="{{ route('register') }}" class="btn-primary-custom" id="hero-register-btn">
                                Daftar Sekarang
                            </a>
                            <a href="{{ route('login') }}"
                               class="btn-secondary-custom"
                               style="display:inline-block; text-decoration:none; text-align:center;"
                               id="hero-login-btn">
                                Masuk
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="btn-primary-custom" id="hero-dashboard-btn">
                                Dashboard Saya
                            </a>
                            <a href="{{ route('products.index') }}"
                               class="btn-secondary-custom"
                               style="display:inline-block; text-decoration:none; text-align:center;"
                               id="hero-products-btn">
                                Lihat Produk
                            </a>
                        @endguest
                    </div>
                    <div class="d-flex gap-5">
                        <div>
                            <div class="stat-number">250+</div>
                            <div class="stat-label">Total Member</div>
                        </div>
                        <div style="width:1px; background:#e5e7eb;"></div>
                        <div>
                            <div class="stat-number">15+</div>
                            <div class="stat-label">Peralatan</div>
                        </div>
                        <div style="width:1px; background:#e5e7eb;"></div>
                        <div>
                            <div class="stat-number">5 ★</div>
                            <div class="stat-label">Rating</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="hero-image-wrap">
                        <img src="{{ asset('assets/risen-wang-20jX9b35r_M-unsplash.jpg') }}"
                             alt="FitZone Gym">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section style="background:#f5f5f5; padding:64px 0;">
        <div class="container">
            <h2 class="mb-2" style="font-size:1.6rem;">Statistik Gym Kami</h2>
            <p class="text-muted mb-5" style="font-size:0.9rem;">Angka yang membuktikan kualitas layanan kami</p>
            <div class="row g-4">
                @php
                $stats = [
                    ['number' => '250+', 'label' => 'Total Member'],
                    ['number' => '180+', 'label' => 'Member Aktif'],
                    ['number' => 'Rp 75Jt+', 'label' => 'Total Pendapatan'],
                    ['number' => '15+', 'label' => 'Peralatan Fitness'],
                ];
                @endphp
                @foreach($stats as $stat)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-number">{{ $stat['number'] }}</div>
                        <div class="stat-label">{{ $stat['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Paket Membership --}}
    <section id="paket" style="background:#fff; padding:64px 0;">
        <div class="container">
            <h2 class="mb-2" style="font-size:1.6rem;">Paket Membership</h2>
            <p class="text-muted mb-5" style="font-size:0.9rem;">Pilih paket yang sesuai dengan kebutuhan Anda</p>
            <div class="row g-4 justify-content-center">
                {{-- Basic --}}
                <div class="col-12 col-md-4">
                    <div class="package-card p-4 h-100">
                        <div class="mb-4">
                            <div class="pkg-price">Rp 199.000<small>/bulan</small></div>
                            <div style="font-weight:700; font-size:1rem; color:#111; margin-top:4px;">Basic</div>
                        </div>
                        <ul class="list-unstyled" style="font-size:0.9rem; color:#374151;">
                            <li class="mb-2">Akses Gym 24 Jam</li>
                            <li class="mb-2">5 Kelas Grup/Bulan</li>
                            <li class="mb-2">Lokalisir Area</li>
                            <li class="mb-2" style="color:#9ca3af; text-decoration:line-through;">Konsultasi Trainer</li>
                            <li style="color:#9ca3af; text-decoration:line-through;">Program Nutrisi</li>
                        </ul>
                    </div>
                </div>

                {{-- Standard --}}
                <div class="col-12 col-md-4">
                    <div class="package-card featured p-4 h-100">
                        <div class="mb-1 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="pkg-price">Rp 349.000<small>/bulan</small></div>
                                <div style="font-weight:700; font-size:1rem; color:#111; margin-top:4px;">Standard</div>
                            </div>
                            <span class="package-tag">Populer</span>
                        </div>
                        <ul class="list-unstyled mt-4" style="font-size:0.9rem; color:#374151;">
                            <li class="mb-2">Akses Gym 24 Jam</li>
                            <li class="mb-2">Unlimited Kelas Grup</li>
                            <li class="mb-2">Konsultasi Trainer</li>
                            <li class="mb-2">Program Nutrisi</li>
                            <li style="color:#9ca3af; text-decoration:line-through;">Personal Trainer</li>
                        </ul>
                    </div>
                </div>

                {{-- Premium --}}
                <div class="col-12 col-md-4">
                    <div class="package-card p-4 h-100">
                        <div class="mb-4">
                            <div class="pkg-price">Rp 499.000<small>/bulan</small></div>
                            <div style="font-weight:700; font-size:1rem; color:#111; margin-top:4px;">Premium</div>
                        </div>
                        <ul class="list-unstyled" style="font-size:0.9rem; color:#374151;">
                            <li class="mb-2">Semua Fitur Standard</li>
                            <li class="mb-2">Personal Trainer</li>
                            <li class="mb-2">Spa & Sauna</li>
                            <li class="mb-2">Tracking Progress</li>
                            <li>Priority Support</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-2">
                <a href="{{ auth()->check() ? route('products.index') : route('register') }}"
                   class="btn-secondary-custom"
                   style="display:inline-block; text-decoration:none;">
                    Lihat Semua Produk Gym
                </a>
            </div>
        </div>
    </section>

    {{-- Fasilitas --}}
    <section style="background:#f5f5f5; padding:64px 0;">
        <div class="container">
            <h2 class="mb-2" style="font-size:1.6rem;">Fasilitas Kami</h2>
            <p class="text-muted mb-5" style="font-size:0.9rem;">Fasilitas berstandar modern untuk latihan optimal</p>
            <div class="row g-4">
                @php
                $facilities = [
                    ['title' => 'Area Beban', 'desc' => 'Peralatan beban lengkap dari barbel hingga mesin gym modern untuk semua level latihan.'],
                    ['title' => 'Cardio Zone', 'desc' => 'Treadmill, elliptical, rowing machine, dan alat cardio berteknologi terkini.'],
                    ['title' => 'Kelas Grup', 'desc' => 'Yoga, Zumba, Aerobik, dan HIIT dipandu instruktur profesional berpengalaman.'],
                    ['title' => 'Sauna & Spa', 'desc' => 'Fasilitas relaksasi premium untuk member Standard dan Premium setelah latihan.'],
                ];
                @endphp
                @foreach($facilities as $facility)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="facility-card">
                        <h5 class="fw-bold mb-2" style="font-size:0.95rem;">{{ $facility['title'] }}</h5>
                        <p class="text-muted mb-0" style="font-size:0.875rem; line-height:1.6;">{{ $facility['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
