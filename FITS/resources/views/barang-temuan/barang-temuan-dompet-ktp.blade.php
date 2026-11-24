@extends('layouts.fits')

@section('title', 'Barang Temuan Dompet/KTP — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang-temuan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari controller (TemuanController) berdasarkan kategori.
    $barang = [
        ['nama' => 'Dompet kulit coklat', 'lokasi' => 'DSI Lt 2', 'tanggal' => '3 Apr 2025', 'status' => 'Diverifikasi', 'diklaim' => false, 'foto' => 'images/barang/dompet-coklat.jpg'],
    ];
@endphp

@section('page')
    @include('barang-temuan.partials.daftar', ['aktif' => 'dompet-ktp', 'barang' => $barang])
@endsection
