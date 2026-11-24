@extends('layouts.fits')

@section('title', 'Laporan Berhasil Diperpanjang — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/laporan.css') }}">
@endpush

@section('page')
    @include('partials.app-bar', ['variant' => 'center'])

    <main class="page success-page perpanjang-success">
        <div class="success-icon">@include('partials.icon', ['name' => 'check'])</div>
        <h1 class="success-title">Laporan Berhasil Diperpanjang</h1>
        <p class="success-text">Kami akan otomatis menambah durasi laporanmu. Kamu akan dapat notifikasi jika ada kecocokan baru.</p>

        <section class="card perpanjang-result">
            <div class="perpanjang-result__row">
                <span class="eyebrow">No. Laporan</span>
                <strong>#FITS-H-2025-0287</strong>
            </div>
            <div class="perpanjang-result__active">
                <span class="eyebrow">Aktif Sampai</span>
                <p><strong>17 Apr 2025</strong> <span class="badge perpanjang-result__days">15 Hari</span></p>
            </div>
            <p class="perpanjang-result__note">
                <span>@include('partials.icon', ['name' => 'history'])</span>
                Riwayat pencarian akan tetap disimpan dan terus diperbarui secara real-time.
            </p>
        </section>

        <div class="success-actions perpanjang-actions">
            <a class="button button-blue button-block button-with-icon" href="{{ route('detail-laporan') }}">
                @include('partials.icon', ['name' => 'clipboard-check']) Cek Status Laporan
            </a>
            <a class="button button-gray button-block button-with-icon perpanjang-home" href="{{ route('beranda') }}">
                @include('partials.icon', ['name' => 'home']) Kembali ke beranda
            </a>
        </div>
    </main>
@endsection
