@extends('layouts.fits')

@section('title', 'Unggah Foto Laporan Temuan — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/temuan.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/pages/temuan.js') }}" defer></script>
@endpush

@section('page')
    @include('partials.app-bar', ['title' => 'Lapor Temuan', 'back' => route('lapor-temuan')])

    <main class="page temuan">
        @include('temuan.partials.stepper', ['step' => 1, 'caption' => 'Foto Barang'])
        @include('temuan.partials.ambil-foto', ['siap' => true])
    </main>

    @include('partials.bottom-nav', ['active' => 'laporan'])
@endsection
