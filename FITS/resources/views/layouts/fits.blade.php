{{--
    Layout untuk semua halaman aplikasi FITS (selain halaman login).
    Memakai layouts.app, lalu menambahkan components.css dan bingkai layar HP (lebar maks. 402px).
    Halaman cukup mengisi @section('page').
--}}
@extends('layouts.app')

@section('body-class', 'fits-app')

@prepend('styles')
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
@endprepend

@prepend('scripts')
    <script src="{{ asset('js/components.js') }}" defer></script>
@endprepend

@section('content')
    <div class="app-frame @yield('frame-class')">
        @yield('page')
    </div>
@endsection
