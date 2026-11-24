{{-- Langkah klaim (kotak biru tua). Parameter: step = 1 | 2 | 3 --}}
<ol class="stepper stepper--square klaim-steps" aria-label="Langkah {{ $step }} dari 3">
    @foreach ([1, 2, 3] as $n)
        <li class="{{ $n < $step ? 'is-done' : ($n === $step ? 'is-current' : '') }}">
            <span class="stepper__dot" @if ($n === $step) aria-current="step" @endif>{{ $n }}</span>
        </li>
    @endforeach
</ol>
