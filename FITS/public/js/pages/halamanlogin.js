(() => {
    'use strict';

    const form = document.getElementById('login-form');
    const password = document.getElementById('password');
    const passwordToggle = document.getElementById('password-toggle');
    const status = document.getElementById('login-status');

    function showStatus(message) {
        status.textContent = message;
        status.hidden = false;
    }

    passwordToggle.addEventListener('click', () => {
        const visible = password.type === 'password';
        password.type = visible ? 'text' : 'password';
        passwordToggle.setAttribute('aria-pressed', String(visible));
        passwordToggle.setAttribute('aria-label', visible ? 'Sembunyikan password' : 'Tampilkan password');
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        password.value = '';
        showStatus('Ini adalah preview GUI. Login MyITS SSO belum terhubung; data login tidak dikirim.');

        // Preview: lanjut ke Beranda supaya alur halaman bisa dicoba.
        if (form.dataset.redirect) {
            window.location.href = form.dataset.redirect;
        }
    });

    document.getElementById('forgot-password').addEventListener('click', () => {
        showStatus('Pemulihan password belum tersedia pada preview GUI ini.');
    });

    document.getElementById('login-back').addEventListener('click', () => {
        const previous = document.referrer ? new URL(document.referrer) : null;
        if (previous && previous.origin === window.location.origin && previous.pathname !== window.location.pathname) {
            window.history.back();
            return;
        }

        showStatus('Halaman pembuka belum ada desainnya di Figma.');
    });
})();
