<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone - Sistem Manajemen Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('index') }}">
                <i class="bi bi-lightning-charge"></i> FitZone Gym
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse me-5" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#paket">Paket</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#daftar">Daftar</a>
                    </li>
                    <li class="nav-item me-3 ms-3 mt-1 align-self-center">
                        <a class="btn btn-danger btn-sm rounded-pill px-3" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Hero Section - New Design -->
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left Content -->
                <div class="col-12 col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold mb-4 text-dark">
                            Selamat Datang di <span class="text-primary">FitZone Gym</span>
                        </h1>
                        <p class="lead mb-4 text-secondary">
                            Sistem Manajemen Gym Modern untuk Mencapai Target Kesehatan Anda. Bergabunglah dengan ribuan member yang telah merasakan transformasi tubuh impian mereka.
                        </p>
                        <div class="d-flex gap-3 flex-wrap mb-5">
                            <a href="#daftar" class="btn btn-primary btn-lg fw-bold">
                                <i class="bi bi-arrow-right"></i> Daftar Sekarang
                            </a>
                            <a href="#paket" class="btn btn-outline-primary btn-lg fw-bold">
                                <i class="bi bi-info-circle"></i> Lihat Paket
                            </a>
                        </div>           
                    </div>
                </div>

                <!-- Right Image Card -->
                <div class="col-12 col-lg-6">
                    <div class="hero-image-card">
                        <img src="{{ asset('assets/risen-wang-20jX9b35r_M-unsplash.jpg') }}" alt="Gym Image" class="hero-image">
                        <div class="hero-badge badge-top">
                            <i class="bi bi-lightning-fill"></i> Gym Terbaik di Itenas!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Hero Section -->

    <!-- Statistics Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Statistik Gym Kami</h2>
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm stat-card">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill stat-icon icon-member"></i>
                            <h3 class="mt-3 mb-2">250+</h3>
                            <p class="text-muted mb-0">Total Member</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm stat-card">
                        <div class="card-body text-center">
                            <i class="bi bi-check-circle-fill stat-icon icon-active"></i>
                            <h3 class="mt-3 mb-2">180+</h3>
                            <p class="text-muted mb-0">Member Aktif</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm stat-card">
                        <div class="card-body text-center">
                            <i class="bi bi-cash-coin stat-icon icon-revenue"></i>
                            <h3 class="mt-3 mb-2">Rp 75 Juta</h3>
                            <p class="text-muted mb-0">Total Pendapatan</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm stat-card">
                        <div class="card-body text-center">
                            <i class="stat-icon icon-equipment"><img src="assets/dumbbell-svgrepo-com.svg" style="width: auto;" height="50px" alt=""></i>
                            <h3 class="mt-3 mb-2">15+</h3>
                            <p class="text-muted mb-0">Peralatan Fitness</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Statistics Section -->

    <!-- Form Input Data Member -->
    <section class="py-5" id="daftar">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Daftar Member Baru</h2>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-header bg-primary text-white fw-bold">
                            <i class="bi bi-person-plus"></i> Formulir Pendaftaran
                        </div>
                        <div class="card-body p-4 p-md-5">
                                <div class="mb-3">
                                    <label for="memberName" class="form-label fw-bold">
                                        <i class="bi bi-person"></i> Nama Lengkap
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-lg" 
                                        id="memberName" 
                                        name="nama"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                    >
                                </div>

                                <div class="mb-3">
                                    <label for="memberEmail" class="form-label fw-bold">
                                        <i class="bi bi-envelope"></i> Email
                                    </label>
                                    <input 
                                        type="email" 
                                        class="form-control form-control-lg" 
                                        id="memberEmail" 
                                        name="email"
                                        placeholder="nama@email.com"
                                        required
                                    >
                                </div>

                                <div class="mb-3">
                                    <label for="memberPhone" class="form-label fw-bold">
                                        <i class="bi bi-telephone"></i> No. Telepon
                                    </label>
                                    <input 
                                        type="tel" 
                                        class="form-control form-control-lg" 
                                        id="memberPhone" 
                                        name="telepon"
                                        placeholder="08XXXXXXXXXX"
                                        required
                                        pattern="[0-9]{10,13}"
                                    >
                                </div>

                                <div class="mb-3">
                                    <label for="memberPackage" class="form-label fw-bold">
                                        <i class="bi bi-bookmark"></i> Paket Membership
                                    </label>
                                    <select class="form-select form-select-lg" id="memberPackage" name="paket" required>
                                        <option value="">Pilih Paket</option>
                                        <option value="basic">Basic - Rp 199.000/bulan</option>
                                        <option value="standard">Standard - Rp 349.000/bulan</option>
                                        <option value="premium">Premium - Rp 499.000/bulan</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                                    <i class="bi bi-check-lg"></i> Daftar Sekarang
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form Input Akhir -->

    <!-- Informasi Paket -->
    <section class="py-5 bg-light" id="paket">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Paket Membership Kami</h2>
            <div class="row g-4">
                <!-- Package Basic -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm package-card">
                        <div class="card-header bg-primary text-white border-0">
                            <h5 class="mb-2">Basic</h5>
                            <h3 class="mb-0">Rp 199.000<small class="fs-6">/bulan</small></h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Akses Gym 24 Jam</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> 5 Kelas Grup/Bulan</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Lokalisir Area</li>
                                <li class="mb-2"><i class="bi bi-x-circle text-secondary"></i> Konsultasi Trainer</li>
                                <li><i class="bi bi-x-circle text-secondary"></i> Program Nutrisi</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Package Standard (Featured) -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-3 shadow package-card package-featured">
                        <div class="card-header bg-warning text-dark border-0">
                            <h5 class="mb-2">Standard</h5>
                            <h3 class="mb-2">Rp 349.000<small class="fs-6">/bulan</small></h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Akses Gym 24 Jam</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Unlimited Kelas Grup</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Konsultasi Trainer</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Program Nutrisi</li>
                                <li><i class="bi bi-x-circle text-secondary"></i> Personal Trainer</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Package Premium -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm package-card">
                        <div class="card-header bg-success text-white border-0">
                            <h5 class="mb-2">Premium</h5>
                            <h3 class="mb-0">Rp 499.000<small class="fs-6">/bulan</small></h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Semua Fitur Standard</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Personal Trainer</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Spa & Sauna</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Tracking Progress</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Priority Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Informasi Paket Akhir -->

    <!-- Fasilitas Gym -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Fasilitas Kami</h2>
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm facility-card">
                        <div class="card-body text-center">
                            <i class="facility-icon icon-beban"><img src="assets/strong-man-svgrepo-com-2.svg" width="auto" height="50px" alt=""></i>
                            <h5 class="card-title mt-3 fw-bold">Area Beban</h5>
                            <p class="card-text text-muted">Peralatan beban lengkap untuk semua level latihan</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm facility-card">
                        <div class="card-body text-center">
                            <i class="bi bi-heart-pulse facility-icon icon-cardio"></i>
                            <h5 class="card-title mt-3 fw-bold">Cardio Zone</h5>
                            <p class="card-text text-muted">Treadmill, elliptical, dan peralatan cardio modern</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm facility-card">
                        <div class="card-body text-center">
                            <i class="bi bi-people facility-icon icon-kelas"></i>
                            <h5 class="card-title mt-3 fw-bold">Kelas Grup</h5>
                            <p class="card-text text-muted">Yoga, Zumba, Aerobik, dan berbagai kelas menarik</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm facility-card">
                        <div class="card-body text-center">
                            <i class="bi bi-moisture facility-icon icon-sauna"></i>
                            <h5 class="card-title mt-3 fw-bold">Sauna & Spa</h5>
                            <p class="card-text text-muted">Fasilitas relaksasi untuk member premium</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fasilitas Akhir -->

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 col-md-4 mb-4">
                    <h5><i class="bi bi-lightning-charge"></i> FitZone Gym</h5>
                    <p class="text-white">Solusi manajemen gym terpercaya untuk kesuksesan bisnis Anda.</p>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <h6 class="fw-bold">Menu Navigasi</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('index') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li><a href="#paket" class="text-white text-decoration-none">Paket</a></li>
                        <li><a href="#daftar" class="text-white text-decoration-none">Daftar Member</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <h6 class="fw-bold">Kontak Kami</h6>
                    <p class="text-white">
                        <i class="bi bi-telephone"></i> (021) 1234-5678<br>
                        <i class="bi bi-envelope"></i> info@fitzone.com<br>
                        <i class="bi bi-geo-alt"></i> Jakarta, Indonesia
                    </p>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center text-white">
                <p>&copy; 2026 FitZone Gym. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>