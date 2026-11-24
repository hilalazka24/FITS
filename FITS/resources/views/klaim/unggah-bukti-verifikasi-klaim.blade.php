@extends('layouts.fits')

@section('title', 'Unggah Bukti Verifikasi Klaim — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/klaim.css') }}">
@endpush

@php
    // Data contoh barang yang diklaim.
    $barang = ['nama' => 'Dompet Kulit Cokelat', 'lokasi' => 'Kantin GKU', 'ditemukan' => '5 April 2025', 'foto' => 'images/barang/dompet-coklat.jpg'];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Verifikasi Klaim', 'back' => route('verifikasi-klaim')])

    <main class="page klaim">
        @include('klaim.partials.stepper', ['step' => 2])

        <p class="klaim-lead">Pastikan detail barang di bawah ini sesuai dengan milikmu.</p>

        <section class="card klaim-item">
            <img src="{{ asset($barang['foto']) }}" alt="{{ $barang['nama'] }}">
            <div>
                <h2>{{ $barang['nama'] }}</h2>
                <p>@include('partials.icon', ['name' => 'pin']) <span><small>Lokasi</small>{{ $barang['lokasi'] }}</span></p>
                <p>@include('partials.icon', ['name' => 'calendar']) <span><small>Ditemukan</small>{{ $barang['ditemukan'] }}</span></p>
            </div>
        </section>

        <form action="{{ route('klaim-berhasil') }}" method="get">
            <h2 class="klaim-upload-title">Unggah Bukti Pendukung (Opsional)</h2>
            <p class="klaim-upload-note">Contoh: Foto barang saat digunakan atau bukti pembelian.</p>
            <label class="upload-box klaim-upload" data-file-preview>
                <input type="file" name="bukti" accept="image/*,.pdf">
                @include('partials.icon', ['name' => 'file-upload'])
                <span data-file-label>Pilih File</span>
            </label>

            <label class="klaim-honesty">
                <input type="checkbox" name="pernyataan" required>
                <span>
                    <strong>Pernyataan Kejujuran</strong>
                    Saya menyatakan dengan sebenar-benarnya bahwa barang ini adalah milik saya.
                </span>
            </label>

            <div class="alert alert-danger klaim-warning">
                @include('partials.icon', ['name' => 'info'])
                <p><b>Peringatan:</b> Klaim palsu dapat dikenakan sanksi sesuai kebijakan yang berlaku.</p>
            </div>

            <button class="button button-navy button-block button-with-icon klaim-submit" type="submit">
                Lanjut ke Verifikasi @include('partials.icon', ['name' => 'arrow-right'])
            </button>
        </form>
    </main>
@endsection
