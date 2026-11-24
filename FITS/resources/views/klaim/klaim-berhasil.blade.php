@extends('layouts.fits')

@section('title', 'Klaim Berhasil — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/klaim.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/pages/klaim.js') }}" defer></script>
@endpush

@php
    // Data contoh. Nanti diisi dari klaim_barang (kode klaim & batas pengambilan) dan lokasi_penyerahan.
    $kodeKlaim = '#C4F2A';
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Klaim Berhasil', 'variant' => 'center'])

    <main class="page klaim">
        @include('klaim.partials.stepper', ['step' => 3])

        <section class="card klaim-success">
            <div class="success-icon">@include('partials.icon', ['name' => 'check'])</div>
            <h1>Verifikasi Berhasil!</h1>
            <p>Kamu adalah pemilik yang sah. Segera ambil barangmu di pos SKK.</p>
        </section>

        <h2 class="klaim-section-title">Instruksi Pengambilan</h2>
        <dl class="klaim-pickup">
            <div><dt>Lokasi Pengambilan</dt><dd>Pos SKK — Gedung DSI</dd></div>
            <div><dt>Kode Klaim</dt><dd class="klaim-pickup__code" id="kode-klaim">{{ $kodeKlaim }}</dd></div>
            <div><dt>Batas Waktu</dt><dd class="klaim-pickup__deadline">7 Apr 2025, 16.00</dd></div>
            <div><dt>Petugas</dt><dd>Pak Slamet - 031-599 4151</dd></div>
        </dl>

        <div class="alert alert-warning klaim-alert">
            @include('partials.icon', ['name' => 'info'])
            <p>Tunjukkan kode klaim dan KTM kamu kepada petugas saat mengambil barang.</p>
        </div>

        <div class="klaim-final-actions">
            <button class="button button-navy button-block button-with-icon" type="button" id="simpan-kode">
                @include('partials.icon', ['name' => 'download']) Simpan Kode Klaim
            </button>
            <a class="button button-outline button-block button-with-icon" href="{{ route('peta-pos-penyerahan-barang') }}">
                @include('partials.icon', ['name' => 'directions']) Petunjuk Arah ke Pos
            </a>
            <a class="button button-primary button-block klaim-home" href="{{ route('beranda') }}">Kembali ke Beranda</a>
        </div>
        <p class="klaim-copied" id="kode-status" role="status" hidden></p>
    </main>
@endsection
