@extends('layouts.fits')

@section('title', 'Hasil Kecocokan — FITS')
@section('frame-class', 'has-nav frame-white')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang-temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari tabel hasil_kecocokan (urut dari persentase tertinggi).
    $hasil = [
        ['nama' => 'Dompet hitam (kulit)', 'lokasi' => 'DSI Lt.2', 'tanggal' => '3 Apr 2025', 'persen' => 92, 'foto' => 'images/barang/dompet-hitam.jpg'],
        ['nama' => 'Dompet coklat kecil', 'lokasi' => 'Tower ITS', 'tanggal' => '2 Apr 2025', 'persen' => 58, 'foto' => 'images/barang/dompet-coklat-kecil.jpg'],
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Hasil Kecocokan', 'back' => route('ai-filter')])

    <p class="kecocokan-summary">Ditemukan <strong>{{ count($hasil) }} barang</strong> yang cocok dengan deskripsimu.</p>

    <main class="page kecocokan">
        @foreach ($hasil as $i => $item)
            <article class="kecocokan-card">
                <img src="{{ asset($item['foto']) }}" alt="{{ $item['nama'] }}">
                <div class="kecocokan-card__body">
                    <h2>{{ $item['nama'] }}</h2>
                    <p>{{ $item['lokasi'] }} · {{ $item['tanggal'] }}</p>
                    <div class="kecocokan-card__score">
                        <span>Tingkat kecocokan</span>
                        <strong class="{{ $i === 0 ? 'is-top' : '' }}">{{ $item['persen'] }}%</strong>
                    </div>
                    <div class="kecocokan-bar {{ $i === 0 ? 'is-top' : '' }}" role="progressbar" aria-valuenow="{{ $item['persen'] }}" aria-valuemin="0" aria-valuemax="100">
                        <span style="width: {{ $item['persen'] }}%"></span>
                    </div>
                    @if ($i === 0)
                        <a class="button button-navy button-block" href="{{ route('ajukan-verifikasi-klaim') }}">Lihat Detail &amp; Klaim</a>
                    @else
                        <a class="button button-outline button-block" href="{{ route('ajukan-verifikasi-klaim') }}">Lihat Detail</a>
                    @endif
                </div>
            </article>
        @endforeach

        <div class="alert alert-danger kecocokan-note">
            @include('partials.icon', ['name' => 'info'])
            <p>Hasil pencocokan dibuat oleh AI dan mungkin tidak selalu akurat. Mohon verifikasi kembali detail barang sebelum klaim.</p>
        </div>
    </main>

    @include('partials.bottom-nav', ['active' => 'temuan'])
@endsection
