@extends('layouts.fits')

@section('title', 'Verifikasi Klaim — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/klaim.css') }}">
@endpush

@php
    // Pertanyaan dibuat oleh pelapor kehilangan (tabel pertanyaan_verifikasi).
    $pertanyaan = ['Apa warna bagian dalam dompet?', 'Ada berapa kartu di dalam dompet?'];
@endphp

@section('page')
    @include('partials.app-bar', ['title' => 'Verifikasi Klaim', 'back' => route('ajukan-verifikasi-klaim')])

    <main class="page klaim">
        @include('klaim.partials.stepper', ['step' => 1])

        <p class="klaim-lead">Jawab {{ count($pertanyaan) }} pertanyaan berikut untuk membuktikan kamu adalah pemilik asli barang ini.</p>

        <form action="{{ route('unggah-bukti-verifikasi-klaim') }}" method="get">
            @foreach ($pertanyaan as $i => $teks)
                <div class="card klaim-question">
                    <p class="klaim-question__no">Pertanyaan {{ $i + 1 }} dari {{ count($pertanyaan) }}</p>
                    <label class="klaim-question__text" for="jawaban_{{ $i + 1 }}">{{ $teks }} <span class="required">*</span></label>
                    <input class="input" id="jawaban_{{ $i + 1 }}" name="jawaban[]" type="text" placeholder="Ketik jawabanmu..." required>
                </div>
            @endforeach

            <p class="klaim-hint">@include('partials.icon', ['name' => 'info']) Pertanyaan disesuaikan dengan jenis barang yang ditemukan.</p>

            <button class="button button-navy button-block button-with-icon klaim-submit" type="submit">
                Kirim Verifikasi @include('partials.icon', ['name' => 'arrow-right'])
            </button>
        </form>
    </main>

    @include('partials.bottom-nav', ['active' => 'temuan'])
@endsection
