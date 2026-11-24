@extends('layouts.fits')

@section('title', 'Pengaturan Akun — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/profil.css') }}">
@endpush

@section('page')
    @include('partials.app-bar', ['title' => 'Pengaturan Akun', 'back' => route('profil-akun')])

    <main class="page pengaturan">
        <h2 class="pengaturan-group">Notifikasi</h2>
        <section class="card pengaturan-card">
            <label class="pengaturan-row">
                <span class="pengaturan-icon is-blue">@include('partials.icon', ['name' => 'bell-ring'])</span>
                <span class="pengaturan-label">Notifikasi Push</span>
                <span class="switch"><input type="checkbox" name="notif_push" checked><span></span></span>
            </label>
            <label class="pengaturan-row">
                <span class="pengaturan-icon is-blue">@include('partials.icon', ['name' => 'mail'])</span>
                <span class="pengaturan-label">Notifikasi Email</span>
                <span class="switch"><input type="checkbox" name="notif_email"><span></span></span>
            </label>
        </section>

        <h2 class="pengaturan-group">Preferensi</h2>
        <section class="card pengaturan-card">
            <div class="pengaturan-row">
                <span class="pengaturan-icon is-yellow">@include('partials.icon', ['name' => 'globe'])</span>
                <label class="pengaturan-label" for="bahasa">Bahasa</label>
                <select class="pengaturan-select" id="bahasa" name="bahasa">
                    <option>Indonesia</option>
                    <option>English</option>
                </select>
            </div>
        </section>

        <h2 class="pengaturan-group">Privasi &amp; Keamanan</h2>
        <section class="card pengaturan-card">
            <label class="pengaturan-row">
                <span class="pengaturan-icon">@include('partials.icon', ['name' => 'eye'])</span>
                <span class="pengaturan-label">Visibilitas Profil <small>Tampilkan profil ke publik</small></span>
                <span class="switch"><input type="checkbox" name="visibilitas" checked><span></span></span>
            </label>
            <a class="pengaturan-row" href="#" aria-disabled="true" title="Halaman belum tersedia">
                <span class="pengaturan-icon">@include('partials.icon', ['name' => 'shield-user'])</span>
                <span class="pengaturan-label">Kebijakan Privasi</span>
                @include('partials.icon', ['name' => 'chevron-right'])
            </a>
        </section>

        <a class="card pengaturan-logout" href="{{ route('keluar-akun') }}">
            @include('partials.icon', ['name' => 'logout']) Keluar dari Akun
        </a>
        <p class="pengaturan-version">FITS Versi 1.0.0</p>
    </main>
@endsection
