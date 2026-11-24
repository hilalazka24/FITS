<?php

use Illuminate\Support\Facades\Route;

// === Login (MyITS SSO) ===
Route::view('/', 'halamanlogin')->name('home');
Route::view('/login', 'halamanlogin')->name('login');

// === Beranda ===
Route::view('/beranda', 'beranda.halaman-beranda')->name('beranda');

// === Lapor Kehilangan ===
Route::view('/lapor-kehilangan', 'kehilangan.lapor-kehilangan')->name('lapor-kehilangan');
Route::view('/lapor-kehilangan/detail', 'kehilangan.kirim-laporan-kehilangan')->name('kirim-laporan-kehilangan');
Route::view('/lapor-kehilangan/berhasil', 'kehilangan.laporan-kehilangan-berhasil')->name('laporan-kehilangan-berhasil');

// === Lapor Temuan ===
Route::view('/lapor-temuan', 'temuan.lapor-temuan')->name('lapor-temuan');
Route::view('/lapor-temuan/foto', 'temuan.unggah-foto-laporan-temuan')->name('unggah-foto-laporan-temuan');
Route::view('/lapor-temuan/detail', 'temuan.detail-laporan-temuan')->name('detail-laporan-temuan');
Route::view('/lapor-temuan/kirim', 'temuan.kirim-laporan')->name('kirim-laporan');
Route::view('/lapor-temuan/terkirim', 'temuan.laporan-terkirim')->name('laporan-terkirim');
Route::view('/pos-penyerahan', 'temuan.peta-pos-penyerahan-barang')->name('peta-pos-penyerahan-barang');

// === Barang Temuan (cari, filter, AI) ===
Route::view('/barang-temuan', 'barang-temuan.barang-temuan')->name('barang-temuan');
Route::view('/barang-temuan/dompet-ktp', 'barang-temuan.barang-temuan-dompet-ktp')->name('barang-temuan-dompet-ktp');
Route::view('/barang-temuan/kunci', 'barang-temuan.barang-temuan-kunci')->name('barang-temuan-kunci');
Route::view('/barang-temuan/filter', 'barang-temuan.filter-barang-temuan')->name('filter-barang-temuan');
Route::view('/barang-temuan/hasil-filter', 'barang-temuan.hasil-filter-barang-temuan')->name('hasil-filter-barang-temuan');
Route::view('/barang-temuan/ai', 'barang-temuan.ai-filter')->name('ai-filter');
Route::view('/barang-temuan/hasil-kecocokan', 'barang-temuan.hasil-kecocokan')->name('hasil-kecocokan');

// === Detail Barang & Klaim ===
Route::view('/barang-temuan/detail', 'klaim.ajukan-verifikasi-klaim')->name('ajukan-verifikasi-klaim');
Route::view('/klaim/verifikasi', 'klaim.verifikasi-klaim')->name('verifikasi-klaim');
Route::view('/klaim/bukti', 'klaim.unggah-bukti-verifikasi-klaim')->name('unggah-bukti-verifikasi-klaim');
Route::view('/klaim/berhasil', 'klaim.klaim-berhasil')->name('klaim-berhasil');

// === Laporan Saya ===
Route::view('/laporan', 'laporan.daftar-laporan')->name('daftar-laporan');
Route::view('/laporan/aktif', 'laporan.daftar-laporan-aktif')->name('daftar-laporan-aktif');
Route::view('/laporan/selesai', 'laporan.daftar-laporan-selesai')->name('daftar-laporan-selesai');
Route::view('/laporan/detail', 'laporan.detail-laporan')->name('detail-laporan');
Route::view('/laporan/perpanjang', 'laporan.perpanjang-laporan')->name('perpanjang-laporan');
Route::view('/laporan/perpanjang/berhasil', 'laporan.perpanjang-laporan-berhasil')->name('perpanjang-laporan-berhasil');

// === Notifikasi ===
Route::view('/notifikasi', 'notifikasi.notifikasi')->name('notifikasi');

// === Profil ===
Route::view('/profil', 'profil.profil-akun')->name('profil-akun');
Route::view('/profil/pengaturan', 'profil.pengaturan-akun')->name('pengaturan-akun');
Route::view('/profil/keluar', 'profil.keluar-akun')->name('keluar-akun');
