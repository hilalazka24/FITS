@extends('layouts.fits')

@section('title', 'AI Filter — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang-temuan.css') }}">
@endpush

@section('page')
    @include('partials.app-bar', ['title' => 'AI Filter', 'back' => route('barang-temuan')])

    <main class="page ai-filter">
        <form action="{{ route('hasil-kecocokan') }}" method="get">
            <div class="field">
                <label class="field-label" for="jenis">Jenis Barang <span class="required">*</span></label>
                <input class="input" id="jenis" name="jenis" type="text" placeholder="Dompet" required>
            </div>
            <div class="field">
                <label class="field-label" for="ciri">Merek / Ciri Utama <span class="required">*</span></label>
                <input class="input" id="ciri" name="ciri" type="text" placeholder="kulit hitam, logo kuda kecil" required>
            </div>
            <div class="field">
                <label class="field-label" for="lokasi">Lokasi Terakhir Dilihat <span class="required">*</span></label>
                <input class="input" id="lokasi" name="lokasi" type="text" placeholder="DSI, ruang kuliah Lt. 2" required>
            </div>
            <div class="field">
                <label class="field-label" for="tanggal">Tanggal Kehilangan <span class="required">*</span></label>
                <div class="input-icon">
                    <input class="input" id="tanggal" name="tanggal" type="text" placeholder="3 April 2025" data-date-input required>
                    @include('partials.icon', ['name' => 'calendar'])
                </div>
            </div>
            <div class="field">
                <label class="field-label" for="deskripsi">Deskripsi Tambahan</label>
                <textarea class="input" id="deskripsi" name="deskripsi" rows="4" placeholder="Isi: KTM, ATM BNI, uang +-200rb..."></textarea>
            </div>

            <button class="button button-navy button-block button-with-icon ai-filter__submit" type="submit">
                Cari Kecocokan Otomatis @include('partials.icon', ['name' => 'arrow-right'])
            </button>
        </form>
    </main>
@endsection
