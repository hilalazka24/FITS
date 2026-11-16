<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



## Tentang Project Ini

### Nama Aplikasi
**FITS (Find Items in ITS)**

FITS merupakan platform lost & found terpadu untuk sivitas akademika ITS. Aplikasi ini dirancang untuk membantu pengguna melaporkan barang hilang maupun barang temuan, menelusuri barang temuan, mengajukan klaim kepemilikan, serta memantau perkembangan laporan dan notifikasi dalam satu sistem.

### Anggota Kelompok dan bagiannya

- **Alwida Rahmat (5026241090)** — Mengajukan klaim barang dan melihat notifikasi.
- **Miftahul Arifin Sofyan (5026241162)** — Masuk melalui MyITS SSO, masuk ke beranda ringkasan aktivitas, serta melihat laporan barang-barang kehilangan dan riwayat status laporan.
- **Adelia Maritza Rani (5026241120)** — Melaporkan kehilangan barang dan melihat ringkasan aktivitas.
- **Ahmad 'Aaqila Akbar (5026241128)** — Melaporkan barang temuan, termasuk rekomendasi pos penyerahan (drop-off) terdekat.
- **Athallah Hilman Hilalazka (5036341145)** — Menelusuri dan mencari barang temuan berdasarkan kategori/filter, mencari kecocokan menggunakan AI Assist, serta melihat detail barang temuan.

## Cara Setup Project

### Prasyarat
Pastikan perangkat sudah memiliki:
- PHP **8.3 atau lebih baru**.
- Composer.
- Node.js dan npm.
- Ekstensi PHP SQLite/PDO SQLite aktif.

### Langkah Instalasi
1. Masuk ke direktori aplikasi:
   cd FITS
2. Install dependency PHP:
   composer install
3. Buat file konfigurasi environment:
   cp .env.example .env
   Untuk Windows PowerShell, gunakan:
   Copy-Item .env.example .env
4. Buat file database SQLite:
   touch database/database.sqlite
   Untuk Windows PowerShell, gunakan:
   New-Item -ItemType File -Path database/database.sqlite -Force
5. Generate application key:
   php artisan key:generate
6. Jalankan migration dan seeder:
   php artisan migrate --seed
   Konfigurasi `.env.example` sudah menggunakan SQLite (`DB_CONNECTION=sqlite`). Apabila konfigurasi database diubah, sesuaikan kembali nilai `DB_*` pada file `.env`.
7. Install dependency frontend dan build asset:
   npm install
   npm run build

### Menjalankan Aplikasi dalam Mode Development
Jalankan server Laravel:
php artisan serve

Kemudian, pada terminal lain di direktori project yang sama, jalankan Vite:
npm run dev

Aplikasi dapat diakses melalui alamat yang ditampilkan oleh Laravel, secara default:
http://127.0.0.1:8000

