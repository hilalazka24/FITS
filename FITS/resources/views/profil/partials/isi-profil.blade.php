{{-- Isi halaman profil (dipakai halaman Profil Akun dan Keluar Akun). --}}
@php
    // Data contoh. Nanti diisi dari akun_pengguna (data MyITS).
    $pengguna = ['nama' => 'Yossi Kurniawan', 'nrp' => '5052xxxxxx', 'departemen' => 'Sistem Informasi'];
    $menu = [
        ['label' => 'Akun & Keamanan', 'ikon' => 'user-gear', 'url' => route('pengaturan-akun'), 'jumlah' => null],
        ['label' => 'Riwayat Laporan', 'ikon' => 'report', 'url' => route('daftar-laporan'), 'jumlah' => null],
        ['label' => 'Notifikasi', 'ikon' => 'bell-ring', 'url' => route('notifikasi'), 'jumlah' => 3],
        ['label' => 'Tentang FITS', 'ikon' => 'info', 'url' => null, 'jumlah' => null],
        ['label' => 'Pusat Bantuan', 'ikon' => 'help', 'url' => null, 'jumlah' => null],
    ];
@endphp

@include('partials.app-bar', ['title' => 'Profil', 'back' => route('beranda')])

<main class="page profil">
    <section class="profil-identity">
        <div class="profil-photo">
            <img src="{{ asset('images/avatar.jpg') }}" alt="Foto profil {{ $pengguna['nama'] }}" width="88" height="88">
            <span class="profil-photo__edit">@include('partials.icon', ['name' => 'edit'])</span>
        </div>
        <h1>{{ $pengguna['nama'] }}</h1>
        <p>NRP {{ $pengguna['nrp'] }} • {{ $pengguna['departemen'] }}</p>
    </section>

    <nav class="card profil-menu" aria-label="Menu profil">
        @foreach ($menu as $item)
            {{-- Halaman "Tentang FITS" dan "Pusat Bantuan" belum ada desainnya di Figma. --}}
            <a class="profil-menu__item" href="{{ $item['url'] ?? '#' }}" @if (! $item['url']) aria-disabled="true" title="Halaman belum tersedia" @endif>
                <span class="profil-menu__icon">@include('partials.icon', ['name' => $item['ikon']])</span>
                <span class="profil-menu__label">{{ $item['label'] }}</span>
                @if ($item['jumlah'])
                    <span class="profil-menu__count">{{ $item['jumlah'] }}</span>
                @endif
                @include('partials.icon', ['name' => 'chevron-right'])
            </a>
        @endforeach
    </nav>

    <a class="profil-logout" href="{{ route('keluar-akun') }}">
        @include('partials.icon', ['name' => 'logout']) Keluar
    </a>
</main>

@include('partials.bottom-nav', ['active' => 'profil'])
