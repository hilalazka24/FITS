@extends('layouts.fits')

@section('title', 'Barang Temuan — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang-temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari controller (TemuanController) berdasarkan kategori.
    $barang = [
        ['nama' => 'Dompet kulit coklat', 'lokasi' => 'DSI Lt 2', 'tanggal' => '3 Apr 2025', 'status' => 'Diverifikasi', 'diklaim' => false, 'foto' => 'images/barang/dompet-coklat.jpg'],
        ['nama' => 'Kunci motor Honda', 'lokasi' => 'Masjid Manarul', 'tanggal' => '2 Apr 2025', 'status' => 'Menunggu Review', 'diklaim' => false, 'foto' => 'images/barang/kunci-motor.jpg'],
        ['nama' => 'Laptop abu-abu', 'lokasi' => 'Perpustakaan Lt 5', 'tanggal' => '1 Apr', 'status' => 'Selesai', 'diklaim' => true, 'foto' => 'images/barang/laptop-abu.jpg'],
    ];
@endphp

@section('page')
    @include('barang-temuan.partials.daftar', ['aktif' => 'semua', 'barang' => $barang])
@endsection
