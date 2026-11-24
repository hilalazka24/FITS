@extends('layouts.fits')

@section('title', 'Laporan Saya — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/laporan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari laporan milik pengguna (LaporanController).
    $laporan = [
        ['nama' => 'Dompet kulit coklat', 'tanggal' => '2 Apr', 'lokasi' => 'DSI Lt.2', 'status' => 'Diverifikasi', 'foto' => 'images/barang/dompet-coklat.jpg'],
        ['nama' => 'Earphone bluetooth', 'tanggal' => '28 Mar', 'lokasi' => 'Tower 1', 'status' => 'Ditemukan', 'foto' => 'images/barang/earphone.jpg'],
        ['nama' => 'Buku catatan biru', 'tanggal' => '15 Mar', 'lokasi' => 'SCC', 'status' => 'Selesai', 'foto' => 'images/barang/buku-catatan.jpg'],
    ];
@endphp

@section('page')
    @include('laporan.partials.daftar', ['aktif' => 'semua', 'laporan' => $laporan])
@endsection
