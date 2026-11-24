@echo off
setlocal
cd /d "%~dp0"
if not exist ".runtime\php\php.exe" (
    echo PHP lokal belum tersedia di .runtime\php.
    echo Gunakan PHP 8.4 atau lebih baru untuk menjalankan proyek ini.
    exit /b 1
)
if not exist "vendor\autoload.php" (
    echo Dependensi Laravel belum terpasang. Jalankan Composer install dengan PHP 8.4.
    exit /b 1
)
set "PATH=%~dp0.runtime\php;%PATH%"
echo Menjalankan FITS di http://127.0.0.1:8000
echo Biarkan terminal ini terbuka. Tekan Ctrl+C untuk berhenti.
"%~dp0.runtime\php\php.exe" artisan serve --host=127.0.0.1 --port=8000
endlocal
