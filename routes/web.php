<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengurusKelasController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SettingsController;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'active'])->group(function () {


    Route::post('/absensi/close', [AbsensiController::class, 'closeDay'])
        ->middleware('role:wali_kelas')
        ->name('absensi.close');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Master siswa (wali_kelas saja)
    Route::middleware('role:wali_kelas')->group(function () {
        Route::resource('siswa', SiswaController::class)->except(['show']);
        Route::resource('pengurus', PengurusKelasController::class)->except(['show']);
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingsController::class, 'store'])->name('settings.store');
    });

    // Absensi (wali_kelas + sekretaris, tapi sekretaris dibatasi hanya hari ini)
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/absensi/simpan', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::post('/absensi/finalize', [AbsensiController::class, 'finalize'])->middleware('role:wali_kelas')->name('absensi.finalize');

    // Rekap (read-only untuk sekretaris, full untuk wali)
    Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');
});
