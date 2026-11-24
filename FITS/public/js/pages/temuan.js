(() => {
    'use strict';

    const KEY = 'fits-foto-temuan';

    // Saat foto dipilih: simpan sementara di browser, lalu buka halaman berikutnya.
    document.querySelectorAll('[data-photo-input]').forEach((input) => {
        input.addEventListener('change', () => {
            const file = input.files[0];
            if (!file) {
                return;
            }

            const reader = new FileReader();
            reader.onload = () => {
                try {
                    sessionStorage.setItem(KEY, reader.result);
                } catch (error) {
                    // Foto terlalu besar untuk disimpan sementara; lanjut tanpa pratinjau.
                }
                window.location.href = input.dataset.next;
            };
            reader.readAsDataURL(file);
        });
    });

    // Tampilkan foto yang sudah dipilih (jika ada).
    const target = document.querySelector('[data-photo-target]');
    if (target) {
        let foto = null;
        try {
            foto = sessionStorage.getItem(KEY);
        } catch (error) {
            foto = null;
        }

        if (foto && window.location.pathname.includes('/foto')) {
            const img = target.querySelector('.temuan-camera__preview');
            img.src = foto;
            img.hidden = false;
            target.querySelector('.temuan-camera__empty').hidden = true;
        }
    }
})();
