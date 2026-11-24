@extends('layouts.fits')

@section('title', 'Profil — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/profil.css') }}">
@endpush

@section('page')
    @include('profil.partials.isi-profil')
@endsection
