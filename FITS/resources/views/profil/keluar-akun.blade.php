@extends('layouts.fits')

@section('title', 'Keluar dari Akun — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/profil.css') }}">
@endpush

@section('page')
    <div class="profil-behind" aria-hidden="true" inert>
        @include('profil.partials.isi-profil')
    </div>

    <div class="modal-backdrop">
        <section class="modal profil-modal" role="dialog" aria-modal="true" aria-labelledby="judul-keluar">
            <span class="profil-modal__icon">@include('partials.icon', ['name' => 'alert'])</span>
            <h1 id="judul-keluar">Keluar dari Akun?</h1>
            <p>Apakah Anda yakin ingin keluar? Anda perlu login kembali untuk mengakses fitur laporan dan temuan.</p>
            <a class="button button-danger button-pill button-block" href="{{ route('login') }}">Keluar</a>
            <a class="button button-outline button-pill button-block" href="{{ route('profil-akun') }}">Batal</a>
        </section>
    </div>
@endsection
