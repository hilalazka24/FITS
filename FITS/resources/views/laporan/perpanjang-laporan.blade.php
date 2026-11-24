@extends('layouts.fits')

@section('title', 'Perpanjang Laporan — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/laporan.css') }}">
@endpush

@php
    $durasi = [
        ['hari' => 7, 'sampai' => '15 Apr 2025', 'ikon' => 'clock', 'saran' => false],
        ['hari' => 14, 'sampai' => '22 Apr 2025', 'ikon' => 'badge-check', 'saran' => true],
        ['hari' => 30, 'sampai' => '8 Mei 2025', 'ikon' => 'calendar-repeat', 'saran' => false],
    ];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Perpanjang Laporan', 'back' => route('detail-laporan')])

    <main class="page perpanjang">
        <section class="perpanjang-item">
            <img src="{{ asset('images/barang/dompet-coklat.jpg') }}" alt="" width="90" height="90">
            <div>
                <h1>Dompet kulit coklat</h1>
                <p>@include('partials.icon', ['name' => 'clipboard']) Report #FITS-H-2025-0287</p>
                <p class="is-red">@include('partials.icon', ['name' => 'calendar-x']) Berakhir 9 Apr 2025</p>
            </div>
        </section>

        <form action="{{ route('perpanjang-laporan-berhasil') }}" method="get">
            <div class="perpanjang-head">
                <h2>Pilih durasi perpanjangan</h2>
                <span>Opsi tersedia</span>
            </div>

            @foreach ($durasi as $item)
                <label class="perpanjang-option">
                    <input type="radio" name="durasi" value="{{ $item['hari'] }}" @checked($item['saran'])>
                    <span class="perpanjang-option__box">
                        <span class="perpanjang-option__icon">@include('partials.icon', ['name' => $item['ikon']])</span>
                        <span class="perpanjang-option__text">
                            <strong>{{ $item['hari'] }} Hari</strong>
                            Hingga {{ $item['sampai'] }}
                        </span>
                        <span class="perpanjang-option__radio" aria-hidden="true"></span>
                        @if ($item['saran'])
                            <span class="perpanjang-option__tag">Direkomendasikan</span>
                        @endif
                    </span>
                </label>
            @endforeach

            <label class="perpanjang-note-label" for="keterangan">Keterangan tambahan</label>
            <div class="perpanjang-note">
                <textarea class="input" id="keterangan" name="keterangan" rows="4" placeholder="Belum ditemukan, masih dicari..."></textarea>
                <span>Opsional</span>
            </div>

            <button class="button button-blue button-block button-with-icon perpanjang-submit" type="submit">
                Perpanjang Sekarang @include('partials.icon', ['name' => 'arrow-right'])
            </button>
            <p class="perpanjang-disclaimer">Dengan menekan tombol di atas, laporan Anda akan tetap aktif selama durasi yang dipilih dalam sistem penelusuran FITS.</p>
        </form>
    </main>
@endsection
