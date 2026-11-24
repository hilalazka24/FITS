@extends('layouts.fits')

@section('title', 'Detail Barang Temuan — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/klaim.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari laporan_temuan yang dipilih.
    $barang = [
        'nama' => 'Dompet kulit coklat',
        'ditemukan' => 'DSI Lt.2 · 3 Apr 2025',
        'foto' => 'images/barang/dompet-coklat.jpg',
        'detail' => [
            'Kategori' => 'Dompet / KTP',
            'Lokasi' => 'DSI Lt. 2, kursi pojok',
            'Disimpan di' => 'Pos SKK — Gedung DSI',
        ],
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Verifikasi Klaim', 'back' => route('barang-temuan')])

    <main class="page klaim klaim-detail">
        <div class="klaim-detail__photo">
            <img src="{{ asset($barang['foto']) }}" alt="{{ $barang['nama'] }}">
            <span class="badge badge-yellow-soft klaim-detail__badge">Belum diklaim</span>
        </div>

        <h1 class="klaim-detail__title">{{ $barang['nama'] }}</h1>
        <p class="klaim-detail__found">@include('partials.icon', ['name' => 'pin']) Ditemukan di {{ $barang['ditemukan'] }}</p>

        <section class="card klaim-info">
            <dl class="info-list">
                @foreach ($barang['detail'] as $label => $nilai)
                    <div><dt>{{ $label }}</dt><dd>{{ $nilai }}</dd></div>
                @endforeach
                <div><dt>Status</dt><dd><span class="badge klaim-status">Belum diklaim</span></dd></div>
            </dl>
        </section>

        <div class="alert alert-warning klaim-alert">
            @include('partials.icon', ['name' => 'info'])
            <p>Detail lengkap barang baru bisa dilihat setelah verifikasi kepemilikan berhasil.</p>
        </div>

        <a class="button button-navy button-block button-with-icon klaim-submit" href="{{ route('verifikasi-klaim') }}">
            Ajukan Klaim @include('partials.icon', ['name' => 'arrow-right'])
        </a>
    </main>
@endsection
