@extends('layouts.fits')

@section('title', 'Notifikasi — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/notifikasi.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari tabel notifikasi milik pengguna.
    $grup = [
        'Terbaru' => [
            ['jenis' => 'found', 'ikon' => 'box', 'judul' => 'Barang ditemukan!', 'pesan' => 'Sebuah dompet ditemukan di Perpustakaan Pusat yang mungkin milik Anda.', 'waktu' => '10 Menit yang lalu',
             'aksi' => [['Lihat detail', 'ajukan-verifikasi-klaim', 'button-navy'], ['Ambil sekarang', 'verifikasi-klaim', 'button-primary']]],
            ['jenis' => 'update', 'ikon' => 'clipboard-check', 'judul' => 'Update status laporan', 'pesan' => 'Laporan kehilangan Laptop Anda telah diverifikasi oleh petugas SKK.', 'waktu' => '2 jam yang lalu',
             'aksi' => [['Lihat detail', 'detail-laporan', 'button-outline']]],
        ],
        'Sebelumnya' => [
            ['jenis' => 'warning', 'ikon' => 'alert', 'judul' => 'Peringatan: laporan akan ditutup', 'pesan' => 'Laporan "Kunci Motor" akan ditutup otomatis dalam 24 jam karena tidak ada aktivitas.', 'waktu' => 'Kemarin',
             'aksi' => [['Perpanjang laporan', 'perpanjang-laporan', 'button-danger']]],
            ['jenis' => 'match', 'ikon' => 'found', 'judul' => 'Ada barang temuan yang cocok', 'pesan' => 'Seseorang baru saja melaporkan temuan Earphone yang mirip dengan deskripsi Anda.', 'waktu' => '2 hari yang lalu',
             'aksi' => [['Lihat detail', 'ajukan-verifikasi-klaim', 'button-outline'], ['Konfirmasi', 'verifikasi-klaim', 'button-navy']]],
        ],
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Notifikasi', 'back' => route('profil-akun')])

    <main class="page notifikasi">
        @foreach ($grup as $judulGrup => $daftar)
            <h2 class="eyebrow notifikasi-group">{{ $judulGrup }}</h2>

            @foreach ($daftar as $item)
                <article class="notif notif--{{ $item['jenis'] }}">
                    <span class="notif__icon">@include('partials.icon', ['name' => $item['ikon']])</span>
                    <div class="notif__body">
                        <div class="notif__head">
                            <h3>{{ $item['judul'] }}</h3>
                            <time>{{ $item['waktu'] }}</time>
                        </div>
                        <p>{{ $item['pesan'] }}</p>
                    </div>
                    <div class="notif__actions">
                        @foreach ($item['aksi'] as [$label, $tujuan, $gaya])
                            <a class="button button-sm {{ $gaya }}" href="{{ route($tujuan) }}">{{ $label }}</a>
                        @endforeach
                    </div>
                </article>
            @endforeach
        @endforeach
    </main>

    @include('partials.bottom-nav', ['active' => 'profil'])
@endsection
