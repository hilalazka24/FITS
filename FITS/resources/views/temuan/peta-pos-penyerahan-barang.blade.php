@extends('layouts.fits')

@section('title', 'Peta Pos Penyerahan Barang — FITS')
@section('frame-class', 'peta-frame')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari tabel lokasi_penyerahan.
    $pos = ['nama' => 'Pos SKK - Gedung DSI', 'jarak' => '250m', 'jam' => '08:00 - 16:00', 'kontak' => '0812-3456-7890', 'status' => 'Menerima Barang'];
@endphp

@section('page')
    <main class="peta">
        <img class="peta__map" src="{{ asset('images/peta-pos.jpg') }}" alt="Peta kampus ITS dengan lokasi pos drop-off">

        <div class="peta__top">
            <a class="peta__round" href="{{ route('kirim-laporan') }}" aria-label="Kembali">@include('partials.icon', ['name' => 'back'])</a>
            <span class="peta__chip">Pos Drop-off</span>
            <button class="peta__round" type="button" aria-label="Lokasi saya">@include('partials.icon', ['name' => 'target'])</button>
        </div>

        <section class="peta__sheet">
            <div class="peta__head">
                <span class="peta__icon">@include('partials.icon', ['name' => 'pos'])</span>
                <div>
                    <h1>{{ $pos['nama'] }}</h1>
                    <p>@include('partials.icon', ['name' => 'clock']) Operasional: {{ $pos['jam'] }}</p>
                </div>
                <span class="peta__distance">{{ $pos['jarak'] }}</span>
            </div>

            <dl class="peta__info">
                <div><dt>Kontak Petugas</dt><dd>{{ $pos['kontak'] }}</dd></div>
                <div><dt>Status</dt><dd class="peta__status">{{ $pos['status'] }}</dd></div>
            </dl>

            <div class="peta__actions">
                <a class="button button-gray" href="{{ route('beranda') }}">Kembali ke Beranda</a>
                <a class="button button-navy button-with-icon" href="https://www.google.com/maps/search/?api=1&query=Gedung+DSI+ITS+Surabaya" target="_blank" rel="noopener">
                    @include('partials.icon', ['name' => 'directions']) Buka Petunjuk Arah
                </a>
            </div>
        </section>
    </main>
@endsection
