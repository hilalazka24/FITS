{{--
    Isi halaman Laporan Saya (dipakai tab Semua, Aktif, dan Selesai).
    Parameter: aktif = 'semua' | 'aktif' | 'selesai', laporan = daftar laporan (array)
--}}
@php
    $tab = [
        'semua' => ['label' => 'Semua', 'route' => 'daftar-laporan'],
        'aktif' => ['label' => 'Aktif', 'route' => 'daftar-laporan-aktif'],
        'selesai' => ['label' => 'Selesai', 'route' => 'daftar-laporan-selesai'],
    ];
    $gayaStatus = [
        'Diverifikasi' => ['badge-yellow', 'badge-check'],
        'Ditemukan' => ['badge-green', 'check-circle'],
        'Selesai' => ['badge-gray', 'ban'],
    ];
@endphp

@include('partials.app-bar', ['title' => 'Laporan Saya', 'back' => route('beranda')])

<main class="page laporan">
    <nav class="chip-group laporan-tabs" aria-label="Status laporan">
        @foreach ($tab as $key => $item)
            <a class="chip {{ $aktif === $key ? 'is-active' : '' }}" href="{{ route($item['route']) }}"
               @if ($aktif === $key) aria-current="page" @endif>{{ $item['label'] }}</a>
        @endforeach
    </nav>

    @forelse ($laporan as $item)
        @php [$badge, $ikon] = $gayaStatus[$item['status']]; @endphp
        <a class="card item-row laporan-card {{ $item['status'] === 'Selesai' ? 'is-done' : '' }}" href="{{ route('detail-laporan') }}">
            <img class="item-row__thumb" src="{{ asset($item['foto']) }}" alt="" width="80" height="80">
            <div class="item-row__body">
                <h2 class="item-row__title">{{ $item['nama'] }}</h2>
                <p class="item-row__meta">Dilaporkan {{ $item['tanggal'] }} • {{ $item['lokasi'] }}</p>
                <span class="badge {{ $badge }}">@include('partials.icon', ['name' => $ikon]) {{ $item['status'] }}</span>
            </div>
        </a>
    @empty
        <p class="laporan-empty">Belum ada laporan.</p>
    @endforelse
</main>

<a class="fab fab--square" href="{{ route('lapor-kehilangan') }}" aria-label="Buat laporan kehilangan">
    @include('partials.icon', ['name' => 'plus'])
</a>

@include('partials.bottom-nav', ['active' => 'laporan'])
