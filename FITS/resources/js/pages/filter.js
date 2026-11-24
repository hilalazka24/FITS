(() => {
    'use strict';

    // Hitung jumlah filter yang dipilih untuk tombol "Terapkan Filter (n)".
    const form = document.getElementById('filter-form');
    const counter = document.getElementById('filter-count');

    function hitung() {
        let jumlah = 0;
        form.querySelectorAll('[data-count]:checked').forEach((input) => {
            if (input.value !== 'Semua') {
                jumlah += 1;
            }
        });
        form.querySelectorAll('[data-date-input]').forEach((input) => {
            if (input.value) {
                jumlah += 1;
            }
        });
        counter.textContent = jumlah;
    }

    form.addEventListener('change', hitung);
    form.addEventListener('reset', () => setTimeout(hitung));
    hitung();
})();
