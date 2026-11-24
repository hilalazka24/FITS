@extends('layouts.fits')

@section('title', 'Lapor Kehilangan — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/kehilangan.css') }}">
@endpush

@php
    $kategori = ['Elektronik', 'Dompet/KTP', 'Kunci', 'Lainnya'];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'FITS', 'back' => route('beranda')])

    <main class="page kehilangan">
        <h1 class="page-title kehilangan-title">Lapor Kehilangan</h1>
        <p class="page-lead">Isi detail barang yang hilang. Semakin lengkap, semakin mudah dicocokkan.</p>
        <hr class="divider">

        <form action="{{ route('kirim-laporan-kehilangan') }}" method="get">
            <div class="field kehilangan-first-field">
                <span class="field-label">Foto Barang (opsional)</span>
                <label class="upload-box" data-file-preview>
                    <input type="file" name="foto" accept="image/*">
                    @include('partials.icon', ['name' => 'image-plus'])
                    <span data-file-label>+ Tambah Foto</span>
                </label>
            </div>

            <div class="field">
                <label class="field-label" for="nama_barang">Nama Barang <span class="required">*</span></label>
                <input class="input" id="nama_barang" name="nama_barang" type="text" placeholder="Dompet kulit coklat" required>
            </div>

            <fieldset class="field">
                <legend class="field-label">Kategori <span class="required">*</span></legend>
                <div class="chip-group">
                    @foreach ($kategori as $item)
                        <label class="chip chip--box">
                            <input type="radio" name="kategori" value="{{ $item }}" required>
                            <span>{{ $item }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <div class="field">
                <label class="field-label" for="lokasi">Lokasi Terakhir Terlihat <span class="required">*</span></label>
                <div class="input-icon">
                    <input class="input" id="lokasi" name="lokasi" type="text" placeholder="DSI Lantai 2" required>
                    @include('partials.icon', ['name' => 'pin'])
                </div>
            </div>

            <div class="field">
                <label class="field-label" for="tanggal_hilang">Tanggal Hilang</label>
                <div class="input-icon">
                    <input class="input" id="tanggal_hilang" name="tanggal_hilang" type="text" placeholder="2 Apr 2025" data-date-input>
                    @include('partials.icon', ['name' => 'calendar'])
                </div>
            </div>

            <button class="button button-primary button-block button-caps kehilangan-submit" type="submit">Lanjut</button>
        </form>
    </main>

    @include('partials.bottom-nav', ['active' => 'laporan'])
@endsection
