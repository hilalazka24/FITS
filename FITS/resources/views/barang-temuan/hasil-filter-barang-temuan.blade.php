@extends('layouts.fits')

@section('title', 'Hasil Filter — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang-temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari hasil query filter di controller.
    $filterAktif = [['label' => 'Dompet/KTP', 'gelap' => true], ['label' => 'DSI', 'gelap' => false], ['label' => 'Tower 1', 'gelap' => false]];
    $hasil = [
        ['nama' => 'Dompet Hitam Kulit', 'lokasi' => 'Lantai 2, Gedung A', 'waktu' => 'Hari ini, 09:30', 'foto' => 'images/barang/dompet-hitam.jpg', 'cocok' => true],
        ['nama' => 'KTP a/n Budi S.', 'lokasi' => 'Pos Satpam Utama', 'waktu' => 'Kemarin, 15:45', 'foto' => null, 'cocok' => false],
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Hasil Filter', 'back' => route('filter-barang-temuan')])

    <main class="page hasil-filter">
        <div class="chip-group hasil-filter__chips">
            @foreach ($filterAktif as $item)
                <a class="hasil-filter__chip {{ $item['gelap'] ? 'is-dark' : '' }}" href="{{ route('filter-barang-temuan') }}" aria-label="Hapus filter {{ $item['label'] }}">
                    {{ $item['label'] }} @include('partials.icon', ['name' => 'x'])
                </a>
            @endforeach
            <a class="hasil-filter__chip is-add" href="{{ route('filter-barang-temuan') }}">
                @include('partials.icon', ['name' => 'plus']) Tambah Filter
            </a>
        </div>

        <p class="hasil-filter__count">Menampilkan {{ count($hasil) }} hasil pencarian</p>

        @foreach ($hasil as $item)
            <a class="card hasil-card" href="{{ route('ajukan-verifikasi-klaim') }}">
                @if ($item['foto'])
                    <img class="hasil-card__thumb" src="{{ asset($item['foto']) }}" alt="" width="96" height="96">
                @else
                    <span class="hasil-card__thumb hasil-card__thumb--empty">@include('partials.icon', ['name' => 'id-card'])</span>
                @endif
                <div class="hasil-card__body">
                    <h2>{{ $item['nama'] }}</h2>
                    <p>@include('partials.icon', ['name' => 'pin']) {{ $item['lokasi'] }}</p>
                    <p>@include('partials.icon', ['name' => 'clock']) {{ $item['waktu'] }}</p>
                    @if ($item['cocok'])
                        <span class="hasil-card__match">@include('partials.icon', ['name' => 'check-circle']) Cocok dengan laporanmu</span>
                    @else
                        <span class="badge badge-gray badge-square">Belum diambil</span>
                    @endif
                </div>
            </a>
        @endforeach

        <p class="hasil-filter__end">-- Akhir hasil --</p>
    </main>

    @include('partials.bottom-nav', ['active' => 'temuan'])
@endsection
