# Menjalankan GUI FITS di Windows

Buka terminal PowerShell di folder `FITS`, lalu jalankan:

```powershell
.\run-fits.cmd
```

Buka **http://127.0.0.1:8000**. Biarkan terminal tetap terbuka selama memakai aplikasi. Tekan **Ctrl+C** untuk menghentikan server.

Launcher menggunakan PHP 8.4 lokal di `.runtime/php` dan dependensi Composer di `vendor`. Perintah `php` biasa di terminal masih mungkin mengarah ke PHP 8.2 milik XAMPP, jadi gunakan launcher di atas untuk proyek ini.

GUI menggunakan CSS/JavaScript dari folder `public`, sehingga tidak perlu menjalankan npm untuk membuka halaman. Data laporan masih demo dan direset saat halaman dimuat ulang. Session/cache memakai file selama launcher berjalan; koneksi database belum diperlukan.

Folder `.runtime`, `vendor`, dan `.env` tidak disertakan dalam Git. PHP lokal berasal dari [unduhan resmi PHP untuk Windows](https://www.php.net/downloads.php?os=windows&version=8.4), dengan checksum SHA-256 yang diverifikasi saat pemasangan.
