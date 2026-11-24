{{-- Langkah lapor temuan. Parameter: step = 1 | 2 | 3, caption = teks di bawah --}}
<ol class="stepper" aria-label="Langkah {{ $step }} dari 3">
    @foreach ([1, 2, 3] as $n)
        <li class="{{ $n < $step ? 'is-done' : ($n === $step ? 'is-current' : '') }}">
            <span class="stepper__dot" @if ($n === $step) aria-current="step" @endif>{{ $n }}</span>
        </li>
    @endforeach
</ol>
<p class="stepper-caption">Langkah {{ $step }} dari 3 — {{ $caption }}</p>
