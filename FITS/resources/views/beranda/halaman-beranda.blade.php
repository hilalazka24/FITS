@extends('layouts.fits')

@section('title', 'Beranda — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/beranda.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari controller (BerandaController).
    $nama = 'Yossi';
    $aktivitas = [
        ['nama' => 'Dompet kulit coklat', 'tanggal' => '2 Apr', 'lokasi' => 'DSI Lt.2', 'pos' => 'ITS Tower 1', 'status' => 'Diverifikasi', 'badge' => 'badge-green', 'foto' => 'images/barang/dompet-coklat.jpg'],
        ['nama' => 'Laptop Abu-abu', 'tanggal' => '1 Apr', 'lokasi' => 'Perpustakaan', 'pos' => null, 'status' => 'Menunggu', 'badge' => 'badge-yellow-soft', 'foto' => 'images/barang/laptop-meja.jpg'],
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['variant' => 'brand'])

    <main class="page beranda">
        <section class="beranda-greeting">
            <h1>Halo, {{ $nama }}! <span aria-hidden="true">👋</span></h1>
            <p>Selamat datang di FITS</p>
        </section>

        <section class="beranda-actions" aria-label="Buat laporan">
            <a class="beranda-action beranda-action--lost" href="{{ route('lapor-kehilangan') }}">
                @include('partials.icon', ['name' => 'lost'])
                <strong>Lapor Hilang</strong>
                <span>Kehilangan barang? Laporkan di sini.</span>
            </a>
            <a class="beranda-action beranda-action--found" href="{{ route('lapor-temuan') }}">
                @include('partials.icon', ['name' => 'globe-search'])
                <strong>Lapor Temuan</strong>
                <span>Temukan barang milik orang lain?</span>
            </a>
        </section>

        <div class="section-head">
            <h2 class="section-title">Aktivitas Terbaru</h2>
            <a class="section-link" href="{{ route('daftar-laporan') }}">
                Lihat Semua @include('partials.icon', ['name' => 'chevron-right'])
            </a>
        </div>

        @foreach ($aktivitas as $item)
            <a class="card item-row beranda-activity" href="{{ route('detail-laporan') }}">
                <img class="item-row__thumb" src="{{ asset($item['foto']) }}" alt="" width="64" height="64">
                <div class="item-row__body">
                    <div class="beranda-activity__top">
                        <h3 class="item-row__title">{{ $item['nama'] }}</h3>
                        <span class="badge badge-square {{ $item['badge'] }}">{{ $item['status'] }}</span>
                    </div>
                    <p class="item-row__meta">Dilaporkan {{ $item['tanggal'] }} • {{ $item['lokasi'] }}</p>
                    @if ($item['pos'])
                        <p class="beranda-activity__pos">
                            @include('partials.icon', ['name' => 'pin']) {{ $item['pos'] }}
                        </p>
                    @endif
                </div>
            </a>
        @endforeach

        <section class="beranda-stats" aria-label="Statistik FITS">
            <div class="beranda-stat beranda-stat--blue">
                @include('partials.icon', ['name' => 'badge-check'])
                <strong>128</strong>
                <span>Barang Kembali</span>
            </div>
            <div class="beranda-stat beranda-stat--gray">
                <strong>45</strong>
                <span>Sedang Dicari</span>
            </div>
        </section>
    </main>

    <a class="fab" href="{{ route('lapor-temuan') }}" aria-label="Foto barang temuan">
        @include('partials.icon', ['name' => 'camera-plus'])
    </a>

    @include('partials.bottom-nav', ['active' => 'beranda'])
@endsection
