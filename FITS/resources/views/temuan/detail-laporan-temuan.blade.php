@extends('layouts.fits')

@section('title', 'Detail Laporan Temuan — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/temuan.css') }}">
@endpush

@php
    $kategori = ['Elektronik', 'Dompet/KTP', 'Kunci', 'Lainnya'];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Lapor Temuan', 'back' => route('unggah-foto-laporan-temuan')])

    <main class="page temuan">
        @include('temuan.partials.stepper', ['step' => 2, 'caption' => 'Lokasi Penemuan'])

        <p class="page-lead temuan-lead">Bantu orang lain menemukan barang mereka yang hilang.</p>

        <form action="{{ route('kirim-laporan') }}" method="get">
            <div class="temuan-map">
                <img src="{{ asset('images/peta-kampus.jpg') }}" alt="Peta kampus ITS dengan penanda lokasi">
                <button class="temuan-map__locate" type="button" id="gunakan-lokasi">
                    @include('partials.icon', ['name' => 'target']) Gunakan lokasi saya
                </button>
            </div>

            <div class="field">
                <label class="field-label" for="nama_barang">Nama Barang <span class="required">*</span></label>
                <input class="input" id="nama_barang" name="nama_barang" type="text" placeholder="Dompet kulit coklat" required>
            </div>

            <fieldset class="field temuan-fieldset">
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
                <label class="field-label" for="lokasi_temuan">Lokasi Penemuan <span class="required">*</span></label>
                <div class="input-icon">
                    <input class="input" id="lokasi_temuan" name="lokasi_temuan" type="text" placeholder="DSI Lantai 2" required>
                    @include('partials.icon', ['name' => 'pin'])
                </div>
            </div>

            <div class="field">
                <label class="field-label" for="tanggal_temu">Tanggal Ditemukan</label>
                <div class="input-icon">
                    <input class="input" id="tanggal_temu" name="tanggal_temu" type="text" placeholder="2 Apr 2025" data-date-input>
                    @include('partials.icon', ['name' => 'calendar'])
                </div>
            </div>

            <button class="button button-blue button-block button-with-icon temuan-submit" type="submit">
                Lanjut @include('partials.icon', ['name' => 'arrow-right'])
            </button>
        </form>
    </main>

    @include('partials.bottom-nav', ['active' => 'laporan'])
@endsection
