@extends('layouts.fits')

@section('title', 'Laporan Terkirim — FITS')
@section('frame-class', 'frame-white')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari laporan yang baru tersimpan.
    $ringkasan = [
        'ID Laporan' => '#T2025-0847',
        'Barang' => 'Kunci motor',
        'Lokasi Temuan' => 'Masjid Manarul, Selasar',
        'Disimpan oleh' => 'Kamu (sementara)',
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Laporan Terkirim', 'variant' => 'center'])

    <main class="page terkirim">
        <ol class="stepper stepper--square stepper--round terkirim-steps" aria-label="Semua langkah selesai">
            @foreach ([1, 2, 3] as $n)
                <li class="is-done"><span class="stepper__dot">{{ $n }}</span></li>
            @endforeach
        </ol>

        <section class="terkirim-thanks">
            <span class="terkirim-thanks__icon">@include('partials.icon', ['name' => 'party'])</span>
            <h1>Terima kasih, Kamu Pahlawan Kampus!</h1>
            <p>Laporan barang temuan kamu sudah masuk ke sistem. Kami akan bantu mencari pemiliknya.</p>
        </section>

        <section class="card terkirim-summary">
            <h2>Ringkasan Laporan</h2>
            <dl class="info-list">
                @foreach ($ringkasan as $label => $nilai)
                    <div><dt>{{ $label }}</dt><dd>{{ $nilai }}</dd></div>
                @endforeach
                <div><dt>Serahkan ke Pos</dt><dd><mark>Besok, sebelum 10.00</mark></dd></div>
            </dl>
        </section>

        <section class="terkirim-reminder">
            @include('partials.icon', ['name' => 'alarm'])
            <div>
                <h2>Pengingat Tersimpan</h2>
                <p>Kamu akan diingatkan jam 08.00 besok untuk menyerahkan barang ke Pos SKK Masjid Manarul.</p>
            </div>
        </section>
    </main>

    <div class="terkirim-footer">
        <a class="button button-primary button-block" href="{{ route('beranda') }}">Kembali ke Beranda</a>
    </div>
@endsection
