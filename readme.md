**FitZone - Sistem Manajemen Gym**
Proyek ini adalah sebuah landing page responsif untuk sistem manajemen gym bernama FitZone. Dibuat untuk memenuhi tugas minggu ke-1 dengan fokus pada struktur HTML, styling CSS kustom, dan integrasi framework Bootstrap.

**Fitur Utama**
Hero Section: Tampilan utama yang menarik dengan background image yang immersive.

Statistik Real-time: Menampilkan data member dan pendapatan menggunakan card dengan efek hover.

Form Pendaftaran: Formulir input member baru yang terintegrasi dengan Formspree untuk pengiriman data.

Daftar Paket: Informasi harga dan fitur membership (Basic, Standard, Premium).

Fully Responsive: Tampilan optimal di berbagai perangkat (Mobile, Tablet, Desktop) menggunakan Grid System Bootstrap.

**Teknologi yang Digunakan**
HTML5: Struktur semantik halaman.

CSS3: Custom styling, animasi slide-up, dan transisi hover.

Bootstrap 5.3: Framework utama untuk tata letak dan komponen UI.

Bootstrap Icons: Library ikon vektor untuk memperjelas informasi.

Google Fonts / Segoe UI: Tipografi yang modern dan bersih.

**Struktur Folder**
SISTEM_MANAJEMEN_GYM_TUGASWEEK1/
├── assets/          # Berisi gambar (Unsplash) dan ikon (SVG)
├── css/             # Folder untuk file CSS eksternal
│   └── style.css    # Kustomisasi style, warna, dan animasi
├── index.html       # File utama (struktur halaman)
└── readme.md        # Dokumentasi proyek
Integrasi Gambar: Menggunakan aset lokal di folder /assets untuk efisiensi loading.

Scroll Behavior: Menggunakan properti smooth scroll untuk navigasi antar bagian halaman yang lebih halus.

**Beberapa Penjelasan Teknis**
1. Implementasi Responsivitas (Bootstrap Grid)

Pada bagian statistik dan paket, digunakan sistem grid Bootstrap dengan class kombinasi seperti col-12 col-md-6 col-lg-3.

Teknis: Ini adalah implementasi mobile-first design.

col-12: Pada layar kecil (ponsel), elemen akan mengambil lebar penuh (1 baris = 1 kartu).

col-md-6: Pada layar medium (tablet), elemen akan mengambil 50% lebar (1 baris = 2 kartu).

col-lg-3: Pada layar besar (desktop), elemen akan mengambil 25% lebar (1 baris = 4 kartu).

2. Animasi dan Interaksi User (CSS Transition)

Kamu menggunakan properti transition dan transform pada class .stat-card dan .package-card.

Teknis: Penggunaan transition: all 0.3s ease memastikan perubahan visual (seperti perubahan warna border atau posisi) terjadi secara halus, bukan instan.

Efek Hover: Properti transform: translateY(-10px) memberikan umpan balik visual (visual feedback) kepada pengguna bahwa elemen tersebut interaktif (seolah-olah terangkat saat kursor mendekat).

3. Keyframe Animation (@keyframes)

Di bagian akhir CSS, terdapat rule @keyframes slideUp.

Teknis: Animasi ini memanipulasi opasitas dari 0 ke 1 dan posisi translateY dari 20px ke 0.

Tujuan: Ini memberikan efek "muncul dari bawah" saat halaman pertama kali dimuat (initial load), yang meningkatkan aspek estetika dan pengalaman pengguna (UX).

4. Validasi Form Tingkat Klien

Pada input nomor telepon, kamu menggunakan atribut pattern="[0-9]{10,13}".

Teknis: Ini adalah Regular Expression (Regex) yang membatasi input pengguna hanya boleh berupa angka dengan panjang minimal 10 dan maksimal 13 karakter. Hal ini mencegah pengiriman data sampah (bad data) ke server sebelum formulir benar-benar dikirim.

5. Pengelolaan Aset Visual (Hero Section)

Pada .hero-section, digunakan properti background-size: cover.

Teknis: Properti ini memastikan gambar latar belakang (foto dari Unsplash) selalu menutupi seluruh area section tanpa merusak rasio aspek (aspect ratio), terlepas dari ukuran layar pengguna.