@extends('layouts.app')

@section('title', 'Login MyITS Account — FITS')
@section('description', 'Halaman login MyITS Account untuk FITS.')
@section('body-class', 'login-page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/halamanlogin.css') }}">
@endpush

@section('content')
    <main class="login-screen">
        <header class="login-header">
            <button class="icon-button login-back" type="button" id="login-back" aria-label="Kembali ke halaman sebelumnya">
                <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M20 12H4m7-7-7 7 7 7" />
                </svg>
            </button>
            <span>MyITS SSO</span>
        </header>

        <section class="login-identity" aria-labelledby="login-title">
            <div class="login-logo">
                <img src="{{ asset('images/its-emblem.png') }}" alt="Lambang Institut Teknologi Sepuluh Nopember" width="64" height="64">
            </div>
            <h1 id="login-title">Login MyITS Account</h1>
            <p>akademik.its.ac.id</p>
        </section>

        <section class="login-card" aria-label="Form login MyITS">
            <form id="login-form" method="post" action="{{ route('login') }}" data-redirect="{{ route('beranda') }}">
                @csrf
                <div class="form-field">
                    <label class="form-label" for="identity">NRP / Email ITS</label>
                    <input class="form-input" id="identity" name="identity" type="text" placeholder="Masukkan NRP atau email" autocomplete="username" autocapitalize="none" spellcheck="false" required>
                </div>

                <div class="form-field login-password-field">
                    <div class="login-password-label">
                        <label class="form-label" for="password">Password</label>
                        <button class="text-button login-forgot" type="button" id="forgot-password">Lupa password?</button>
                    </div>
                    <div class="password-input">
                        <input class="form-input" id="password" name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required>
                        <button class="icon-button password-toggle" type="button" id="password-toggle" aria-label="Tampilkan password" aria-pressed="false" aria-controls="password">
                            <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" />
                                <circle cx="12" cy="12" r="3.5" />
                                <path class="password-eye-slash" d="m4 3 16 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button class="button button-primary login-submit" type="submit">Login</button>
                <p class="login-return">Setelah login, Anda akan kembali ke <span>FITS</span></p>
                <p class="login-status" id="login-status" role="status" hidden></p>
            </form>
        </section>

        <p class="login-security">
            <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M7 10V7a5 5 0 0 1 10 0v3M5 10h14v12H5Z" />
                <circle cx="12" cy="16" r="1" />
            </svg>
            <span>Koneksi aman melalui MyITS SSO</span>
        </p>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/halamanlogin.js') }}" defer></script>
@endpush
