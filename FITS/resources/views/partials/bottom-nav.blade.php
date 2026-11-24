{{-- Navigasi bawah. Parameter: active = 'beranda' | 'laporan' | 'temuan' | 'profil' --}}
@php
    $menu = [
        'beranda' => ['label' => 'Beranda', 'icon' => 'home', 'route' => 'beranda'],
        'laporan' => ['label' => 'Laporan', 'icon' => 'report', 'route' => 'daftar-laporan'],
        'temuan' => ['label' => 'Temuan', 'icon' => 'found', 'route' => 'barang-temuan'],
        'profil' => ['label' => 'Profil', 'icon' => 'user', 'route' => 'profil-akun'],
    ];
@endphp
<nav class="bottom-nav" aria-label="Navigasi utama">
    @foreach ($menu as $key => $item)
        <a class="bottom-nav__item {{ ($active ?? '') === $key ? 'is-active' : '' }}"
           href="{{ route($item['route']) }}"
           @if (($active ?? '') === $key) aria-current="page" @endif>
            @include('partials.icon', ['name' => $item['icon']])
            <span>{{ $item['label'] }}</span>
        </a>
    @endforeach
</nav>
