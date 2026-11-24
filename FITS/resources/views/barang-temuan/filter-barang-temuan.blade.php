@extends('layouts.fits')

@section('title', 'Filter Barang Temuan — FITS')
@section('frame-class', 'filter-frame')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang-temuan.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/pages/filter.js') }}" defer></script>
@endpush

@php
    // Pilihan filter. Nanti kategori & lokasi diambil dari database.
    $kategori = ['Semua', 'Elektronik', 'Dompet/KTP', 'Kunci', 'Lainnya'];
    $lokasi = ['DSI', 'Tower 1', 'SCC', 'Masjid Manarul', 'Perpustakaan'];
    $terpilihKategori = 'Dompet/KTP';
    $terpilihLokasi = ['DSI', 'Tower 1'];
@endphp

@section('page')
    <header class="filter-behind">
        <a class="filter-behind__back" href="{{ route('barang-temuan') }}" aria-label="Kembali ke Barang Temuan">
            @include('partials.icon', ['name' => 'chevron-left'])
        </a>
        <span>Barang Temuan</span>
    </header>

    <form class="filter-sheet" action="{{ route('hasil-filter-barang-temuan') }}" method="get" id="filter-form">
        <span class="filter-sheet__handle" aria-hidden="true"></span>
        <div class="filter-sheet__head">
            <h1>Filter Pencarian</h1>
            <button class="text-button" type="reset">Reset</button>
        </div>

        <fieldset class="filter-group">
            <legend>Kategori</legend>
            <div class="chip-group">
                @foreach ($kategori as $item)
                    <label class="chip"><input type="radio" name="kategori" value="{{ $item }}" @checked($item === $terpilihKategori) data-count><span>{{ $item }}</span></label>
                @endforeach
            </div>
        </fieldset>

        <fieldset class="filter-group">
            <legend>Lokasi Penemuan</legend>
            <div class="chip-group">
                @foreach ($lokasi as $item)
                    <label class="chip"><input type="checkbox" name="lokasi[]" value="{{ $item }}" @checked(in_array($item, $terpilihLokasi)) data-count><span>{{ $item }}</span></label>
                @endforeach
            </div>
        </fieldset>

        <fieldset class="filter-group">
            <legend>Tanggal Penemuan</legend>
            <div class="filter-dates">
                <label><span class="sr-only">Dari tanggal</span><input class="input" type="text" name="dari" placeholder="Dari: 1 Apr 2025" data-date-input></label>
                <label><span class="sr-only">Sampai tanggal</span><input class="input" type="text" name="sampai" placeholder="Sampai: 5 Apr 2025" data-date-input></label>
            </div>
        </fieldset>

        <fieldset class="filter-group">
            <legend>Status</legend>
            <div class="chip-group">
                <label class="chip filter-status"><input type="radio" name="status" value="belum" checked><span>Belum diklaim</span></label>
                <label class="chip filter-status"><input type="radio" name="status" value="sudah"><span>Sudah diklaim</span></label>
            </div>
        </fieldset>

        <div class="filter-submit">
            <button class="button button-block" type="submit">Terapkan Filter (<span id="filter-count">3</span>)</button>
        </div>
    </form>
@endsection
