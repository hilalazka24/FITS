@extends('layouts.fits')

@section('title', 'Konfirmasi Laporan Temuan — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari data langkah 1-2 dan rekomendasi pos terdekat.
    $barang = ['nama' => 'Dompet Hitam', 'lokasi' => 'DSI Lantai 2', 'waktu' => '3 Apr 2025, 09:42', 'kategori' => 'Dompet/KTP', 'foto' => 'images/barang/dompet-hitam.jpg'];
    $pos = ['nama' => 'Pos SKK — Gedung DSI', 'jarak' => '~80 m', 'jam' => '08:00–16:00', 'telepon' => '031-599 4151'];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Lapor Temuan', 'back' => route('detail-laporan-temuan')])

    <main class="page temuan">
        @include('temuan.partials.stepper', ['step' => 3, 'caption' => 'Konfirmasi'])

        <p class="page-lead temuan-lead">Tinjau kembali detail temuan Anda sebelum dikirim.</p>

        <section class="card temuan-review">
            <img src="{{ asset($barang['foto']) }}" alt="" width="96" height="96">
            <div>
                <h2>{{ $barang['nama'] }}</h2>
                <p>@include('partials.icon', ['name' => 'pin']) {{ $barang['lokasi'] }}</p>
                <p>@include('partials.icon', ['name' => 'clock']) {{ $barang['waktu'] }}</p>
                <span class="badge badge-yellow">{{ $barang['kategori'] }}</span>
            </div>
        </section>

        <div class="section-head">
            <h2 class="temuan-pos-title">Pos Drop-off Terdekat</h2>
            <a class="temuan-pos-all" href="{{ route('peta-pos-penyerahan-barang') }}">Lihat Semua</a>
        </div>

        <section class="temuan-pos">
            <span class="temuan-pos__icon">@include('partials.icon', ['name' => 'pin'])</span>
            <div class="temuan-pos__body">
                <h3>{{ $pos['nama'] }}</h3>
                <p>{{ $pos['jarak'] }} • Buka {{ $pos['jam'] }}</p>
                <div class="temuan-pos__actions">
                    <a class="temuan-pos__phone" href="tel:{{ str_replace([' ', '-'], '', $pos['telepon']) }}">
                        @include('partials.icon', ['name' => 'phone']) {{ $pos['telepon'] }}
                    </a>
                    <a class="temuan-pos__nav" href="{{ route('peta-pos-penyerahan-barang') }}">Navigasi</a>
                </div>
            </div>
            <a class="temuan-pos__more" href="{{ route('peta-pos-penyerahan-barang') }}" aria-label="Lihat pos di peta">
                @include('partials.icon', ['name' => 'chevron-right'])
            </a>
        </section>

        <a class="button button-blue button-block button-with-icon temuan-send" href="{{ route('laporan-terkirim') }}">
            Kirim Laporan @include('partials.icon', ['name' => 'send'])
        </a>
        <p class="temuan-disclaimer">Dengan menekan "Kirim Laporan", Anda menyatakan bahwa informasi yang diberikan adalah benar dan bersedia untuk menyerahkan barang ke pos yang dipilih.</p>
    </main>

    @include('partials.bottom-nav', ['active' => 'laporan'])
@endsection
