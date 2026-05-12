{{-- Footer --}}
<footer class="fitzone-footer py-5">
    <div class="container">
        <div class="row g-4 pb-4">
            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <span style="font-size:1.2rem; font-weight:800; color:#fff; letter-spacing:-0.5px;">
                        FitZone<span style="color:#dc2626;">.</span>
                    </span>
                </div>
                <p style="font-size:0.875rem; line-height:1.6;">
                    Sistem manajemen gym modern untuk mendukung kesehatan dan kebugaran Anda bersama komunitas FitZone.
                </p>
            </div>

            <div class="col-12 col-sm-6 col-md-2">
                <h6 class="mb-3" style="font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px;">Navigasi</h6>
                <ul class="list-unstyled" style="font-size:0.875rem;">
                    <li class="mb-2"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#paket">Paket</a></li>
                    @auth
                    <li class="mb-2"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="mb-2"><a href="{{ route('products.index') }}">Produk</a></li>
                    @else
                    <li class="mb-2"><a href="{{ route('login') }}">Login</a></li>
                    <li class="mb-2"><a href="{{ route('register') }}">Daftar</a></li>
                    @endauth
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <h6 class="mb-3" style="font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px;">Paket Membership</h6>
                <ul class="list-unstyled" style="font-size:0.875rem;">
                    <li class="mb-2">Basic — Rp 199.000/bulan</li>
                    <li class="mb-2">Standard — Rp 349.000/bulan</li>
                    <li class="mb-2">Premium — Rp 499.000/bulan</li>
                </ul>
            </div>

            <div class="col-12 col-md-3">
                <h6 class="mb-3" style="font-size:0.8rem; text-transform:uppercase; letter-spacing:0.5px;">Kontak</h6>
                <ul class="list-unstyled" style="font-size:0.875rem;">
                    <li class="mb-2">(021) 1234-5678</li>
                    <li class="mb-2">info@fitzone.com</li>
                    <li class="mb-2">Jl. PKH No.1, Bandung</li>
                    <li>Buka 24 jam / 7 hari</li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2" style="font-size:0.8rem;">
            <span>&copy; {{ date('Y') }} FitZone Gym. Semua hak dilindungi.</span>
            <div class="d-flex gap-3">
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
            </div>
        </div>
    </div>
</footer>
