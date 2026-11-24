@extends('layouts.fits')

@section('title', 'Laporan Selesai — FITS')
@section('frame-class', 'has-nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/laporan.css') }}">
@endpush

@php
    // Data contoh. Nanti diisi dari laporan milik pengguna (LaporanController).
    $laporan = [
        ['nama' => 'Buku catatan biru', 'tanggal' => '15 Mar', 'lokasi' => 'SCC', 'status' => 'Selesai', 'foto' => 'images/barang/buku-catatan.jpg'],
    ];
@endphp

@section('page')
    @include('laporan.partials.daftar', ['aktif' => 'selesai', 'laporan' => $laporan])
@endsection
