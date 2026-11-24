@extends('layouts.fits')

@section('title', 'Laporan Aktif — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/laporan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari laporan milik pengguna (LaporanController).
    $laporan = [
        ['nama' => 'Dompet kulit coklat', 'tanggal' => '2 Apr', 'lokasi' => 'DSI Lt.2', 'status' => 'Diverifikasi', 'foto' => 'images/barang/dompet-coklat.jpg'],
        ['nama' => 'Earphone bluetooth', 'tanggal' => '28 Mar', 'lokasi' => 'Tower 1', 'status' => 'Ditemukan', 'foto' => 'images/barang/earphone.jpg'],
    ];
@endphp

@section('page')
    @include('laporan.partials.daftar', ['aktif' => 'aktif', 'laporan' => $laporan])
@endsection
