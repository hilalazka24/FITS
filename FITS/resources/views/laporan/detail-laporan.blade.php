@extends('layouts.fits')

@section('title', 'Detail Laporan — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/laporan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari laporan + riwayat_laporan.
    $riwayat = [
        ['judul' => 'Laporan diterima', 'waktu' => '2 Apr • 10.15', 'ket' => null, 'status' => 'done', 'ikon' => 'check'],
        ['judul' => 'Sedang diverifikasi', 'waktu' => '2 Apr • 13.40', 'ket' => 'Petugas sedang mencocokkan laporan dengan temuan di lokasi.', 'status' => 'current', 'ikon' => 'hourglass'],
        ['judul' => 'Barang ditemukan', 'waktu' => 'Menunggu...', 'ket' => null, 'status' => 'pending', 'ikon' => 'pin'],
        ['judul' => 'Siap diambil', 'waktu' => null, 'ket' => null, 'status' => 'pending', 'ikon' => 'handover'],
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Detail Laporan', 'back' => route('daftar-laporan')])

    <main class="page laporan-detail">
        <section class="laporan-hero">
            <div class="laporan-hero__photo">
                <img src="{{ asset('images/barang/dompet-coklat.jpg') }}" alt="Dompet kulit coklat">
                <span class="badge badge-yellow">Diverifikasi</span>
            </div>
            <div class="laporan-hero__body">
                <h1>Dompet kulit coklat</h1>
                <p>@include('partials.icon', ['name' => 'calendar']) Dilaporkan 2 Apr 2025 • DSI Lt.2</p>
            </div>
        </section>

        <section class="card laporan-timeline">
            <h2>Riwayat Status</h2>
            <ol>
                @foreach ($riwayat as $item)
                    <li class="is-{{ $item['status'] }}">
                        <span class="laporan-timeline__dot">@include('partials.icon', ['name' => $item['ikon']])</span>
                        <div>
                            <h3>{{ $item['judul'] }}</h3>
                            @if ($item['waktu'])
                                <p class="laporan-timeline__time">{{ $item['waktu'] }}</p>
                            @endif
                            @if ($item['ket'])
                                <p class="laporan-timeline__note">{{ $item['ket'] }}</p>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ol>
        </section>

        <div class="alert alert-danger laporan-warning">
            @include('partials.icon', ['name' => 'alert'])
            <div>
                <h2>Peringatan: Laporan akan ditutup</h2>
                <p>Laporan akan ditutup dalam 3 hari. Perbarui jika belum ditemukan untuk memperpanjang masa aktif.</p>
                <a href="{{ route('perpanjang-laporan') }}">Perpanjang Laporan @include('partials.icon', ['name' => 'chevron-right'])</a>
            </div>
        </div>
    </main>

    @include('partials.bottom-nav', ['active' => 'laporan'])
@endsection
