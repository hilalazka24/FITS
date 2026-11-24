{{--
    Isi halaman daftar Barang Temuan (dipakai halaman Semua, Dompet/KTP, dan Kunci).
    Parameter:
    - aktif  : kategori yang sedang dipilih ('semua', 'dompet-ktp', 'kunci', ...)
    - barang : daftar barang (array)
--}}
@php
    $kategori = [
        'semua' => ['label' => 'Semua', 'route' => 'barang-temuan'],
        'elektronik' => ['label' => 'Elektronik', 'route' => 'barang-temuan'],
        'dompet-ktp' => ['label' => 'Dompet/KTP', 'route' => 'barang-temuan-dompet-ktp'],
        'kunci' => ['label' => 'Kunci', 'route' => 'barang-temuan-kunci'],
        'lainnya' => ['label' => 'Lainnya', 'route' => 'barang-temuan'],
    ];
    // Ikon dan warna untuk tiap status barang.
    $gayaStatus = [
        'Diverifikasi' => ['ikon' => 'badge-check', 'kelas' => 'is-blue'],
        'Menunggu Review' => ['ikon' => 'info', 'kelas' => 'is-gray'],
        'Selesai' => ['ikon' => 'check-circle', 'kelas' => 'is-blue'],
    ];
@endphp

@include('partials.app-bar', ['title' => 'Barang Temuan', 'back' => route('beranda')])

<div class="temuan-top">
    <form class="temuan-search" action="{{ route('hasil-filter-barang-temuan') }}" method="get" role="search">
        <div class="input-icon input-icon--left">
            <input class="input" type="search" name="q" placeholder="Cari barang..." aria-label="Cari barang">
            @include('partials.icon', ['name' => 'search'])
        </div>
        <a class="temuan-search__filter" href="{{ route('filter-barang-temuan') }}" aria-label="Filter pencarian">
            @include('partials.icon', ['name' => 'sliders'])
        </a>
    </form>

    <a class="ai-assist" href="{{ route('ai-filter') }}">
        <span class="ai-assist__icon">@include('partials.icon', ['name' => 'sparkles'])</span>
        <span class="ai-assist__text">
            <strong>AI Assist</strong>
            <span>Temukan barangmu dengan kecerdasan buatan</span>
        </span>
        @include('partials.icon', ['name' => 'chevron-right'])
    </a>

    <nav class="chip-group chip-group--scroll temuan-categories" aria-label="Kategori">
        @foreach ($kategori as $key => $item)
            <a class="chip {{ $aktif === $key ? 'is-active' : '' }}" href="{{ route($item['route']) }}"
               @if ($aktif === $key) aria-current="page" @endif>{{ $item['label'] }}</a>
        @endforeach
    </nav>
</div>

<main class="page temuan-list">
    <div class="temuan-list__head">
        <p class="eyebrow">Menampilkan {{ count($barang) }} hasil</p>
        <button class="temuan-sort" type="button">Terbaru @include('partials.icon', ['name' => 'chevron-down'])</button>
    </div>

    @foreach ($barang as $item)
        <article class="card barang-card">
            <div class="barang-card__photo">
                <img src="{{ asset($item['foto']) }}" alt="{{ $item['nama'] }}">
                <span class="badge badge-square {{ $item['diklaim'] ? 'badge-gray' : 'badge-red-soft' }}">
                    {{ $item['diklaim'] ? 'Sudah Diklaim' : 'Belum Diklaim' }}
                </span>
            </div>
            <div class="barang-card__body">
                <div class="barang-card__title">
                    <h2>{{ $item['nama'] }}</h2>
                    <button class="icon-button" type="button" aria-label="Simpan {{ $item['nama'] }}">
                        @include('partials.icon', ['name' => 'bookmark'])
                    </button>
                </div>
                <p class="barang-card__meta">@include('partials.icon', ['name' => 'pin']) {{ $item['lokasi'] }} • {{ $item['tanggal'] }}</p>
                <div class="barang-card__footer">
                    <span class="barang-card__status {{ $gayaStatus[$item['status']]['kelas'] }}">
                        @include('partials.icon', ['name' => $gayaStatus[$item['status']]['ikon']]) {{ $item['status'] }}
                    </span>
                    <a class="button button-sm {{ $item['diklaim'] ? 'button-outline' : 'button-primary' }}" href="{{ route('ajukan-verifikasi-klaim') }}">Detail</a>
                </div>
            </div>
        </article>
    @endforeach
</main>

@if ($aktif !== 'semua')
    <a class="fab" href="{{ route('lapor-temuan') }}" aria-label="Lapor barang temuan">
        @include('partials.icon', ['name' => 'plus'])
    </a>
@endif

@include('partials.bottom-nav', ['active' => 'temuan'])
