// Perilaku kecil yang dipakai di banyak halaman FITS.
(() => {
    'use strict';

    // Input tanggal: tampil sebagai teks (placeholder "2 Apr 2025"), berubah jadi pemilih tanggal saat diklik.
    document.querySelectorAll('[data-date-input]').forEach((input) => {
        input.addEventListener('focus', () => {
            input.type = 'date';
        });
        input.addEventListener('blur', () => {
            if (!input.value) {
                input.type = 'text';
            }
        });
    });

    // Chip kategori yang aktif digeser supaya terlihat (misalnya "Kunci" di ujung kanan).
    document.querySelectorAll('.chip-group--scroll .is-active').forEach((chip) => {
        chip.parentElement.scrollLeft = chip.offsetLeft - chip.parentElement.offsetLeft - 16;
    });

    // Kotak unggah: tampilkan pratinjau gambar atau nama file yang dipilih.
    document.querySelectorAll('[data-file-preview]').forEach((box) => {
        const input = box.querySelector('input[type="file"]');
        const label = box.querySelector('[data-file-label]');

        input.addEventListener('change', () => {
            const file = input.files[0];
            if (!file) {
                return;
            }

            if (file.type.startsWith('image/')) {
                let img = box.querySelector('img');
                if (!img) {
                    img = document.createElement('img');
                    img.alt = 'Pratinjau foto barang';
                    box.prepend(img);
                }
                img.src = URL.createObjectURL(file);
                box.querySelectorAll('.icon').forEach((icon) => {
                    icon.hidden = true;
                });
            }

            if (label) {
                label.textContent = file.name;
            }
        });
    });
})();
