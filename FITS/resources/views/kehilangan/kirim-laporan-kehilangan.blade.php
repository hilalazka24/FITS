@extends('layouts.fits')

@section('title', 'Detail Laporan Kehilangan — FITS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/kehilangan.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/pages/kehilangan.js') }}" defer></script>
@endpush

@section('page')
    @include('partials.app-bar', ['title' => 'Lapor Kehilangan', 'back' => route('lapor-kehilangan')])

    <main class="page kehilangan-detail">
        <form action="{{ route('laporan-kehilangan-berhasil') }}" method="get">
            <div class="alert alert-info kehilangan-hint">
                <p>Tambahkan ciri-ciri khusus yang hanya kamu yang tahu untuk verifikasi nanti. Informasi ini akan membantu kami mencocokkan laporanmu dengan barang yang ditemukan.</p>
            </div>

            <div class="field">
                <label class="kehilangan-label-blue" for="deskripsi">Deskripsi Umum</label>
                <textarea class="input" id="deskripsi" name="deskripsi" rows="4" placeholder="Contoh: Dompet kulit coklat, ada bekas goresan di sisi kanan bawah dekat jahitan..."></textarea>
            </div>

            <h2 class="kehilangan-secret">
                @include('partials.icon', ['name' => 'shield'])
                Pertanyaan Verifikasi Rahasia
            </h2>
            <p class="kehilangan-secret-note">Akan ditanyakan ke orang yang mengklaim menemukan barangmu.</p>

            <div class="stack-16" id="daftar-pertanyaan">
                @foreach ([1 => ['Apa warna bagian dalam dompet?', 'Merah maroon dengan corak garis'], 2 => ['Berapa banyak slot kartu di dalam?', 'Ada 4 slot kartu']] as $no => [$contohTanya, $contohJawab])
                    <div class="kehilangan-question">
                        <label class="kehilangan-question__label" for="pertanyaan_{{ $no }}">Pertanyaan {{ $no }} <span class="required">*</span></label>
                        <input class="input" id="pertanyaan_{{ $no }}" name="pertanyaan[]" type="text" placeholder="Contoh: {{ $contohTanya }}" required>
                        <label class="kehilangan-question__label" for="jawaban_{{ $no }}">Jawaban <span class="required">*</span></label>
                        <input class="input" id="jawaban_{{ $no }}" name="jawaban[]" type="text" placeholder="Contoh: {{ $contohJawab }}" required>
                    </div>
                @endforeach
            </div>

            <button class="text-button kehilangan-add" type="button" id="tambah-pertanyaan">
                @include('partials.icon', ['name' => 'plus'])
                Tambah pertanyaan lain
            </button>

            <button class="button button-blue button-block kehilangan-send" type="submit">Kirim Laporan</button>
            <p class="kehilangan-footnote">Laporan akan diproses secara anonim hingga verifikasi berhasil.</p>
        </form>
    </main>
@endsection
