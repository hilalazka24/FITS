@extends('layouts.fits')

@section('title', 'Barang Temuan Kunci — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang-temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari controller (TemuanController) berdasarkan kategori.
    $barang = [
        ['nama' => 'Kunci motor Honda', 'lokasi' => 'Masjid Manarul', 'tanggal' => '2 Apr 2025', 'status' => 'Menunggu Review', 'diklaim' => false, 'foto' => 'images/barang/kunci-motor.jpg'],
    ];
@endphp

@section('page')
    @include('barang-temuan.partials.daftar', ['aktif' => 'kunci', 'barang' => $barang])
@endsection
