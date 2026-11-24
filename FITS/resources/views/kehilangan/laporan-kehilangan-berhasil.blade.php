@extends('layouts.fits')

@section('title', 'Laporan Kehilangan Aktif — FITS')
@section('frame-class', 'frame-gradient')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/kehilangan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari controller setelah laporan tersimpan.
    $nomorLaporan = '#FITS-H-2025-0287';
    $aktifSampai = '17 Apr 2025 (15 hari)';
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Laporan Kehilangan', 'variant' => 'center'])

    <main class="page success-page">
        <div class="success-icon">@include('partials.icon', ['name' => 'check'])</div>
        <h1 class="success-title">Laporan kamu aktif</h1>
        <p class="success-text">Kami akan otomatis mencocokkan barangmu dengan temuan baru. Kamu akan dapat notifikasi jika ada kecocokan.</p>

        <section class="card card-pad success-card">
            <p class="eyebrow">No. Laporan</p>
            <p class="success-card__number">{{ $nomorLaporan }}</p>
            <p class="eyebrow">Aktif Sampai</p>
            <p class="success-card__value">{{ $aktifSampai }}</p>
        </section>

        <div class="success-actions">
            <a class="button button-primary button-block" href="{{ route('daftar-laporan') }}">Cek Status Laporan</a>
            <a class="button button-outline button-block" href="{{ route('beranda') }}">Kembali ke beranda</a>
        </div>
    </main>
@endsection
