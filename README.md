# FitZone Gym - System Management 

FitZone Gym adalah aplikasi manajemen gym berbasis web yang mengimplementasikan sistem keamanan sesi (Session) dan persistensi data lokal (Cookies). Proyek ini dikembangkan sebagai bagian dari tugas studi di Institut Teknologi Nasional (Itenas).

## Fitur Utama
- **Authentication System:** Proteksi halaman dashboard menggunakan PHP Session.
- **Remember Me:** Fitur penyimpanan username otomatis menggunakan Browser Cookies (valid 30 hari).
- **Security Guard:** Redirect otomatis bagi pengguna ilegal yang mencoba mengakses dashboard tanpa login.
- **Responsive Dashboard:** Menampilkan statistik member, pendapatan, dan alat secara dinamis.
- **Bootstrap Integration:** Menggunakan Alert Bootstrap untuk penanganan error (tanpa JavaScript alert yang mengganggu).

## Struktur Proyek
- `login.php`: Pintu masuk utama dengan validasi dan logika cookie.
- `index.php`: Dashboard admin yang terproteksi sepenuhnya.
- `logout.php`: Skrip penghapusan sesi dan keamanan data.
- `css/style.css`: Kustomisasi tema warna FitZone.

## Note
Login menggunakan kredensial: **User: admin | Pass: 123**.

---
© 2026 Mohd Hafiz Yazid Nasution - Sistem Informasi Itenas.