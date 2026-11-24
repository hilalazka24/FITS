(() => {
    'use strict';

    // Tombol "Tambah pertanyaan lain": salin kotak pertanyaan terakhir lalu kosongkan isinya.
    const daftar = document.getElementById('daftar-pertanyaan');
    const tombol = document.getElementById('tambah-pertanyaan');

    tombol.addEventListener('click', () => {
        const nomor = daftar.children.length + 1;
        const baru = daftar.lastElementChild.cloneNode(true);

        baru.querySelectorAll('label').forEach((label, i) => {
            const jenis = i === 0 ? 'pertanyaan' : 'jawaban';
            label.htmlFor = `${jenis}_${nomor}`;
            if (i === 0) {
                label.firstChild.textContent = `Pertanyaan ${nomor} `;
            }
        });
        baru.querySelectorAll('input').forEach((input, i) => {
            input.id = `${i === 0 ? 'pertanyaan' : 'jawaban'}_${nomor}`;
            input.value = '';
            input.required = false; // pertanyaan tambahan boleh dikosongkan
        });

        daftar.appendChild(baru);
        baru.querySelector('input').focus();
    });
})();
