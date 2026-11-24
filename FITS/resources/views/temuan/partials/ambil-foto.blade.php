{{--
    Kotak kamera + tombol Galeri / Ambil Foto (langkah 1 lapor temuan).
    Parameter: siap = true jika foto sudah dipilih (tombol Lanjut aktif)
--}}
<div class="temuan-camera card" data-photo-target>
    <span class="temuan-camera__tag">Kamera</span>
    <img class="temuan-camera__preview" alt="Foto barang temuan" hidden>
    <div class="temuan-camera__empty">
        <span class="temuan-camera__circle">@include('partials.icon', ['name' => 'camera'])</span>
        <p>Ambil foto barang yang kamu temukan.<br>Pastikan bentuk &amp; warna terlihat jelas.</p>
    </div>
</div>

<div class="temuan-camera-actions">
    <label class="button button-outline-blue button-with-icon">
        <input class="sr-only" type="file" accept="image/*" data-photo-input data-next="{{ route('unggah-foto-laporan-temuan') }}">
        @include('partials.icon', ['name' => 'gallery']) Dari Galeri
    </label>
    <label class="button button-blue button-with-icon temuan-camera-shoot">
        <input class="sr-only" type="file" accept="image/*" capture="environment" data-photo-input data-next="{{ route('unggah-foto-laporan-temuan') }}">
        @include('partials.icon', ['name' => 'camera']) Ambil Foto
    </label>
</div>

<div class="temuan-next">
    @if ($siap ?? false)
        <a class="button button-primary button-block button-caps" href="{{ route('detail-laporan-temuan') }}">Lanjut</a>
    @else
        <button class="button button-block button-caps" type="button" disabled>Lanjut</button>
    @endif
</div>
