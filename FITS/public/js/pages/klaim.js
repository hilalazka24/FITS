(() => {
    'use strict';

    // "Simpan Kode Klaim": salin kode ke clipboard supaya bisa ditempel/dicatat.
    const tombol = document.getElementById('simpan-kode');
    const kode = document.getElementById('kode-klaim').textContent.trim();
    const status = document.getElementById('kode-status');

    tombol.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(kode);
            status.textContent = `Kode klaim ${kode} sudah disalin.`;
        } catch (error) {
            status.textContent = `Catat kode klaim kamu: ${kode}`;
        }
        status.hidden = false;
    });
})();
