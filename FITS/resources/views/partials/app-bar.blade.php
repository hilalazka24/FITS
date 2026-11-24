{{--
    Header biru di atas setiap halaman.
    Parameter:
    - title   : judul halaman (boleh kosong)
    - back    : URL tombol kembali (kosongkan jika tidak ada tombol kembali)
    - variant : 'default' (judul kiri), 'center' (judul tengah), atau 'brand' (logo FITS + lonceng)
--}}
@php
    $variant = $variant ?? 'default';
@endphp
<header class="app-bar app-bar--{{ $variant }}">
    @if ($variant === 'brand')
        <span class="app-bar__brand">FITS</span>
        <span class="app-bar__bell" title="Notifikasi dapat dibuka dari menu Profil">
            @include('partials.icon', ['name' => 'bell'])
        </span>
    @else
        @if (! empty($back))
            <a class="app-bar__back" href="{{ $back }}" aria-label="Kembali">
                @include('partials.icon', ['name' => 'back'])
            </a>
        @endif
        @if (! empty($title))
            <h1 class="app-bar__title">{{ $title }}</h1>
        @endif
    @endif

    <a class="app-bar__avatar" href="{{ route('profil-akun') }}" aria-label="Buka profil">
        <img src="{{ asset('images/avatar.jpg') }}" alt="" width="40" height="40">
    </a>
</header>
